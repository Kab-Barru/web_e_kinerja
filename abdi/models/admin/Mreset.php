<?php
class Mreset extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM tpp_master WHERE id_tpp='$id'");
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
  		$hasil=$this->db->query("SELECT * FROM ref_log a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja and lev='user_admin' order by id_adm ASC");
  		return $hasil->result();
  	}

    function tahun(){
  		$hasil=$this->db->query("SELECT * FROM ref_tahun");
  		return $hasil->result();
  	}

    function u_kerja(){
  		$hasil=$this->db->query("SELECT * FROM ref_unit_kerja");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d){
  		$hasil=$this->db->query("INSERT INTO ref_log (nama_adm,username,password,lev,id_unit_kerja,active)
      VALUES('$b','$c',MD5('$d'),'user_admin','$a','1')");
  		return $hasil;
  	}

    function ubah($a,$b,$c,$d,$e,$f,$g){
  		$hasil=$this->db->query("UPDATE tpp_master set
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
      $hasil=$this->db->query("delete from ref_log where id_adm = '$id'");
      return $hasil;
    }

    function reset($id){
      $hasil=$this->db->query("update ref_log set password =MD5('123456') where username='$id'");
      return $hasil;
    }




}
