<?php
class Matur_tpp extends Ci_model{


    function get_data()
    {
        $query = $this->db->query("select * from ref_pegawai where id_unit_kerja='' order by nama ASC");
        $tes = $query->result();
        return $tes;
    }

    function acuanji($id)
    {
      $query = $this->db->query("select * from ref_pegawai a, ref_jabatan b,
      ref_unit_kerja c where a.id_jabatan=b.id_jabatan and a.id_unit_kerja=c.id_unit_kerja and nik='$id' ");
      $tes = $query->row();
      return $tes;
    }

    function jabatan()
    {
      $query = $this->db->query("select * from ref_jabatan order by jabatan asc ");
      $tes = $query->result();
      return $tes;
    }

    function golongan()
    {
      $query = $this->db->query("select * from ref_pangkat order by id_pangkat asc ");
      $tes = $query->result();
      return $tes;
    }


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_pegawai a, ref_jabatan b, ref_pangkat c WHERE a.id_jabatan=b.id_jabatan and a.id_pangkat=c.id_pangkat and a.nik='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'nik' => $data->nik,
            'nama' => $data->nama,
            'jabatan' => $data->jabatan,
            'golongan' => $data->golongan,
            'kelas_jabatan' => $data->kelas_jabatan,
            'tpp_max' => $data->tpp_max
            );
        }
      }
      return $hasil;
    }

    function get_jabatan()
    {
        $id = $this->session->userdata('id_unit_kerja');
        $query = $this->db->query("select * from ref_jabatan where id_unit_kerja='$id' order by jabatan ASC");
        $tes = $query->result();
        return $tes;
    }

    function unit_kerja()
    {
        $id = $this->session->userdata('id_unit_kerja');
        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$id' order by unit_kerja ASC");
        $tes = $query->row();
        return $tes;
    }

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("select *, a.tpp_max as ini_tpp from ref_pegawai a, ref_unit_kerja b, ref_jabatan c, ref_pangkat d where a.id_unit_kerja=b.id_unit_kerja and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and a.active='1' order by nik ASC");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e){
      $id_unit_kerja = $this->session->userdata('id_unit_kerja');
      if ($d=='' && $e =='')
      {

      }
      else {
        $hasil=$this->db->query("INSERT INTO ref_pegawai (nik,nama,id_unit_kerja,id_jabatan,id_pangkat,active) VALUES('$a','$b','$c','$d','$e','1')");
        $hasil=$this->db->query("INSERT INTO ref_log (nama_adm,username,password,lev,id_unit_kerja,active) VALUES('$b','$a',MD5(123456),'user_pegawai','$id_unit_kerja','1')");
    		return $hasil;
      }

  	}

    function update($a,$e,$kelas){
      if ($e =='')
      {

      }
      else {
        $hasil=$this->db->query("UPDATE ref_pegawai set tpp_max = '$e', kelas_jabatan='$kelas' where nik ='$a'");
    		return $hasil;
      }

  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_pegawai where nik = '$id'");
      $hasil=$this->db->query("delete from ref_log where username = '$id'");
      return $hasil;
    }




}
