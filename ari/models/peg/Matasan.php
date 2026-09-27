<?php
class Matasan extends Ci_model{


    function get_data()
    {
        $nik = $this->session->userdata('username');
        $query = $this->db->query("select * from ref_pegawai a, ref_jabatan b, ref_unit_kerja c where a.id_jabatan=b.id_jabatan and a.id_unit_kerja=c.id_unit_kerja and a.nik='$nik'");
        $tes = $query->row();
        return $tes;
    }

    function get_nama($id)
    {
        $query = $this->db->query("select * from ref_pegawai where nik='$id'");
        $tes = $query->row();
        return $tes;
    }

    function get_atasan($id)
    {
        $query = $this->db->query("select * from ref_pegawai a, ref_jabatan b, ref_unit_kerja c where a.id_jabatan=b.id_jabatan and a.id_unit_kerja=c.id_unit_kerja and a.nik='$id'");
        $tes = $query->row();
        return $tes;
    }

    function get_pegawai($id)
    {
        $query = $this->db->query("select * from ref_pegawai where id_unit_kerja='$id'");
        $tes = $query->result();
        return $tes;
    }

    function cek()
    {
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja and a.nik='$nik'");
      $tes = $query->row();
      return $tes;
    }



    function update($a){

  	}






}
