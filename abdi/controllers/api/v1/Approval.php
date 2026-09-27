<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'services/Approval_service.php';

/**
 * Supervisor Approval & Evaluation API Controller (v1)
 */
class Approval extends MY_ApiController
{
    private $approval_service;

    public function __construct()
    {
        parent::__construct();
        $this->approval_service = new Approval_service();
    }

    /**
     * GET /api/v1/approval/bawahan -> List direct subordinates
     */
    public function bawahan()
    {
        if ($this->input->method() !== 'get') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET.', null, 405);
        }

        $this->require_auth();

        try {
            $data = $this->approval_service->get_subordinates($this->auth_user->nik);
            $this->respond($data, 'Daftar pegawai bawahan langsung berhasil dimuat.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * GET /api/v1/approval/pending -> List submitted reports awaiting evaluation
     */
    public function pending()
    {
        if ($this->input->method() !== 'get') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET.', null, 405);
        }

        $this->require_auth();

        $filters = [
            'nik_bawahan' => $this->input->get('nik_bawahan', TRUE),
            'bulan'       => $this->input->get('bulan', TRUE),
            'tahun'       => $this->input->get('tahun', TRUE),
        ];
        $page     = (int)$this->input->get('page', TRUE) ?: 1;
        $per_page = (int)$this->input->get('per_page', TRUE) ?: 15;

        try {
            $result = $this->approval_service->get_pending_reports($this->auth_user->nik, $filters, $page, $per_page);
            $this->respond_paginated($result['items'], $result['total'], $result['page'], $result['per_page'], 'Daftar laporan pending bawahan berhasil dimuat.');
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * GET /api/v1/approval/{id_pro_lap}/review -> Get full review data for a report
     */
    public function review($id_pro_lap = null)
    {
        if ($this->input->method() !== 'get') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan GET.', null, 405);
        }

        $this->require_auth();

        if (empty($id_pro_lap)) {
            $this->respond_error('ID laporan kinerja (id_pro_lap) wajib disertakan.', null, 400);
        }

        try {
            $detail = $this->approval_service->get_review_detail((int)$id_pro_lap, $this->auth_user->nik);
            $this->respond($detail, 'Data evaluasi laporan bawahan berhasil dimuat.', null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }

    /**
     * POST /api/v1/approval/{id_pro_lap}/decide -> Approve or Request Revision
     */
    public function decide($id_pro_lap = null)
    {
        if ($this->input->method() !== 'post') {
            $this->respond_error('Metode request tidak diizinkan. Gunakan POST.', null, 405);
        }

        $this->require_auth();

        if (empty($id_pro_lap)) {
            $this->respond_error('ID laporan kinerja (id_pro_lap) wajib disertakan.', null, 400);
        }

        $payload = $this->get_json_input();

        try {
            $result = $this->approval_service->decide_report((int)$id_pro_lap, $this->auth_user->nik, $payload);
            $this->respond($result, $result['message'], null, 200);
        } catch (Exception $e) {
            $code = $e->getCode() >= 400 && $e->getCode() < 600 ? $e->getCode() : 400;
            $this->respond_error($e->getMessage(), null, $code);
        }
    }
}
