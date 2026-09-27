<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Master Data & Integrasi Model (API Layer)
 * Manages evaluation score options and attendance synchronization.
 */
class Master_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get options for ketepatan waktu scoring
     *
     * @return array
     */
    public function get_options_ketepatan_waktu()
    {
        $this->db->select('*');
        $this->db->from('lap_ketepatan_waktu');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get options for kesesuaian laporan scoring
     *
     * @return array
     */
    public function get_options_kesesuaian()
    {
        $this->db->select('*');
        $this->db->from('lap_kesesuaian');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get daily attendance from local absen_finger cache table
     *
     * @param string $nik
     * @param string $tanggal
     * @return object|null
     */
    public function get_local_absen_finger($nik, $tanggal)
    {
        $this->db->select('nip, tgl, jam_masuk, jam_siang, jam_pulang, ket_jam_masuk, ket_jam_siang, ket_jam_pulang');
        $this->db->from('absen_finger');
        $this->db->where('nip', (string)$nik);
        $this->db->where('tgl', (string)$tanggal);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Attempt sync from external finger database if available
     *
     * @param string $nik
     * @param string $tanggal
     * @return array|null
     */
    public function fetch_remote_finger_attendance($nik, $tanggal)
    {
        try {
            // Attempt to connect to secondary finger db with error suppression
            $db_finger = @$this->load->database('finger', TRUE);
            if ($db_finger && $db_finger->conn_id) {
                // Check view_ref_finger to get id_peg
                $this->db->select('id, nip, id_unit_kerja');
                $this->db->from('view_ref_finger');
                $this->db->where('nip', (string)$nik);
                $this->db->limit(1);
                $peg = $this->db->get()->row();

                if ($peg) {
                    $kode = $peg->id . '-' . $tanggal;
                    $absen = $db_finger->where('kode', $kode)->get('t_absen_tiga_kali')->row();
                    if ($absen) {
                        return [
                            'jam_masuk'  => !empty($absen->jam_masuk) ? $absen->jam_masuk : null,
                            'jam_siang'  => !empty($absen->jam_siang) ? $absen->jam_siang : null,
                            'jam_pulang' => !empty($absen->jam_pulang) ? $absen->jam_pulang : null,
                        ];
                    }
                }
            }
        } catch (Throwable $e) {
            log_message('error', 'Remote finger sync error: ' . $e->getMessage());
        }

        return null;
    }
}
