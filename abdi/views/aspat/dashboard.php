<?php

date_default_timezone_set('Asia/Makassar');
// Hasil: 20-01-2017 05:32:15
  $ip=$_SESSION['id_peg'];
    $now=date('Y-m-d');
    $jam=date('H:i:s');
    $pagi=date('H:i:s',strtotime('12:00:00'));
    $siang=date('H:i:s',strtotime('12:30:00'));
    $pulang=date('H:i:s',strtotime('16:00:00'));


    if ($jam<$siang) {
        $ceklok=$this->db2->query("select * from `ceklok_pagi` where `id_absensi`='$ip' and `tanggal`='$now'")->num_rows();
    }

    if ($jam>$siang) {
      $ceklok=$this->db2->query("select * from `ceklok_siang` where `id_absensi`='$ip' and `tanggal`='$now'")->num_rows();
    }
    if ($jam>$pulang) {
      $ceklok=$this->db2->query("select * from `ceklok_pulang` where `id_absensi`='$ip' and `tanggal`='$now'")->num_rows();
    }


  // $ceklok=$this->db2->query("select * from `t_kehadirans` where `id_absensi`='$ip' and `tanggal`='$now'")->num_rows();
  $nipnya=$_SESSION['nip'];
  $bawahan = $this->db->query("select * from  ref_pegawai where nik_atasan=$nipnya");
  $jumlah = $bawahan->num_rows();

 ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/app.css" />
<style>
body{
font-family: 'Lato', sans-serif;
width:100%;
overflow-x: hidden;
/* background-image:url(https://thumbs.dreamstime.com/b/floral-background-light-colours-18423366.jpg)!important; */

}

.profile-bar{
background-image: url(https://i.pinimg.com/originals/ae/84/18/ae8418bc8397210c37ba7fc802dbc020.jpg);
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
max-height: 100%;
max-width: 100%;
color: #eee;
}

.profile-bar .contents{
background-color: rgba(0,0,0,0.65);
}

.profile-bar .contents img{
display: block;
width: 70px;
margin: auto;
padding-top: 25px;
}

.profile-bar .contents .profile-name{
text-align: center;
margin: 10px 0px;
font-size: 18px;
font-weight: 300;
}

.profile-bar .contents .profile-description{
text-align: center;
margin: 10px 0px;
font-weight: 300;
}

.profile-bar .contents .buttons{
text-align: center;
background-color: rgba(31,45,61,.7);
}

.profile-bar .contents .buttons ul{
list-style: none;
-webkit-padding-start: 0;
}

.profile-bar .contents .buttons ul li{
display: inline-block;
margin: 15px 20px;
}

.profile-bar .contents .buttons ul li a{
color: #eee;
font-size: 32px;
display: block;
text-decoration: none;
opacity: 0.7;
transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a:hover{
opacity: 1;
transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a span{
font-size: 14px;
display: block;
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}

#watch {
  color: rgb(252, 150, 65);
  /* position: fixed; */
  z-index: 1;
  height:60px;
  width:100px;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  font-size:25px;
  -webkit-text-stroke: 3px rgb(255, 255, 255);
  text-shadow: 4px 4px 10px rgba(255, 65, 36, 0.4),
               4px 4px 20px rgba(255, 45, 26, 0.4),
               4px 4px 30px rgba(255, 25, 16, 0.4),
               4px 4px 40px rgba(255, 15, 06, 0.4);
}

#imgView{
    padding:5px;
}
.loadAnimate{
    animation:setAnimate ease 2.5s infinite;
}
@keyframes setAnimate{
    0%  {color: #000;}
    50% {color: transparent;}
    99% {color: transparent;}
    100%{color: #000;}
}
.custom-file-label{
    cursor:pointer;
}

<?php

$tgl = date('d-m-Y');
$hr  = date('D');
if ($hr == 'Sun')
{
  $hrr = 'Minggu';
  $kh = 0;
}
else if ($hr == 'Mon')
{
  $hrr = 'Senin';
  $kh=2;

}
else if ($hr == 'Tue')
{
  $hrr = 'Selasa';
  $kh=3;
}
else if ($hr == 'Wed')
{
  $hrr = 'Rabu';
  $kh=4;
}
else if ($hr == 'Thu')
{
  $hrr = 'Kamis';
  $kh=5;
}
else if ($hr == 'Fri')
{
  $hrr = 'Jumat';
  $kh=6;
}
else if ($hr == 'Sat')
{
  $hrr = 'Sabtu';
  $kh=1;
}



 ?>

</style>
    <?php
  $this->session->set_userdata('menu', '1');
    $nik = $this->session->userdata('username');
    $cek = $this->db->query("select * from ref_log where username = '$nik'")->num_rows();
    $cek_det = $this->db->query("select * from ref_log where username = '$nik'")->row();
    $peg = $this->db->query("select * from ref_pegawai where nik = '$nik'")->row();
    $nip=$_SESSION['nip'];

    if ($cek > 0) {
      if ($cek_det->lev == 'user_su') {
        $adm = "Super User";
      } else if ($cek_det->lev == 'user_admin') {
        $adm = $cek_det->nama_adm;
      }
    }


    if ($cek > 0) {
      if ($cek_det->lev == 'user_su') {
        $pgw = "Super User";
      } else if ($cek_det->lev == 'user_admin') {
        $pgw = $cek_det->nama_adm;
      } else if ($cek_det->lev == 'user_sdm') {
        $pgw = $cek_det->nama_adm;
      } else {
        $pgw = $peg->gelar_depan . " " .  ucwords($peg->nama) . " " . $peg->gelar_belakang;
      }
    }
    ?>


      <?php
      function penyebut($nilai)
      {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
          $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
          $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
          $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
          $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
          $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
          $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
          $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
          $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
          $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
          $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
      }
      function terbilang($nilai)
      {
        if ($nilai < 0) {
          $hasil = "minus " . trim(penyebut($nilai));
        } else {
          $hasil = trim(penyebut($nilai));
        }
        return $hasil;
      }
      ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:white">

  <!-- Content Header (Page header) -->
  <div class="content-header">




    <div class="container-fluid">




              <div class="profile-bar">
                <div class="contents">

                  <!-- <img src="https://gravatar.com/avatar/cd62d88a83461e0b1daa8f2fa31c4dcb?s=512&d=https://codepen.io/assets/avatars/user-avatar-512x512-6e240cf350d2f1cc07c2bed234c3a3bb5f1b237023c204c782622e80d6b212ba.png" alt="UserAvatar"> -->
                <?php if (strlen($peg->foto)<4) {?>
                    <img src="<?php echo base_url() ?>/foto/user.png" class="img-circle" alt="" style="width:100px;height:100px">
                <?php }else{ ?>
                    <img src="<?php echo base_url() ?>/foto/<?php echo $peg->foto ?>" class="img-circle" alt="" style="width:100px;height:100px">
                <?php } ?>


                <p class="profile-name"><i><?php echo $pgw ?><br>(<?php echo $nip ?>)</i></p>
                  <!-- <p class="profile-description"> Selamat Datang di Aplikasi E-KINERJA (Elektronik Kinerja Pegawai Pemerintahan Kabupaten Barru).</p> -->
                  <div id="watch"></div>
                  <div class="buttons">
                    <ul>
                      <li>
                        <a type="button" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-cog"></i><span> Setting Akun</span></a>
                      </li>
                      <li>
                        <a  type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user"></i><span> Profile </span></a>
                      </li>
                      <li>
                        <a href="#" onclick="logout()"><i class="fas fa-power-off"></i><span> Logout </span></a>
                      </li>
                    </ul>
                      <?php  ?>
                    </div>

                  </div>

                </div>


              </div>

              <div >
                <?php if ($kh<2) {?>
                  <marquee direction=”right”><p><b>~Selamat Hari Libur~</b></p></marquee>

            <?php }else if ($kh>5) {?>
            <marquee direction=”right”><p><b>~Jadwal Ceklok Hari Ini..,~ Ceklok Pagi Maksimal 07:30+(5 menit Toleransi) ~ Istrahat 12:00 ~ Ceklok Siang 12:30-13:50 ~ Ceklok Pulang 16:00-18:00~</b></p></marquee>
            <?php }else{ ?>
                  <marquee direction=”right”><p><b>~Jadwal Ceklok Hari Ini..,~ Ceklok Pagi Maksimal 07:30+(5 menit Toleransi) ~ Istrahat 12:00 ~ Ceklok Siang 12:30-12:50 ~ Ceklok Pulang 16:00-18:00~</b></p></marquee>
            <?php } ?>
              </div>
      </div>

<div style="width:98%;margin-left:auto;margin-right:auto;margin-top:0px">


      <div class="row">
        <div class="col-12 col-sm-6 col-md-3" >
          <div class="info-box">
            <span class="info-box-icon elevation-1"><img src="<?php echo base_url('assets/img/bawahan.png') ?>" alt="" style="width:80%;height:80%"></span>
            <div class="info-box-content">
              <span class="info-box-text">Laporan Bawahan</span>
              <?php if ($jumlah<1) {?>
                <a href="#">
                  <span class="badge badge-danger">
                    Belum Ada Bawahan
                  </span>
                </a>
            <?php  }else{?>
              <a href="<?php echo base_url() ?>peg/cek_lap">
                <span class="badge badge-danger">
                  <?php
                  $nip = $this->session->userdata('username');
                  $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                  $tampil = $query->row();
                  ?><?php echo $tampil->jum; ?> Laporan</span>
              </a>
            <?php } ?>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><img src="<?php echo base_url('assets/img/returns.png') ?>" alt="" style="width:80%;height:80%"></span>

            <div class="info-box-content">
              <span class="info-box-text">Laporan Revisi</span>
              <a href="<?php echo site_url('peg/laporan'); ?>">
                <span class="badge badge-warning" style="color:white">
                  <?php
                        $nip = $this->session->userdata('username');
                        $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                        $tampill = $queryy->row();
                        echo $tampill->revisi; ?>
                  Laporan </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1"><img src="<?php echo base_url('assets/img/ti.png') ?>" alt="" style="width:80%;height:80%"> </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Izin</span>
              <span class="badge badge-info"><?php
                                                echo $izin->tot_izin; ?> Kali</span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon  elevation-1"><img src="<?php echo base_url('assets/img/izin.png') ?>" alt="" style="width:80%;height:80%"> </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Jam Izin</span>

              <small style="font-size:12px" class="badge badge-dark"><i>Total jam izin anda selama tahun
                  <?php
                  $tanggal = getdate();
                  echo $tanggal['year'];

                  ?></i></small>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3">
          <div class="info-box" >
            <span class="info-box-icon elevation-1" style="backgorund-color:black!important"><img src="<?php echo base_url('assets/img/tpp.png') ?>" alt="">  </span>

            <div class="info-box-content">
              <span class="info-box-text">Besaran Maksimal TPP</span>
              <span class="info-box-number">Rp. <?php echo number_format($tpp_max); ?>
                <i style="font-size:10px;color:orange">(<?php echo strtoupper(terbilang($tpp_max)); ?>)</i>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-3 col-md-3">
          <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pelanggaran Penilaian Hari Biasa</span>
              <span class="badge badge-info">Hari senin-Kamis
                <?php
                $nip = $this->session->userdata('username');
                $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'");
                $tampil = $query->row();
                ?><?php echo $c_5_b->curang; ?>
                kali</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-lg-3 col-sm-3 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pelanggaran Penilaian Hari Jum'at</span>
              <span class="badge badge-success">Hari Jum'at
                <?php
                $nip = $this->session->userdata('username');
                $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'");
                $tampill = $queryy->row();
                echo $c_5_j->curang; ?> Kali</span>
              </span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-sm-3 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1 "><img src="<?php echo base_url('assets/img/jam.png') ?>" alt="" style="width:80%;height:80%"> </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pelanggaran</span>
              <span class="info-box-number" style="color:orange">
                 Selama 1 tahun
                 <br>untuk Tahun
                <?php
                $tanggal = getdate();
                echo $tanggal['year']; ?>

                &nbsp;<?php echo ($c_5_b->curang + $c_5_j->curang) ?>

                Kali
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


            <div class="row">
              <div class="col-lg-6">
                <div class="info-box" style="background-image: url(https://i.pinimg.com/originals/a4/a0/49/a4a049fed2394dbbde226e17c83f3349.jpg)">
                  <div class="p-1 flex-fill" style="overflow: hidden" align="center"  >
                      <strong>Grafik Kehadiaran</strong>
                      <!-- <?php echo $ceklok.'/'. $ip.'/'.$now?> -->
                    <hr>
                    <canvas id="oilChart" width="200" height="100" data-tilt data-tilt-max="20" data-tilt-speed="400" data-tilt-perspective="500" ></canvas>
                    <br>
                      <strong >~Fitur Grafik Dalam Pengembangan~</strong>
                
                  </div>

                </div>

              </div>
              <div class="col-lg-6">
                  <div class="card">
                    <?php if (strlen($nik_atasan)<2) {?>
                    <div class="card-herader" style="padding:10px">
                      <strong>Belum Pilih Atasan Langsung</strong>
                      <hr>
                      <br>
                      <a href="<?php echo base_url() ?>peg/Atasan/set_atasan" class="btn btn-primary">Pilih Atasan Langsung </a>
                    </div>
                    <?php }else{?>
                      <div class="card-header" >
                        <?php if (strlen($atasan->foto)<4) {?>
                            <img src="<?php echo base_url() ?>/foto/user.png"  alt="Profile Image" class="profile-img">
                        <?php }else{ ?>
                            <img src="<?php echo base_url() ?>/foto/<?php echo $atasan->foto ?>"  alt="Profile Image" class="profile-img">
                        <?php } ?>
                      </div>
                      <div class="card-body" style="background-image: url(https://i.pinimg.com/originals/a4/a0/49/a4a049fed2394dbbde226e17c83f3349.jpg)">
                        <br>
                        <strong style="color:blue">
                          <span class="badge badge-dark" style="font-size:15px">~Penilai/Atasan Langsung~</span>
                        </strong>
                          <br>
                          <strong><?php echo $atasan->gelar_depan . " " . $atasan->nama . " " . $atasan->gelar_belakang; ?></strong>
                          <br>
                          <i style="color:orange"><?php echo $nik_atasan; ?></i>
                          <p class="city"><?php echo $atasan->jabatan ?></p>
                          <p class="desc"> <strong><?php echo $atasan->unit_kerja; ?></strong></p>

                      </div>
                    <?php } ?>

                      <div class="card-footer">
                        <?php

                        $bwh=$bawahan->result();
                        if ($jumlah<1) {?>

                          <strong >Belum Ada Bawahan</strong>
                        <?php }else{ ?>
                          <strong class="badge badge-warning" style="font-size:15px" >~Bawahan/Yang dinilai~</strong>
                        <?php foreach ($bwh as $bwhn) {?>

                          <div class="card" style="margin-top:3px;backgorund-color:#7f8c8d!important;background-image: url(data:image/jpeg;base64,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);">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3" style="padding:10px" align="center">
                                  <?php if (strlen($bwhn->foto)<4) {?>
                                      <img src="<?php echo base_url() ?>/foto/user.png"  class="img-circle"alt="" style="height:90px;width:90px;border: 6px solid #fff;">
                                  <?php }else{ ?>
                                      <img src="<?php echo base_url() ?>/foto/<?php echo $bwhn->foto ?>" class="img-circle"alt="" style="height:90px;width:90px;border: 6px solid #fff;">
                                  <?php } ?>
                                </div>
                                <div class="col-lg-10 col-md-9 col-sm-9" style="padding:12px;" align="center">
                                    <strong><?php echo $bwhn->nama.','.$bwhn->gelar_belakang; ?></strong>
                                    <br>
                                    <i style="color:orange"><?php echo $bwhn->nik ?></i>
                                    <br>

                                    <?php
                                    $idj=$bwhn->id_jabatan;
                                     $jbt=$this->db->query("select * from ref_jabatan where id_jabatan=$idj")->row(); ?>
                                    <strong><?php echo $jbt->jabatan ?></strong>
                                </div>
                            </div>
                          </div>
                        <?php}  ?>
                      <?php }} ?>
                      </div>

                  </div>


                <!-- </div>
          </div> -->

        <!-- </div>

              </div> -->


            </div>
          </div><!-- /.container-fluid -->
    </div>

  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->

    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->


<!-- /.content-wrapper -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="foto" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unggah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

              <div class="card-body p-1">
              <label for="preview_gambar" class="imgWrap w-100" align="center" style="cursor: pointer;">
                <?php if (strlen($peg->foto)<4) {?>

                      <img src="<?php echo base_url() ?>/foto/user.png" id="gambar_nodin"class="mx-auto d-block w-100" style=" width:100px;height:100px; object-fit: contain; object-position: center;">
                <?php }else{ ?>
                    <img src="<?php echo base_url() ?>/foto/<?php echo $peg->foto ?>" id="gambar_nodin"class="mx-auto d-block w-100" style=" width:100px;height:100px; object-fit: contain; object-position: center;">

                <?php } ?>

              </label>
                  <div class="custom-file d-none">
                      <input type="file" name="file" id="preview_gambar" />
                  </div>
                  <div align="center" >
                    <strong>Klik Gambar untuk load Gambar kemudian Unggah foto Profil</strong>
                    <hr>
                  </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Unggah</button>
      </div>
    </div>
  </form>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="password" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="name-1" class="control-label">Password Lama</label>
        <input  id="form-control-1" placeholder="Masukkan Password Lama" name="a" class="form-control a" type="text">
        <label for="email-1" class="control-label">Password Baru</label>
        <input id="form-control-2" name="b" minlength="6" placeholder="Masukkan Password Baru" class="form-control b" type="text" />
        <small style="color:red">*Silahkan Masukkan Password Sebelumnya dan Password Baru</small> <br>
        <small style="color:red">*Minimal password baru adalah 6 karakter</small>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/tilt.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script>
  $(document).ready(function() {
    var ms = '<?php echo $_SESSION['kode_mesin'] ?>';
    // time=new date();
    // alert(time);

    ceklok='<?php echo $ceklok ?>';

    if (ceklok<1) {
      $.ajax({
        url: "https://e-finger.barrukab.go.id/ambil-data/"+ ms,
        type: "get", // To protect sensitive data
        data: {},
        success: function(response) {
          // Handle the response object
          alert(response);
        }
      });
    }


    $("#preview_gambar").change(function(){
       bacaGambar(this);
    });

    function bacaGambar(input) {
       if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#gambar_nodin').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
       }
    }
  });




  var oilCanvas = document.getElementById("oilChart");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 18;

  var oilData = {
    labels: [
      "Jam Kerja",
      "Jam Izin",
      "Sisa Jam Kerja",

    ],
    datasets: [{
      data: [10, 20, 1],
      backgroundColor: [
        "#28a745",
        "#ffc107",
        "#dc3545"
      ]
    }]
  };

  var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
  });

  function logout(){
    var srv='<?php echo base_url() ?>';
    Swal.fire({
       title: 'konfirmasi',
       text: "Apakah Anda Yakin Ingin Keluar?",
       type: 'question',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya'
     }).then((result ) => {
       if (result.value) {
                     $.ajax({
                         url  : "<?php echo base_url('Log/logout')?>",
                         success: function(data){
                         location.reload();
                         }
                     });
                 }
           })
         }

     function clock() {
       var now = new Date();
       var secs = ('0' + now.getSeconds()).slice(-2);
       var mins = ('0' + now.getMinutes()).slice(-2);
       var hr = now.getHours();
       var Time =hr + ":" + mins + ":" + secs;

       document.getElementById("watch").innerHTML = Time;
       // if (secs=='10') {
       //   alert('ok');
       // }
       requestAnimationFrame(clock);
     }

     requestAnimationFrame(clock);

     $('#foto').submit(function (e) {
       var nip='<?php echo $_SESSION['username'] ?>';
                  e.preventDefault();
                  $.ajax({
                      url:'<?php echo base_url() ?>peg/Dasb/profil/'+nip, //URL submit
                      type:"post", //method Submit
                      data:new FormData(this), //penggunaan FormData
                      processData:false,
                      contentType:false,
                      cache:false,
                      async:false,
                       success: function(response){
                       var result = $.parseJSON(response);
                       console.log();
                           if (result.status == true) {

                             Swal.fire({
                               type: 'success',
                               title: 'Success',
                               text: result.messages
                             });

                             location.reload();
                           } else {
                             Swal.fire({
                               type: 'error',
                               title: 'Oops...',
                               html: result.messages
                             });
                           }
                     }

             })
    });


         $('#password').submit(function (e) {

                      e.preventDefault();
                      $.ajax({
                          url:'<?php echo base_url() ?>peg/Password/ubah_password', //URL submit
                          type:"post", //method Submit
                          data:new FormData(this), //penggunaan FormData
                          processData:false,
                          contentType:false,
                          cache:false,
                          async:false,
                           success: function(response){
                           var result = $.parseJSON(response);
                           console.log();
                               if (result.status == true) {

                                 Swal.fire({
                                   type: 'success',
                                   title: 'Success',
                                   text: result.messages
                                 });

                                 location.reload();
                               } else {
                                 Swal.fire({
                                   type: 'error',
                                   title: 'Oops...',
                                   html: result.messages
                                 });
                               }
                         }

                 })
        });
</script>
