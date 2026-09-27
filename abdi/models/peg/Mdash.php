<?php
class Mdash extends Ci_model{


    function getpegawai()
    {
      $query = $this->db->query("select * from ref_pegawai order by id_unit_kerja ASC");
      $tes = $query->result();
      return $tes;
    }

    function getpegawai_total()
    {
      $query = $this->db->query("select count(nik) as total_pegawai from ref_pegawai");
      $tes = $query->row();
      return $tes;
    }

    function tpp()
    {
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from ref_pegawai where nik = '$nik'");
      $tes = $query->row();
      return $tes;
    }


      function foto($image1,$nip){
            $data = array(

                    'foto' => $image1,

           );

            $this->db->where('nik',$nip);
                $result = $this->db->update('ref_pegawai',$data);

            // $result= $this->db->insert('persyaratan',$data);
            return $result;
        }

    function tot_izin()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select count(*) as tot_izin, SEC_TO_TIME(SUM(TIME_TO_SEC(total_izin))) as tot from ref_izin where nik='$nik' and tanggal LIKE '%$tahun%'");
      $tes = $query->row();
      return $tes;
    }

    function c_5_b()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select count(*) as curang from view_informasi_new where selisih > 1 and ketepatan_waktu = '30' and hari <> 'Friday' and hari <> 'NULL' and status='2' and nik_atasan='$nik'
      and tanggal LIKE '%$tahun%'");
      $tes = $query->row();
      return $tes;
    }

    function c_5_j()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select count(*) as curang from view_informasi_new where selisih > 3 and ketepatan_waktu = '30' and hari = 'Friday' and hari <> 'NULL' and status='2' and nik_atasan='$nik'
      and tanggal LIKE '%$tahun%'");
      $tes = $query->row();
      return $tes;
    }

    function getDataCurangJ()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from view_informasi_new where selisih > 3 and ketepatan_waktu = '30' and hari = 'Friday' and hari <> 'NULL' and status='2' and nik_atasan='198610082004122001
      '");
      $tes = $query->row();
      return $tes;

    }

    function getDataCurangB()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from view_informasi_new where selisih > 1 and ketepatan_waktu = '30' and hari <> 'Friday' and hari <> 'NULL' and status='2' and nik_atasan='198610082004122001
      '");
      $tes = $query->result();
      return $tes;
    }

    function tes()
    {
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select * from ref_pegawai a, ref_unit_kerja b where a.id_unit_kerja=b.id_unit_kerja and a.nik='$nik'");
      $tes = $query->row();
      return $tes;
    }

    //sd
    function c_sd_1()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select count(*) as curang from view_informasi_new where selisih > 1 and ketepatan_waktu = '30' and hari <> 'Saturday' and hari <> 'NULL' and status='2' and nik_atasan='$nik
      '");
      $tes = $query->row();
      return $tes;
    }

    function c_sd_2()
    {
      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $query = $this->db->query("select count(*) as curang from view_informasi_new where selisih > 2 and ketepatan_waktu = '30' and hari = 'Saturday' and hari <> 'NULL' and status='2' and nik_atasan='$nik
      '");
      $tes = $query->row();
      return $tes;
    }

    function shift()
    {

      $tanggal=getdate();
      $tahun = $tanggal['year'];
      $nik = $this->session->userdata('username');
      $view_informasi =<<<SQL
      select count(*) as curang from (SELECT
        a.nik AS nik,
        a.nik_atasan AS nik_atasan,
        a.tanggal AS tanggal,
        dayname(a.tanggal) AS hari,
        a.status AS status,
        a.ketepatan_waktu AS ketepatan_waktu,(
        to_days( a.tanggal_kirim ) - to_days( a.tanggal )) AS selisih,
        b.id_unit_kerja AS id_unit_kerja,
        c.kode AS kode
      FROM
        ref_pegawai b LEFT JOIN ref_unit_kerja c on c.id_unit_kerja = b.id_unit_kerja
        LEFT JOIN pro_lap a on a.nik = b.nik
      WHERE
        YEAR(a.tanggal) = $tahun and a.status = 2 and b.nik = $nik)  where selisih > 1 and ketepatan_waktu = 30 and hari IS NOT NULL and nik_atasan=$nik
SQL;
      $query = $this->db->query("select count(*) as curang from view_informasi_new where selisih > 1 and ketepatan_waktu = 30 and hari IS NOT NULL and nik_atasan=$nik");
      $tes = $query->row();
      return $tes;
    }

    /*

      ganti view_informasi_new

      SELECT
        a.nik AS nik,
        a.nik_atasan AS nik_atasan,
        a.tanggal AS tanggal,
        dayname(a.tanggal) AS hari,
        a.status AS status,
        a.ketepatan_waktu AS ketepatan_waktu,(
        to_days( a.tanggal_kirim ) - to_days( a.tanggal )) AS selisih,
        b.id_unit_kerja AS id_unit_kerja,
        c.kode AS kode
      FROM
        ref_pegawai b LEFT JOIN ref_unit_kerja c on c.id_unit_kerja = b.id_unit_kerja
        LEFT JOIN pro_lap a on a.nik = b.nik
      WHERE
        YEAR(a.tanggal) = '2021' and a.status = 2 and b.nik = $nik

        view asli
        SELECT
            `a`.`nik` AS `nik`,
            `a`.`nik_atasan` AS `nik_atasan`,
            `a`.`tanggal` AS `tanggal`,
            dayname( `a`.`tanggal` ) AS `hari`,
            `a`.`status` AS `status`,
            `a`.`ketepatan_waktu` AS `ketepatan_waktu`,(
            to_days( `a`.`tanggal_kirim` ) - to_days( `a`.`tanggal` )) AS `selisih`,
            `b`.`id_unit_kerja` AS `id_unit_kerja`,
            `c`.`kode` AS `kode`
          FROM
            (( `pro_lap` `a` JOIN `ref_pegawai` `b` ) JOIN `ref_unit_kerja` `c` )
          WHERE
            ((
                `a`.`status` = '2'
                )
            AND ( `a`.`nik` = `b`.`nik` )
            AND ( `b`.`id_unit_kerja` = `c`.`id_unit_kerja` ))


    */


}
