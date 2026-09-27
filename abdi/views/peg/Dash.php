<style>
  .alert-success hr {
    border-top-color:#fff;
}
</style>
<div class="layout-content">
<div class="alert alert-success" role="alert" style="background-color:#004d91;border-color:#fff;font-family:initial">
  <h4 class="alert-heading" style="font-size:24px">Selamat Datang</h4>
  <stong>Aplikasi e-Kinerja Pemerintahan Kabupaten Barru</strong>
  <hr>
  <div align="right">
  <p class="mb-0">Version 1.2</p>
  </div>

</div>
        <div class="layout-content-body">
          <div class="text-center m-b">

          </div>
          <div class="row gutter-xs">
             <div class="col-xs-6 col-md-3" >

               <a class="label label-info label-pill" href="#" style="border-radius:0px">
                  <span style=:font-size:14px>Laporan Bawahan</span>
                </a>

              <div class="panel panel-body text-center" data-toggle="match-height" style="border-radius:0px">
                <!-- <a class="label label-info label-pill" href="#">
                  <span>Laporan</span>
                </a>
                <span class="label arrow-left arrow-outline-info">
                  <span>Bawahan</span>
                </span> -->


                  <p>
                    <small> <i> Jumlah Laporan yang harus diberikan persetujuan.</i></small>
                  </p>
                  <a href="<?php echo site_url('peg/acc_lap'); ?>">
                    <span class="label label-danger">
                      <?php
                      $nip = $this->session->userdata('username');
                      $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                      $tampil = $query->row();
                      ?><?php echo $tampil->jum; ?> Laporan</span>
                  </a>

              </div>
            </div>

       <div class="col-xs-6 col-md-3">
       <a class="label label-info label-pill" href="#" style="border-radius:0px">
                  <span style=:font-size:14px>Laporan Revisi</span>


        </a>

        <div class="panel panel-body text-center" data-toggle="match-height">

            <p>
              <small><i>Jumlah laporan harian anda yang berstatus revisi</i> </small>
            </p>
            <a href="<?php echo site_url('peg/lap'); ?>">
              <span class="label label-info"><?php
                                              $nip = $this->session->userdata('username');
                                              $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                                              $tampill = $queryy->row();
                                              echo $tampill->revisi; ?> Laporan</span>
            </a>
        </div>
      </div>

      <div class="col-xs-6 col-md-3">
      <a class="label label-info label-pill" href="#" style="border-radius:0px">
                  <span style=:font-size:14px>Total Izin</span>
        </a>
        <div class="panel panel-body text-center" data-toggle="match-height">

            <p>
              <small><i>Total izin anda selama tahun
                  <?php
                  $tanggal = getdate();
                  echo $tanggal['year'];

                  ?></i></small>
            </p>
            <span class="label label-warning"><?php
                                              echo $izin->tot_izin; ?> Kali</span>

        </div>
      </div>


      <div class="col-xs-6 col-md-3">
      <a class="label label-info label-pill" href="#" style="border-radius:0px">
                  <span style=:font-size:14px>Total Jam Izin</span>
        </a>
        <div class="panel panel-body text-center" data-toggle="match-height">

            <p>
              <small><i>Total jam izin anda selama tahun
                  <?php
                  $tanggal = getdate();
                  echo $tanggal['year'];

                  ?></i></small>
            </p>
            <span class="label label-success"><?php echo $izin->tot; ?></span>
        </div>
      </div>

          </div>

          <div class="row gutter-xs">
            <div class="col-xs-12 col-md-6">
              <div class="panel panel-body text-center" data-toggle="match-height">
                <p>
                  <small><code>Info Detil Atasan Anda</code></small>
                </p>

                <?php
                if ($nik->nik_atasan == '0')
                {
                  ?>
                  <a class="label label-default label-pill" href="#">Anda belum memilih atasan</a>
                  <?php
                }
                else {
                  ?>
                  <a class="label label-default label-pill" href="#"><?php echo $nik->nik_atasan;?></a>
                  <a class="label label-outline-default label-pill" href="#"><?php echo $atasan->gelar_depan ." ". $atasan->nama." " . $atasan->gelar_belakang;?></a>
                  <a class="label label-danger label-pill" href="#"><?php echo $atasan->unit_kerja;?></a>
                  <a class="label label-outline-danger label-pill" href="#"><?php echo $atasan->jabatan;?></a>
                  <?php
                }
                ?>


              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="panel panel-body text-center" data-toggle="match-height">
                <p>
                  <small><code>Besaran TPP Maksimal Anda</code></small>
                </p>



                <a class="label label-outline-default label-pill" href="#">Rp.
     <?php
     function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}
		return $hasil;
	}

                echo number_format($nik->tpp_max);?></a>
                <a class="label label-outline-danger label-pill" href="#"><?php echo strtoupper(terbilang($nik->tpp_max));?></a>

              </div>
          </div>
          <!-- <div class="col text-center">
           <button class="btn btn-info mt-2">Lihat Detail Laporan Lainnya</button>
          </div> -->
            <?php
    if ($halo->kode == '0') {
      ?>
      <div class="row gutter-xs">
        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-info label-pill" href="#">
              <span>Pelanggaran Penilaian</span>
            </a>
            <span class="label arrow-left arrow-outline-info">
              <span>Di Hari Biasa</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan penilaian laporan harian bawahan dihari biasa (Senin-Kamis).</code></small>
              </p>
              <span class="label label-danger">
                <?php
                  $nip = $this->session->userdata('username');
                  $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                  $tampil = $query->row();
                  ?><?php echo $c_5_b->curang; ?> Kali</span>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-success label-pill" href="#">
              <span>Pelanggaran Penilaian</span>
            </a>
            <span class="label arrow-left arrow-outline-success">
              <span>Di Hari Jumat</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan penilaian laporan harian bawahan dihari Jumat.</code></small>
              </p>
              <span class="label label-info"><?php
                                                $nip = $this->session->userdata('username');
                                                $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                                                $tampill = $queryy->row();
                                                echo $c_5_j->curang; ?> Kali</span>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-danger label-pill" href="#">
              <span>Total</span>
            </a>
            <span class="label arrow-left arrow-outline-warning">
              <span>Pelanggaran</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan hari biasa + hari jumat selama tahun
                    <?php
                      $tanggal = getdate();
                      echo $tanggal['year'];

                      ?></code></small>
              </p>
              <span class="label label-warning"><?php
                                                  echo ($c_5_b->curang + $c_5_j->curang) ?> Kali</span>

          </div>
        </div>
      </div>

    <?php
    } else if ($halo->kode == '1' or $halo->kode == '2' or $halo->kode == '3' or $halo->kode == '5' or $halo->kode == '8') //sd
    {
      ?>
      <div class="row gutter-xs">
        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-info label-pill" href="#">
              <span>Pelanggaran Penilaian</span>
            </a>
            <span class="label arrow-left arrow-outline-info">
              <span>Di Hari Biasa</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan penilaian laporan harian bawahan dihari biasa (Senin-Jumat).</code></small>
              </p>
              <span class="label label-danger">
                <?php
                  $nip = $this->session->userdata('username');
                  $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                  $tampil = $query->row();
                  ?><?php echo $c_sd_1->curang; ?> Kali</span>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-success label-pill" href="#">
              <span>Pelanggaran Penilaian</span>
            </a>
            <span class="label arrow-left arrow-outline-success">
              <span>Di Hari Sabtu</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan penilaian laporan harian bawahan dihari Sabtu.</code></small>
              </p>
              <span class="label label-info"><?php
                                                $nip = $this->session->userdata('username');
                                                $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                                                $tampill = $queryy->row();
                                                echo $c_sd_2->curang; ?> Kali</span>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-danger label-pill" href="#">
              <span>Total</span>
            </a>
            <span class="label arrow-left arrow-outline-warning">
              <span>Pelanggaran</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan hari biasa + hari sabtu selama tahun
                    <?php
                      $tanggal = getdate();
                      echo $tanggal['year'];

                      ?></code></small>
              </p>
              <span class="label label-warning"><?php
                                                  echo ($c_sd_1->curang + $c_sd_2->curang) ?> Kali</span>

          </div>
        </div>
      </div>

    <?php

    } else if ($halo->kode == '4' or $halo->kode == '6' or $halo->kode == '7') //pus shift
    {
      ?>
      <div class="row gutter-xs">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-info label-pill" href="#">
              <span>Pelanggaran Penilaian</span>
            </a>
            <span class="label arrow-left arrow-outline-info">
              <span>Di Hari Kerja (Shift Pagi/Siang/Malam)</span>
            </span>
            <p>
              <p>
                <small><code>Total kesalahan penilaian laporan harian bawahan dihari kerja (Shift Pagi/Siang/Malam).</code></small>
              </p>
              <span class="label label-danger">
                <?php
                  $nip = $this->session->userdata('username');
                  $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                  $tampil = $query->row();
                  ?><?php echo $shift->curang; ?> Kali</span>
          </div>
        </div>


      </div>
    <?php

    } else {
      ?>

    <?php

    }
    ?>

        </div>
      </div>
