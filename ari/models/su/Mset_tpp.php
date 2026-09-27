<?php
class Mset_tpp extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_jabatan WHERE id_jabatan='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_jabatan' => $data->id_jabatan,
            'jabatan' => $data->jabatan,
            'tpp_max' => $data->tpp_max,
            );
        }
      }
      return $hasil;
    }

    function data(){
  		$hasil=$this->db->query("SELECT * FROM ref_unit_kerja order by unit_kerja ASC");
  		return $hasil->result();
  	}

    function data_unit($id){

  		$hasil=$this->db->query("SELECT * FROM ref_jabatan where id_unit_kerja = '$id'");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e,$f){
  		$hasil=$this->db->query("INSERT INTO tpp_master VALUES('','$a','$b','$c','$d','$e','$f')");
  		return $hasil;
  	}

    function ubah($a,$b,$c){

      $indikator = $this->db->query("select * from ref_bobot where id_bobot = 1");
      $h = $indikator->row();

      $max_disiplin = $c * $h->indikator_disiplin /100;
      $max_kinerja = $c * $h->indikator_kinerja /100;

  		$hasil=$this->db->query("UPDATE ref_jabatan set
        tpp_max = '$c',
        tpp_max_disiplin = '$max_disiplin',
        tpp_max_kinerja = '$max_kinerja'
        where id_jabatan ='$a'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from tpp_master where id_tpp = '$id'");
      return $hasil;
    }




}
