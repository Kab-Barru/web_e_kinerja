<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'services/Auth_service.php';

/**
 * Authentication & Profile API Controller (v1)
 * Supports passwordless authentication via API Key & NIP
 */
class Auth extends MY_ApiController
{
    private $auth_service;

    public function __construct()
    {
        parent::__construct();
        $this->auth_service = new Auth_service();
    }

    /**
     * POST /api/v1/auth/login
     * Verifikasi NIP menggunakan header X-API-KEY tanpa memerlukan password
     */
    public function login()
    {
        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        // 1. Validasi API Key
        $api_key = $this->get_api_key();
        if (empty($api_key) || !$this->is_valid_api_key($api_key)) {
            $this->respond_error('Akses ditolak. API Key tidak valid atau tidak disertakan pada header X-API-KEY.', [
                'api_key' => 'Header X-API-KEY wajib disertakan.'
            ], 401);
        }

        // 2. Ambil NIP dari body json atau header X-USER-NIP
        $input = $this->get_json_input();
        $nip = !empty($input['nip'])
            ? trim($input['nip'])
            : (!empty($input['username']) ? trim($input['username']) : $this->get_user_nip());

        if (empty($nip)) {
            $this->respond_error('NIP pegawai wajib disertakan pada body {"nip": "..."} atau header X-USER-NIP.', null, 422);
        }

        try {
            $result = $this->auth_service->verify_nip($nip);
            $this->respond($result, 'Verifikasi NIP berhasil. Akses API aktif.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * GET /api/v1/profile
     * Ambil data profil berdasarkan header X-API-KEY dan X-USER-NIP
     */
    public function profile()
    {
        if ($this->input->method() !== 'get') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET.', null, 405);
        }

        $this->require_auth();

        try {
            $profile = $this->auth_service->get_profile($this->auth_user->nik);
            $this->respond($profile, 'Data profil pegawai berhasil dimuat.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }
}
