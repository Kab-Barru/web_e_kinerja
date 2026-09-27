<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pegawai & User Authentication Model (API Layer)
 * Adheres to Engineering Rules: explicit fields, parameterized queries, minimal payload.
 */
class Pegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Authenticate user credentials against ref_log
     *
     * @param string $username NIP/NIK
     * @param string $password Plaintext password (compared via MD5)
     * @return object|null
     */
    public function authenticate($username, $password)
    {
        $this->db->select('id_adm, nama_adm, username, lev, id_unit_kerja, active');
        $this->db->from('ref_log');
        $this->db->where('username', (string)$username);
        $this->db->where('password', md5($password));
        $this->db->where('active', '1');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get detailed pegawai profile with unit kerja and jabatan
     *
     * @param string $nik
     * @return object|null
     */
    public function get_profile_by_nik($nik)
    {
        $this->db->select('
            p.nik,
            p.nama,
            p.id_unit_kerja,
            u.unit_kerja,
            u.kode as kode_unit_kerja,
            p.id_jabatan,
            j.jabatan,
            p.nik_atasan
        ');
        $this->db->from('ref_pegawai p');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->where('p.nik', (string)$nik);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get basic atasan data by NIK
     *
     * @param string $nik_atasan
     * @return object|null
     */
    public function get_atasan_info($nik_atasan)
    {
        if (empty($nik_atasan) || $nik_atasan === '0') {
            return null;
        }

        $this->db->select('
            p.nik,
            p.nama,
            p.id_jabatan,
            j.jabatan,
            p.id_unit_kerja,
            u.unit_kerja
        ');
        $this->db->from('ref_pegawai p');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->where('p.nik', (string)$nik_atasan);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Get list of direct subordinates by atasan NIK
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
            u.unit_kerja
        ');
        $this->db->from('ref_pegawai p');
        $this->db->join('ref_jabatan j', 'p.id_jabatan = j.id_jabatan', 'left');
        $this->db->join('ref_unit_kerja u', 'p.id_unit_kerja = u.id_unit_kerja', 'left');
        $this->db->where('p.nik_atasan', (string)$nik_atasan);
        $this->db->order_by('p.nama', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }
}
