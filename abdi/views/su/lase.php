
<?php
foreach ($yy as $asu) {
?>
<b> Master Data :</b><br>
hari kerja = <?php echo $asu->hari_kerja;?> <br>
upacara hari senin = <?php echo $asu->upacara_hari_senin;?> <br>
apel masuk =<?php echo $asu->apel_masuk;?><br>
hari besar =<?php echo $asu->hari_besar;?><br><br>

<?php
}

?>

<?php foreach ($detail as $det)
{
?>
nik = <?php echo $det->nik;?> <br>
nama = <?php echo $det->nama . ' '.$det->gelar_belakang?> <br>
tpp max = <?php echo number_format($det->tpp_max);?><br>
tpp max disiplin = <?php echo number_format($det->tpp_max_disiplin);?><br>
tpp max kinerja = <?php echo number_format($det->tpp_max_kinerja);?> <br><br>

<?php
}
?>


total apel masuk =          <?php echo $tot->tot_apel_masuk;?> <br>
total apel pulang =         <?php echo $tot->tot_apel_pulang;?> <br>
total upacara hari senin =  <?php echo $tot->tot_upacara_hari_senin;?> <br>
total masuk kerja =         <?php echo $tot->tot_hari_kerja;?> <br>
total upcara hari besar =   <?php echo $tot->tot_upacara_hari_besar;?> <br>
total jam izin 1 bulan =   <?php echo $tot->tot_jam_izin/100;?> <br><br>
<?php $tot_jam_izin = $tot->tot_jam_izin/100; ?>



total terbayar untuk apel masuk perhari =
<?php
echo number_format($hasil = 15*$det->tpp_max_disiplin/100/$asu->apel_masuk);
?> <br>

total terbayar untuk apel masuk bulan ini =
<?php
echo number_format($hasil = $tot->tot_apel_masuk*(15*$det->tpp_max_disiplin/100/$asu->apel_masuk));
?> <br><br>

total terbayar untuk apel pulang perhari =
<?php
echo number_format($hasil = 15*$det->tpp_max_disiplin/100/$asu->hari_kerja);
?> <br>

total terbayar untuk apel pulang bulan ini =
<?php
echo number_format($hasil = $tot->tot_apel_pulang*(15*$det->tpp_max_disiplin/100/$asu->hari_kerja));
?> <br><br>

total terbayar untuk upacara hari senin perhari =
<?php
echo $hasil = 10*$det->tpp_max_disiplin/100/$asu->upacara_hari_senin;
?> <br>

total terbayar untuk upacara hari senin bulan ini =
<?php
echo number_format($hasil = $tot->tot_upacara_hari_senin*(10*$det->tpp_max_disiplin/100/$asu->upacara_hari_senin));
?> <br><br>

total terbayar untuk upacara hari besar/kesadaran perhari =
<?php
echo $hasil = 5*$det->tpp_max_disiplin/100/$asu->hari_besar;
?> <br>

total terbayar untuk upacara hari besar/kesadaran bulan ini =
<?php
echo number_format($hasil = $tot->tot_upacara_hari_besar*(5*$det->tpp_max_disiplin/100/$asu->hari_besar));
?> <br><br>

total terbayar untuk upacara hari kerja perhari =
<?php
echo number_format($hasil = 25*$det->tpp_max_disiplin/100/$asu->hari_kerja);
?> <br>

total terbayar untuk upacara hari kerja bulan ini =
<?php
echo number_format($hasil = $tot->tot_hari_kerja*(25*$det->tpp_max_disiplin/100/$asu->hari_kerja));
?> <br><br>

total terbayar untuk jam kerja perhari =
<?php
echo number_format($hasil_kerja = 30*$det->tpp_max_disiplin/100/$asu->hari_kerja);
?> <br>

<?php
$akhir = date_create('12:00:00') ;
$nita = 0;
foreach ($time as $time)
{
  $awal   = date_create($time->jam_masuk_1);
  $diff   = date_diff($awal , $akhir );

  $akhir2 = date_create($time->jam_pulang) ;
  $awal2  = date_create($time->jam_masuk_2);
  $diff2  = date_diff($awal2 , $akhir2 );


  $jam    = $diff->format('%H');
  $menit  = $diff->format('%I');
  $detik  = $diff->format('%S');


  $jam2    = $diff2->format('%H');
  $menit2  = $diff2->format('%I');
  $detik2  = $diff2->format('%S');

  $jammm = $jam + $jam2;
  $menittt = $menit + $menit2;
  $detikkk = $detik + $detik2;

  $day = date('D', strtotime($time->tanggal));

  if ($day == 'Fri')
  {
    $pembagi = 650;
  }
  else
  {
    $pembagi = 740;
  }

  $capaian_kerja = intVal($jammm.$menittt);

  $yusran = $capaian_kerja/$pembagi*$hasil_kerja-$tot_jam_izin;

  //echo $capaian_kerja . '<br>';

  //echo $capaian_kerja . ' '. $pembagi . ' '.$hasil_kerja . '<br>';

  //echo number_format($yusran) . '<br>';
  $nita += $yusran;

}

echo 'Total terbayar jam kerja untuk sebulan = ' . number_format($nita);

?>
