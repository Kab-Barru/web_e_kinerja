<?php
class MStatus extends Ci_model{


    function acuan($id)
    {

      $query = $this->db->query("SELECT * FROM pro_pegawai WHERE id_unit_kerja='1'");
      $tes = $query->row();
      return $tes;
    }

    function proses($id,$nip,$tanggal,$tot){
      $query = $this->db->query("SELECT * FROM pro_tpp WHERE nik='$nip' and tanggal='$tanggal'");
      $tes = $query->num_rows();

      if ($tes > 0)
      {
        $hasil1=$this->db->query("
        UPDATE `pro_tpp` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
        ");

        $hasil=$this->db->query("
        UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
        ");
        $this->session->set_flashdata('ada','Izin berhasil diproses');

      }
      else {
        $this->session->set_flashdata('ada','Absensi belum diinputkan');

      }


      redirect('admin/izin');
      	}

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT * FROM ref_pegawai WHERE id_unit_kerja='$id'");
  		return $hasil->result();
  	}

    function sudah_proses(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      select * from ref_izin a, ref_pegawai b where a.nik=b.nik and b.id_unit_kerja='$id' and sta='1'
      ");
  		return $hasil->result();
  	}


}
