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

    function get_ttd2($id)
    {
      $hasil=$this->db->query("select * from ref_pegawai a, ref_jabatan b, ref_pangkat c where a.id_pangkat=c.id_pangkat and a.id_jabatan=b.id_jabatan and nik='$id'");
  		return $hasil->row();
    }


    function get_pegawaii()
    {
      $id = $this->session->userdata('id_unit_kerja');
      //$hasil=$this->db->query("select * from ref_pegawai where id_unit_kerja='$id'");
      $hasil=$this->db->query("select nik,nama from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja and a.id_unit_kerja='$id'");
      //$hasil=$this->db->query("select * from ref_jabatan WHERE `jabatan` LIKE '%kepala bad%' or `jabatan` LIKE '%kepala din%' or `jabatan` LIKE '%sekr%' or `jabatan` LIKE '%seker%'");
      return $hasil->result();




      //$query =
  		//return $hasil->result();

    }

    function get_pegawaii_pus_12()
    {
      $id = $this->session->userdata('id_unit_kerja');
      $idd = $this->db->query("select * from ref_unit_kerja where id_unit_kerja = '$id'")->row();
      $yuz = substr($idd->unit_kerja,0,-3);
      //$hasil=$this->db->query("select * from ref_pegawai where id_unit_kerja='$id'");
      $hasil=$this->db->query("select nik,nama from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja and b.unit_kerja LIKE '%$yuz%'");
      //$hasil=$this->db->query("select * from ref_jabatan WHERE `jabatan` LIKE '%kepala bad%' or `jabatan` LIKE '%kepala din%' or `jabatan` LIKE '%sekr%' or `jabatan` LIKE '%seker%'");
      return $hasil->result();




      //$query =
  		//return $hasil->result();

    }

    function get_target($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    function get_target_sd($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_sd where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    function get_target_rs_ok($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_rs_ok where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    function get_target_rs_6($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_rs_6 where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    function get_target_rs_shift($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_rs_shift where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    //pus start
    function get_target_pus_6($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_pus_6 where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }

    function get_target_pus_shift($a,$b)
    {
      $hasil=$this->db->query("select * from tpp_master_pus_shift where tahun ='$a' and bulan ='$b'"); //masih manual
  		return $hasil->row();

    }




    function get_data_pegawai($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_sd($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_sd c, ref_pangkat d where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_rs($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_rs c, ref_pangkat d where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    //pus start
    function get_data_pegawai_pus($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_pus c, ref_pangkat d where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}


    //cetak all dinas pendidikan

    function get_data_pegawai_sd1($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_sd c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='1' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}



    function get_data_pegawai_sd2($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_sd c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='2' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_tk($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_sd c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='5' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_skb($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
      $hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja  and a.id_unit_kerja='44' and tahun = '$a' and bulan='$b' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    //end cetak all dinas pendidikan



    //cetak all rumah sakit
    function get_data_pegawai_rs_ok($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_rs c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='6' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_rs_shift($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_rs c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='7' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_rs_6($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_rs c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='8' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    //end cetak all rumah sakit


    function get_data_pegawai_pus_6($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_pus c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='3' and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_pus_6_all($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_pus c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='3' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_pus_shift($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_pus c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='4' and a.id_unit_kerja='$id' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
      ");
  		return $hasil->result();
  	}

    function get_data_pegawai_pus_shift_all($a,$b){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT *, ((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil_pus c, ref_pangkat d, ref_unit_kerja e where
      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and e.kode='4' and tahun = '$a' and bulan='$b' and a.active='1' order by e.id_unit_kerja ASC, a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
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
