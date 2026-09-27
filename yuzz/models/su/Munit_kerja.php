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
  		$hasil=$this->db->query("SELECT * FROM ref_unit_kerja a, kode b where a.kode=b.kode order by unit_kerja ASC");
  		return $hasil->result();
  	}

    function jenis(){
  		$hasil=$this->db->query("SELECT * FROM kode");
  		return $hasil->result();
  	}

    function simpan($a,$b){
      $aa = str_replace("'",'`',$a);
  		$hasil=$this->db->query("INSERT INTO ref_unit_kerja (unit_kerja,kode) VALUES('$a','$b')");
  		return $hasil;
  	}

    function ubah($a,$b){
      $bb = str_replace("'",'`',$b);
      $hasil=$this->db->query("UPDATE ref_unit_kerja set
        unit_kerja = '$bb'
        where id_unit_kerja='$a'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_unit_kerja where id_unit_kerja = '$id'");
      return $hasil;
    }




}
