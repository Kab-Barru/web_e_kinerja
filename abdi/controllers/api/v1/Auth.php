<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'services/Auth_service.php';

/**
 * Authentication & Profile API Controller (v1)
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
     */
    public function login()
    {
        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        $input = $this->get_json_input();
        $username = isset($input['username']) ? trim($input['username']) : '';
        $password = isset($input['password']) ? trim($input['password']) : '';

        try {
            $result = $this->auth_service->login($username, $password);
            $this->respond($result, 'Autentikasi berhasil. Selamat datang di e-Kinerja.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * GET /api/v1/profile
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
