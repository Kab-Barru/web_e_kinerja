<?php
class Mcek_sekolah extends Ci_model{

  function cek($a,$b,$c)
  {
    $hasil=$this->db->query("SELECT * FROM pro_lap a, ref_pegawai b, status_lap c, ref_unit_kerja d where a.nik=b.nik AND d.kode='1' and a.status <> '2' and a.status=c.status and b.id_unit_kerja=d.id_unit_kerja  and `tanggal` LIKE '%$a-$b%'");

    return $hasil->result();

  }

  function cek_tk($a,$b,$c)
  {
    $hasil=$this->db->query("SELECT * FROM pro_lap a, ref_pegawai b, status_lap c, ref_unit_kerja d where a.nik=b.nik AND d.kode='5' and a.status <> '2' and a.status=c.status and b.id_unit_kerja=d.id_unit_kerja  and `tanggal` LIKE '%$a-$b%'");

    return $hasil->result();

  }

  function cek_smp($a,$b,$c)
  {
    $hasil=$this->db->query("SELECT * FROM pro_lap a, ref_pegawai b, status_lap c, ref_unit_kerja d where a.nik=b.nik AND d.kode='2' and a.status <> '2' and a.status=c.status and b.id_unit_kerja=d.id_unit_kerja  and `tanggal` LIKE '%$a-$b%'");

    return $hasil->result();

  }


    function acuan($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT * FROM ref_pegawai a, ref_jabatan b where
      a.id_jabatan=b.id_jabatan and a.id_unit_kerja='$id'
      and a.active='1' order by a.id_pangkat DESC

      ");
  		return $hasil->result();
  	}

    function get_pegawai($id){
      $hasil=$this->db->query("select * from ref_pegawai where nik='$id'");
  		return $hasil->row();
  	}

    function get_tahun(){
      $hasil=$this->db->query("select * from ref_tahun order by tahun ASC");
  		return $hasil->result();
  	}

    function load_absen($id)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp a, keterangan_status b where WHERE a.hari_kerja=b.id_ket_status nik = '$id'");
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
              else {

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
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','$e','$f','$g','$d')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}

    function ubah($a,$b,$c,$d,$e,$plgg,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran){

      $hasil=$this->db->query("update pro_tpp set
      apel_masuk='$b',
      apel_pulang='$c',
      upacara_hari_senin='$d',
      upacara_hari_besar='$e',
      jam_masuk_1='$dtgg',
      jam_masuk_2='$dtgg2',
      jam_pulang='$plgg',
      jam_izin='$i',
      hari_kerja='$status_kehadiran'
      where id = '$id'
      ");
      return $hasil;






  	}

    function hapus($id){
      $hasil=$this->db->query("delete from pro_tpp where id = '$id'");
      return $hasil;
    }




}
