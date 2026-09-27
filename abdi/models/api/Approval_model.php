<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Atasan Approval & Evaluasi Model (API Layer)
 * Manages subordinate verification, pending report review, ref_izin checks, and decisions.
 */
class Approval_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get direct subordinates for the logged in atasan
     *
     * @param string $nik_atasan
     * @return array
     */
    public function get_subordinates($nik_atasan)
    {
        $this->db->select('
            p.nik,
            p.nama,
            p.id_jabatan,
            j.jabatan,
            p.id_unit_kerja,
            u.unit_kerja,
            (SELECT COUNT(l.id_pro_lap) FROM pro_lap l WHERE l.nik = p.nik AND l.status = 1) as pending_reports_count
        ');
        $this->db->from('ref_pegawai p');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->where('p.nik_atasan', (string)$nik_atasan);
        $this->db->order_by('p.nama', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Check if a pegawai is directly subordinate to atasan
     *
     * @param string $nik_bawahan
     * @param string $nik_atasan
     * @return bool
     */
    public function is_subordinate($nik_bawahan, $nik_atasan)
    {
        $this->db->from('ref_pegawai');
        $this->db->where('nik', (string)$nik_bawahan);
        $this->db->where('nik_atasan', (string)$nik_atasan);
        return $this->db->count_all_results() > 0;
    }

    /**
     * Get submitted (pending status = 1) reports for atasan review
     *
     * @param string $nik_atasan
     * @param array $filters (nik_bawahan, bulan, tahun)
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function get_pending_reports($nik_atasan, array $filters = [], $limit = 15, $offset = 0)
    {
        $this->db->select('
            l.id_pro_lap,
            l.nik,
            p.nama as nama_bawahan,
            j.jabatan,
            u.unit_kerja,
            l.tanggal,
            l.tanggal_kirim,
            l.status,
            l.ket,
            (SELECT COUNT(d.id_pro_lap_detil) FROM pro_lap_detil d WHERE d.id_pro_lap = l.id_pro_lap) as total_items
        ');
        $this->db->from('pro_lap l');
        $this->db->join('ref_pegawai p', 'l.nik = p.nik', 'inner');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->where('l.nik_atasan', (string)$nik_atasan);
        $this->db->where('l.status', 1);

        if (!empty($filters['nik_bawahan'])) {
            $this->db->where('l.nik', (string)$filters['nik_bawahan']);
        }
        if (!empty($filters['tahun'])) {
            $this->db->where('YEAR(l.tanggal)', (int)$filters['tahun']);
        }
        if (!empty($filters['bulan'])) {
            $this->db->where('MONTH(l.tanggal)', (int)$filters['bulan']);
        }

        $this->db->order_by('l.tanggal_kirim', 'DESC');
        $this->db->order_by('l.tanggal', 'DESC');
        $this->db->limit((int)$limit, (int)$offset);

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Count total pending reports for pagination
     *
     * @param string $nik_atasan
     * @param array $filters
     * @return int
     */
    public function count_pending_reports($nik_atasan, array $filters = [])
    {
        $this->db->from('pro_lap l');
        $this->db->where('l.nik_atasan', (string)$nik_atasan);
        $this->db->where('l.status', 1);

        if (!empty($filters['nik_bawahan'])) {
            $this->db->where('l.nik', (string)$filters['nik_bawahan']);
        }
        if (!empty($filters['tahun'])) {
            $this->db->where('YEAR(l.tanggal)', (int)$filters['tahun']);
        }
        if (!empty($filters['bulan'])) {
            $this->db->where('MONTH(l.tanggal)', (int)$filters['bulan']);
        }

        return (int)$this->db->count_all_results();
    }

    /**
     * Get complete report details for review
     *
     * @param int $id_pro_lap
     * @param string $nik_atasan
     * @return object|null
     */
    public function get_report_for_review($id_pro_lap, $nik_atasan)
    {
        $this->db->select('
            l.id_pro_lap,
            l.nik,
            p.nama as nama_bawahan,
            p.id_unit_kerja,
            u.unit_kerja,
            u.kode as kode_unit_kerja,
            p.id_jabatan,
            j.jabatan,
            l.tanggal,
            l.tanggal_kirim,
            l.status,
            l.ket,
            l.note,
            l.ketepatan_waktu,
            l.kesesuaian_lap,
            l.nik_atasan
        ');
        $this->db->from('pro_lap l');
        $this->db->join('ref_pegawai p', 'l.nik = p.nik', 'inner');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->where('l.id_pro_lap', (int)$id_pro_lap);
        $this->db->where('l.nik_atasan', (string)$nik_atasan);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Check permission / leave status from ref_izin
     *
     * @param string $nik
     * @param string $tanggal
     * @return object|null
     */
    public function get_izin_info($nik, $tanggal)
    {
        $this->db->select('id_izin, nik, tanggal, total_izin, sta');
        $this->db->from('ref_izin');
        $this->db->where('nik', (string)$nik);
        $this->db->where('tanggal', (string)$tanggal);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Save evaluation decision (Approved or Revision)
     *
     * @param int $id_pro_lap
     * @param array $update_data
     * @return bool
     */
    public function save_decision($id_pro_lap, array $update_data)
    {
        $this->db->where('id_pro_lap', (int)$id_pro_lap);
        return $this->db->update('pro_lap', $update_data);
    }
}
