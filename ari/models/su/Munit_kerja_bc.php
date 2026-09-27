<?php
class Munit_kerja extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_unit_kerja WHERE id_unit_kerja='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_unit_kerja' => $data->id_unit_kerja,
            'unit_kerja' => $data->unit_kerja
            );
        }
      }
      return $hasil;
    }

    function data(){
  		$hasil=$this->db->query("SELECT * FROM ref_unit_kerja order by unit_kerja ASC");
  		return $hasil->result();
  	}

    function simpan($a){
  		$hasil=$this->db->query("INSERT INTO ref_unit_kerja VALUES('','$a')");
  		return $hasil;
  	}

    function ubah($a,$b){
  		$hasil=$this->db->query("UPDATE ref_unit_kerja set
        unit_kerja = '$b'
        where id_unit_kerja='$a'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_unit_kerja where id_unit_kerja = '$id'");
      return $hasil;
    }




}
