<?php
class Mtpp extends Ci_model{


    function acuan($id)
    {
      $hsl=$this->db->query("SELECT *,(bb_apel_masuk+bb_apel_pulang+bb_hari_besar+bb_hari_senin+bb_hari_kerja+bb_jam_kerja) as yusran FROM pro_tpp_detil WHERE id_pro_tpp_detil='$id'");
      if($hsl->num_rows()>0){
        foreach ($hsl->result() as $data) {
          $hasil=array(
            'id_pro_tpp_detil' => $data->id_pro_tpp_detil,
            'tahun' => $data->tahun,
            'bulan' => $data->bulan,
            'nik' => $data->nik,
            'tot_apel_masuk' => $data->tot_apel_masuk,
            'tot_apel_pulang' => $data->tot_apel_pulang,
            'tot_upacara_hari_senin' => $data->tot_upacara_hari_senin,
            'tot_masuk_kerja' => $data->tot_masuk_kerja,
            'tot_upacara_hari_besar' => $data->tot_upacara_hari_besar,
            'tot_izin' => $data->tot_izin,

            'bh_apel_masuk' => $data->bh_apel_masuk,
            'bb_apel_masuk' => $data->bb_apel_masuk,
            'bh_apel_pulang' => $data->bh_apel_pulang,
            'bb_apel_pulang' => $data->bb_apel_pulang,
            'bh_hari_besar' => $data->bh_hari_besar,
            'bb_hari_besar' => $data->bb_hari_besar,
            'bh_hari_senin' => $data->bh_hari_senin,
            'bb_hari_senin' => $data->bb_hari_senin,

            'bh_hari_kerja' => $data->bh_hari_kerja,
            'bb_hari_kerja' => $data->bb_hari_kerja,

            'bh_jam_kerja' => $data->bh_jam_kerja,
            'bb_jam_kerja' => $data->bb_jam_kerja,

            'total_kedisiplinan' => $data->yusran,
            'total_kinerja' => $data->bb_kinerja
            );
        }
      }
      return $hasil;
    }

    function data(){
      $id = $this->session->userdata('id_unit_kerja');
  		$hasil=$this->db->query("
      SELECT * FROM ref_pegawai a, ref_jabatan b where a.id_jabatan=b.id_jabatan and a.id_unit_kerja='$id' and active='1' ORDER BY `a`.`id_pangkat` DESC

      ");
  		return $hasil->result();
  	}

    function get_tahun(){
      $hasil=$this->db->query("select * from ref_tahun order by tahun ASC");
  		return $hasil->result();
  	}

    function get_nita($nik,$tahun,$bulan){
      $hasil=$this->db->query("SELECT sum(ketepatan_waktu) as a, sum(kesesuaian_lap) as b from pro_lap where `tanggal` LIKE '%$tahun-$bulan%' and  nik='$nik' and status='2'");
  		return $hasil->row();
  	}

    function jml_lap_input($nik,$tahun,$bulan){
      $hasil=$this->db->query("SELECT * from pro_lap where `tanggal` LIKE '%$tahun-$bulan%' and  nik='$nik' and status='2'");
  		return $hasil->num_rows();
  	}

    function load_absen($id)
    {
      $hasil=$this->db->query("SELECT * FROM pro_tpp a, keterangan_status b where WHERE a.hari_kerja=b.id_ket_status nik = '$id'");
  		return $hasil->result();

    }

    function load_tpp_detil($a,$c)
    {
      $hasil=$this->db->query("SELECT *, (bb_apel_masuk+bb_apel_pulang+bb_hari_besar+bb_hari_senin+bb_hari_kerja+bb_jam_kerja) as yusran from pro_tpp_detil a, ref_bulan b
      where a.bulan = b.angka and a.tahun='$a' and nik='$c'");
  		return $hasil->result();

    }

    function data_unit($id){

  		$hasil=$this->db->query("SELECT * FROM pro_tpp where nik = '$id'");
  		return $hasil->result();
  	}



    function simpan($a,$b,$c,$d,$bh_apel_masuk,$bh_apel_pulang,$bh_hari_besar,$bh_hari_senin,$bh_hari_kerja,$bh_jam_kerja,$bb_jam_kerja,$hernita1,$apakah,$adakah){

      $cek = $this->db->query("select * from pro_tpp_detil where nik='$c' and tahun= '$a' and bulan='$b' ");
      $cekk = $cek->num_rows();

      $tes = $this->db->query("select * from tpp_master where tahun= '$a' and bulan='$b' ");
      $tess = $tes->num_rows();

      $bb_apel_masuk = $d->tot_apel_masuk * $bh_apel_masuk;
      $bb_apel_pulang = $d->tot_apel_pulang * $bh_apel_pulang;
      $bb_hari_besar = $d->tot_upacara_hari_besar * $bh_hari_besar;
      $bb_hari_senin = $d->tot_upacara_hari_senin * $bh_hari_senin;
      $bb_hari_kerja = $d->tot_hari_kerja * $bh_hari_kerja;

      if ($tess > 0)
      {


                if ($cekk > 0)
                {
                  $hasil=$this->db->query("UPDATE pro_tpp_detil set
                    /*tahun = '$b',
                    bulan = '$a',
                    ni = '$c'k,*/
                    tot_apel_masuk = '$d->tot_apel_masuk',
                    tot_apel_pulang = '$d->tot_apel_pulang',
                    tot_upacara_hari_senin = '$d->tot_upacara_hari_senin',
                    tot_masuk_kerja = '$d->tot_hari_kerja',
                    tot_upacara_hari_besar = '$d->tot_upacara_hari_besar',
                    tot_izin = '$d->tot_jam_izin/100',
                    bh_apel_masuk = '$bh_apel_masuk',
                    bb_apel_masuk = '$bb_apel_masuk',
                    bh_apel_pulang = '$bh_apel_pulang',
                    bb_apel_pulang = '$bb_apel_pulang',
                    bh_hari_besar = '$bh_hari_besar',
                    bb_hari_besar = '$bb_hari_besar',
                    bh_hari_senin = '$bh_hari_senin',
                    bb_hari_senin = '$bb_hari_senin',
                    bh_hari_kerja = '$bh_hari_kerja',
                    bb_hari_kerja = '$bb_hari_kerja',
                    bh_jam_kerja = '$bh_jam_kerja',
                    bb_jam_kerja ='$bb_jam_kerja',
                    bb_kinerja = '$hernita1',
                    target_jam = '$apakah',
                    capaian_jam = '$adakah'

                    where nik='$c' and tahun= '$a' and bulan='$b'



                  ");

                }
                else
                {
                  $hasil=$this->db->query("INSERT INTO pro_tpp_detil (tahun,bulan,nik,
                    tot_apel_masuk,
                    tot_apel_pulang,
                    tot_upacara_hari_senin,
                    tot_masuk_kerja,
                    tot_upacara_hari_besar,
                    tot_izin,
                    bh_apel_masuk,
                    bb_apel_masuk,
                    bh_apel_pulang,
                    bb_apel_pulang,
                    bh_hari_besar,
                    bb_hari_besar,
                    bh_hari_senin,
                    bb_hari_senin,
                    bh_hari_kerja,
                    bb_hari_kerja,
                    bh_jam_kerja,
                    bb_jam_kerja,
                    bb_kinerja,
                    target_jam,
                    capaian_jam



                  )
                  VALUES('$a','$b','$c',
                    '$d->tot_apel_masuk',
                    '$d->tot_apel_pulang',
                    '$d->tot_upacara_hari_senin',
                    '$d->tot_hari_kerja',
                    '$d->tot_upacara_hari_besar',
                    '$d->tot_jam_izin/100',
                    '$bh_apel_masuk',
                    '$bb_apel_masuk',
                    '$bh_apel_pulang',
                    '$bb_apel_pulang',
                    '$bh_hari_besar',
                    '$bb_hari_besar',
                    '$bh_hari_senin',
                    '$bb_hari_senin',
                    '$bh_hari_kerja',
                    '$bb_hari_kerja',
                    '$bh_jam_kerja',
                    '$bb_jam_kerja',
                    '$hernita1',
                    '$apakah',
                    '$adakah'
                  )");
                }
                  return $hasil;

        }
        else
        {

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
      $hasil=$this->db->query("delete from pro_tpp_detil where id_pro_tpp_detil  = '$id'");
      return $hasil;
    }


    //START MODEL HITUNG TPP
    function get_tpp_master($tahun,$bulan)
    {
        $query = $this->db->query("select * from tpp_master where tahun='$tahun' and bulan='$bulan'");
        $tes = $query->row();
        return $tes;
    }

    function get_bobot()
    {
        $query = $this->db->query("select * from ref_bobot");
        $tes = $query->row();
        return $tes;
    }

    function get_bobot_disiplin()
    {
        $query = $this->db->query("select * from ref_bobot_disiplin");
        $tes = $query->row();
        return $tes;
    }

    function get_pegawai($nik)
    {
        $query = $this->db->query("select * from ref_pegawai where nik='$nik'");
        $tes = $query->row();
        return $tes;
    }

    function get_tot($tahun,$bulan,$nik)
    {
        $query = $this->db->query("select
        sum(apel_masuk) as tot_apel_masuk,
        sum(apel_pulang) as tot_apel_pulang,
        sum(upacara_hari_senin) as tot_upacara_hari_senin,
        sum(upacara_hari_besar) as tot_upacara_hari_besar,
        sum(hari_kerja) as tot_hari_kerja,
        sum(jam_izin) as tot_jam_izin
        from pro_tpp where `tanggal` LIKE '%$tahun-$bulan%' and nik = '$nik'");
        $tes = $query->row();
        return $tes;
    }

    function get_time($tahun,$bulan,$nik)
    {
        $query = $this->db->query("select * from pro_tpp where `tanggal` LIKE '%$tahun-$bulan%' and nik = '$nik' and hari_kerja='1'");
        $tes = $query->result();
        return $tes;
    }

    function get_time1($tahun,$bulan,$nik)
    {
        $query = $this->db->query("select * from pro_tpp where `tanggal` LIKE '%$tahun-$bulan%' and nik = '$nik'");
        $tes = $query->result();
        return $tes;
    }




}
