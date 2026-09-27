<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'services/Master_service.php';

/**
 * Master Data & Integrasi API Controller (v1)
 */
class Master extends MY_ApiController
{
    private $master_service;

    public function __construct()
    {
        parent::__construct();
        $this->master_service = new Master_service();
    }

    /**
     * GET /api/v1/master/skor-penilaian -> Get scoring template options
     */
    public function skor_penilaian()
    {
        if ($this->input->method() !== 'get') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET.', null, 405);
        }

        $this->require_auth();

        try {
            $data = $this->master_service->get_skor_penilaian();
            $this->respond($data, 'Opsi skor penilaian berhasil dimuat.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * POST /api/v1/integrasi/fingerprint/sync-daily -> Sync daily fingerprint attendance
     */
    public function sync_daily()
    {
        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        $this->require_auth();

        $payload = $this->get_json_input();
        $nik     = isset($payload['nik']) ? trim($payload['nik']) : $this->auth_user->nik;
        $tanggal = isset($payload['tanggal']) ? trim($payload['tanggal']) : date('Y-m-d');

        // Scope check: pegawai biasa hanya boleh sync miliknya sendiri
        if ($this->auth_user->lev === 'user_pegawai' && $nik !== $this->auth_user->nik) {
            $this->respond_error('Anda hanya diizinkan melakukan sinkronisasi data presensi untuk NIK sendiri.', null, 403);
        }

        try {
            $result = $this->master_service->sync_daily_fingerprint($nik, $tanggal);
            $this->respond($result, 'Proses sinkronisasi presensi fingerprint selesai.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }
}
