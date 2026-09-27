<?php
class Mdata_pegawai extends Ci_model{


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
      $id = $this->session->userdata('id_unit_kerja');
      $query = $this->db->query("select * from ref_jabatan where id_unit_kerja='$id' order by jabatan asc ");
      $tes = $query->result();
      return $tes;
    }

    function agama()
    {
      //$id = $this->session->userdata('id_unit_kerja');
      $query = $this->db->query("select * from ref_agama");
      $tes = $query->result();
      return $tes;
    }

    function pendidikan()
    {
      //$id = $this->session->userdata('id_unit_kerja');
      $query = $this->db->query("select * from ref_pendidikan");
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
      $hsl=$this->db->query("SELECT * FROM ref_pegawai WHERE nik='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'nik' => $data->nik,
            'nama' => $data->nama,
            'id_unit_kerja' => $data->id_unit_kerja,
            'id_jabatan' => $data->id_jabatan
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

    function unit_kerja1()
    {
        //$id = $this->session->userdata('id_unit_kerja');
        $id = $this->uri->segment(4);
        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$id' order by unit_kerja ASC");
        $tes = $query->row();
        return $tes;
    }

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("select * from ref_pegawai a, ref_unit_kerja b, ref_jabatan c, ref_pangkat d, ref_agama e, ref_pendidikan f where a.id_unit_kerja=b.id_unit_kerja and a.id_jabatan=c.id_jabatan and a.id_pangkat=d.id_pangkat and a.id_unit_kerja='$id' and a.agama=e.id_agama and a.pendidikan_terakhir=f.id_pendidikan and a.active='1' order by nik ASC");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e,$f,$g1,$g2,$pend){
      $id_unit_kerja = $this->session->userdata('id_unit_kerja');
      $bb = str_replace("'",'`',$b);

      if ($a=='198608152007011001') {
        $c='a';

      }else{
        $c=$c;
      }


      if ($d=='' && $e =='' && $f ==''){

    }  else {

        $hasil=$this->db->query("INSERT INTO ref_pegawai (nik,nama,id_unit_kerja,id_jabatan,id_pangkat,active,agama,gelar_depan,gelar_belakang,pendidikan_terakhir) VALUES('$a','$bb','$c','$d','$e','1','$f','$g1','$g2','$pend')");
        $hasil=$this->db->query("INSERT INTO ref_log (nama_adm,username,password,lev,id_unit_kerja,active) VALUES('$bb','$a',MD5(123456),'user_pegawai','$id_unit_kerja','1')");
    		return $hasil;
      }

  	}

    function update($a,$b,$c,$d,$e,$f,$g1,$g2,$pendi){
      $bb = str_replace("'",'`',$b);
  		$hasil=$this->db->query("UPDATE ref_pegawai set nama = '$bb', id_jabatan='$d', id_pangkat='$e', agama='$f', gelar_depan='$g1', gelar_belakang='$g2', pendidikan_terakhir='$pendi' where nik ='$a'");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from ref_pegawai where nik = '$id'");
      $hasil=$this->db->query("delete from ref_log where username = '$id'");
      return $hasil;
    }




}
