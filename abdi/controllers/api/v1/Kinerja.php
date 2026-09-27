<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'services/Kinerja_service.php';

/**
 * Kinerja Harian Pegawai API Controller (v1)
 */
class Kinerja extends MY_ApiController
{
    private $kinerja_service;

    public function __construct()
    {
        parent::__construct();
        $this->kinerja_service = new Kinerja_service();
    }

    /**
     * GET /api/v1/kinerja -> List reports
     * POST /api/v1/kinerja -> Create report header
     */
    public function index()
    {
        $this->require_auth();
        $method = $this->input->method();

        if ($method === 'get') {
            $filters = [
                'bulan'  => $this->input->get('bulan', TRUE),
                'tahun'  => $this->input->get('tahun', TRUE),
                'status' => $this->input->get('status', TRUE),
            ];
            $page     = (int)$this->input->get('page', TRUE) ?: 1;
            $per_page = (int)$this->input->get('per_page', TRUE) ?: 15;

            try {
                $result = $this->kinerja_service->get_report_list($this->auth_user->nik, $filters, $page, $per_page);
                $this->respond_paginated($result['items'], $result['total'], $result['page'], $result['per_page'], 'Daftar riwayat laporan kinerja berhasil dimuat.');
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } elseif ($method === 'post') {
            $payload = $this->get_json_input();
            try {
                $report = $this->kinerja_service->create_report($this->auth_user->nik, $payload);
                $this->respond($report, 'Draft laporan kinerja berhasil dibuat.', null, 201);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } else {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET atau POST.', null, 405);
        }
    }

    /**
     * GET /api/v1/kinerja/{id_pro_lap} -> Detail report
     * PUT /api/v1/kinerja/{id_pro_lap} -> Update report header
     * DELETE /api/v1/kinerja/{id_pro_lap} -> Delete draft report
     */
    public function detail($id_pro_lap = null)
    {
        $this->require_auth();

        if (empty($id_pro_lap)) {
            $this->respond_error('ID laporan kinerja (id_pro_lap) wajib disertakan.', null, 400);
        }

        $method = $this->input->method();

        if ($method === 'get') {
            try {
                $report = $this->kinerja_service->get_report_detail((int)$id_pro_lap, $this->auth_user->nik);
                $this->respond($report, 'Detail laporan kinerja berhasil dimuat.', null, 200);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } elseif ($method === 'put') {
            $payload = $this->get_json_input();
            try {
                $report = $this->kinerja_service->update_report((int)$id_pro_lap, $this->auth_user->nik, $payload);
                $this->respond($report, 'Laporan kinerja berhasil diperbarui.', null, 200);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } elseif ($method === 'delete') {
            try {
                $this->kinerja_service->delete_report((int)$id_pro_lap, $this->auth_user->nik);
                $this->respond(null, 'Draft laporan kinerja berhasil dihapus.', null, 200);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } else {
            $this->respond_error('Metode request tidak diizinkan.', null, 405);
        }
    }

    /**
     * POST /api/v1/kinerja/{id_pro_lap}/items -> Add activity item
     */
    public function add_item($id_pro_lap = null)
    {
        $this->require_auth();

        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        if (empty($id_pro_lap)) {
            $this->respond_error('ID laporan kinerja (id_pro_lap) wajib disertakan.', null, 400);
        }

        $payload = $this->get_json_input();

        try {
            $item = $this->kinerja_service->add_item((int)$id_pro_lap, $this->auth_user->nik, $payload);
            $this->respond($item, 'Rincian kegiatan berhasil ditambahkan.', null, 201);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * PUT /api/v1/kinerja/items/{id_pro_lap_detil} -> Update activity item
     * DELETE /api/v1/kinerja/items/{id_pro_lap_detil} -> Delete activity item
     */
    public function item($id_pro_lap_detil = null)
    {
        $this->require_auth();

        if (empty($id_pro_lap_detil)) {
            $this->respond_error('ID rincian kegiatan (id_pro_lap_detil) wajib disertakan.', null, 400);
        }

        $method = $this->input->method();

        if ($method === 'put') {
            $payload = $this->get_json_input();
            try {
                $item = $this->kinerja_service->update_item((int)$id_pro_lap_detil, $this->auth_user->nik, $payload);
                $this->respond($item, 'Rincian kegiatan berhasil diperbarui.', null, 200);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } elseif ($method === 'delete') {
            try {
                $this->kinerja_service->delete_item((int)$id_pro_lap_detil, $this->auth_user->nik);
                $this->respond(null, 'Rincian kegiatan berhasil dihapus.', null, 200);
            } catch (Exception $e) {
                $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
                $this->respond_error($e->getMessage(), null, $code);
            }
        } else {
            $this->respond_error('Metode request tidak diizinkan. Gunakan PUT atau DELETE.', null, 405);
        }
    }

    /**
     * POST /api/v1/kinerja/{id_pro_lap}/submit -> Submit report to atasan
     */
    public function submit($id_pro_lap = null)
    {
        $this->require_auth();

        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        if (empty($id_pro_lap)) {
            $this->respond_error('ID laporan kinerja (id_pro_lap) wajib disertakan.', null, 400);
        }

        try {
            $report = $this->kinerja_service->submit_report((int)$id_pro_lap, $this->auth_user->nik);
            $this->respond($report, 'Laporan kinerja berhasil diajukan kepada atasan langsung.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }
}
