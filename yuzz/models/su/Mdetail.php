<?php
class Mdetail extends Ci_model{


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
  		$hasil=$this->db->query("SELECT a.id_unit_kerja, b.unit_kerja ,COUNT(a.id_unit_kerja) AS jumlahji FROM ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja GROUP BY a.id_unit_kerja");
  		return $hasil->result();
  	}

    function data1($id){
      //$id = $this->session->userdata('id_unit_kerja');
      //
      $hasil=$this->db->query("select * from ref_pegawai a, ref_unit_kerja b, ref_jabatan c, ref_pangkat d, ref_agama e, ref_pendidikan f where a.id_unit_kerja=b.id_unit_kerja and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and a.pendidikan_terakhir=f.id_pendidikan and a.agama=e.id_agama and a.active='1' order by nik ASC");
      return $hasil->result();
  	}



    function tot(){
  		$hasil=$this->db->query("SELECT count(*) as tot from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja");
  		return $hasil->row();
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
