<?php
class Mabsensi extends Ci_model{


    function acuan($id)
    {
      $query = $this->db->query("SELECT * FROM pro_tpp WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function acuan_sd($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp_sd WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function acuan_rs_shift($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp_rs WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function acuan_pus($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp_pus WHERE id='$id'");
      $tes = $query->row();
      return $tes;
    }

    function acuan_pus_shift($id)
    {

      $query = $this->db->query("SELECT * FROM pro_tpp_pus WHERE id='$id'");
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
      $hasil=$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%a') as tanggal1 FROM pro_tpp a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal asc");
  		return $hasil->result();

    }


    function load_absen_detil_sd($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%a') as tanggal1 FROM pro_tpp_sd a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal asc");
  		return $hasil->result();

    }

    function load_absen_detil_rs_shift($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%a') as tanggal1 FROM pro_tpp_rs a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal asc");
  		return $hasil->result();

    }

    //puskesmas start
    function load_absen_detil_pus($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%a') as tanggal1 FROM pro_tpp_pus a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal asc");
  		return $hasil->result();

    }

    function load_absen_detil_pus_shift($a,$b,$c)
    {
      $hasil=$this->db->query("SELECT *, DATE_FORMAT(tanggal, '%a') as tanggal1 FROM pro_tpp_pus a, keterangan_status b WHERE a.hari_kerja=b.id_ket_status and `tanggal` LIKE '%$a-$b%' and nik = '$c' order by tanggal asc");
  		return $hasil->result();

    }


    function data_unit($id){

  		$hasil=$this->db->query("SELECT * FROM pro_tpp where nik = '$id'");
  		return $hasil->result();
  	}

    function singkron($a,$b,$c,$d,$e,$f,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->num_rows();



      if ($cekk= 0)

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
              $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$f','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


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
              $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$f','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}

    function simpan_sd($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_sd where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:40:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:05:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:40:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:05:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:40:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:04:00','1')");
                }
              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}

    function simpan_smp($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_sd where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','11:10:00','1')");
                }
                else if ($day == 'Mon') //jika hari Senin
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:00:00','13:10:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','13:10:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','11:10:00','1')");
                }
                else if ($day == 'Mon') //jika hari Senin
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:00:00','13:10:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','13:10:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','11:10:00','1')");
                }
                else if ($day == 'Mon') //jika hari Senin
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:00:00','13:10:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:15:00','13:10:00','1')");
                }
              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function simpan_tk($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_sd where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:30:00','1')");
              }


              else if ($c == 2) // TL upacara hari senin
              {

                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:30:00','1')");

              }
              else if ($c == 3) // TL upacara hari besar
              {

                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','10:30:00','1')");

              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function simpan_ra($a,$b,$c,$d,$e,$f,$g,$h,$nik){

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
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:00:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:00:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','08:00:00','12:30:00','15:00:00','1')");
                }
              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$f','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp (nik,tanggal,hari_kerja,jam_masuk_1,jam_masuk_2,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$f','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}




    function simpan_rs_ok($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_sd where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','21:00:00','1')");
              }


              else if ($c == 2) // TL upacara hari senin
              {

                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','21:00:00','1')");

              }
              else if ($c == 3) // TL upacara hari besar
              {

                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','21:00:00','1')");

              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function simpan_rs_6($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_sd where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                $day = date('D', strtotime($a));

                if ($day == 'Sat') //jika hari sabtu
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Sat') //jika hari sabtu
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'Sat') //jika hari sabtu
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','13:30:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_sd (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function simpan_rs_shift($a,$b,$c,$d,$e,$g,$h,$nik,$jenis){

      $cek = $this->db->query("select * from pro_tpp_rs where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0)
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,jenis) VALUES('$nik','$a','0','4')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {

                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }


              }
              else if ($c == 3) // TL upacara hari besar
              {
                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }

              }
              else {

              }

        }
        else if ($b == 1)
        {
          if ($c == 1) // apel pagi
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_rs (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','$e','$g','$d','$h','$jenis')");
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

    function ubah_sd($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran){

      $hasil=$this->db->query("update pro_tpp_sd set
      apel_masuk='$b',
      apel_pulang='$c',
      upacara_hari_senin='$d',
      upacara_hari_besar='$e',
      jam_masuk_1='$dtgg',
      jam_pulang='$dtgg2',
      jam_izin='$i',
      hari_kerja='$status_kehadiran'
      where id = '$id'
      ");
      return $hasil;
  	}

    function ubah_rs_shift($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran,$jenis){

      $hasil=$this->db->query("update pro_tpp_rs set
      apel_masuk='$b',
      apel_pulang='$c',
      upacara_hari_senin='$d',
      upacara_hari_besar='$e',
      jam_masuk_1='$dtgg',
      jam_pulang='$dtgg2',
      jam_izin='$i',
      hari_kerja='$status_kehadiran',
      jenis='$jenis'
      where id = '$id'
      ");
      return $hasil;
  	}

    function ubah_pus_shift($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran,$jenis){

      $hasil=$this->db->query("update pro_tpp_pus set
      apel_masuk='$b',
      apel_pulang='$c',
      upacara_hari_senin='$d',
      upacara_hari_besar='$e',
      jam_masuk_1='$dtgg',
      jam_pulang='$dtgg2',
      jam_izin='$i',
      hari_kerja='$status_kehadiran',
      jenis='$jenis'
      where id = '$id'
      ");
      return $hasil;
  	}


    function ubah_pus($a,$b,$c,$d,$e,$dtgg,$dtgg2,$i,$id,$nik,$status_kehadiran){

      $hasil=$this->db->query("update pro_tpp_pus set
      apel_masuk='$b',
      apel_pulang='$c',
      upacara_hari_senin='$d',
      upacara_hari_besar='$e',
      jam_masuk_1='$dtgg',
      jam_pulang='$dtgg2',
      jam_izin='$i',
      hari_kerja='$status_kehadiran'
      where id = '$id'
      ");
      return $hasil;
  	}


    //puskesmas start

    function simpan_pus_6($a,$b,$c,$d,$e,$g,$h,$nik){

      $cek = $this->db->query("select * from pro_tpp_pus where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0 )
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja) VALUES('$nik','$a','0')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jumat
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                $day = date('D', strtotime($a));

                if ($day == 'Fri') //jika hari jum
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }
              else if ($c == 3) // TL upacara hari besar
              {
                $day = date('D', strtotime($a));

                if ($day == 'FRI') //jika hari jum
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','12:00:00','1')");
                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1')");
                }
              }
              else {

              }

        }
        else if ($b == 1)
        {


          if ($c == 1) // apel pagi
          {
              $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','1','$e','$g','$d','$h')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin) VALUES('$nik','$a','1','$e','$g','$d','$h')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function simpan_pus_shift($a,$b,$c,$d,$e,$g,$h,$nik,$jenis){

      $cek = $this->db->query("select * from pro_tpp_pus where nik = '$nik' and tanggal = '$a'");
      $cekk = $cek->row();

      if ($cekk >0)
      {

      }
      else
      {
        if ($b == 0) //jika tidak hadir
        {
          $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,jenis) VALUES('$nik','$a','0','4')");
        }
        else if ($b == 2) // jika tugas luar
        {

              if ($c == 1) // TL dan apel pagi
              {

                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }
              }

              else if ($c == 2) // TL upacara hari senin
              {
                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }


              }
              else if ($c == 3) // TL upacara hari besar
              {
                if ($jenis == '1') //jika shift pagi
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','07:30:00','14:00:00','1','1')");
                }
                else if ($jenis == '2') //jika shift siang
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','14:00:00','21:00:00','1','2')");
                }
                else //jika shift malam
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jenis) VALUES('$nik','$a','1','1','21:00:00','07:30:00','1','3')");
                }

              }
              else {

              }

        }
        else if ($b == 1)
        {
          if ($c == 1) // apel pagi
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,apel_masuk,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }

          else if ($c == 2) // upacara hari senin
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_senin,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }
          else if ($c == 3) // upacara hari besar
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,upacara_hari_besar,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','1','$e','$g','$d','$h','$jenis')");
          }
          else if ($c == 4) // hadir tpi tidak ikut apel pagi atau upacara
          {
            $hasil=$this->db->query("INSERT INTO pro_tpp_pus (nik,tanggal,hari_kerja,jam_masuk_1,jam_pulang,apel_pulang,jam_izin,jenis) VALUES('$nik','$a','1','$e','$g','$d','$h','$jenis')");
          }
          else
          {

          }


        }

        return $hasil;

      }


  	}


    function hapus($id){
      $hasil=$this->db->query("delete from pro_tpp where id = '$id'");
      return $hasil;
    }

    function hapus_sd($id){
      $hasil=$this->db->query("delete from pro_tpp_sd where id = '$id'");
      return $hasil;
    }

    function hapus_rs($id){
      $hasil=$this->db->query("delete from pro_tpp_rs where id = '$id'");
      return $hasil;
    }

    function hapus_pus($id){
      $hasil=$this->db->query("delete from pro_tpp_pus where id = '$id'");
      return $hasil;
    }




}
