<?php
class Mabsensi extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT * FROM ref_jabatan WHERE id_jabatan='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_jabatan' => $data->id_jabatan,
            'jabatan' => $data->jabatan,
            'tpp_max' => $data->tpp_max,
            );
        }
      }
      return $hasil;
    }

    function data(){
      $id = $this->session->userdata('username');
  		$hasil=$this->db->query("
      SELECT * FROM ref_pegawai a, ref_jabatan b where
      a.id_jabatan=b.id_jabatan and a.nik='$id'

      ");
  		return $hasil->result();
  	}

    function get_tahun(){
      $hasil=$this->db->query("select * from ref_tahun order by tahun DESC");
  		return $hasil->result();
  	}

    function load_absen($id)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp a, keterangan_status b where WHERE a.hari_kerja=b.id_ket_status nik = '$id'");
  		return $hasil->result();

    }

    function load_absen_detil($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal ASC ");
  		return $hasil->result();
    }

    function load_absen_detil_sd($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp_sd a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal ASC ");
  		return $hasil->result();
    }

    function load_absen_detil_rs_shift($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp_rs a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal ASC ");
  		return $hasil->result();
    }

    function load_absen_detil_pus_6($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp_pus a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal ASC ");
  		return $hasil->result();
    }

    function data_unit($id){

  		$hasil=$this->db->query("SELECT * FROM pro_tpp where nik = '$id'");
  		return $hasil->result();
  	}

    function simpan($a,$b,$c,$d,$e,$f,$g,$h,$nik){
      $cek = $this->db->query("select * from pro_tpp where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:40:00','16:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:50:00','16:00:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:40:00','16:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:50:00','16:00:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:40:00','16:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:50:00','16:00:00','1')");
                }
              }

        }
        else if ($b == 1)
        {
          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','$e','$f','$g','$d')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','$e','$f','$g','$d')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','$e','$f','$g','$d')");
          }

        }

        return $hasil;

      }


  	}

    function ubah($a,$b,$c){

      $indikator = $this->db->query("select * from ref_bobot where id_bobot = 1");
      $h = $indikator->row();

      $max_disiplin = $c * $h->indikator_disiplin /100;
      $max_kinerja = $c * $h->indikator_kinerja /100;

  		$hasil=$this->db->query("UPDATE ref_jabatan set
        tpp_max = '$c',
        tpp_max_disiplin = '$max_disiplin',
        tpp_max_kinerja = '$max_kinerja'
        where id_jabatan ='$a'
      ");
  		return $hasil;
  	}

    function hapus($id){
      $hasil=$this->db->query("delete from pro_tpp where id = '$id'");
      return $hasil;
    }




}
