<script>
window.print();
</script>
<?php
$iddd = $this->session->userdata('id_unit_kerja');
$query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
	$unit=$iddd;

 ?>
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
  <td class="td_no" align="left">: <?php echo $query->unit_kerja;?></td>
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
									<?php
									$this->db->where('bulan',$bulan->angka);
									$tr=$this->db->get('triwulan');
									$triwulan=$tr->num_rows();
									$trw=$tr->row();

									 ?>
									 <?php if (($triwulan>0) and ($unit=='13')){ ?>
												<th rowspan="2">Insentif </br>Pajak dan Retribusi</th>
												<th rowspan="2">Total Capaian Tpp</th>
									 <?php } ?>
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
             $tot_i=0;
						 $toti=0;
						 $tt_tpp=0;
						 $hp=0;

              foreach ($peg as $peg) {
                $pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>
                <tr class="text2 tinggi">
                  <td><?php echo $no;?></td>
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
									<?php if (($triwulan>0) and ($unit=='13')){ ?>
                    <td>
                      <?php

                    $cr= array('nip'=>$peg->nik,
                    'triwulan'=>$trw->triwulan,
                    'tahun'=>$tahun);
                    $this->db->where($cr);

                    $pr=$this->db->get('insentif_bapenda')->row();
                      $this->db->where($cr);
                    $pra=$this->db->get('insentif_bapenda')->row_array();
                    $tot2=$pra['p-terima']+$pra['r-terima'];
                    echo number_format($tot2);
                     $insentif_kotor=($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima']);
                     ?>
                     </td>

                     <td> <?php  echo number_format($insentif_kotor);?> </td>
                  <?php } ?>
                  <?php
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


                  $hasil_pajak=$pajak*($peg->bb_kinerja + $peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?>
               <td>
              <?php
                  if (($triwulan>0) and ($unit=='13')){
                    $hsp=($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima']));
                    echo number_format(round($hsp));

                }else{
                    $hsp=$hasil_pajak;
										          $hsp=$hasil_pajak;
                    echo number_format(round($hsp));
										      // echo $hsp;

                }
                  ?> </td>
                  <td><?php

                  if (($triwulan>0) and ($unit=='13')){
                  echo number_format(($insentif_kotor-($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima']))));
                  }else{
                    echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                  }



                  // pajak
                  ?> </td>


                  <td>


                    <?php
                    if ($peg->agama <> 1)
                    {

                      echo "0";
                    }
                    else {
                              if (($triwulan>0) and ($unit=='13')){
                                // $no_zakat=($insentif_kotor-($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima'])));
                                $zakat=($insentif_kotor-($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima'])))*0.025;
                              echo number_format($zakat);
                              }else{
                                $zakat= (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025));
                                echo number_format( round($zakat));
                              }


                    //echo number_format(floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 ));
                    }



                    ?>

                   </td>




                  <td>


                    <?php

                    if ($peg->agama <> 1)
                    {
                      $agm=  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                    }
                    else {
                    $agm= round(  (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  )) - round(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - floor(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
                  }

                  if (($triwulan>0) and ($unit=='13')){
                echo number_format($agm+$pr->total);
                }else{

              echo number_format($agm);
                 } ?>






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
                $tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));
            ///   $tot6 += ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)));

							  // $tot6 += (floor($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));

							  //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );


							  $tot7 += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

								//$tot7 += ( ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );


                $tot_capaian += ($peg->bb_kinerja+($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss= 0;
                }
                else {
									//$yussss = floor(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 );
              $yussss= round($zakat);
							  // $yussss= $zakat;
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8 += $yussss;


                if ($peg->agama <> 1)
                {
                  $tabe =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                }
                else {
                $tabe = (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ) - round(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
              }

                //$tot9 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ) - ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025));
                $tot9 += $tabe;
								if (($triwulan>0) and ($unit=='13')){
														$tot_i+=$pr->total;
														  $toti+=$pra['p-terima']+$pra['r-terima'];
													}
													     $hp+=round($hsp);
                $no++;
              }

              ?>
							<tr align="right" class="text2 tinggi">
								<td colspan="4"><b>TOTAL</b></td>
                <td colspan=""><?php echo number_format($tot)?></td>
                <td colspan=""><?php echo number_format($tot1)?></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><?php echo number_format($tot2)?></td>
                <td colspan=""><?php echo number_format($tot3)?></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><?php echo number_format($tot4)?></td>
                <td colspan=""><?php echo number_format($tot5)?></td>
                <td colspan="">&nbsp;</td>
                <td colspan=""><?php echo number_format($tot_capaian)?></td>
								<?php if (($triwulan>0) and ($unit=='13')){   ?>
									<td><b><?php echo 'Rp. '. number_format($toti);?></b></td>
									<td colspan=""><b><?php echo 'Rp. '. number_format($tot_capaian+$toti)?></b> </td>
									<td colspan=""><b><?php echo 'Rp. '. number_format($hp)?> </b></td>
									<td colspan=""><b><?php echo 'Rp. '. number_format(($tot_capaian+$toti)-$hp)?> </b></td>
									<td colspan=""><b><?php echo 'Rp. '. number_format($tot8)?></b></td>
									<td colspan=""><b><?php echo 'Rp. '. number_format((($tot_capaian+$toti)-$hp)-$tot8)?></b></td>


									<?php }else{ ?>
														<td colspan=""><b><?php echo 'Rp. '. number_format($hp)?></b> </td>
														<td colspan=""><b><?php echo 'Rp. '. number_format($tot_capaian-$hp)?> </b> </td>
														<td colspan=""> <b><?php echo 'Rp. '.number_format($tot8)?></b></td>
														<td colspan=""><b><?php echo 'Rp. '. number_format(($tot_capaian-$hp)-$tot8)?></b></td>

									<?php } ?>
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
