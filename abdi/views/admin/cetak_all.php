<?php
  $iddd = $this->session->userdata('id_unit_kerja');
  $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
  if ($query->kode == 0)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak_all/view1');?>" method="post" target="_blank">
    <?php
  }
  else if ($query->kode == 1)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view1_sd');?>" method="post" target="_blank">
    <?php

  }
  else if ($query->kode == 2)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view1_sd');?>" method="post" target="_blank">
    <?php

  }
  else if ($query->kode == 3)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view1');?>" method="post" target="_blank">
    <?php

  }
  else
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view1');?>" method="post" target="_blank">
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
                <th rowspan="3">Sekolah</td>
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
                  <td><?php echo $peg->unit_kerja;?></td>
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
                  <td
                  <?php
                  if ( ($pencapaian/$peg->tpp_max)*100 >= 100 )
                  {
                    echo "style='background-color: yellow;red: black'";
                  }
                  ?>
                  ><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
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
                <td class="text-right" colspan="5"> <b>Total</br></td>
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
              $tot_skb = 0;
              $tot_awal_skb = 0;
              $tot_kinerja_1_skb = 0;
              $tot_kinerja_2_skb = 0;
              $tot_disiplin_1_skb = 0;
              $tot_disiplin_2_skb = 0;
              $tot_hari_kerja_skb = 0;
              $tot_jam_kerja_skb = 0;
              $tot_upacara_besar_skb = 0;
              $tot_upacara_senin_skb = 0;
              $tot_a_pulang_skb = 0;
              $tot_a_masuk_skb = 0;
              $tot_tpp_skb = 0;

              foreach ($skb as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->unit_kerja;?></td>
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
                  <td
                  <?php
                  if ( ($pencapaian/$peg->tpp_max)*100 >= 100 )
                  {
                    echo "style='background-color: yellow;red: black'";
                  }

                  ?>
                  ><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_skb += ($peg->tpp_max);
                $tot_a_masuk_skb += ($peg->bb_apel_masuk);
                $tot_a_pulang_skb += ($peg->bb_apel_pulang);
                $tot_upacara_senin_skb += ($peg->bb_hari_senin);
                $tot_upacara_besar_skb += ($peg->bb_hari_besar);
                $tot_jam_kerja_skb += ($peg->bb_jam_kerja);
                $tot_hari_kerja_skb += ($peg->bb_hari_kerja);
                $tot_disiplin_1_skb += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_skb += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_skb += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_skb += ($peg->bb_kinerja);
                $tot_awal_skb += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_skb += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="5"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_skb);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_skb);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_skb);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_skb);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_skb);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_skb);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_skb);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_skb);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_skb);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_skb);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_skb);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_skb);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_skb);?></b></td>

              </tr>




              <?php
              $no = 1;
              $tot_sd = 0;
              $tot_awal_sd = 0;
              $tot_kinerja_1_sd = 0;
              $tot_kinerja_2_sd = 0;
              $tot_disiplin_1_sd = 0;
              $tot_disiplin_2_sd = 0;
              $tot_hari_kerja_sd = 0;
              $tot_jam_kerja_sd = 0;
              $tot_upacara_besar_sd = 0;
              $tot_upacara_senin_sd = 0;
              $tot_a_pulang_sd = 0;
              $tot_a_masuk_sd = 0;
              $tot_tpp_sd = 0;

              foreach ($peg1 as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->unit_kerja;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target1->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target1->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target1->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td
                  <?php
                  if ( ($pencapaian/$peg->tpp_max)*100 >= 100 )
                  {
                    echo "style='background-color: yellow;red: black'";
                  }

                  ?>
                  ><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_sd += ($peg->tpp_max);
                $tot_a_masuk_sd += ($peg->bb_apel_masuk);
                $tot_a_pulang_sd += ($peg->bb_apel_pulang);
                $tot_upacara_senin_sd += ($peg->bb_hari_senin);
                $tot_upacara_besar_sd += ($peg->bb_hari_besar);
                $tot_jam_kerja_sd += ($peg->bb_jam_kerja);
                $tot_hari_kerja_sd += ($peg->bb_hari_kerja);
                $tot_disiplin_1_sd += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_sd += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_sd += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_sd += ($peg->bb_kinerja);
                $tot_awal_sd += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_sd += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="5"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_sd);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_sd);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_sd);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_sd);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_sd);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_sd);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_sd);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_sd);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_sd);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_sd);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_sd);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_sd);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_sd);?></b></td>

              </tr>


              <?php
              $no = 1;
              $tot_smp = 0;
              $tot_awal_smp = 0;
              $tot_kinerja_1_smp = 0;
              $tot_kinerja_2_smp = 0;
              $tot_disiplin_1_smp = 0;
              $tot_disiplin_2_smp = 0;
              $tot_hari_kerja_smp = 0;
              $tot_jam_kerja_smp = 0;
              $tot_upacara_besar_smp = 0;
              $tot_upacara_senin_smp = 0;
              $tot_a_pulang_smp = 0;
              $tot_a_masuk_smp = 0;
              $tot_tpp_smp = 0;

              foreach ($peg2 as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->unit_kerja;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target1->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target1->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target1->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td
                  <?php
                  if ( ($pencapaian/$peg->tpp_max)*100 >= 100 )
                  {
                    echo "style='background-color: yellow;red: black'";
                  }

                  ?>
                  ><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_smp += ($peg->tpp_max);
                $tot_a_masuk_smp += ($peg->bb_apel_masuk);
                $tot_a_pulang_smp += ($peg->bb_apel_pulang);
                $tot_upacara_senin_smp += ($peg->bb_hari_senin);
                $tot_upacara_besar_smp += ($peg->bb_hari_besar);
                $tot_jam_kerja_smp += ($peg->bb_jam_kerja);
                $tot_hari_kerja_smp += ($peg->bb_hari_kerja);
                $tot_disiplin_1_smp += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_smp += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_smp += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_smp += ($peg->bb_kinerja);
                $tot_awal_smp += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_smp += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="5"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_smp);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_smp);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_smp);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_smp);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_smp);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_smp);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_smp);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_smp);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_smp);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_smp);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_smp);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_smp);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_smp);?></b></td>

              </tr>



              <?php
              $no = 1;
              $tot_tk = 0;
              $tot_awal_tk = 0;
              $tot_kinerja_1_tk = 0;
              $tot_kinerja_2_tk = 0;
              $tot_disiplin_1_tk = 0;
              $tot_disiplin_2_tk = 0;
              $tot_hari_kerja_tk = 0;
              $tot_jam_kerja_tk = 0;
              $tot_upacara_besar_tk = 0;
              $tot_upacara_senin_tk = 0;
              $tot_a_pulang_tk = 0;
              $tot_a_masuk_tk = 0;
              $tot_tpp_tk = 0;

              foreach ($tk as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->unit_kerja;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>

                  <td><?php echo number_format($target1->apel_masuk);?></td>
                  <td><?php echo number_format($peg->tot_apel_masuk);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk);?></td>

                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_apel_pulang);?></td>
                  <td><?php echo number_format($peg->bb_apel_pulang);?></td>

                  <td><?php echo number_format($target1->upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_senin);?></td>
                  <td><?php echo number_format($peg->bb_hari_senin);?></td>

                  <td><?php echo number_format($target1->hari_besar);?></td>
                  <td><?php echo number_format($peg->tot_upacara_hari_besar);?></td>
                  <td><?php echo number_format($peg->bb_hari_besar);?></td>

                  <td><?php echo $peg->target_jam;?></td>
                  <td><?php echo $peg->capaian_jam;?></td>
                  <td><?php echo number_format($peg->bb_jam_kerja);?></td>


                  <td><?php echo number_format($target1->hari_kerja);?></td>
                  <td><?php echo number_format($peg->tot_masuk_kerja);?></td>
                  <td><?php echo number_format($peg->bb_hari_kerja);?></td>

                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td
                  <?php
                  if ( ($pencapaian/$peg->tpp_max)*100 >= 100 )
                  {
                    echo "style='background-color: yellow;red: black'";
                  }

                  ?>
                  ><?php echo number_format(($pencapaian/$peg->tpp_max)*100,2) . ' %' ?></td>
                </tr>


                <?php
                $tot_tpp_tk += ($peg->tpp_max);
                $tot_a_masuk_tk += ($peg->bb_apel_masuk);
                $tot_a_pulang_tk += ($peg->bb_apel_pulang);
                $tot_upacara_senin_tk += ($peg->bb_hari_senin);
                $tot_upacara_besar_tk += ($peg->bb_hari_besar);
                $tot_jam_kerja_tk += ($peg->bb_jam_kerja);
                $tot_hari_kerja_tk += ($peg->bb_hari_kerja);
                $tot_disiplin_1_tk += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot_disiplin_2_tk += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot_kinerja_1_tk += ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot_kinerja_2_tk += ($peg->bb_kinerja);
                $tot_awal_tk += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                $tot_tk += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));
                $no++;
              }
              ?>
              <tr>
                <td class="text-right" colspan="5"> <b>Total</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp_tk);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang_tk);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar_tk);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal_tk);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot_tk);?></b></td>

              </tr>

              <tr>
                <td class="text-right" colspan="5"> <b>Total Keseluruhan</br></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_tpp + $tot_tpp_sd + $tot_tpp_smp + $tot_tpp_skb + $tot_tpp_tk);?></b></td><td></td>
                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_a_masuk + $tot_a_masuk_sd + $tot_a_masuk_smp + $tot_a_masuk_skb + $tot_a_masuk_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_a_pulang + $tot_a_pulang_sd + $tot_a_pulang_smp + $tot_a_pulang_skb + $tot_a_pulang_tk);?></b></td><td></td>

                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_upacara_senin + $tot_upacara_senin_sd + $tot_upacara_senin_smp + $tot_upacara_senin_skb + $tot_upacara_senin_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_upacara_besar + $tot_upacara_besar_sd + $tot_upacara_besar_smp + $tot_upacara_besar_skb + $tot_upacara_besar_tk);?></b></td><td></td>



                  <td></td><td><b><?php echo 'Rp. '. number_format($tot_jam_kerja + $tot_jam_kerja_sd +$tot_jam_kerja_smp +$tot_jam_kerja_skb +$tot_jam_kerja_tk);?></b></td>
                  <td></td><td></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_hari_kerja + $tot_hari_kerja_sd +$tot_hari_kerja_smp +$tot_hari_kerja_skb +$tot_hari_kerja_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_1 + $tot_disiplin_1_sd +$tot_disiplin_1_smp +$tot_disiplin_1_skb +$tot_disiplin_1_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_disiplin_2 + $tot_disiplin_2_sd + $tot_disiplin_2_smp + $tot_disiplin_2_skb + $tot_disiplin_2_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_1 + $tot_kinerja_1_sd + $tot_kinerja_1_smp + $tot_kinerja_1_skb + $tot_kinerja_1_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_kinerja_2 + $tot_kinerja_2_sd + $tot_kinerja_2_smp + $tot_kinerja_2_skb + $tot_kinerja_2_tk);?></b></td>
                  <td><b><?php echo 'Rp. '. number_format($tot_awal + $tot_awal_sd + $tot_awal_smp + $tot_awal_skb + $tot_awal_tk);?></b></td>

                <td><b><?php echo 'Rp. '. number_format($tot + $tot_sd + $tot_smp + $tot_skb + $tot_tk);?></b></td>

              </tr>
            </table>









<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url();?>assets/js/elephant.min.js"></script>
<script src="<?php echo base_url();?>assets/js/application.min.js"></script>
<script src="<?php echo base_url();?>assets/js/demo.min.js"></script>
