<?php
class Mdash extends Ci_model{


    function getpegawai()
    {
      $query = $this->db->query("select * from ref_pegawai order by id_unit_kerja ASC");
      $tes = $query->result();
      return $tes;
    }

    function getpegawai_total()
    {
      $query = $this->db->query("select count(nik) as total_pegawai from ref_pegawai");
      $tes = $query->row();
      return $tes;
    }






}
