<?php
class Mmutasi_pus extends Ci_model{




    function data(){
      $id = $this->session->userdata('id_unit_kerja');
      $idd = $this->db->query("select * from ref_unit_kerja where id_unit_kerja = '$id'")->row();
      $yuz = substr($idd->unit_kerja,0,-3);
      //echo $sub_kalimat;
  		$hasil=$this->db->query("select * from ref_unit_kerja where unit_kerja LIKE '%$yuz%'");
  		return $hasil->result();
  	}


    function daftar($id){
      $hasil=$this->db->query("
      select * from ref_pegawai a, ref_jabatan b, ref_unit_kerja c where a.id_jabatan=b.id_jabatan and a.id_unit_kerja=c.id_unit_kerja and a.id_unit_kerja='$id'


      ");
  		return $hasil->result();
  	}

    function daftar_detail($id){
      $hasil=$this->db->query("
      select * from ref_pegawai a, ref_jabatan b , ref_unit_kerja c where a.id_jabatan=b.id_jabatan and a.id_unit_kerja=c.id_unit_kerja and a.nik='$id'


      ");
  		return $hasil->row();
  	}


    public function load_jabatan($id){
      $hasil=$this->db->query("
      select * from ref_jabatan where id_unit_kerja='$id'


      ");
      return $hasil->result();
  }


  function simpan($a,$b,$c){
    $hasil=$this->db->query("
    UPDATE `ref_pegawai` SET `id_unit_kerja` = '$b', `id_jabatan` = '$c'  WHERE `ref_pegawai`.`nik` = '$a'
    ");
    return $hasil;

  }

    }
