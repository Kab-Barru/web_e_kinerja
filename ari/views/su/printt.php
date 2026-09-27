<?php
  if ($unit->kode == 0)
  {
    ?>
    <form action="<?php echo site_url('su/select_printt/view1/'.$this->uri->segment(4));?>" method="post" target="_blank">
    <?php
    $db = "pro_tpp_detil";
  }
  else if ($unit->kode == 1) //sd
  {
    $db = "pro_tpp_detil_sd";

  }
  else if ($unit->kode == 2) // smp
  {
    $db = "pro_tpp_detil_sd";

  }
  else if ($unit->kode == 3) //pus6
  {
    $db = "pro_tpp_detil_pus";

  }
  else if ($unit->kode == 4) //pus shift
  {
    $db = "pro_tpp_detil_pus";

  }
  else if ($unit->kode == 5) //taman kanak-kanak
  {
    $db = "pro_tpp_detil_sd";
  }
  //rs start
  else if ($unit->kode == 6) //rs-ok
  {
    $db = "pro_tpp_detil_rs";

  }
  else if ($unit->kode == 7) //rs-shift
  {
    $db = "pro_tpp_detil_rs";

  }
  else if ($unit->kode == 8) //rd-6
  {
    $db = "pro_tpp_detil_rs";

  }

  //rs end
  else
  {

    ?>
    



    <?php

  }

  ?>
  <button class="btn btn-info href="oi.php" item-print" id="item_print">Cetak Laporan</button></a>
<input type="hidden" name="tahun" value="<?php echo $tahun; ?>" />
<input type="hidden" name="bulan" value="<?php echo $bulan->angka; ?>" />
<!-- <input type="hidden" name="ttd1" value="<?php echo $ttd1; ?>" /> -->
<!-- <input type="hidden" name="ttd2" value="<?php echo $ttd2; ?>" />
<input type="hidden" name="tgl" value="<?php echo $tgl; ?>" /> -->
</form>
<?php

  

//  var_dump($db);


?>
<!-- <form action="<?php echo site_url('su/cetak/view1');?>" method="post" target="_blank"> -->
<input type="hidden" name="tahun" value="<?php echo $tahun; ?>" />
<input type="hidden" name="bulan" value="<?php echo $bulan->angka; ?>" />

</form>

<br/>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/elephant.min.css">

            <table border="0" width="100%" >
            <tr>
              <td  align="left">SKPD/UPTD</td>
              <td  align="left">: <?php echo $unit->unit_kerja;?></td>
            </tr>

          </table>

          <table id="demo-datatables-responsive-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">

              <tr>
                <td rowspan="2">NO</td>
                <td rowspan="2">NIP</td>
                <td rowspan="2">NAMA</td>
                <td rowspan="2">JABATAN</td>

                <td colspan="3">Jan</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Feb</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Maret</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">April</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Mei</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Juni</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Juli</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Agustus</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">September</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Oktober</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">November</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Desember</td>
                <td rowspan="2">Persentasi</td>

                <td colspan="3">Rekapitulasi</td>


              </tr>

              <tr>
                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin</td>
                <td>Kinerja</td>
                <td>Jumlah</td>

                <td>Disiplin (%)</td>
                <td>Kinerja (%)</td>
                <td>Presentasi</td>
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
              foreach ($peg_ji as $peg) {
              ?>

                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td>
                  <?php
                  $hasil=$this->db->query("
                  SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                  a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='01' and a.nik='$peg->nik' and a.active='1'
                  ");
                  $yuz = $hasil->row();
                  $cek = $hasil->num_rows();

                  $nol = 0;

                  if ($cek > 0)
                  {
                  if ($yuz->tpp_maxx == 0)
                  {
                  $ayu = $yuz->tpp_max;
                  }
                  else
                  {
                  $ayu = $yuz->tpp_maxx;
                  }

                    echo  number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu*$bobot->indikator_disiplin/100)*100,2) . ' %';

                    $d1 = number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu*$bobot->indikator_disiplin/100)*100,2);



                  }
                  else
                  {
                    echo $d1 = $nol;

                  }


                  ?></td>

                  <td>
                    <?php
                    if ($cek > 0)
                    {
                      //echo $yuz->bb_kinerja;
                      echo number_format($yuz->bb_kinerja/($ayu*$bobot->indikator_kinerja/100)*100,2) .' %';
                      $k1 = number_format($yuz->bb_kinerja/($ayu*$bobot->indikator_kinerja/100)*100,2);

                    }
                    else
                    {
                      echo $k1 = $nol;

                    }
                    //echo "kinerja";


                  ?></td>


                  <td>
                    <?php
                    if ($cek > 0)
                    {
                    echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                    }
                    else
                    {
                      echo $nol;

                    }


                    ?>

                  </td>
                  <td>
                    <?php
                    if ($cek > 0)
                    {
                      $pencapaian_1 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                      echo number_format(($pencapaian_1/$ayu)*100,2) . ' %';
                      $p1 = number_format(($pencapaian_1/$ayu)*100,2);

                    }
                    else
                    {
                      echo $p1 = number_format($nol,2);

                    }


                    // echo "persen";


                   ?></td>




                   <!-- Feb -->
                   <td><?php
                   $hasil=$this->db->query("
                   SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                   a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='02' and a.nik='$peg->nik' and a.active='1'
                   ");
               		$yuz = $hasil->row();
                  $cek = $hasil->num_rows();

                  
                   $nol = 0;

                   if ($cek > 0)
                   {
                   if ($yuz->tpp_maxx == 0)
                   {
                   $ayu = $yuz->tpp_max;
                   }
                   else
                   {
                   $ayu = $yuz->tpp_maxx;
                   }

                   echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu*$bobot->indikator_disiplin/100)*100,2) . ' %';
                   $d2 = number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu*$bobot->indikator_disiplin/100)*100,2);


                    }



                   else
                   {
                     echo $d2=$nol;

                   }




                   ?></td>

                   <td>
                     <?php
                     if ($cek > 0)
                     {
                       echo number_format($yuz->bb_kinerja/($ayu*$bobot->indikator_kinerja/100)*100,2) .' %';
                       $k2=number_format($yuz->bb_kinerja/($ayu*$bobot->indikator_kinerja/100)*100,2);
                     }
                     else
                     {
                       echo $k2=$nol;
                     }


                   ?></td>


                   <td>
                     <?php
                     if ($cek > 0)
                     {
                     echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                     }
                     else
                     {
                       echo $nol;

                     }


                     ?>

                   </td>
                   <td>
                     <?php
                     if ($cek > 0)
                     {
                       $pencapaian_2 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                       echo number_format(($pencapaian_2/$ayu)*100,2) . ' %';
                       $p2 = number_format(($pencapaian_2/$ayu)*100,2);

                     }
                     else
                     {
                       echo $p2 = number_format($nol,2);


                     }




                    ?></td>




                    <!-- maret -->
                    <td><?php
                    $hasil=$this->db->query("
                    SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                    a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='03' and a.nik='$peg->nik' and a.active='1'
                    ");
                		$yuz = $hasil->row();
                    $cek = $hasil->num_rows();
                    
                    
                    $nol = 0;

                    if ($cek > 0)
                    {
                      if ($yuz->tpp_maxx == 0)
                      {
                      $ayu3 = $yuz->tpp_max;
                      }
                      else
                      {
                      $ayu3 = $yuz->tpp_maxx;
                      }
                      //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                      echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu3*$bobot->indikator_disiplin/100)*100,2) . ' %';
                      $d3=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu3*$bobot->indikator_disiplin/100)*100,2);

                    }
                    else
                    {
                      echo $d3=$nol;

                    }




                    ?></td>

                    <td>
                      <?php
                      if ($cek > 0)
                      {
                        //echo number_format($yuz->bb_kinerja);
                        echo number_format($yuz->bb_kinerja/($ayu3*$bobot->indikator_kinerja/100)*100,2) .' %';
                        $k3=number_format($yuz->bb_kinerja/($ayu3*$bobot->indikator_kinerja/100)*100,2);

                      }
                      else
                      {
                        echo $k3=$nol;

                      }


                    ?></td>


                    <td>
                      <?php
                      if ($cek > 0)
                      {
                      echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                      }
                      else
                      {
                        echo $nol;

                      }


                      ?>

                    </td>
                    <td>
                      <?php
                      if ($cek > 0)
                      {
                        $pencapaian_3 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                        echo number_format(($pencapaian_3/$ayu3)*100,2) . ' %';
                        $p3 = number_format(($pencapaian_3/$ayu3)*100,2);


                      }
                      else
                      {
                        echo $p3 = number_format($nol,2);

                      }




                     ?></td>
                     <!-- end maret -->



                     <!-- april -->
                     <td><?php
                     $hasil=$this->db->query("
                     SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                     a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='04' and a.nik='$peg->nik' and a.active='1'
                     ");
                 		$yuz = $hasil->row();
                    $cek = $hasil->num_rows();

                     $nol = 0;

                     if ($cek > 0)
                     {
                       if ($yuz->tpp_maxx == 0)
                       {
                       $ayu4 = $yuz->tpp_max;
                       }
                       else
                       {
                       $ayu4 = $yuz->tpp_maxx;
                       }
                       echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu4*$bobot->indikator_disiplin/100)*100,2) . ' %';
                       $d4=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu4*$bobot->indikator_disiplin/100)*100,2);

                     }
                     else
                     {
                       echo $d4 =$nol;

                     }




                     ?></td>

                     <td>
                       <?php
                       if ($cek > 0)
                       {
                         echo number_format($yuz->bb_kinerja/($ayu4*$bobot->indikator_kinerja/100)*100,2) .' %';
                         $k4=number_format($yuz->bb_kinerja/($ayu4*$bobot->indikator_kinerja/100)*100,2);

                       }
                       else
                       {
                         echo $k4=$nol;

                       }


                     ?></td>


                     <td>
                       <?php
                       if ($cek > 0)
                       {
                       echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                       }
                       else
                       {
                         echo $nol;

                       }


                       ?>

                     </td>
                     <td>
                       <?php
                       if ($cek > 0)
                       {
                         $pencapaian_4 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                         echo number_format(($pencapaian_4/$ayu4)*100,2) . ' %';
                         $p4 = number_format(($pencapaian_4/$ayu4)*100,2);

                       }
                       else
                       {
                         echo $p4 = number_format($nol,2);

                       }




                      ?></td>
                      <!-- end april -->


                      <!-- mei -->
                      <td><?php
                      $hasil=$this->db->query("
                      SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='05' and a.nik='$peg->nik' and a.active='1'
                      ");
                  		$yuz = $hasil->row();
                      $cek = $hasil->num_rows();
                      

                      $nol = 0;

                      if ($cek > 0)
                      {
                        if ($yuz->tpp_maxx == 0)
                        {
                        $ayu5 = $yuz->tpp_max;
                        }
                        else
                        {
                        $ayu5 = $yuz->tpp_maxx;
                        }
                        //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                        echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu5*$bobot->indikator_disiplin/100)*100,2) . ' %';
                        $d5=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu5*$bobot->indikator_disiplin/100)*100,2);

                      }
                      else
                      {
                        echo $d5=$nol;

                      }




                      ?></td>

                      <td>
                        <?php
                        if ($cek > 0)
                        {
                          //echo number_format($yuz->bb_kinerja);
                          echo number_format($yuz->bb_kinerja/($ayu5*$bobot->indikator_kinerja/100)*100,2) .' %';
                          $k5=number_format($yuz->bb_kinerja/($ayu5*$bobot->indikator_kinerja/100)*100,2);

                        }
                        else
                        {
                          echo $k5=$nol;

                        }


                      ?></td>


                      <td>
                        <?php
                        if ($cek > 0)
                        {
                        echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                        }
                        else
                        {
                          echo $nol;

                        }


                        ?>

                      </td>
                      <td>
                        <?php
                        if ($cek > 0)
                        {
                          $pencapaian_5 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                          echo number_format(($pencapaian_5/$ayu5)*100,2) . ' %';
                          $p5 = number_format(($pencapaian_5/$ayu5)*100,2);

                        }
                        else
                        {
                          echo $p5 = number_format($nol,2);

                        }




                       ?></td>
                       <!-- end mei -->

                       <!-- juni -->
                       <td><?php
                       $hasil=$this->db->query("
                       SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                       a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='06' and a.nik='$peg->nik' and a.active='1'
                       ");
                   		$yuz = $hasil->row();
                      $cek = $hasil->num_rows();
                      

                       $nol = 0;

                       if ($cek > 0)
                       {
                         if ($yuz->tpp_maxx == 0)
                         {
                         $ayu6 = $yuz->tpp_max;
                         }
                         else
                         {
                         $ayu6 = $yuz->tpp_maxx;
                         }
                         //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                         echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu6*$bobot->indikator_disiplin/100)*100,2) . ' %';
                         $d6=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu6*$bobot->indikator_disiplin/100)*100,2);

                       }
                       else
                       {
                         echo $d6=$nol;

                       }




                       ?></td>

                       <td>
                         <?php
                         if ($cek > 0)
                         {
                           //echo number_format($yuz->bb_kinerja);
                           echo number_format($yuz->bb_kinerja/($ayu6*$bobot->indikator_kinerja/100)*100,2) .' %';
                           $k6=number_format($yuz->bb_kinerja/($ayu6*$bobot->indikator_kinerja/100)*100,2);

                         }
                         else
                         {
                           echo $k6=$nol;

                         }


                       ?></td>


                       <td>
                         <?php
                         if ($cek > 0)
                         {
                         echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                         }
                         else
                         {
                           echo $nol;

                         }


                         ?>

                       </td>
                       <td>
                         <?php
                         if ($cek > 0)
                         {
                           $pencapaian_6 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                           echo number_format(($pencapaian_6/$ayu6)*100,2) . ' %';
                           $p6 = number_format(($pencapaian_6/$ayu6)*100,2);

                         }
                         else
                         {
                           echo $p6 = number_format($nol,2);

                         }




                        ?></td>
                        <!-- end juni -->

                        <!-- juli -->
                        <td><?php
                        $hasil=$this->db->query("
                        SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                        a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='07' and a.nik='$peg->nik' and a.active='1'
                        ");
                    		$yuz = $hasil->row();
                        $cek = $hasil->num_rows();
                        

                        $nol = 0;

                        if ($cek > 0)
                        {
                          if ($yuz->tpp_maxx == 0)
                          {
                          $ayu7 = $yuz->tpp_max;
                          }
                          else
                          {
                          $ayu7 = $yuz->tpp_maxx;
                          }
                          //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                          echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu7*$bobot->indikator_disiplin/100)*100,2) . ' %';
                          $d7=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu7*$bobot->indikator_disiplin/100)*100,2);

                        }
                        else
                        {
                          echo $d7=$nol;

                        }




                        ?></td>

                        <td>
                          <?php
                          if ($cek > 0)
                          {
                            //echo number_format($yuz->bb_kinerja);
                            echo number_format($yuz->bb_kinerja/($ayu7*$bobot->indikator_kinerja/100)*100,2) .' %';
                            $k7=number_format($yuz->bb_kinerja/($ayu7*$bobot->indikator_kinerja/100)*100,2);

                          }
                          else
                          {
                            echo $k7=$nol;

                          }


                        ?></td>


                        <td>
                          <?php
                          if ($cek > 0)
                          {
                          echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                          }
                          else
                          {
                            echo $nol;

                          }


                          ?>

                        </td>
                        <td>
                          <?php
                          if ($cek > 0)
                          {
                            $pencapaian_7 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                            echo number_format(($pencapaian_7/$ayu7)*100,2) . ' %';
                            $p7 = number_format(($pencapaian_7/$ayu7)*100,2);

                          }
                          else
                          {
                            echo $p7 = number_format($nol,2);

                          }




                         ?></td>
                         <!-- end juli -->

                         <!-- agustus -->
                         <td><?php
                         $hasil=$this->db->query("
                         SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                         a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='08' and a.nik='$peg->nik' and a.active='1'
                         ");
                     		$yuz = $hasil->row();
                        $cek = $hasil->num_rows();
                        


                         $nol = 0;

                         if ($cek > 0)
                         {
                           if ($yuz->tpp_maxx == 0)
                           {
                           $ayu8 = $yuz->tpp_max;
                           }
                           else
                           {
                           $ayu8 = $yuz->tpp_maxx;
                           }
                           //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                           echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu8*$bobot->indikator_disiplin/100)*100,2) . ' %';
                           $d8=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu8*$bobot->indikator_disiplin/100)*100,2);

                         }
                         else
                         {
                           echo $d8=$nol;

                         }




                         ?></td>

                         <td>
                           <?php
                           if ($cek > 0)
                           {
                             //echo number_format($yuz->bb_kinerja);
                             echo number_format($yuz->bb_kinerja/($ayu8*$bobot->indikator_kinerja/100)*100,2) .' %';
                             $k8=number_format($yuz->bb_kinerja/($ayu8*$bobot->indikator_kinerja/100)*100,2);

                           }
                           else
                           {
                             echo $k8=$nol;

                           }


                         ?></td>


                         <td>
                           <?php
                           if ($cek > 0)
                           {
                           echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                           }
                           else
                           {
                             echo $nol;

                           }


                           ?>

                         </td>
                         <td>
                           <?php
                           if ($cek > 0)
                           {
                             $pencapaian_8 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                             echo number_format(($pencapaian_8/$ayu8)*100,2) . ' %';
                             $p8 = number_format(($pencapaian_8/$ayu8)*100,2);

                           }
                           else
                           {
                             echo $p8 = number_format($nol,2);

                           }




                          ?></td>
                          <!-- end agustus -->

                          <!-- september -->
                          <td><?php
                          $hasil=$this->db->query("
                          SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                          a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='09' and a.nik='$peg->nik' and a.active='1'
                          ");
                      		$yuz = $hasil->row();
                          $cek = $hasil->num_rows();
                          

                          $nol = 0;

                          if ($cek > 0)
                          {
                            if ($yuz->tpp_maxx == 0)
                            {
                            $ayu9 = $yuz->tpp_max;
                            }
                            else
                            {
                            $ayu9 = $yuz->tpp_maxx;
                            }
                            //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                            echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu9*$bobot->indikator_disiplin/100)*100,2) . ' %';
                            $d9=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu9*$bobot->indikator_disiplin/100)*100,2);

                          }
                          else
                          {
                            echo $d9=$nol;

                          }




                          ?></td>

                          <td>
                            <?php
                            if ($cek > 0)
                            {
                              //echo number_format($yuz->bb_kinerja);
                              echo number_format($yuz->bb_kinerja/($ayu9*$bobot->indikator_kinerja/100)*100,2) .' %';
                              $k9=number_format($yuz->bb_kinerja/($ayu9*$bobot->indikator_kinerja/100)*100,2);

                            }
                            else
                            {
                              echo $k9=$nol;

                            }


                          ?></td>


                          <td>
                            <?php
                            if ($cek > 0)
                            {
                            echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                            }
                            else
                            {
                              echo $nol;

                            }


                            ?>

                          </td>
                          <td>
                            <?php
                            if ($cek > 0)
                            {
                              $pencapaian_9 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                              echo number_format(($pencapaian_9/$ayu9)*100,2) . ' %';
                              $p9 = number_format(($pencapaian_9/$ayu9)*100,2);

                            }
                            else
                            {
                              echo $p9 = number_format($nol,2);

                            }




                           ?></td>
                           <!-- end sep -->

                           <!-- okt -->
                           <td><?php
                           $hasil=$this->db->query("
                           SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                           a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='10' and a.nik='$peg->nik' and a.active='1'
                           ");
                       		$yuz = $hasil->row();
                          $cek = $hasil->num_rows();
                          

                           $nol = 0;

                           if ($cek > 0)
                           {
                             if ($yuz->tpp_maxx == 0)
                             {
                             $ayu10 = $yuz->tpp_max;
                             }
                             else
                             {
                             $ayu10 = $yuz->tpp_maxx;
                             }
                             //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                             echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu10*$bobot->indikator_disiplin/100)*100,2) . ' %';
                             $d10=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu10*$bobot->indikator_disiplin/100)*100,2);

                           }
                           else
                           {
                             echo $d10=$nol;

                           }




                           ?></td>

                           <td>
                             <?php
                             if ($cek > 0)
                             {
                               //echo number_format($yuz->bb_kinerja);
                               echo number_format($yuz->bb_kinerja/($ayu10*$bobot->indikator_kinerja/100)*100,2) .' %';
                               $k10=number_format($yuz->bb_kinerja/($ayu10*$bobot->indikator_kinerja/100)*100,2);

                             }
                             else
                             {
                               echo $k10=$nol;

                             }


                           ?></td>


                           <td>
                             <?php
                             if ($cek > 0)
                             {
                             echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                             }
                             else
                             {
                               echo $nol;

                             }


                             ?>

                           </td>
                           <td>
                             <?php
                             if ($cek > 0)
                             {
                               $pencapaian_10 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                               echo number_format(($pencapaian_10/$ayu10)*100,2) . ' %';
                               $p10 = number_format(($pencapaian_10/$ayu10)*100,2);

                             }
                             else
                             {
                               echo $p10 = number_format($nol,2);

                             }




                            ?></td>
                            <!-- end okt -->

                            <!-- nov -->
                            <td><?php
                            $hasil=$this->db->query("
                            SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                            a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='11' and a.nik='$peg->nik' and a.active='1'
                            ");
                        		$yuz = $hasil->row();
                            $cek = $hasil->num_rows();
                            
                            $nol = 0;

                            if ($cek > 0)
                            {
                              if ($yuz->tpp_maxx == 0)
                              {
                              $ayu11 = $yuz->tpp_max;
                              }
                              else
                              {
                              $ayu11 = $yuz->tpp_maxx;
                              }
                              //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                              echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu11*$bobot->indikator_disiplin/100)*100,2) . ' %';
                              $d11=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu11*$bobot->indikator_disiplin/100)*100,2);

                            }
                            else
                            {
                              echo $d11=$nol;

                            }




                            ?></td>

                            <td>
                              <?php
                              if ($cek > 0)
                              {
                                //echo number_format($yuz->bb_kinerja);
                                echo number_format($yuz->bb_kinerja/($ayu11*$bobot->indikator_kinerja/100)*100,2) .' %';
                                $k11=number_format($yuz->bb_kinerja/($ayu11*$bobot->indikator_kinerja/100)*100,2);

                              }
                              else
                              {
                                echo $k11=$nol;

                              }


                            ?></td>


                            <td>
                              <?php
                              if ($cek > 0)
                              {
                              echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                              }
                              else
                              {
                                echo $nol;

                              }


                              ?>

                            </td>
                            <td>
                              <?php
                              if ($cek > 0)
                              {
                                $pencapaian_11 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                                echo number_format(($pencapaian_11/$ayu11)*100,2) . ' %';
                                $p11 = number_format(($pencapaian_11/$ayu11)*100,2);

                              }
                              else
                              {
                                echo $p11 = number_format($nol,2);

                              }




                             ?></td>
                             <!-- end nov -->


                             <!-- des -->
                             <td><?php
                             $hasil=$this->db->query("
                             SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, $db c, ref_pangkat d, ref_unit_kerja e where
                             a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$unit->id_unit_kerja' and tahun = '$tahun' and bulan='12' and a.nik='$peg->nik' and a.active='1'
                             ");
                         		$yuz = $hasil->row();
                            $cek = $hasil->num_rows();
                            
                             $nol = 0;

                             if ($cek > 0)
                             {
                               if ($yuz->tpp_maxx == 0)
                               {
                               $ayu12 = $yuz->tpp_max;
                               }
                               else
                               {
                               $ayu12 = $yuz->tpp_maxx;
                               }
                               //echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);
                               echo number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu12*$bobot->indikator_disiplin/100)*100,2) . ' %';
                               $d12=number_format(($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja)/($ayu12*$bobot->indikator_disiplin/100)*100,2);

                             }
                             else
                             {
                               echo $d12=$nol;

                             }




                             ?></td>

                             <td>
                               <?php
                               if ($cek > 0)
                               {
                                 //echo number_format($yuz->bb_kinerja);
                                 echo number_format($yuz->bb_kinerja/($ayu12*$bobot->indikator_kinerja/100)*100,2) .' %';
                                 $k12=number_format($yuz->bb_kinerja/($ayu12*$bobot->indikator_kinerja/100)*100,2);

                               }
                               else
                               {
                                 echo $k12=$nol;

                               }


                             ?></td>


                             <td>
                               <?php
                               if ($cek > 0)
                               {
                               echo number_format($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));

                               }
                               else
                               {
                                 echo $nol;

                               }


                               ?>

                             </td>
                             <td>
                               <?php
                               if ($cek > 0)
                               {
                                 $pencapaian_12 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                                 echo number_format(($pencapaian_12/$ayu12)*100,2) . ' %';
                                 $p12 = number_format(($pencapaian_12/$ayu12)*100,2);

                               }
                               else
                               {
                                 echo $p12 = number_format($nol,2);

                               }




                              ?></td>


                              <!-- end des -->

                              <!-- tot dis -->
                              <td>
                                  <?php

                                  echo number_format((($d1 + $d2 + $d3+ $d4+ $d5+ $d6+ $d7+ $d8+ $d9+ $d10+ $d11+ $d12)/12),2) . ' %' ;



                                  ?>
                              </td>
                              <!-- end dis -->

                              <!-- start kin -->
                              <td>
                                  <?php

                                  echo number_format((($k1 + $k2 + $k3+ $k4+ $k5+ $k6+ $k7+ $k8+ $k9+ $k10+ $k11+ $k12)/12),2) . ' %' ;


                                  ?>
                              </td>
                              <!-- end kin -->

                              <!-- start persen -->
                              <td>
                                  <?php

                                  echo number_format((($p1 + $p2 + $p3+ $p4+ $p5+ $p6+ $p7+ $p8+ $p9+ $p10+ $p11+ $p12)/12),2) . ' %' ;

                                  ?>
                              </td>
                              <!-- end persen -->
                </tr>


                <?php
                $no++;

              }
              ?>

            </table>
