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
			.tinggi
			{
				height: 35;
			}
</style>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/elephant.min.css">

<table border="0" width="100%" class="text3" >
<tr >
  <td class="td_no" colspan="2" align="center"><h5>TANDA TERIMA TAMBAHAN PENGHASILAN PEGAWAI NEGERI SIPIL DAN CALON PEGAWAI NEGERI SIPIL</h5></td>
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
                <th class="text-center" rowspan="2">NO</td>
                <th class="text-center" rowspan="2">NIP</td>
                <th rowspan="2">Nama</td>
                <th class="text-center" rowspan="2">Jabatan</td>
                <th class="text-center" rowspan="2">Jml TPP</td>
                <th class="text-center" colspan="3" align="center">Indikator Disiplin</td>
                <th class="text-center" colspan="3" align="center">Indikator Kinerja</td>
                <th class="text-center" rowspan="2">Jumlah TPP</td>
                <th class="text-center" rowspan="2">(%)</td>
                <th class="text-center" rowspan="2">Capaian TPP</td>
                <th class="text-center" rowspan="2">Pajak</td>
                <th class="text-center" rowspan="2">Total (Setelah Pajak)</td>
                <th class="text-center" rowspan="2">Zakat</td>
                  <th class="text-center"  rowspan="2">TPP Yang diterima</td>
										<th class="text-center" rowspan="2">Tanda Tangan</th>
              </tr>

              <tr class="text3">

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
                <tr class="text2 tinggi">
                  <td align="center"><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td  class="text-right"><?php echo number_format($peg->tpp_max);?></td>



                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja);?></td>

                  <td class="text-right"><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td class="text-right"><?php
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
                  <td class="text-right"><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td class="text-right">

										<?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));
                    }



                    ?>
                  </td>

                  <td class="text-right">

										<?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
									<td> </td>
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
									//$yussss = floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 );
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
							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian)?></b></td>
                <td colspan=""><b><?php echo number_format($tot6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>


							<?php
              $no = 1;
              $tot_rs_ok = 0;
              $tot1_rs_ok = 0;
              $tot2_rs_ok = 0;
              $tot3_rs_ok = 0;
              $tot4_rs_ok = 0;
              $tot5_rs_ok = 0;
              $tot6_rs_ok = 0;
              $tot7_rs_ok = 0;
              $tot8_rs_ok = 0;
              $tot9_rs_ok = 0;
              $yussss_rs_ok =0;
              $tabe_rs_ok =0;
              $tot_capaian_rs_ok =0;


              foreach ($rs_ok as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr class="text2 tinggi">
                  <td align="center"><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td  class="text-right"><?php echo number_format($peg->tpp_max);?></td>



                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja);?></td>

                  <td class="text-right"><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td class="text-right"><?php
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
                  <td class="text-right"><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td class="text-right">

										<?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));
                    }



                    ?>
                  </td>

                  <td class="text-right">

										<?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
									<td> </td>
                </tr>

								<?php
                $tot_rs_ok += ($peg->tpp_max);
                $tot1_rs_ok += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2_rs_ok += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3_rs_ok +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4_rs_ok += ($peg->bb_kinerja);
                $tot5_rs_ok += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6_rs_ok += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7_rs_ok += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian_rs_ok += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss_rs_ok= 0;
                }
                else {
									//$yussss = floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 );
                $yussss_rs_ok = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8_rs_ok += $yussss_rs_ok;


                if ($peg->agama <> 1)
                {
                  $tabe_rs_ok =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {
                $tabe_rs_ok = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9_rs_ok += $tabe_rs_ok;

                $no++;
              }

              ?>
							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1_rs_ok)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3_rs_ok)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5_rs_ok)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot6_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8_rs_ok)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9_rs_ok)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>



							<?php
              $no = 1;
              $tot_rs_shift = 0;
              $tot1_rs_shift = 0;
              $tot2_rs_shift = 0;
              $tot3_rs_shift = 0;
              $tot4_rs_shift = 0;
              $tot5_rs_shift = 0;
              $tot6_rs_shift = 0;
              $tot7_rs_shift = 0;
              $tot8_rs_shift = 0;
              $tot9_rs_shift = 0;
              $yussss_rs_shift =0;
              $tabe_rs_shift =0;
              $tot_capaian_rs_shift =0;


              foreach ($rs_shift as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr class="text2 tinggi">
                  <td align="center"><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td  class="text-right"><?php echo number_format($peg->tpp_max);?></td>



                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja);?></td>

                  <td class="text-right"><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td class="text-right"><?php
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
                  <td class="text-right"><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td class="text-right">

										<?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));
                    }



                    ?>
                  </td>

                  <td class="text-right">

										<?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
									<td> </td>
                </tr>

								<?php
                $tot_rs_shift += ($peg->tpp_max);
                $tot1_rs_shift += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2_rs_shift += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3_rs_shift +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4_rs_shift += ($peg->bb_kinerja);
                $tot5_rs_shift += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6_rs_shift += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7_rs_shift += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian_rs_shift += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss_rs_shift= 0;
                }
                else {
									//$yussss = floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 );
                $yussss_rs_shift = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8_rs_shift += $yussss_rs_shift;


                if ($peg->agama <> 1)
                {
                  $tabe_rs_shift =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {
                $tabe_rs_shift = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9_rs_shift += $tabe_rs_shift;

                $no++;
              }

              ?>
							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1_rs_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3_rs_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5_rs_shift)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot6_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8_rs_shift)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9_rs_shift)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>



							<?php
              $no = 1;
              $tot_rs_6 = 0;
              $tot1_rs_6 = 0;
              $tot2_rs_6 = 0;
              $tot3_rs_6 = 0;
              $tot4_rs_6 = 0;
              $tot5_rs_6 = 0;
              $tot6_rs_6 = 0;
              $tot7_rs_6 = 0;
              $tot8_rs_6 = 0;
              $tot9_rs_6 = 0;
              $yussss_rs_6 =0;
              $tabe_rs_6 =0;
              $tot_capaian_rs_6 =0;


              foreach ($rs_6 as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr class="text2 tinggi">
                  <td align="center"><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td  class="text-right"><?php echo number_format($peg->tpp_max);?></td>



                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td class="text-right"><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja);?></td>

                  <td class="text-right"><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                  <td class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?></td>
                  <td class="text-right"><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
                  <td class="text-right"><?php
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
                  <td class="text-right"><?php

                  echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  ?> </td>

                  <td class="text-right">

										<?php
                    if ($peg->agama <> 1)
                    {
                      echo "-";
                    }
                    else {
                    echo number_format( floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))));
                    }



                    ?>
                  </td>

                  <td class="text-right">

										<?php

                    if ($peg->agama <> 1)
                    {
                      echo number_format(  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );
                    }
                    else {
                    echo number_format(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  );
                  }


                     ?>




                  </td>
									<td> </td>
                </tr>

								<?php
                $tot_rs_6 += ($peg->tpp_max);
                $tot1_rs_6 += ($peg->tpp_max*$bobot->indikator_disiplin/100);
                $tot2_rs_6 += ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $tot3_rs_6 +=  ($peg->tpp_max*$bobot->indikator_kinerja/100);
                $tot4_rs_6 += ($peg->bb_kinerja);
                $tot5_rs_6 += (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));
                //$tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
                $tot6_rs_6 += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7_rs_6 += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian_rs_6 += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss_rs_6= 0;
                }
                else {
									//$yussss = floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 );
                $yussss_rs_6 = floor(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8_rs_6 += $yussss_rs_6;


                if ($peg->agama <> 1)
                {
                  $tabe_rs_6 =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {
                $tabe_rs_6 = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - floor(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9_rs_6 += $tabe_rs_6;

                $no++;
              }

              ?>
							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL</b></td>
                <td colspan=""><b><?php echo number_format($tot_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot6_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>

							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL KESEKURUHAN</b></td>
                <td colspan=""><b><?php echo number_format($tot + $tot_rs_ok + $tot_rs_shift + $tot_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot1 + $tot1_rs_ok + $tot1_rs_shift + $tot1_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot2 + $tot2_rs_ok + $tot2_rs_shift + $tot2_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot3 + $tot3_rs_ok + $tot3_rs_shift + $tot3_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot4 + $tot4_rs_ok + $tot4_rs_shift + $tot4_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot5 + $tot5_rs_ok + $tot5_rs_shift + $tot5_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><b><?php echo number_format($tot_capaian + $tot_capaian_rs_ok + $tot_capaian_rs_shift + $tot_capaian_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot6 + $tot6_rs_ok + $tot6_rs_shift + $tot6_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot7 + $tot7_rs_ok + $tot7_rs_shift + $tot7_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot8 + $tot8_rs_ok + $tot8_rs_shift + $tot8_rs_6)?></b></td>
                <td colspan=""><b><?php echo number_format($tot9 + $tot9_rs_ok + $tot9_rs_shift + $tot9_rs_6)?></b></td>
                <td colspan="">&nbsp;</td>
              </tr>









            </table>

<br>
						<table class="hilang" border="0" width="100%">
              <tr class="text-center text3">
								<td class="td_no"  width='50%'><b> MENGETAHUI / MENYETUJUI, </b></td>
								<td class="td_no" width='50%'>
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


								//echo tgl_indo(date('Y-m-d'));
								echo tgl_indo($tgl);

									?>
									</b>
								</td>
							</tr>
              <tr class="text-center text3">
								<td class="td_no" width='50%'><b>
								<?php echo strtoupper($ttd->jabatan);?>
							</b></td>
								<td class="td_no" width='50%'>
									<b>
									PENGELOLA DATA TPP
								</b>
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'>&nbsp;</td>
								<td class="td_no" width='50%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'>&nbsp;</td>
								<td class="td_no" width='50%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'>&nbsp;</td>
								<td class="td_no" width='50%'>
									&nbsp;
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'><b><u>
									<?php echo $ttd->gelar_depan.' '.$ttd->nama.' '.$ttd->gelar_belakang;?></u></b></td>
								<td class="td_no" width='50%'><b><u>
									<?php echo $ttd2->gelar_depan.' '.$ttd2->nama.' '.$ttd2->gelar_belakang;?></u></b>
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'><?php echo 'Pangkat : '. $ttd->pangkat;?></td>
								<td class="td_no" width='50%'>
									<?php echo 'Pangkat : '. $ttd2->pangkat;?>
								</td>
							</tr>
							<tr class="text-center text3">
								<td class="td_no" width='50%'><?php echo 'NIP '. $ttd->nik;?></td>
								<td class="td_no" width='50%'>
									<?php echo 'NIP '. $ttd2->nik;?>
								</td>
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
