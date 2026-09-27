<script>
window.print();
</script>

<style>
			.text1{
				font-size: 12px;
			}
			.text2{
				font-size: 10px;
			}
      .text3{
				font-size: 11px;
			}
      .table_yus
      {
        border-collapse: collapse;
      }

      th, td
      {
        border: 1px solid black;
      }

      .th_no, .td_no, .tr_no
      {
        border: 0px solid black;
      }
			.hilang
      {
        border: 0px solid black;
      }
			.tinggi
			{
				height: 35;
			}
</style>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/elephant.min.css">

            <table border="0" width="100%" class="text3" >
            <tr >
              <td class="td_no" colspan="2" align="center"><h5>DAFTAR TAMBAHAN PENGHASILAN PEGAWAI NEGERI SIPIL DAN CALON PEGAWAI NEGERI SIPIL</h5></td>
            </tr>
            <tr>
              <td class="td_no" align="left">SKPD/UPTD</td>
              <td class="td_no" align="left">: <?php echo $unit->unit_kerja;?></td>
            </tr>
            <tr>
              <td class="td_no" align="left">BULAN</td>
              <td class="td_no" align="left">:
                <?php
                echo $bulan->huruf." " . $tahun;
                ?>
              </td>
            </tr>
          </table>

          <!--
          <table class="table table-striped">
            <table class="table table-hover">
            <table id="demo-datatables-responsive-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
        -->

            <table  style="border-collapse:collapse;" class="table_yus" border="1" cellspacing="0" width="100%">
              <tr class="text3">
                <th class="text-center" rowspan="3">NO</td>
                <th class="text-center" rowspan="3">NIP</td>
                <th class="text-center" rowspan="3">Nama</td>
                <th class="text-center" rowspan="3">Jabatan</td>
                <th class="text-center" rowspan="3">Jml TPP (Rupiah)</td>
                <th class="text-center" colspan="20" align="center">Indikator Disiplin</td>
                <th class="text-center" colspan="2" align="center">Indikator Kinerja</td>
                <th class="text-center" rowspan="3">Jumlah TPP</td>
                <th class="text-center" rowspan="3">Capaian TPP</td>
                <th class="text-center" rowspan="3">Capaian Kinerja</td>
              </tr>

              <tr class="text3">
                <th class="text-center" colspan="3">Apel Masuk</td>
                <th class="text-center" colspan="3">Apel Pulang</td>
                <th class="text-center" colspan="3">Upacara Hari Senin</td>
                <th class="text-center" colspan="3">Upacara Hari Besar</td>
                <th class="text-center" colspan="3">Jam Kerja</td>
                <th class="text-center" colspan="3">Hari Kerja</td>
                <th class="text-center" rowspan="2">Jumlah TPP (40%)</td>
                <th class="text-center" rowspan="2">Capaian TPP Disiplin</td>
                <th class="text-center" rowspan="2">Jumlah TPP (60%)</td>
                <th class="text-center" rowspan="2">Capaian TPP Kinerja</td>


              </tr>


              <tr class="text3">
                <th class="text-center" >T</td>
                <th class="text-center" >C</td>
                <th class="text-center">Total (Rp)</td>

                <th class="text-center">T</td>
                <th class="text-center">C</td>
                <th class="text-center">Total (Rp)</td>

                <th class="text-center">T</td>
                <th class="text-center">C</td>
                <th class="text-center">Total (Rp)</td>

                <th class="text-center">T</td>
                <th class="text-center">C</td>
                <th class="text-center">Total (Rp)</td>

                <th class="text-center">T</td>
                <th class="text-center">C</td>
                <th class="text-center">Total (Rp)</td>

                <th class="text-center">T</td>
                <th class="text-center">C</td>
                <th class="text-center">Total  (Rp)</td>


              </tr>
              <?php
							$no = 1;
              $tot = 0;
              $tot_awal = 0;
              $tot_kinerja_1 = 0;
              $tot_kinerja_2 = 0;
              $tot_disiplin_1 = 0;
              $tot_disiplin_2 = 0;
              $tot_hari_kerja = 0;
              $tot_jam_kerja = 0;
              $tot_upacara_besar = 0;
              $tot_upacara_senin = 0;
              $tot_a_pulang = 0;
              $tot_a_masuk = 0;
              $tot_tpp = 0;
              foreach ($peg as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr class="text2 tinggi" >
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja);?></td>

                  <td class="text-right"><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td class="text-center"><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>

                </tr>

                <?php
								$tot_tpp += ($peg->tpp_max);
                $tot_a_masuk += ($peg->bb_apel_masuk);
                $tot_a_pulang += ($peg->bb_apel_pulang);
                $tot_upacara_senin += ($peg->bb_hari_senin);
                $tot_upacara_besar += ($peg->bb_hari_besar);
                $tot_jam_kerja += ($peg->bb_jam_kerja);
                $tot_hari_kerja += ($peg->bb_hari_kerja);
                $tot_disiplin_1 += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2 += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1 += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2 += ($peg->bb_kinerja);
                $tot_awal += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }

              ?>
							<tr class="text2">
								<td class="text-right" colspan="4"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot);?></b></td>
								<td class="text-right">&nbsp;</td>

							</tr>
            </table>
						<br>
						<table class="hilang" border="0" width="100%">
              <tr class="text-left text3">
								<td class="td_no"  width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									<b>
									Barru, <?php
									function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
								//	$tgl=date('d-m-Y');
								//	$ubah_tanggal = date('d F Y', strtotime($tgl));
		 						//	echo $ubah_tanggal;


								echo tgl_indo(date('Y-m-d'));

									?>
									</b>
								</td>
							</tr>
              <tr class="text-left text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									<b>
									<?php echo strtoupper($ttd->jabatan);?>
								</b>
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-left text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'><b><u>
									<?php echo $ttd->gelar_depan.' '.$ttd->nama.' '.$ttd->gelar_belakang;?></u></b>
								</td>
							</tr>
							<tr class="text-left text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									<?php echo 'Pangkat : '. $ttd->pangkat;?>
								</td>
							</tr>
							<tr class="text-left text3">
								<td class="td_no" width='75%'>&nbsp;</td>
								<td class="td_no" width='25%'>
									<?php echo 'NIP '. $ttd->nik;?>
								</td>
							</tr>

            </table>


<!--
						<div>
							<div class="text3" style="width:400px;float:right">
								Barru, <?php echo date("d-m-Y") ?>
								<br/>SEKRETARIS DESA<br/><br/><br/>
								<p>Nama<br/>NIP. 1234</p>
							</div>
							<div style="clear:both"></div>
						</div>
-->

<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url();?>assets/js/elephant.min.js"></script>
<script src="<?php echo base_url();?>assets/js/application.min.js"></script>
<script src="<?php echo base_url();?>assets/js/demo.min.js"></script>
