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

              <td class="td_no" align="left"> <h4>SKPD/UPTD</h4></td>
              <td class="td_no" align="left"><h4>: <?php echo $unit->unit_kerja;?></h4></td>
            </tr>
          </table>

          <!--
          <table class="table table-striped">
            <table class="table table-hover">
            <table id="demo-datatables-responsive-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
        -->

            <table  style="border-collapse:collapse;" class="table_yus" border="1" cellspacing="0" width="100%">
							<tr class="text3">
                <td  class="text-center"  rowspan="2">NO</td>
                <td  class="text-center" rowspan="2">NIP</td>
                <td  class="text-center" rowspan="2">NAMA</td>
                <td  class="text-center" rowspan="2">JABATAN</td>
                <td class="text-center"  rowspan="2">TPP MAX</td>
                <td class="text-center"  rowspan="2">MAX Disiplin</td>
                <td class="text-center"  class="text-center"  rowspan="2">MAX Kinerja</td>
                <td class="text-center"  colspan="3">Jan</td>
                <td class="text-center"  rowspan="2">Persentasi</td>

                <td class="text-center"  colspan="3">Feb</td>
                <td class="text-center"  rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">Maret</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">April</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" class="text-center" colspan="3">Mei</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" class="text-center" colspan="3">Juni</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" class="text-center" class="text-center" colspan="3">Juli</td>
                <td class="text-center" class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">Agustus</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">September</td>
                <td class="text-center" class="text-center" class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" class="text-center" colspan="3">Oktober</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">November</td>
                <td class="text-center" rowspan="2">Persentasi</td>

                <td class="text-center" colspan="3">Desember</td>
                <td class="text-center" class="text-center" rowspan="2">Persentasi</td>
                <td class="text-center" rowspan="2">Total Persentasi</td>

              </tr>

              <tr class="text3">
                <td class="text-center" >Disiplin</td>
                <td class="text-center" >Kinerja</td>
                <td class="text-center" >Jumlah</td>

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
              </tr>





              <?php
							$iddd = $this->session->userdata('id_unit_kerja');
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
                //$pencapaian = $peg->bb_kinerja + ($peg->bb_apel_masuk+$peg->bb_apel_pulang+$peg->bb_hari_senin+$peg->bb_hari_besar+$peg->bb_jam_kerja+$peg->bb_hari_kerja);
                $maksimal = $peg->tpp_max;
                ?>

                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $peg->nik;?></td>
                  <td><?php echo $peg->gelar_depan ." " .$peg->nama ." " .$peg->gelar_belakang;?></td>
                  <td><?php echo $peg->jabatan;?></td>
                  <td><?php echo number_format($peg->tpp_max);?></td>


                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_disiplin/100);?></td>
                  <td><?php echo number_format($peg->tpp_max*$bobot->indikator_kinerja/100);?></td>
                  <td><?php
                  $hasil=$this->db->query("
                  SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                  a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='01' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                  ");
              		$yuz = $hasil->row();
                  $cek = $hasil->num_rows();

                  $nol = 0;

                  if ($cek > 0)
                  {
                    echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                  }
                  else
                  {
                    echo $nol;

                  }




                  ?></td>

                  <td>
                    <?php
                    if ($cek > 0)
                    {
                      echo $yuz->bb_kinerja;

                    }
                    else
                    {
                      echo $nol;

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
                      $pencapaian_1 = ($yuz->bb_kinerja + ($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja));
                      echo number_format(($pencapaian_1/$yuz->tpp_max)*100,2) . ' %';
                      $p1 = number_format(($pencapaian_1/$yuz->tpp_max)*100,2);

                    }
                    else
                    {
                      echo $p1 = number_format($nol,2);

                    }




                   ?></td>




                   <!-- Feb -->
                   <td><?php
                   $hasil=$this->db->query("
                   SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                   a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='02' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                   ");
               		$yuz = $hasil->row();
                   $cek = $hasil->num_rows();

                   $nol = 0;

                   if ($cek > 0)
                   {
                     echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                   }
                   else
                   {
                     echo $nol;

                   }




                   ?></td>

                   <td>
                     <?php
                     if ($cek > 0)
                     {
                       echo number_format($yuz->bb_kinerja);

                     }
                     else
                     {
                       echo $nol;

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
                       echo number_format(($pencapaian_2/$yuz->tpp_max)*100,2) . ' %';
                       $p2 = number_format(($pencapaian_2/$yuz->tpp_max)*100,2);

                     }
                     else
                     {
                       echo $p2 = number_format($nol,2);


                     }




                    ?></td>




                    <!-- maret -->
                    <td><?php
                    $hasil=$this->db->query("
                    SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                    a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='03' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                    ");
                		$yuz = $hasil->row();
                    $cek = $hasil->num_rows();

                    $nol = 0;

                    if ($cek > 0)
                    {
                      echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                    }
                    else
                    {
                      echo $nol;

                    }




                    ?></td>

                    <td>
                      <?php
                      if ($cek > 0)
                      {
                        echo number_format($yuz->bb_kinerja);

                      }
                      else
                      {
                        echo $nol;

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
                        echo number_format(($pencapaian_3/$yuz->tpp_max)*100,2) . ' %';
                        $p3 = number_format(($pencapaian_3/$yuz->tpp_max)*100,2);


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
                     SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                     a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='04' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                     ");
                 		$yuz = $hasil->row();
                     $cek = $hasil->num_rows();

                     $nol = 0;

                     if ($cek > 0)
                     {
                       echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                     }
                     else
                     {
                       echo $nol;

                     }




                     ?></td>

                     <td>
                       <?php
                       if ($cek > 0)
                       {
                         echo number_format($yuz->bb_kinerja);

                       }
                       else
                       {
                         echo $nol;

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
                         echo number_format(($pencapaian_4/$yuz->tpp_max)*100,2) . ' %';
                         $p4 = number_format(($pencapaian_4/$yuz->tpp_max)*100,2);

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
                      SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                      a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='05' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                      ");
                  		$yuz = $hasil->row();
                      $cek = $hasil->num_rows();

                      $nol = 0;

                      if ($cek > 0)
                      {
                        echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                      }
                      else
                      {
                        echo $nol;

                      }




                      ?></td>

                      <td>
                        <?php
                        if ($cek > 0)
                        {
                          echo number_format($yuz->bb_kinerja);

                        }
                        else
                        {
                          echo $nol;

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
                          echo number_format(($pencapaian_5/$yuz->tpp_max)*100,2) . ' %';
                          $p5 = number_format(($pencapaian_5/$yuz->tpp_max)*100,2);

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
                       SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                       a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='06' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                       ");
                   		$yuz = $hasil->row();
                       $cek = $hasil->num_rows();

                       $nol = 0;

                       if ($cek > 0)
                       {
                         echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                       }
                       else
                       {
                         echo $nol;

                       }




                       ?></td>

                       <td>
                         <?php
                         if ($cek > 0)
                         {
                           echo number_format($yuz->bb_kinerja);

                         }
                         else
                         {
                           echo $nol;

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
                           echo number_format(($pencapaian_6/$yuz->tpp_max)*100,2) . ' %';
                           $p6 = number_format(($pencapaian_6/$yuz->tpp_max)*100,2);

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
                        SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                        a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='07' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                        ");
                    		$yuz = $hasil->row();
                        $cek = $hasil->num_rows();

                        $nol = 0;

                        if ($cek > 0)
                        {
                          echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                        }
                        else
                        {
                          echo $nol;

                        }




                        ?></td>

                        <td>
                          <?php
                          if ($cek > 0)
                          {
                            echo number_format($yuz->bb_kinerja);

                          }
                          else
                          {
                            echo $nol;

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
                            echo number_format(($pencapaian_7/$yuz->tpp_max)*100,2) . ' %';
                            $p7 = number_format(($pencapaian_7/$yuz->tpp_max)*100,2);

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
                         SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                         a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='08' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                         ");
                     		$yuz = $hasil->row();
                         $cek = $hasil->num_rows();

                         $nol = 0;

                         if ($cek > 0)
                         {
                           echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                         }
                         else
                         {
                           echo $nol;

                         }




                         ?></td>

                         <td>
                           <?php
                           if ($cek > 0)
                           {
                             echo number_format($yuz->bb_kinerja);

                           }
                           else
                           {
                             echo $nol;

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
                             echo number_format(($pencapaian_8/$yuz->tpp_max)*100,2) . ' %';
                             $p8 = number_format(($pencapaian_8/$yuz->tpp_max)*100,2);

                           }
                           else
                           {
                             echo $p8 = number_format($nol,2);

                           }




                          ?></td>
                          <!-- end sep -->

                          <!-- maret -->
                          <td><?php
                          $hasil=$this->db->query("
                          SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                          a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='09' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                          ");
                      		$yuz = $hasil->row();
                          $cek = $hasil->num_rows();

                          $nol = 0;

                          if ($cek > 0)
                          {
                            echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                          }
                          else
                          {
                            echo $nol;

                          }




                          ?></td>

                          <td>
                            <?php
                            if ($cek > 0)
                            {
                              echo number_format($yuz->bb_kinerja);

                            }
                            else
                            {
                              echo $nol;

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
                              echo number_format(($pencapaian_9/$yuz->tpp_max)*100,2) . ' %';
                              $p9 = number_format(($pencapaian_9/$yuz->tpp_max)*100,2);

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
                           SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                           a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='10' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                           ");
                       		$yuz = $hasil->row();
                           $cek = $hasil->num_rows();

                           $nol = 0;

                           if ($cek > 0)
                           {
                             echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                           }
                           else
                           {
                             echo $nol;

                           }




                           ?></td>

                           <td>
                             <?php
                             if ($cek > 0)
                             {
                               echo number_format($yuz->bb_kinerja);

                             }
                             else
                             {
                               echo $nol;

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
                               echo number_format(($pencapaian_10/$yuz->tpp_max)*100,2) . ' %';
                               $p10 = number_format(($pencapaian_10/$yuz->tpp_max)*100,2);

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
                            SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                            a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='10' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                            ");
                        		$yuz = $hasil->row();
                            $cek = $hasil->num_rows();

                            $nol = 0;

                            if ($cek > 0)
                            {
                              echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                            }
                            else
                            {
                              echo $nol;

                            }




                            ?></td>

                            <td>
                              <?php
                              if ($cek > 0)
                              {
                                echo number_format($yuz->bb_kinerja);

                              }
                              else
                              {
                                echo $nol;

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
                                echo number_format(($pencapaian_11/$yuz->tpp_max)*100,2) . ' %';
                                $p11 = number_format(($pencapaian_11/$yuz->tpp_max)*100,2);

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
                             SELECT *,((bb_kinerja+(bb_apel_masuk+bb_apel_pulang+bb_hari_senin+bb_hari_besar+bb_jam_kerja+bb_hari_kerja))/a.tpp_max*100) as j FROM ref_pegawai a, ref_jabatan b, pro_tpp_detil c, ref_pangkat d, ref_unit_kerja e where
                             a.id_jabatan=b.id_jabatan and a.nik=c.nik and a.id_pangkat=d.id_pangkat and a.id_unit_kerja=e.id_unit_kerja and a.id_unit_kerja='$iddd' and tahun = '$tahun' and bulan='12' and a.nik='$peg->nik' and a.active='1' order by a.id_pangkat DESC, SUBSTRING(a.nik,9,4) ASC, a.nama ASC
                             ");
                         		$yuz = $hasil->row();
                             $cek = $hasil->num_rows();

                             $nol = 0;

                             if ($cek > 0)
                             {
                               echo number_format($yuz->bb_apel_masuk+$yuz->bb_apel_pulang+$yuz->bb_hari_senin+$yuz->bb_hari_besar+$yuz->bb_jam_kerja+$yuz->bb_hari_kerja);

                             }
                             else
                             {
                               echo $nol;

                             }




                             ?></td>

                             <td>
                               <?php
                               if ($cek > 0)
                               {
                                 echo number_format($yuz->bb_kinerja);

                               }
                               else
                               {
                                 echo $nol;

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
                                 echo number_format(($pencapaian_12/$yuz->tpp_max)*100,2) . ' %';
                                 $p12 = number_format(($pencapaian_12/$yuz->tpp_max)*100,2);

                               }
                               else
                               {
                                 echo $p12 = number_format($nol,2);

                               }




                              ?></td>


                              <!-- end des -->

                              <td>
                                  <?php

                                  echo number_format((($p1 + $p2 + $p3+ $p4+ $p5+ $p6+ $p7+ $p8+ $p9+ $p10+ $p11+ $p12)/12),2) . ' %' ;



                                  ?>
                              </td>
                </tr>


                <?php
                $no++;

              }
              ?>

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
