<?php
class Mizin extends Ci_model{

  function data(){
    $id = $this->session->userdata('username');
    $hasil=$this->db->query("select * from ref_izin where nik='$id' order by tanggal DESC");
    return $hasil->result();
  }


    function get_data()
    {
        $query = $this->db->query("select * from ref_jabatan order by jabatan ASC");
        $tes = $query->result();
        return $tes;
    }

    function detil($id)
    {
        $query = $this->db->query("select * from pro_lap where id_pro_lap='$id'");
        $tes = $query->row();
        return $tes;
    }

    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM pro_lap_detil WHERE id_pro_lap_detil='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'uraian_tugas' => $data->uraian_tugas,
            'jam' => $data->jam,
            'output' => $data->output,
            'id_pro_lap_detil' => $data->id_pro_lap_detil,
            );
        }
      }
      return $hasil;
    }

    function cek_atasan()
    {
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from ref_pegawai where nik = '$nik'");
      return $query->row();
    }

    function unit_kerja()
    {
        $id = $this->session->userdata('id_unit_kerja');
        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$id' order by unit_kerja ASC");
        $tes = $query->result();
        return $tes;
    }



    function data_detil($id){
      //$id = $this->session->userdata('username');
  		$hasil=$this->db->query("SELECT * FROM pro_lap_detil where id_pro_lap ='$id'");
  		return $hasil->result();
  	}

    public function simpan_detil($a,$b,$c,$d)
    {
      $hasil=$this->db->query("INSERT INTO pro_lap_detil (id_pro_lap, uraian_tugas,jam,output) VALUES
      ('$d','$a','$b','$c')");
      return $hasil;
    }

    function simpan($a,$c){

        $nik= $this->session->userdata('username');
        $tanggall = date('Y-m-d', strtotime($a));
        $nik = $this->session->userdata('username');

        if ($b = null)
        {

        }
        else {
          $hasil=$this->db->query("INSERT INTO ref_izin (nik,tanggal,total_izin) VALUES('$nik','$tanggall','$c')");
      		return $hasil;
        }


  	}

    function update($a,$b,$c,$d){
  		$hasil=$this->db->query("UPDATE pro_lap_detil set uraian_tugas = '$a', jam = '$b', output ='$c' where id_pro_lap_detil ='$d'");
  		return $hasil;
  	}

    function kirim($a){
      $now = date('Y-m-d');
  		$hasil=$this->db->query("UPDATE pro_lap set status = '1', tanggal_kirim='$now' where id_pro_lap ='$a'");
  		return $hasil;
      //redirect('peg/lap');
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_izin where id_izin= '$id'");
      return $hasil;
    }

    function hapus_detil($id){
      $hasil=$this->db->query("delete from pro_lap_detil where id_pro_lap_detil = '$id'");
      return $hasil;
    }




}
