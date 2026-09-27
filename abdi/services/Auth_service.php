<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authentication & Profile Service
 * Handles NIP verification (passwordless with API Key) and profile formatting.
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
     * Process NIP verification and return user profile details
     *
     * @param string $nip NIP Pegawai 18 digit
     * @return array
     * @throws Exception
     */
    public function verify_nip($nip)
    {
        if (empty($nip)) {
            throw new Exception('NIP pegawai wajib disertakan.', 422);
        }

        $profile = $this->CI->pegawai_model->get_profile_by_nik($nip);

        if (!$profile) {
            throw new Exception("Pegawai dengan NIP '$nip' tidak ditemukan dalam sistem ref_pegawai.", 404);
        }

        $log_user = $this->CI->pegawai_model->get_log_account($nip);
        $role = ($log_user && !empty($log_user->lev)) ? $log_user->lev : 'user_pegawai';

        return [
            'authenticated' => true,
            'role'          => $role,
            'pegawai'       => [
                'nik'           => $profile->nik,
                'nama'          => $profile->nama,
                'id_unit_kerja' => (int)$profile->id_unit_kerja,
                'unit_kerja'    => $profile->unit_kerja,
                'kode_unit_kerja' => $profile->kode_unit_kerja,
                'id_jabatan'    => (int)$profile->id_jabatan,
                'jabatan'       => $profile->jabatan,
                'nik_atasan'    => $profile->nik_atasan,
            ],
            'status_atasan_valid' => (!empty($profile->nik_atasan) && $profile->nik_atasan !== '0')
        ];
    }

    /**
     * Legacy login method supporting passwordless verification
     *
     * @param string $username NIP
     * @param string|null $password (Optional)
     * @return array
     * @throws Exception
     */
    public function login($username, $password = null)
    {
        return $this->verify_nip($username);
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

        $log_user = $this->CI->pegawai_model->get_log_account($nik);
        $role = ($log_user && !empty($log_user->lev)) ? $log_user->lev : 'user_pegawai';

        return [
            'nik'           => $profile->nik,
            'nama'          => $profile->nama,
            'role'          => $role,
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
