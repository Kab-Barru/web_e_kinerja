<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kinerja Harian Pegawai Model (API Layer)
 * Manages pro_lap and pro_lap_detil with strict scope, indexing, and no N+1 queries.
 */
class Kinerja_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get paginated reports for a specific pegawai with optional filters
     *
     * @param string $nik
     * @param array $filters (bulan, tahun, status)
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function get_reports($nik, array $filters = [], $limit = 15, $offset = 0)
    {
        $this->db->select('
            l.id_pro_lap,
            l.nik,
            l.tanggal,
            l.nik_atasan,
            p_atasan.nama as nama_atasan,
            l.status,
            l.ket,
            l.note,
            l.ketepatan_waktu,
            l.kesesuaian_lap,
            l.tanggal_kirim,
            (SELECT COUNT(d.id_pro_lap_detil) FROM pro_lap_detil d WHERE d.id_pro_lap = l.id_pro_lap) as total_items
        ');
        $this->db->from('pro_lap l');
        $this->db->join('ref_pegawai p_atasan', 'l.nik_atasan = p_atasan.nik', 'left');
        $this->db->where('l.nik', (string)$nik);

        $this->apply_filters($filters);

        $this->db->order_by('l.tanggal', 'DESC');
        $this->db->limit((int)$limit, (int)$offset);

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Count total reports for pagination with filters applied
     *
     * @param string $nik
     * @param array $filters
     * @return int
     */
    public function count_reports($nik, array $filters = [])
    {
        $this->db->from('pro_lap l');
        $this->db->where('l.nik', (string)$nik);

        $this->apply_filters($filters);

        return (int)$this->db->count_all_results();
    }

    /**
     * Apply common query filters (month, year, status)
     */
    private function apply_filters(array $filters)
    {
        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $this->db->where('l.status', (int)$filters['status']);
        }

        if (!empty($filters['tahun'])) {
            $this->db->where('YEAR(l.tanggal)', (int)$filters['tahun']);
        }

        if (!empty($filters['bulan'])) {
            $this->db->where('MONTH(l.tanggal)', (int)$filters['bulan']);
        }
    }

    /**
     * Get single report header by ID and optional owner NIK
     *
     * @param int $id_pro_lap
     * @param string|null $nik
     * @return object|null
     */
    public function get_report_by_id($id_pro_lap, $nik = null)
    {
        $this->db->select('
            l.id_pro_lap,
            l.nik,
            p.nama as nama_pegawai,
            l.tanggal,
            l.nik_atasan,
            p_atasan.nama as nama_atasan,
            l.status,
            l.ket,
            l.note,
            l.ketepatan_waktu,
            l.kesesuaian_lap,
            l.tanggal_kirim
        ');
        $this->db->from('pro_lap l');
        $this->db->join('ref_pegawai p', 'l.nik = p.nik', 'left');
        $this->db->join('ref_pegawai p_atasan', 'l.nik_atasan = p_atasan.nik', 'left');
        $this->db->where('l.id_pro_lap', (int)$id_pro_lap);

        if ($nik !== null) {
            $this->db->where('l.nik', (string)$nik);
        }

        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Find report header by NIK and date
     *
     * @param string $nik
     * @param string $date YYYY-MM-DD
     * @return object|null
     */
    public function find_by_nik_and_date($nik, $date)
    {
        $this->db->select('id_pro_lap, nik, tanggal, status');
        $this->db->from('pro_lap');
        $this->db->where('nik', (string)$nik);
        $this->db->where('tanggal', (string)$date);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get detail items for a report
     *
     * @param int $id_pro_lap
     * @return array
     */
    public function get_items($id_pro_lap)
    {
        $this->db->select('id_pro_lap_detil, id_pro_lap, uraian_tugas, jam, output, urutan');
        $this->db->from('pro_lap_detil');
        $this->db->where('id_pro_lap', (int)$id_pro_lap);
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('id_pro_lap_detil', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Count items in a report
     *
     * @param int $id_pro_lap
     * @return int
     */
    public function count_items($id_pro_lap)
    {
        $this->db->from('pro_lap_detil');
        $this->db->where('id_pro_lap', (int)$id_pro_lap);
        return (int)$this->db->count_all_results();
    }

    /**
     * Insert report header
     *
     * @param array $data
     * @return int Insert ID
     */
    public function insert_report(array $data)
    {
        $this->db->insert('pro_lap', $data);
        return $this->db->insert_id();
    }

    /**
     * Update report header
     *
     * @param int $id_pro_lap
     * @param array $data
     * @return bool
     */
    public function update_report($id_pro_lap, array $data)
    {
        $this->db->where('id_pro_lap', (int)$id_pro_lap);
        return $this->db->update('pro_lap', $data);
    }

    /**
     * Delete report header and all its items (Cascade) within transaction
     *
     * @param int $id_pro_lap
     * @return bool
     */
    public function delete_report_cascade($id_pro_lap)
    {
        $this->db->trans_start();
        $this->db->where('id_pro_lap', (int)$id_pro_lap)->delete('pro_lap_detil');
        $this->db->where('id_pro_lap', (int)$id_pro_lap)->delete('pro_lap');
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * Get single detail item by ID
     *
     * @param int $id_pro_lap_detil
     * @return object|null
     */
    public function get_item_by_id($id_pro_lap_detil)
    {
        $this->db->select('d.id_pro_lap_detil, d.id_pro_lap, d.uraian_tugas, d.jam, d.output, d.urutan, l.nik, l.status');
        $this->db->from('pro_lap_detil d');
        $this->db->join('pro_lap l', 'd.id_pro_lap = l.id_pro_lap', 'inner');
        $this->db->where('d.id_pro_lap_detil', (int)$id_pro_lap_detil);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Insert report item
     *
     * @param array $data
     * @return int Insert ID
     */
    public function insert_item(array $data)
    {
        $this->db->insert('pro_lap_detil', $data);
        return $this->db->insert_id();
    }

    /**
     * Update report item
     *
     * @param int $id_pro_lap_detil
     * @param array $data
     * @return bool
     */
    public function update_item($id_pro_lap_detil, array $data)
    {
        $this->db->where('id_pro_lap_detil', (int)$id_pro_lap_detil);
        return $this->db->update('pro_lap_detil', $data);
    }

    /**
     * Delete report item
     *
     * @param int $id_pro_lap_detil
     * @return bool
     */
    public function delete_item($id_pro_lap_detil)
    {
        $this->db->where('id_pro_lap_detil', (int)$id_pro_lap_detil);
        return $this->db->delete('pro_lap_detil');
    }
}
