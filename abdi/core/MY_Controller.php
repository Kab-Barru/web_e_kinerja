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
 * Provides standardized JSON envelopes, JWT authentication, and request handling.
 */
class MY_ApiController extends MY_Controller
{
    /**
     * @var object|null Authenticated user data from JWT
     */
    protected $auth_user = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');

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
        header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept, X-Requested-With");

        if ($this->input->method() === 'options') {
            header("HTTP/1.1 200 OK");
            exit;
        }
    }

    /**
     * Require JWT Authentication
     * Populates $this->auth_user or terminates with 401 Unauthorized
     *
     * @return object Decoded token payload
     */
    protected function require_auth()
    {
        $token = $this->get_bearer_token();

        if (empty($token)) {
            $this->respond_error('Akses ditolak. Token otentikasi Bearer tidak ditemukan.', [
                'authorization' => 'Header Authorization: Bearer <token> wajib disertakan.'
            ], 401);
        }

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
     * Extract Bearer token from HTTP headers
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
