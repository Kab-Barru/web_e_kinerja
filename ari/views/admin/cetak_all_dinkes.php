<?php
  $iddd = $this->session->userdata('id_unit_kerja');
  $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
  if ($query->kode == 0)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak_all_dinkes/view1');?>" method="post" target="_blank">
    <?php
  }

  else
  {
    ?>
    <form action="<?php echo site_url('admin/cetak_all_dinkes/view1');?>" method="post" target="_blank">
    <?php

  }
?>
<!--<form action="<?php echo site_url('admin/cetak/view1');?>" method="post" target="_blank">-->
<button class="btn btn-info href="oi.php" item-print" id="item_print">Cetak Laporan</button></a>
<input type="hidden" name="tahun" value="<?php echo $tahun; ?>" />
<input type="hidden" name="bulan" value="<?php echo $bulan->angka; ?>" />
<input type="hidden" name="ttd1" value="<?php echo $ttd1; ?>" />
<input type="hidden" name="ttd2" value="<?php echo $ttd2; ?>" />
<input type="hidden" name="tgl" value="<?php echo $tgl; ?>" />
</form>

<br/>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/elephant.min.css">

            <table border="0" width="100%" >
            <tr>
              <td colspan="2" align="center"><h3>DAFTAR TAMBAHAN PENGHASILAN PEGAWAI NEGERI SIPIL DAN CALON PEGAWAI NEGERI SIPIL</h3></td>
            </tr>
            <tr>
              <td  align="left">SKPD/UPTD</td>
              <td  align="left">: <?php echo $unit->unit_kerja;?></td>
            </tr>
            <tr>
              <td  align="left">BULAN</td>
              <td  align="left">:
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

            <table id="demo-datatables-responsive-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">

              <tr>
                <th class="text-center" rowspan="3">NO</td>
                <th class="text-center" rowspan="3">NIP</td>
                <th rowspan="3">Nama</td>
                <th class="text-center" rowspan="3">Jabatan</td>
                <th rowspan="3">Jml TPP</td>
                <th class="text-center" colspan="20" align="center">Indikator Disiplin</td>
                <th class="text-center" colspan="2" align="center">Indikator Kinerja</td>
                <th rowspan="3">Jumlah TPP</td>
                <th rowspan="3">Capaian TPP</td>
                <th rowspan="3">Capaian Kinerja</td>
              </tr>

              <tr>
                <th class="text-center" colspan="3">Apel Masuk</td>
                <th class="text-center" colspan="3">Apel Pulang</td>
                <th class="text-center" colspan="3">Upacara Hari Senin</td>
                <th class="text-center" colspan="3">Upacara Hari Besar</td>
                <th class="text-center" colspan="3">Jam Kerja</td>
                <th  class="text-center"colspan="3">Hari Kerja</td>
                <th class="text-center" rowspan="2">Jumlah TPP (40%)</td>
                <th class="text-center" rowspan="2">Capaian TPP Disiplin</td>
                <th class="text-center" rowspan="2">Jumlah TPP (60%)</td>
                <th class="text-center" rowspan="2">Capaian TPP Kinerja</td>


              </tr>


              <tr>
                <th>T</td>
                <th>C</td>
                <th>Total</td>

                <th>T</td>
                <th>C</td>
                <th>Total</td>

                <th>T</td>
                <th>C</td>
                <th>Total</td>

                <th>T</td>
                <th>C</td>
                <th>Total</td>

                <th>T</td>
                <th>C</td>
                <th>Total</td>

                <th>T</td>
                <th>C</td>
                <th>Total</td>


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
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
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
              <tr>
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

              </tr>






              <?php
              $no = 1;
              $tot_pus_shift = 0;
              $tot_awal_pus_shift = 0;
              $tot_kinerja_1_pus_shift = 0;
              $tot_kinerja_2_pus_shift = 0;
              $tot_disiplin_1_pus_shift = 0;
              $tot_disiplin_2_pus_shift = 0;
              $tot_hari_kerja_pus_shift = 0;
              $tot_jam_kerja_pus_shift = 0;
              $tot_upacara_besar_pus_shift = 0;
              $tot_upacara_senin_pus_shift = 0;
              $tot_a_pulang_pus_shift = 0;
              $tot_a_masuk_pus_shift = 0;
              $tot_tpp_pus_shift = 0;

              foreach ($pus_shift as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target_pus_shift->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target_pus_shift->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target_pus_shift->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target_pus_shift->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target_pus_shift->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_pus_shift += ($peg->tpp_max);
                $tot_a_masuk_pus_shift += ($peg->bb_apel_masuk);
                $tot_a_pulang_pus_shift += ($peg->bb_apel_pulang);
                $tot_upacara_senin_pus_shift += ($peg->bb_hari_senin);
                $tot_upacara_besar_pus_shift += ($peg->bb_hari_besar);
                $tot_jam_kerja_pus_shift += ($peg->bb_jam_kerja);
                $tot_hari_kerja_pus_shift += ($peg->bb_hari_kerja);
                $tot_disiplin_1_pus_shift += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_pus_shift += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_pus_shift += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_pus_shift += ($peg->bb_kinerja);
                $tot_awal_pus_shift += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_pus_shift += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="4"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_pus_shift);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_pus_shift);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_pus_shift);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_pus_shift);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_pus_shift);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_pus_shift);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_pus_shift);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_pus_shift);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_pus_shift);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_pus_shift);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_pus_shift);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_pus_shift);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_pus_shift);?></b></td>

              </tr>


              <?php
              $no = 1;
              $tot_pus_6 = 0;
              $tot_awal_pus_6 = 0;
              $tot_kinerja_1_pus_6 = 0;
              $tot_kinerja_2_pus_6 = 0;
              $tot_disiplin_1_pus_6 = 0;
              $tot_disiplin_2_pus_6 = 0;
              $tot_hari_kerja_pus_6 = 0;
              $tot_jam_kerja_pus_6 = 0;
              $tot_upacara_besar_pus_6 = 0;
              $tot_upacara_senin_pus_6 = 0;
              $tot_a_pulang_pus_6 = 0;
              $tot_a_masuk_pus_6 = 0;
              $tot_tpp_pus_6 = 0;

              foreach ($pus_6 as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target_pus_6->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target_pus_6->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target_pus_6->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target_pus_6->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target_pus_6->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_pus_6 += ($peg->tpp_max);
                $tot_a_masuk_pus_6 += ($peg->bb_apel_masuk);
                $tot_a_pulang_pus_6 += ($peg->bb_apel_pulang);
                $tot_upacara_senin_pus_6 += ($peg->bb_hari_senin);
                $tot_upacara_besar_pus_6 += ($peg->bb_hari_besar);
                $tot_jam_kerja_pus_6 += ($peg->bb_jam_kerja);
                $tot_hari_kerja_pus_6 += ($peg->bb_hari_kerja);
                $tot_disiplin_1_pus_6 += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_pus_6 += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_pus_6 += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_pus_6 += ($peg->bb_kinerja);
                $tot_awal_pus_6 += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_pus_6 += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="4"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_pus_6);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_pus_6);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_pus_6);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_pus_6);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_pus_6);?></b></td>

              </tr>

              <tr>
                <td class="text-right" colspan="4"> <b>Total Keseluruhan</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp + $tot_tpp_pus_shift + $tot_tpp_pus_6);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk + $tot_a_masuk_pus_shift + $tot_a_masuk_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang + $tot_a_pulang_pus_shift + $tot_a_pulang_pus_6);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin + $tot_upacara_senin_pus_shift + $tot_upacara_senin_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar + $tot_upacara_besar_pus_shift + $tot_upacara_besar_pus_6);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja + $tot_jam_kerja_pus_shift + $tot_jam_kerja_pus_6);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja + $tot_hari_kerja_pus_shift + $tot_hari_kerja_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1 + $tot_disiplin_1_pus_shift + $tot_disiplin_1_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2 + $tot_disiplin_2_pus_shift + $tot_disiplin_2_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1 + $tot_kinerja_1_pus_shift + $tot_kinerja_1_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2 + $tot_kinerja_2_pus_shift + $tot_kinerja_2_pus_6);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal + $tot_awal_pus_shift + $tot_awal_pus_6);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot + $tot_pus_shift + $tot_pus_6);?></b></td>

              </tr>





            </table>









<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url();?>assets/js/elephant.min.js"></script>
<script src="<?php echo base_url();?>assets/js/application.min.js"></script>
<script src="<?php echo base_url();?>assets/js/demo.min.js"></script>
