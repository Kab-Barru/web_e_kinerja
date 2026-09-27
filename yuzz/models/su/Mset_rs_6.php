<?php
class Mset_rs_6 extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM tpp_master_rs_6 WHERE id_tpp='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_tpp' => $data->id_tpp,
            'apel_masuk' => $data->apel_masuk,
            'bulan' => $data->bulan,
            'hari_kerja' => $data->hari_kerja,
            'hari_besar' => $data->hari_besar,
            'tahun' => $data->tahun,
            'upacara_hari_senin' => $data->upacara_hari_senin,
            );
        }
      }
      return $hasil;
    }

    function data(){
  		$hasil=$this->db->query("SELECT * FROM tpp_master_rs_6 order by bulan ASC");
  		return $hasil->result();
  	}

    function tahun(){
  		$hasil=$this->db->query("SELECT * FROM ref_tahun");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e,$f){
  		$hasil=$this->db->query("INSERT INTO tpp_master_rs_6 VALUES('','$a','$b','$c','$d','$e','$f')");
  		return $hasil;
  	}

    function ubah($a,$b,$c,$d,$e,$f,$g){
  		$hasil=$this->db->query("UPDATE tpp_master_rs_6 set
        tahun = '$a',
        bulan = '$b',
        hari_kerja = '$c',
        upacara_hari_senin = '$d',
        apel_masuk = '$e',
        hari_besar = '$f'
        where id_tpp='$g'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from tpp_master_rs_6 where id_tpp = '$id'");
      return $hasil;
    }




}
