<?php
class Mizin extends Ci_model{


    function acuan($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function proses($id,$nip,$tanggal,$tot){
      $cek = $this->session->userdata('id_unit_kerja');
      $hasil = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$cek'")->row();

      if ($hasil->kode == '0') // 5 hari kerja
      {
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

      }

      else if ($hasil->kode == '1') //Sekolah Dasar
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_sd` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }

      else if ($hasil->kode == '2') //smp
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_sd` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 3) //pus 6
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_pus WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_pus` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 4) //pus shift
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_pus WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_pus` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 5) //tk
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_sd` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 6) // rs ok
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_sd` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 7) // rs shift
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_rs WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_rs` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }
      else if ($hasil->kode == 8) //rs_6
      {
        $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE nik='$nip' and tanggal='$tanggal'");
        $tes = $query->num_rows();

        if ($tes > 0)
        {
          $hasil1=$this->db->query("
          UPDATE `pro_tpp_sd` SET `jam_izin` = '$tot' WHERE nik='$nip' and tanggal='$tanggal';
          ");

          $hasil=$this->db->query("
          UPDATE `ref_izin` SET `sta` = '1' WHERE `ref_izin`.`id_izin` = '$id';
          ");
          $this->session->set_flashdata('ada','Izin berhasil diproses');

        }
        else {
          $this->session->set_flashdata('ada','Absensi belum diinputkan');

        }

      }





      redirect('admin/izin');
      	}

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      select * from ref_izin a, ref_pegawai b where a.nik=b.nik and b.id_unit_kerja='$id' and sta='0'
      ");
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
