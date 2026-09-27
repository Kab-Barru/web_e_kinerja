<?php
class Mcetak extends Ci_model{



    function get_bobot()
    {
      $hasil=$this->db->query("select * from ref_bobot");
  		return $hasil->row();

    }

    function get_ttd($id)
    {
      $hasil=$this->db->query("select * from ref_pegawai a, ref_jabatan b, ref_pangkat c where a.id_pangkat=c.id_pangkat and a.id_jabatan=b.id_jabatan and nik='$id'");
  		return $hasil->row();

    }

    function get_pegawaii()
    {
      $id = $this->session->userdata('id_unit_kerja');
      //$hasil=$this->db->query("select * from ref_pegawai where id_unit_kerja='$id'");
      $hasil=$this->db->query("select nik,nama from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja");
  		return $hasil->result();

    }

    function get_target($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }


    function get_data_pegawai($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC
      ");
  		return $hasil->result();
  	}

    function get_bulan($a){
  		$hasil=$this->db->query("
      select * from ref_bulan where angka ='$a'
      ");
  		return $hasil->row();
  	}

    function get_unit($a){
  		$hasil=$this->db->query("
      select * from ref_unit_kerja where id_unit_kerja ='$a'
      ");
  		return $hasil->row();
  	}




}
