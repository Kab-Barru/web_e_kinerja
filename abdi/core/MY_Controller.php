<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

/**
 * Base API Controller for E-Kinerja RESTful API v1
 * Provides standardized JSON envelopes, API Key + NIP authentication, and request handling.
 */
class MY_ApiController extends MY_Controller
{
    /**
     * @var object|null Authenticated user data resolved from NIP / Token
     */
    protected $auth_user = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->model('api/Pegawai_model', 'pegawai_model');
        $this->config->load('api_key', TRUE, TRUE);

        // Handle CORS Preflight & Headers
        $this->handle_cors();
    }

    /**
     * Handle CORS headers and OPTIONS preflight requests
     */
    protected function handle_cors()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept, X-Requested-With, X-API-KEY, X-USER-NIP, X-NIP");

        if ($this->input->method() === 'options') {
            header("HTTP/1.1 200 OK");
            exit;
        }
    }

    /**
     * Require Authentication via Header X-API-KEY & X-USER-NIP (or fallback Bearer JWT)
     * Populates $this->auth_user or terminates with 401/404
     *
     * @return object Decoded user data
     */
    protected function require_auth()
    {
        // 1. Cek autentikasi via Header X-API-KEY & X-USER-NIP (Utama)
        $api_key = $this->get_api_key();
        $user_nip = $this->get_user_nip();

        if (!empty($api_key)) {
            if (!$this->is_valid_api_key($api_key)) {
                $this->respond_error('Akses ditolak. API Key yang disertakan pada header X-API-KEY tidak valid.', [
                    'api_key' => 'Nilai X-API-KEY tidak cocok dengan daftar kunci yang diizinkan.'
                ], 401);
            }

            if (empty($user_nip)) {
                $this->respond_error('Akses ditolak. NIP pegawai wajib disertakan pada header X-USER-NIP.', [
                    'nip' => 'Header X-USER-NIP tidak ditemukan.'
                ], 401);
            }

            $pegawai = $this->pegawai_model->get_profile_by_nik($user_nip);
            if (!$pegawai) {
                $this->respond_error("Akses ditolak. Pegawai dengan NIP '$user_nip' tidak terdaftar di sistem e-Kinerja.", [
                    'nip' => 'NIP tidak ditemukan dalam database ref_pegawai.'
                ], 404);
            }

            $log_user = $this->pegawai_model->get_log_account($user_nip);
            $role = ($log_user && !empty($log_user->lev)) ? $log_user->lev : 'user_pegawai';

            $this->auth_user = (object)[
                'sub'           => $pegawai->nik,
                'nik'           => $pegawai->nik,
                'nama'          => $pegawai->nama,
                'lev'           => $role,
                'id_unit_kerja' => $pegawai->id_unit_kerja,
                'id_jabatan'    => $pegawai->id_jabatan,
                'nik_atasan'    => $pegawai->nik_atasan,
                'id_adm'        => $log_user ? $log_user->id_adm : null,
            ];

            return $this->auth_user;
        }

        // 2. Fallback: Autentikasi via Bearer JWT (Kompatibilitas)
        $token = $this->get_bearer_token();
        if (!empty($token)) {
            try {
                $decoded = $this->jwt->decode($token);
                $this->auth_user = $decoded;
                return $decoded;
            } catch (Exception $e) {
                $this->respond_error($e->getMessage(), [
                    'token' => 'Token tidak valid atau telah kedaluwarsa.'
                ], 401);
            }
        }

        // Jika keduanya tidak disertakan
        $this->respond_error('Akses ditolak. Harap sertakan header X-API-KEY dan X-USER-NIP.', [
            'authentication' => 'Header X-API-KEY dan X-USER-NIP wajib disertakan pada setiap request.'
        ], 401);
    }

    /**
     * Extract API Key from HTTP headers
     *
     * @return string|null
     */
    protected function get_api_key()
    {
        $key = $this->input->get_request_header('X-API-KEY', TRUE);
        if (empty($key)) {
            $key = $this->input->get_request_header('X-Api-Key', TRUE);
        }
        if (empty($key) && isset($_SERVER['HTTP_X_API_KEY'])) {
            $key = $_SERVER['HTTP_X_API_KEY'];
        }
        return $key ? trim($key) : null;
    }

    /**
     * Validate API Key against configured keys
     *
     * @param string $key
     * @return bool
     */
    protected function is_valid_api_key($key)
    {
        $valid_keys = $this->config->item('api_keys', 'api_key');
        if (!is_array($valid_keys)) {
            return false;
        }
        return in_array($key, $valid_keys, true);
    }

    /**
     * Extract User NIP from HTTP headers
     *
     * @return string|null
     */
    protected function get_user_nip()
    {
        $nip = $this->input->get_request_header('X-USER-NIP', TRUE);
        if (empty($nip)) {
            $nip = $this->input->get_request_header('X-User-Nip', TRUE);
        }
        if (empty($nip)) {
            $nip = $this->input->get_request_header('X-NIP', TRUE);
        }
        if (empty($nip) && isset($_SERVER['HTTP_X_USER_NIP'])) {
            $nip = $_SERVER['HTTP_X_USER_NIP'];
        }
        if (empty($nip) && isset($_SERVER['HTTP_X_NIP'])) {
            $nip = $_SERVER['HTTP_X_NIP'];
        }
        return $nip ? trim($nip) : null;
    }

    /**
     * Require specific roles
     *
     * @param array|string $roles
     */
    protected function require_role($roles)
    {
        if (!$this->auth_user) {
            $this->require_auth();
        }

        $roles = is_array($roles) ? $roles : [$roles];
        $user_role = isset($this->auth_user->lev) ? $this->auth_user->lev : '';

        if (!in_array($user_role, $roles)) {
            $this->respond_error('Akses ditolak. Anda tidak memiliki hak akses (role) untuk resource ini.', [
                'role' => "Role $user_role tidak memiliki izin."
            ], 403);
        }
    }

    /**
     * Extract Bearer token from HTTP headers (Fallback)
     *
     * @return string|null
     */
    protected function get_bearer_token()
    {
        $header = $this->input->get_request_header('Authorization', TRUE);

        if (empty($header) && isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $header = $_SERVER['HTTP_AUTHORIZATION'];
        } elseif (empty($header) && isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $header = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        }

        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/i', $header, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * Get JSON request payload or fall back to $_POST / input
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    protected function get_json_input($key = null, $default = null)
    {
        $raw = $this->input->raw_input_stream;
        $data = json_decode($raw, true);

        if (!is_array($data)) {
            $data = $this->input->post(NULL, TRUE);
            if (!is_array($data)) {
                $data = [];
            }
        }

        if ($key === null) {
            return $data;
        }

        return isset($data[$key]) ? $data[$key] : $default;
    }

    /**
     * Standard Success Response Envelope
     *
     * @param mixed $data
     * @param string $message
     * @param mixed $meta
     * @param int $code
     */
    protected function respond($data = null, $message = 'Sukses', $meta = null, $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'meta'    => $meta
        ];

        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    /**
     * Standard Paginated Success Response
     *
     * @param array $items
     * @param int $total_items
     * @param int $page
     * @param int $per_page
     * @param string $message
     */
    protected function respond_paginated(array $items, $total_items, $page = 1, $per_page = 15, $message = 'Data berhasil dimuat')
    {
        $page = max(1, (int)$page);
        $per_page = max(1, (int)$per_page);
        $total_pages = ceil($total_items / $per_page);

        $meta = [
            'current_page' => $page,
            'per_page'     => $per_page,
            'total_items'  => (int)$total_items,
            'total_pages'  => (int)$total_pages,
            'has_next'     => $page < $total_pages,
            'has_prev'     => $page > 1
        ];

        $this->respond($items, $message, $meta, 200);
    }

    /**
     * Standard Error Response Envelope
     *
     * @param string $message
     * @param mixed $errors
     * @param int $code
     */
    protected function respond_error($message = 'Terjadi kesalahan sistem', $errors = null, $code = 400)
    {
        $response = [
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
            'code'    => $code
        ];

        $this->output
            ->set_status_header($code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }
}
