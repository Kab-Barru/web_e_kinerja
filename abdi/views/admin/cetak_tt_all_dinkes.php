<?php
  $iddd = $this->session->userdata('id_unit_kerja');
  $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
  if ($query->kode == 0)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak_all_dinkes/view2');?>" method="post" target="_blank">
    <?php
  }

  else
  {
    ?>
    <form action="<?php echo site_url('admin/cetak_all_dinkes/view2');?>" method="post" target="_blank">
    <?php

  }
?>

<!--<form action="<?php echo site_url('admin/cetak/view2');?>" method="post" target="_blank">-->
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
              <td colspan="2" align="center"><h3>TANDA TERIMA TAMBAHAN PENGHASILAN PEGAWAI NEGERI SIPIL DAN CALON PEGAWAI NEGERI SIPIL</h3></td>
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
                <th class="text-center" rowspan="2">NO</th>
                <th class="text-center" rowspan="2">NIP</th>
                <th rowspan="2">Nama</th>
                <th class="text-center" rowspan="2">Jabatan</th>
                <th rowspan="2">Jml TPP</td>
                <th class="text-center" colspan="3" align="center">Indikator Disiplin</th>
                <th class="text-center" colspan="3" align="center">Indikator Kinerja</th>
                <th rowspan="2">Jumlah TPP</th>
                <th rowspan="2">(%)</th>
                <th rowspan="2">Capaian TPP</th>
                <th rowspan="2">Pajak</th>
                <th rowspan="2">Total (Setelah Pajak)</th>
                <th rowspan="2">Zakat</th>
                <th rowspan="2">TPP Yang diterima</th>
                <th rowspan="2">Tanda Tangan</th>
              </tr>

              <tr>

                <th class="text-center" >Jumlah TPP (40%)</td>
                <th class="text-center" >(%)</td>
                <th class="text-center" >Capaian TPP Disiplin</td>
                <th class="text-center" >Jumlah TPP (60%)</td>
                <th class="text-center" >(%)</td>
                <th class="text-center" >Capaian TPP Kinerja</td>



              </tr>


              <?php
              $no = 1;
              $tot = 0;
              $tot1 = 0;
              $tot2 = 0;
              $tot3 = 0;
              $tot4 = 0;
              $tot5 = 0;
              $tot6 = 0;
              $tot7 = 0;
              $tot8 = 0;
              $tot9 = 0;
              $yussss =0;
              $tabe =0;
              $tot_capaian =0;


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



                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php
                  $golongan = substr($peg->golongan,0,3);
                  if ($golongan == 'IV/')
                  {
                    $pajak = 15/100;
                  }
                  else if ($golongan == 'III')
                  {
                    $pajak = 5/100;
                  }
                  else
                  {
                    $pajak = 0;
                  }

                  echo number_format(floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                  // pajak
                  ?> </td>
                  <td><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td>


                    <?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));

                    //echo number_format(floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 ));
                    }



                    ?>
                   </td>

                  <td>


                    <?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  floor(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  )) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
                  <td></td>
                </tr>


                <?php
                $tot += ($peg->tpp_max);
                $tot1 += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2 += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3 +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4 += ($peg->bb_kinerja);
                $tot5 += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6 += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7 += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss= 0;
                }
                else {
                $yussss = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8 += $yussss;


                if ($peg->agama <> 1)
                {
                  $tabe =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {

                $tabe = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9 += $tabe;

                $no++;
              }

              ?>
              <tr>
                <td colspan="4" align="right"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian)?></td>
                <td colspan=""><b><?php echo number_format($tot6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>




              <?php
              $no = 1;
              $tot_pus_shift = 0;
              $tot1_pus_shift = 0;
              $tot2_pus_shift = 0;
              $tot3_pus_shift = 0;
              $tot4_pus_shift = 0;
              $tot5_pus_shift = 0;
              $tot6_pus_shift = 0;
              $tot7_pus_shift = 0;
              $tot8_pus_shift = 0;
              $tot9_pus_shift = 0;
              $yussss_pus_shift =0;
              $tabe_pus_shift =0;
              $tot_capaian_pus_shift =0;


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



                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php
                  $golongan = substr($peg->golongan,0,3);
                  if ($golongan == 'IV/')
                  {
                    $pajak = 15/100;
                  }
                  else if ($golongan == 'III')
                  {
                    $pajak = 5/100;
                  }
                  else
                  {
                    $pajak = 0;
                  }

                  echo number_format(floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                  // pajak
                  ?> </td>
                  <td><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td>


                    <?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));

                    //echo number_format(floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 ));
                    }



                    ?>
                   </td>

                  <td>


                    <?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  floor(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  )) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
                  <td></td>
                </tr>


                <?php
                $tot_pus_shift += ($peg->tpp_max);
                $tot1_pus_shift += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2_pus_shift += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3_pus_shift +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4_pus_shift += ($peg->bb_kinerja);
                $tot5_pus_shift += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6_pus_shift += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7_pus_shift += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian_pus_shift += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss_pus_shift= 0;
                }
                else {
                $yussss_pus_shift = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8_pus_shift += $yussss_pus_shift;


                if ($peg->agama <> 1)
                {
                  $tabe_pus_shift =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {

                $tabe_pus_shift = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9_pus_shift += $tabe_pus_shift;

                $no++;
              }

              ?>
              <tr>
                <td colspan="4" align="right"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1_pus_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3_pus_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5_pus_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian_pus_shift)?></td>
                <td colspan=""><b><?php echo number_format($tot6_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8_pus_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9_pus_shift)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>


              <?php
              $no = 1;
              $tot_pus_6 = 0;
              $tot1_pus_6 = 0;
              $tot2_pus_6 = 0;
              $tot3_pus_6 = 0;
              $tot4_pus_6 = 0;
              $tot5_pus_6 = 0;
              $tot6_pus_6 = 0;
              $tot7_pus_6 = 0;
              $tot8_pus_6 = 0;
              $tot9_pus_6 = 0;
              $yussss_pus_6 =0;
              $tabe_pus_6 =0;
              $tot_capaian_pus_6 =0;


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



                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td><?php
                  $golongan = substr($peg->golongan,0,3);
                  if ($golongan == 'IV/')
                  {
                    $pajak = 15/100;
                  }
                  else if ($golongan == 'III')
                  {
                    $pajak = 5/100;
                  }
                  else
                  {
                    $pajak = 0;
                  }

                  echo number_format(floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                  // pajak
                  ?> </td>
                  <td><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td>


                    <?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));

                    //echo number_format(floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 ));
                    }



                    ?>
                   </td>

                  <td>


                    <?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  floor(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  )) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
                  <td></td>
                </tr>


                <?php
                $tot_pus_6 += ($peg->tpp_max);
                $tot1_pus_6 += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2_pus_6 += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3_pus_6 +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4_pus_6 += ($peg->bb_kinerja);
                $tot5_pus_6 += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6_pus_6 += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7_pus_6 += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian_pus_6 += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss_pus_6= 0;
                }
                else {
                $yussss_pus_6 = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8_pus_6 += $yussss_pus_6;


                if ($peg->agama <> 1)
                {
                  $tabe_pus_6 =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {

                $tabe_pus_6 = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9_pus_6 += $tabe_pus_6;

                $no++;
              }

              ?>
              <tr>
                <td colspan="4" align="right"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian_pus_6)?></td>
                <td colspan=""><b><?php echo number_format($tot6_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>



              <tr>
                <td colspan="4" align="right"><b>TOTAL KESELURUHAN</b></td>
                <td colspan=""><b><?php echo number_format($tot  + $tot_pus_shift + $tot_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1 + $tot1_pus_shift +$tot1_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2 + $tot2_pus_shift + $tot2_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3 + $tot3_pus_shift + $tot3_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4 + $tot4_pus_shift + $tot4_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5 + $tot5_pus_shift + $tot5_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian + $tot_capaian_pus_shift + $tot_capaian_pus_6)?></td>
                <td colspan=""><b><?php echo number_format($tot6 + $tot6_pus_shift + $tot6_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7 + $tot7_pus_shift + $tot7_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8 + $tot8_pus_shift + $tot8_pus_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9 + $tot9_pus_shift + $tot9_pus_6)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>









            </table>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url();?>assets/js/elephant.min.js"></script>
<script src="<?php echo base_url();?>assets/js/application.min.js"></script>
<script src="<?php echo base_url();?>assets/js/demo.min.js"></script>
