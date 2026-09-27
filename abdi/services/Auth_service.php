<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authentication & Profile Service
 * Handles authentication logic, JWT generation, and profile formatting.
 */
class Auth_service
{
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('api/Pegawai_model', 'pegawai_model');
        $this->CI->load->library('JWT');
    }

    /**
     * Process user login and issue JWT token
     *
     * @param string $username
     * @param string $password
     * @return array
     * @throws Exception
     */
    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            throw new Exception('Username dan password wajib diisi.', 422);
        }

        $user = $this->CI->pegawai_model->authenticate($username, $password);

        if (!$user) {
            throw new Exception('Kombinasi NIP / Username dan password tidak sesuai atau akun nonaktif.', 401);
        }

        $profile = $this->CI->pegawai_model->get_profile_by_nik($user->username);

        $token_claims = [
            'sub'           => $user->username,
            'nik'           => $user->username,
            'nama'          => $profile ? $profile->nama : $user->nama_adm,
            'lev'           => $user->lev,
            'id_unit_kerja' => $user->id_unit_kerja,
            'id_adm'        => $user->id_adm,
            'nik_atasan'    => $profile ? $profile->nik_atasan : null
        ];

        $token = $this->CI->jwt->generate_token($token_claims);

        return [
            'token'     => $token,
            'token_type'=> 'Bearer',
            'expires_in'=> (int)$this->CI->config->item('jwt_ttl', 'jwt'),
            'role'      => $user->lev,
            'pegawai'   => [
                'nik'           => $user->username,
                'nama'          => $profile ? $profile->nama : $user->nama_adm,
                'id_unit_kerja' => $user->id_unit_kerja,
                'unit_kerja'    => $profile ? $profile->unit_kerja : null,
                'id_jabatan'    => $profile ? $profile->id_jabatan : null,
                'jabatan'       => $profile ? $profile->jabatan : null,
                'nik_atasan'    => $profile ? $profile->nik_atasan : null,
            ]
        ];
    }

    /**
     * Get complete profile details for authenticated user
     *
     * @param string $nik
     * @return array
     * @throws Exception
     */
    public function get_profile($nik)
    {
        $profile = $this->CI->pegawai_model->get_profile_by_nik($nik);

        if (!$profile) {
            throw new Exception('Data profil pegawai tidak ditemukan.', 404);
        }

        $atasan = null;
        if (!empty($profile->nik_atasan) && $profile->nik_atasan !== '0') {
            $atasan_info = $this->CI->pegawai_model->get_atasan_info($profile->nik_atasan);
            if ($atasan_info) {
                $atasan = [
                    'nik'        => $atasan_info->nik,
                    'nama'       => $atasan_info->nama,
                    'jabatan'    => $atasan_info->jabatan,
                    'unit_kerja' => $atasan_info->unit_kerja,
                ];
            }
        }

        return [
            'nik'           => $profile->nik,
            'nama'          => $profile->nama,
            'unit_kerja'    => [
                'id_unit_kerja' => (int)$profile->id_unit_kerja,
                'nama'          => $profile->unit_kerja,
                'kode'          => $profile->kode_unit_kerja,
            ],
            'jabatan'       => [
                'id_jabatan'    => (int)$profile->id_jabatan,
                'nama'          => $profile->jabatan,
            ],
            'atasan_langsung' => $atasan,
            'status_atasan_valid' => (!empty($profile->nik_atasan) && $profile->nik_atasan !== '0')
        ];
    }
}
