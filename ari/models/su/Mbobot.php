<?php
class Mbobot extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_bobot");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_bobot' => $data->id_bobot,
            'indikator_disiplin' => $data->indikator_disiplin,
            'indikator_kinerja' => $data->indikator_kinerja
            );
        }
      }
      return $hasil;
    }

    function data(){
  		$hasil=$this->db->query("SELECT * FROM ref_bobot order by id_bobot ASC");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e,$f){
  		$hasil=$this->db->query("INSERT INTO tpp_master VALUES('','$a','$b','$c','$d','$e','$f')");
  		return $hasil;
  	}

    function ubah($a,$b,$c){
  		$hasil=$this->db->query("UPDATE ref_bobot set
        indikator_disiplin = '$b',
        indikator_kinerja = '$c'
        where id_bobot='$a'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from tpp_master where id_tpp = '$id'");
      return $hasil;
    }




}
