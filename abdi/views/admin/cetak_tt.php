<?php
  $iddd = $this->session->userdata('id_unit_kerja');
  $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
    $unit=$iddd;
  if ($query->kode == 0)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2');?>" method="post" target="_blank">
    <?php
  }
  else if ($query->kode == 1)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_sd');?>" method="post" target="_blank">
    <?php

  }
  else if ($query->kode == 2)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_sd');?>" method="post" target="_blank">
    <?php

  }
  else if ($query->kode == 3)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_pus_6');?>" method="post" target="_blank">
    <?php
  }
  else if ($query->kode == 4)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_pus_shift');?>" method="post" target="_blank">
    <?php
  }
  else if ($query->kode == 5)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_sd');?>" method="post" target="_blank">
    <?php
  }

  //rs start
  else if ($query->kode == 6)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_rs_ok');?>" method="post" target="_blank">
    <?php

  }
  else if ($query->kode == 7)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_rs_shift');?>" method="post" target="_blank">

    <?php

  }
  else if ($query->kode == 8)
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2_rs_6');?>" method="post" target="_blank">
    <?php

  }

  //rs end


  else
  {
    ?>
    <form action="<?php echo site_url('admin/cetak/view2');?>" method="post" target="_blank">
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
              <td  align="left">: <?php echo $query->unit_kerja;?></td>
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
              $tot_i=0;
              $toti=0;
              $tt_tpp=0;
              $hp=0;


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
                   <td
                  <?php
                  if (($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100 >=100)
                  {
                    echo "'background-color: yellow;red: black'";

                  }
                  ?>
                    class="text-center">    <?php echo number_format(($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)/($peg->tpp_max*$bobot->indikator_disiplin/100)*100,2) . ' %'?></td>
                  <td><?php echo number_format($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                    <td
                  <?php
                  if ($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100 )>=100)
                  {
                      echo "'background-color: yellow;red: black";

                  }

                  ?>
                  class="text-center"><?php echo number_format($peg->bb_kinerja/($peg->tpp_max*$bobot->indikator_kinerja/100)*100,2) .' %'?></td>
                  <td><?php echo number_format($peg->bb_kinerja);?></td>

                  <td><?php echo number_format(($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100));?></td>
                 <td
                  <?php
                  if (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 >=100)
                  {
                      echo "'background-color: yellow;red: black";

                  }

                  ?>
                  class="text-center"><?php echo number_format(($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) / (($peg->tpp_max*$bobot->indikator_disiplin/100) + ($peg->tpp_max*$bobot->indikator_kinerja/100))*100 ,2 ) .'%'  ;?>
                  </td>
                  <td><?php echo number_format($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));?></td>
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
                    echo number_format(round($hsp));
                    // echo $hsp;

                }
                  ?> </td>
                  <td><?php

                  if (($triwulan>0) and ($unit=='13')){
                    $ini_pajak=($insentif_kotor-($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)+$pra['p-terima']+$pra['r-terima'])));
                  echo number_format ($ini_pajak);
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
                              echo number_format(round($zakat));
                              }else{
                                $zakat= (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025));
                                echo number_format(($zakat));
                              }


                    //echo number_format(round(   (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) )    ) *   2.5/100 ));
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
                    $agm= round((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  )) - round(((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025))  ;
                  }

                  if (($triwulan>0) and ($unit=='13')){
                // echo number_format($agm+$pr->total);
                 echo number_format($ini_pajak-$zakat);
                }else{


              echo number_format($agm);
                 } ?>





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
                $tot6 += (round($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))));
                //$tot7 += (($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  );
                $tot7 += (  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  );

                $tot_capaian += ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja));

                if ($peg->agama <> 1)
                {
                  $yussss= 0;
                }
                else {
                // $yussss = round(  (((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))) )* 0.025)));
              $yussss= round($zakat);
                }

                //$tot8 += ((($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)) - ($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))) )* 0.025);
                $tot8 += $yussss;


                if ($peg->agama <> 1)
                {
                  $tabe =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  - round(($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))))  ;
                  $tabe =  ($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja))  -($pajak*($peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja)))  ;

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
              <tr>
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
                <td colspan=""><?php echo number_format($tot_capaian)?> </td>
                <?php if (($triwulan>0) and ($unit=='13')){   ?>
                  <td><b><?php echo 'Rp. '. number_format($toti);?></b> </td>

                  <td colspan=""><b><?php echo 'Rp. '. number_format($tot_capaian+$toti)?></b> </td>
                  <td colspan=""><b><?php echo 'Rp. '. number_format($hp)?> </b></td>
                  <td colspan=""><b><?php echo 'Rp. '. number_format(($tot_capaian+$toti)-$hp)?> </b></td>
                  <td colspan=""><b><?php echo 'Rp. '. number_format($tot8)?></b></td>
                  <td colspan=""><b><?php echo 'Rp. '. number_format(round(($tot_capaian+$toti)-$hp)-$tot8)?></b></td>

                  <?php }else{ ?>
                  <td colspan=""><b><?php echo 'Rp. '. number_format($hp)?></b></td>

                            <td colspan=""><b><?php echo 'Rp. '. number_format($tot_capaian-$hp)?> </b> </td>
                            <td colspan=""> <b><?php echo 'Rp. '.number_format($tot8)?></b></td>
                            <td colspan=""><b><?php echo 'Rp. '. number_format(round(($tot_capaian-$hp)-$tot8))?></b></td>

                  <?php } ?>


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
