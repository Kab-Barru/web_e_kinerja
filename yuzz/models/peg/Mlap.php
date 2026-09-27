<?php
class Mlap extends Ci_model
{


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

  function acuanji($id)
  {
    $query = $this->db->query("select * from pro_lap where id_pro_lap='$id'");
    $tes = $query->row();
    return $tes;
  }

  function acuan($id)
  {
    $hsl = $this->db->query("SELECT * FROM pro_lap_detil WHERE id_pro_lap_detil='$id'");
    if ($hsl->num_rows() > 0) {
      foreach ($hsl->result() as $data) {
        $hasil = array(
          'uraian_tugas' => $data->uraian_tugas,
          'jam' => $data->jam,
          'output' => $data->output,
          'id_pro_lap_detil' => $data->id_pro_lap_detil,
          'urutan' => $data->urutan,
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

  function data()
  {
    $id = $this->session->userdata('username');
    // $hasil = $this->db->query("SELECT *, a.ket as keterangan, (ketepatan_waktu+kesesuaian_lap) as jum, DATE_FORMAT(tanggal, '%d-%m-%Y') as asu FROM pro_lap a, ref_pegawai b, status_lap c where a.tanggal LIKE '%2021%' or a.tanggal LIKE '%2020%' and a.nik=b.nik and a.nik='$id' and a.status=c.status ORDER BY `a`.`tanggal` DESC");

    $hasil = $this->db->query("SELECT *,a.ket as keterangan, (ketepatan_waktu+kesesuaian_lap) as jum, DATE_FORMAT(tanggal, '%Y-%m-%d') as asu FROM pro_lap a, ref_pegawai b, status_lap c where a.nik=b.nik and a.nik='$id' and a.status=c.status AND YEAR(DATE(a.tanggal))<=2026 ORDER BY `a`.`tanggal` DESC");
    return $hasil->result();
  }

  function data_detil($id)
  {
    //$id = $this->session->userdata('username');
    $hasil = $this->db->query("SELECT * FROM pro_lap_detil where id_pro_lap ='$id' order by urutan ASC, 	id_pro_lap_detil ASC");
    return $hasil->result();
  }

  public function simpan_detil($a, $b, $c, $d, $e)
  {
    $aa = str_replace("'", '`', $a);
    $cc = str_replace("'", '`', $c);
    $hasil = $this->db->query("INSERT INTO pro_lap_detil (id_pro_lap, uraian_tugas,jam,output,urutan) VALUES
      ('$d','$aa','$b','$cc','$e')");
    return $hasil;
  }

  function simpan($a, $b)
  {

    $nik = $this->session->userdata('username');
    $tanggall = date('Y-m-d', strtotime($a));

    $nik = $this->session->userdata('username');
    $atasan = $this->db->query("select * from ref_pegawai where nik= '$nik'");
    $atasann = $atasan->row();

    date_default_timezone_set('Asia/Jakarta');
    $now = date("Y-m-d"); //tgl server
    $tgl1 = date_create($tanggall);
    $tgl2 = date_create($now);
    $info = date_diff($tgl2, $tgl1);
    $days = $info->format("%a");


    if ($this->session->userdata('username') == 196811041994031004) { // jike register
      $hasil = $this->db->query("INSERT INTO pro_lap (nik,tanggal,nik_atasan,ket) VALUES('$nik','$tanggall','$atasann->nik_atasan',$b)");
      return $hasil;
    } else {


      $hasil = $this->db->query("INSERT INTO pro_lap (nik,tanggal,nik_atasan,ket) VALUES('$nik','$tanggall','$atasann->nik_atasan',$b)");
      return $hasil;
      // }
    }
  }
  function simpan_lap($nik,$a, $b)
  {


    $tanggall = date('Y-m-d', strtotime($a));


    $atasan = $this->db->query("select * from ref_pegawai where nik= '$nik'");
    $atasann = $atasan->row();

    date_default_timezone_set('Asia/Jakarta');
    $now = date("Y-m-d"); //tgl server
    $tgl1 = date_create($tanggall);
    $tgl2 = date_create($now);
    $info = date_diff($tgl2, $tgl1);
    $days = $info->format("%a");


    if ($this->session->userdata('username') == 196811041994031004) { // jike register
      $hasil = $this->db->query("INSERT INTO pro_lap (nik,tanggal,nik_atasan,ket) VALUES('$nik','$tanggall','$atasann->nik_atasan',$b)");
      return $hasil;
    } else {


      $hasil = $this->db->query("INSERT INTO pro_lap (nik,tanggal,nik_atasan,ket) VALUES('$nik','$tanggall','$atasann->nik_atasan',$b)");
      return $hasil;
      // }
    }
  }
  function update($a, $b, $c)
  {
    $hasil = $this->db->query("UPDATE pro_lap set tanggal = '$a', ket = '$b' where id_pro_lap ='$c'");
    return $hasil;
  }

  function update_det($a, $b, $c, $d, $e)
  {
    $aa = str_replace("'", '`', $a);
    $cc = str_replace("'", '`', $c);
    $hasil = $this->db->query("UPDATE pro_lap_detil set uraian_tugas = '$aa', jam = '$b', output ='$cc', urutan='$e' where id_pro_lap_detil ='$d'");
    return $hasil;
  }

  function kirim($a,$js,$jp)
  {
    $now = date('Y-m-d');
    $nik = $this->session->userdata('username');
    $query = $this->db->query("select * from ref_pegawai where nik ='$nik'")->row(); // disini
    $nik_atasan = $query->nik_atasan;

    $query1 = $this->db->query("select * from pro_lap where id_pro_lap ='$a'")->row(); // disini
    $status = $query1->status;

    if ($status == 3) {
      $hasil = $this->db->query("UPDATE pro_lap set status = '1', nik_atasan='$nik_atasan' where id_pro_lap ='$a'");
    } else {
      $id_peg=$_SESSION['id_peg'];
      $tgl=$query1->tanggal;
      $nik=$_SESSION['nip'];
      $kode=array('nip'=>$_SESSION['nip'],'tgl'=>$tgl);  // $kode=$id_peg.'-'.$tgl;


          $jam2=$jp;

              if ($jp!=='') {
                $jp = date("H:i:s", strtotime("16:00:00"));


                $data = array(
                  // 'nip' => $nip,
                  'jam_pulang' => date('H:i:s', strtotime("16:00:00")),

                  'ket_jam_pulang' =>'Hadir',
                );

              	$this->db->where($kode);
                $this->db->update('absen_finger', $data);

                $cek = $this->db->query("select * from pro_lap_detil where id_pro_lap ='$a'");
                $cek1=$cek->row();
                $cek2=$cek->num_rows();

          			$datas = array(
          				'id_pro_lap' =>$cek1->id_pro_lap,
          				'uraian_tugas' => 'Pulang Kantor',
          				'jam' =>'16:00',
          				'output'=>'Data dari Mesin Finger',
          				'urutan' =>$cek2+1,
          			);
          				$this->db->insert('pro_lap_detil', $datas);

              }
                  $jam=$js;

                        if ($js!=='') {
                          $daftar_hari = array(
                         'Sunday' => 'Minggu',
                         'Monday' => 'Senin',
                         'Tuesday' => 'Selasa',
                         'Wednesday' => 'Rabu',
                         'Thursday' => 'Kamis',
                         'Friday' => 'Jumat',
                         'Saturday' => 'Sabtu'
                        );

                        $namahari = date('l', strtotime($tgl));

                        echo $daftar_hari[$namahari];
                         if ($daftar_hari[$namahari]=='Jumat') {
                            $batas_ceklok = date("H:i:s", strtotime("13:50:00"));
                         }else{
                          $batas_ceklok = date("H:i:s", strtotime("12:50:00"));
                          }

                          $jam_absen = date('H:i:s', strtotime($jam));

                          if ($jam_absen > $batas_ceklok) {
                            $ket = "Terlambat";
                          } else {
                            $ket = "Tepat Waktu";
                          }

                          $batas= strtotime("16:00:00");
                          if ($ket=='Tepat Waktu') {
                            $jam1=  strtotime($batas_ceklok);
                          }else{
                            $jam1=  strtotime($jam);
                         }

                          $selisih=$batas-$jam1;

                          $data = array(
                            // 'nip' => $nip,
                            'jam_siang' => date('H:i:s', strtotime($jam)),
                            // 'tgl' => date('Y-m-d', strtotime($tgl)),
                            'selisih_jam_siang'=>$selisih,
                            // 'id_instansi'=>$uk,
                            'ket_jam_siang' => $ket,
                          );

                        	$this->db->where($kode);
                          $this->db->update('absen_finger', $data);
                        }


                 $hasil = $this->db->query("UPDATE pro_lap set status = '1', tanggal_kirim='$now', nik_atasan='$nik_atasan' where id_pro_lap ='$a'");
    }


    //$hasil=$this->db->query("UPDATE pro_lap set status = '1', nik_atasan='$nik_atasan' where id_pro_lap ='$a'");
    //$hasil=$this->db->query("UPDATE pro_lap set status = '1', tanggal_kirim='$now' where id_pro_lap ='$a'");
    return $hasil;
    //redirect('peg/lap');
  }

  function hapus($id)
  {
    $hasil = $this->db->query("delete from pro_lap where id_pro_lap= '$id'");
    return $hasil;
  }

  function hapus_detil($id)
  {
    $hasil = $this->db->query("delete from pro_lap_detil where id_pro_lap_detil = '$id'");
    return $hasil;
  }
}
