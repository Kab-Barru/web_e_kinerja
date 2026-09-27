<?php
class Macc_lap extends Ci_model{

  function revisi($a,$b,$c,$d,$e){
    $hasil=$this->db->query("UPDATE pro_lap set status = '$a', note='$b' where id_pro_lap ='$e'");
    return $hasil;
    //redirect('peg/lap');
  }

  function disetujui($a,$b,$c,$d,$e){
    $hasil=$this->db->query("UPDATE pro_lap set status = '$a', ketepatan_waktu='$c', kesesuaian_lap = '$d' where id_pro_lap ='$e'");
    return $hasil;
    //redirect('peg/lap');
  }



    function get_ketepatan()
    {
        $query = $this->db->query("select * from lap_kesesuaian ");
        $tes = $query->result();
        return $tes;

    }

    function get_kesesuaian()
    {
      $query = $this->db->query("select * from lap_ketepatan_waktu ");
      $tes = $query->result();
      return $tes;

    }

    function get_data()
    {
      $nik = $this->session->userdata('username');
        $query = $this->db->query("select DISTINCT nik from pro_lap where nik_atasan = '$nik' ");
        $tes = $query->result();
        return $tes;
    }

    function detil($id)
    {
        $query = $this->db->query("select * from pro_lap where id_pro_lap='$id'");
        $tes = $query->row();
        return $tes;
    }

    function lap($id)
    {
        $query = $this->db->query("select * from pro_lap_detil where id_pro_lap='$id' order by urutan ASC, 	id_pro_lap_detil ASC");
                                  
        $tes = $query->result();
        return $tes;
    }

    function detil_peg($id)
    {
        $query = $this->db->query("select * from ref_pegawai where nik='$id'");
        $tes = $query->row();
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

    function cek_bawahan()
    {
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from pro_lap where nik_atasan = '$nik'");
      return $query->num_rows();
    }

    function cek($a,$b)
    {
      $query = $this->db->query("select * from ref_izin where nik = '$a' and tanggal='$b'");
      return $query->num_rows();
    }

    function cek_detil($a,$b)
    {
      $query = $this->db->query("select * from ref_izin where nik = '$a' and tanggal='$b'");
      return $query->row();
    }

    function unit_kerja()
    {
        $id = $this->session->userdata('id_unit_kerja');
        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$id' order by unit_kerja ASC");
        $tes = $query->result();
        return $tes;
    }

    function data(){
      $id = $this->session->userdata('username');
  		$hasil=$this->db->query("SELECT * FROM pro_lap a, ref_pegawai b where a.nik=b.nik and a.nik_atasan='$id' and status='1'");
  		return $hasil->result();
  	}

    function data_detil($id){
      //$id = $this->session->userdata('username');
      //SELECT * FROM pro_lap_detil where id_pro_lap ='$id' order by urutan ASC, 	id_pro_lap_detil ASC
  		$hasil=$this->db->query("SELECT * FROM pro_lap_detil where id_pro_lap ='$id' order by urutan ASC, 	id_pro_lap_detil ASC");
  		return $hasil->result();
  	}

    public function simpan_detil($a,$b,$c,$d)
    {
      $hasil=$this->db->query("INSERT INTO pro_lap_detil (id_pro_lap, uraian_tugas,jam,output) VALUES
      ('$d','$a','$b','$c')");
      return $hasil;
    }

    function simpan($a){

        $nik= $this->session->userdata('username');
        $tanggall = date('Y-m-d', strtotime($a));

        $nik = $this->session->userdata('username');
        $atasan = $this->db->query("select * from ref_pegawai where nik= '$nik'");
        $atasann = $atasan->row();
    		$hasil=$this->db->query("INSERT INTO pro_lap (nik,tanggal,nik_atasan) VALUES('$nik','$tanggall','$atasann->nik_atasan')");
    		return $hasil;

  	}

    function update($a,$b){
  		$hasil=$this->db->query("UPDATE ref_jabatan set jabatan = '$b' where id_jabatan ='$a'");
  		return $hasil;
  	}


    function hapus($id){
      $hasil=$this->db->query("delete from pro_lap where id_pro_lap= '$id'");
      return $hasil;
    }

    function hapus_detil($id){
      $hasil=$this->db->query("delete from pro_lap_detil where id_pro_lap_detil = '$id'");
      return $hasil;
    }




}
