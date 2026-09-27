<?php
function penyebut($nilai) {
$nilai = abs($nilai);
$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
$temp = "";
if ($nilai < 12) {
 $temp = " ". $huruf[$nilai];
} else if ($nilai <20) {
 $temp = penyebut($nilai - 10). " belas";
} else if ($nilai < 100) {
 $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
} else if ($nilai < 200) {
 $temp = " seratus" . penyebut($nilai - 100);
} else if ($nilai < 1000) {
 $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
} else if ($nilai < 2000) {
 $temp = " seribu" . penyebut($nilai - 1000);
} else if ($nilai < 1000000) {
 $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
} else if ($nilai < 1000000000) {
 $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
} else if ($nilai < 1000000000000) {
 $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
} else if ($nilai < 1000000000000000) {
 $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
}
return $temp;
}

function terbilang($nilai) {
if($nilai<0) {
 $hasil = "minus ". trim(penyebut($nilai));
} else {
 $hasil = trim(penyebut($nilai));
}
return $hasil;
}




$bln=date('m',strtotime($tanggal));
if ($bln==1) {
  $bulan="Januari";
}else   if ($bln==2) {
  $bulan="Februari";
}else   if ($bln==3) {
  $bulan="Maret";
}else  if ($bln==4) {
  $bulan="April";
}else   if ($bln==5) {
  $bulan="Mei";
}else   if ($bln==6) {
  $bulan="Juni";
}else   if ($bln==7) {
  $bulan="Juli";
}else   if ($bln==8) {
 $bulan="Agustus";
}else   if ($bln==9) {
 $bulan="September";
}else   if ($bln==10) {
 $bulan="Oktober";
}else   if ($bln==11) {
  $bulan="November";
}else{
  $bulan="Desember";
}
?>




<html
    xmlns:o='urn:schemas-microsoft-com:office:office'
    xmlns:w='urn:schemas-microsoft-com:office:word'
    xmlns='http://www.w3.org/TR/REC-html40'>
    <head>
        <title>Generate a document Word</title>
        <!--[if gte mso 9]-->
    <xml>
        <w:WordDocument>
            <w:View>Print</w:View>
            <w:Zoom>90</w:Zoom>
            <w:DoNotOptimizeForBrowser/>
        </w:WordDocument>
    </xml>
    <!-- [endif]-->
    <style>
        p.MsoFooter, li.MsoFooter, div.MsoFooter{
            margin: 0cm;
            margin-bottom: 0001pt;
            mso-pagination:widow-orphan;
            font-size: 12.0 pt;
            text-align: right;
        }


        @page Section1{
            size: 33cm 21cm;
            margin: 2cm 2cm 2cm 2cm;
            mso-page-orientation: landscape;
            mso-footer:f1;
        }
        div.Section1 { page:Section1;}
        div.huruf {
          text-transform: capitalize;
        }


      table.ttd td {
                  border:1px solid black;
        }
    </style>
</head>
<body>
    <div class="Section1">
      <div class="" align="center">
					<b style="font-size:17px"> PEMBAYARAN INSENTIF BAPENDA SEBAGAI KOORDINATOR PEMUNGUTAN RETRIBUSI DAERAH <br>YANG BERSUMBER DARISKPD PENGELOLAH PAD BERDASARKAN KEPUTUSAN BUPATI NOMOR:29/BAPENDA/I/2023 TANGGAL 12 JANUARI 2023<br>
					DAN KEPALA BAPENDA KAB.BARRU NOMOR :03 TAHUN 2023 TANGGAL 12 JANUARI 2023</b>
      </div>
			<br>
			<div align="left">
				<p>Jenis Retiribusi: Ret.Pel Kepelabuhan,Rumdis dan Mess Pemda</p>
			</div>
			<div align="right">
				<b style="font-size:17px">TRIWULAN <?php echo $triwulan ?> T.A <?php echo $tahun ?></b>
			</div>

			<br>
			<?php
			// $triwulan=$insentif['triwulan'];
			// $tahun=$insentif['tahun'];
			$where=['triwulan'=>$triwulan,'tahun'=>$tahun];
          $this->db->order_by("kelas_jabatan", "DESC");
			$this->db->where($where);
			$insentif=$this->db->get('view_retribusi_bapenda')->result_array();
			?>
				<table style="border:1px solid black" class="ttd">
					<thead align="center">
						<tr>
              <th>NO</th>
              <th>NAMA</th>
              <th>JABATAN</th>
              <th>JUMLAH DITERIMA</th>
              <th>PPh</th>
              <th>ZAKAT (2,5%)</th>
              <th>SISA YANG DITERIMA</th>
              <th>TANDA TANGAN</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
						$trm=0;
						$pph=0;
						$zkt=0;
						$ss=0;
						foreach ($insentif as $ins) {
              if ($ins['gelar_depan']=='') {
                $glr_dpn='';
              }else{
                $glr_dpn=$ins['gelar_depan'].'.';
              }
              if ($ins['gelar_belakang']=='') {
                $glr_blk='';
              }else{
                $glr_blk=','.$ins['gelar_belakang'];
              }


               ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $glr_dpn ?> <?php echo $ins['nama'] ?> <?php echo $glr_blk ?></td>
							<td>
								<?php
									$this->db->where('id_jabatan',$ins['id_jabatan']);
									$jabatan=$this->db->get('ref_jabatan')->row();
									echo $jabatan->jabatan;
								 ?>

							</td>
							<td><?php echo number_format($ins['r-terima'], 0, ".", ".")  ?> </td>
							<td><?php echo number_format($ins['r-pph'], 0, ".", ".")  ?></td>
							<td> <?php echo number_format($ins['r-zakat'], 0, ".", ".")  ?></td>
							<td><?php echo number_format($ins['r-sisa'], 0, ".", ".")  ?></td>
              <td></td>

						</tr>
	       	<?php
					 $trm+=$ins['r-terima'];
					 $pph+=$ins['r-pph'];
					 $zkt+=$ins['r-zakat'];
					 $ss+=$ins['r-sisa']; ?>
					<?php } ?>

					<tr>
						<td></td>
						<td colspan="2" align="center">JUMLAH</td>
						<td><?php echo number_format($trm, 0, ".", ".") ?></td>
						<td><?php echo number_format($pph, 0, ".", ".") ?></td>
						<td><?php echo number_format($zkt, 0, ".", ".") ?></td>
						<td><?php echo number_format($ss, 0, ".", ".") ?></td>
						<td></td>
					</tr>
					</tbody>
				</table>

				<div  lang="tr" align="center" style="text-transform:capitalize!important;">
					<i style="font-size:17px;"><p >Terbilang:<?php echo strtoupper(terbilang($trm));?></p> </i>
				</div>

  <table style="width:100%;border:0px!important">
    <tr>
      <td style="width:30%;" class="ttd"></td>
      <td style="width:40%;" class="ttd"></td>
      <td style="width:30%;" class="ttd"><label>Barru, <?php echo date('d',strtotime($tanggal))?> <?php echo $bulan?> <?php echo date('Y',strtotime($tanggal))?></label></td>
    </tr>
    <tr>
      <td>Mengetahui/Menyetujui</td>
      <td></td>
      <td>Pembuat Daftar</td>
    </tr>
    <tr>
      <td>
        <?php
        $this->db->where('nik',$ttd1);
        $pegawai=$this->db->get('ref_pegawai')->row();

        $this->db->where('id_jabatan',$pegawai->id_jabatan);
        $jabatan=$this->db->get('ref_jabatan')->row();
        $this->db->where('id_pangkat',$pegawai->id_pangkat);
        $pangkat=$this->db->get('ref_pangkat')->row();

        $this->db->where('nik',$ttd2);
        $pegawai2=$this->db->get('ref_pegawai')->row();

        $this->db->where('id_jabatan',$pegawai2->id_jabatan);
        $jabatan2=$this->db->get('ref_jabatan')->row();

        $this->db->where('id_pangkat',$pegawai2->id_pangkat);
        $pangkat2=$this->db->get('ref_pangkat')->row();


        if ($pegawai->gelar_depan=='') {
          $glr_dpn1='';
        }else{
          $glr_dpn1=$pegawai->gelar_depan.'.';
        }
        if ($pegawai->gelar_belakang=='') {
          $glr_blk1='';
        }else{
          $glr_blk1=','.$pegawai->gelar_belakang;

        }


        if ($pegawai2->gelar_depan=='') {
          $glr_dpn2='';
        }else{
          $glr_dpn2=$pegawai2->gelar_depan.'.';
        }
        if ($pegawai2->gelar_belakang=='') {
          $glr_blk2='';
        }else{
          $glr_blk2=','.$pegawai2->gelar_belakang;
        }

        echo $jabatan->jabatan;

         ?>
         <br>
         Kab.Barru

      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td style="height:40px"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><b><u><?php echo $glr_dpn1 ?><?php echo $pegawai->nama ?><?php echo  $glr_blk1 ?></u> </b> </td>
      <td></td>
      <td><b><u><?php echo $glr_dpn2 ?><?php echo $pegawai2->nama ?><?php echo  $glr_blk2 ?></u> </b></td>
    </tr>
    <tr>
      <td>Pangkat :<?php echo $pangkat->pangkat ?></td>
      <td></td>
      <td>Pangkat :<?php echo $pangkat2->pangkat ?></td>
    </tr>
    <tr>
      <td>Nip:<?php echo $pegawai->nik ?></td>
      <td></td>
      <td>Nip:<?php echo $pegawai2->nik ?></td>
    </tr>
  </table>


    </div>

</body>
</html>

<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=cetak_retribusi.doc");
?>
