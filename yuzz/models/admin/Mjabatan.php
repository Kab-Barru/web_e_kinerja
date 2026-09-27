<?php
class Mjabatan extends Ci_model{


    function get_data()
    {
        $query = $this->db->query("select * from ref_jabatan order by jabatan ASC");
        $tes = $query->result();
        return $tes;
    }

    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_jabatan WHERE id_jabatan='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_jabatan' => $data->id_jabatan,
            'id_unit_kerja' => $data->id_unit_kerja,
            'jabatan' => $data->jabatan,
            );
        }
      }
      return $hasil;
    }

    function unit_kerja()
    {
        $id = $this->session->userdata('id_unit_kerja');
        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$id' order by unit_kerja ASC");
        $tes = $query->result();
        return $tes;
    }

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("SELECT * FROM ref_jabatan a, ref_unit_kerja b where a.id_unit_kerja='$id' and  a.id_unit_kerja= b.id_unit_kerja");
  		return $hasil->result();
  	}

    function simpan($a,$b){
  		$hasil=$this->db->query("INSERT INTO ref_jabatan (id_unit_kerja,jabatan) VALUES('$a','$b')");
  		return $hasil;
  	}

    function update($a,$b){
  		$hasil=$this->db->query("UPDATE ref_jabatan set jabatan = '$b' where id_jabatan ='$a'");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_jabatan where id_jabatan = '$id'");
      return $hasil;
    }




}
