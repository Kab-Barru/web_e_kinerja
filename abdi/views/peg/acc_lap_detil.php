<div id="Ket2" tabindex="-1" role="dialog" class="modal fade">

<div class="modal-dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Petunjuk Penggunaan</h4>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            Record / isi tabel akan <b>berwarna merah</b> jika dalam uraian kegiatan pegawai terdapat <b>kegiatan izin</b>.
          </div>
          <div class="form-group">
            Jika pada uraian kegiatan bawahan terdapat kegiatan <b>Izin (Izin Pada Saat Jam Kerja / Izin Diantara Jam Kerja)</b> Silahkan memastikan terlebih dahulu apakah bawahan telah <b>menginput izin atau tidak</b> dengan cara <i>mengecek informasi keterangan izin yang ditampilkan oleh sistem</i>
          </div>

          <div class="form-group">
            Jika pada baris berwarna merah namun uraian kegiatan yang dituliskan <b>bukan izin keluar kantor / izin diantara jam kerja</b>, atasan dapat mengabaikan warna yang diberikan oleh sistem
          </div>



          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>

<div id="Ket1" tabindex="-1" role="dialog" class="modal fade">

<div class="modal-dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Petunjuk Penggunaan</h4>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            Informasi tambahan yang diberikan keatasan apakah kegiatan yang diinputkan bawahan termasuk <b>hari kerja atau diluar hari kerja</b>.
          </div>

          <div class="form-group">
            Informasi tambahan yang diberikan keatasan <b>apakah pegawai(bawahan) telah menginput izin atau tidak menginput izin</b> pada sistem, <b>total waktu izin</b> yang diinputkan.
          </div>

          <div class="form-group">
            Informasi <b>selisih hari</b> antara <i>tanggal laporan</i> dengan <i>tanggal pengiriman laporan</i>, <b> rekomendasi penilai ketepatan waktu</b> untuk laporan bawahan.
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>

<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">

      <button class="btn btn-info item_proses" type="button" >Proses</button> &nbsp;&nbsp;
      <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>

      <input class="acuan_kirim" value="<?php echo $this->uri->segment(4);?>" type="hidden"/>
    </div>

    <div class="col-md-12">

        <form class="form form-horizontal">
          <div class="alert alert-warning">
            <div class="form-group">

              <div align="center" class="col-sm-12">
                <h4><b>INFORMASI DARI SISTEM</b></h4>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Status Laporan</label>
              <div class="col-sm-6">
              <input type="text" readonly class="form-control" value="<?php
              if ($detil->ket == 0)
              {
                echo "Termasuk hari kerja";
              }
              else {
                echo "Bukan hari kerja";
              }

              ?>"/>
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Keterangan Izin</label>
              <div class="col-sm-6">
              <input type="text" readonly class="form-control" value="<?php
              if ($cek == 0)
              {
                echo "Tidak input izin";
              }
              else {
                echo "Sudah input izin".", Total Waktu : ".$cek_detil->total_izin ;
              }

              ?>"/>
              </div>



            </div>



            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Ketepatan Waktu</label>
              <div class="col-sm-6">
                <input readonly="true" type="text" class="form-control" value="<?php
                $harii  = date('D', strtotime($detil->tanggal));
                $tgl1 = date_create($detil->tanggal);
                $tgl2 = date_create($detil->tanggal_kirim);
                $info = date_diff($tgl2,$tgl1);
                $days = $info->format("%a");

                echo "Selisih " . $days . " hari dari tanggal laporan";

                $hey = $detil_peg->id_unit_kerja;

                $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$hey'")->row();

                if($query->kode == 0){
                  if($harii <> 'Fri')
                  {
                    if ($days > 1)
                    {
                      echo " => (TERLAMBAT)";
                    }
                    else {
                      echo " => (TEPAT WAKTU)";
                    }
                  }
                  else {
                    if ($days > 3)
                    {
                      echo " => (TERLAMBAT)";
                    }
                    else {
                      echo " => (TEPAT WAKTU)";
                    }
                  }

                }
                else if($query->kode == 1 or $query->kode == 2 or $query->kode == 5) {
                  if($harii <> 'Sat')
                  {
                    if ($days > 1)
                    {
                      echo " => (TERLAMBAT)";
                    }
                    else {
                      echo " => (TEPAT WAKTU)";
                    }
                  }
                  else {
                    if ($days > 3)
                    {
                      echo " => (TERLAMBAT)";
                    }
                    else {
                      echo " => (TEPAT WAKTU)";
                    }
                  }

                }
                else {
                  if ($days > 1)
                  {
                    echo " => (TERLAMBAT)";
                  }
                  else {
                    echo " => (TEPAT WAKTU)";
                  }
                }



                ?>
                " />
              </div>


              <div class="col-sm-1">
  <button class="btn btn-danger" data-toggle="modal" data-target="#Ket1" type="button"><span class="icon icon-twitch"> Petunjuk</button>

              </div>
            </div>

          </div>

          <div align="center" class="alert alert-info">
            <h4><b>PUTUSAN / PENILAIAN ATASAN</b></h4>
            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Putusan</label>
              <div class="col-sm-6">
              <select id="form-control-21" class="custom-select a">
                  <option value="2">Disetujui</option>
                  <option value="3">Revisi</option>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Catatan Revisi</label>
              <div class="col-sm-6">
                <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
                <textarea class="form-control b" rows="5" ><?php echo $detil->note;?></textarea>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Ketepatan Waktu</label>
              <div class="col-sm-6">
              <select id="form-control-21" class="custom-select tahun c">
                <?php
                foreach ($k as $k) {
                  ?>
                  <option value="<?php echo $k->nilai;?>"><?php echo $k->ketepatan;?></option>
                  <?php
                }
                ?>

              </select>
              </div>



            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label" for="form-control-1">Kesesuaian Laporan</label>
              <div class="col-sm-6">
              <select id="form-control-21" class="custom-select tahun d">
                <?php
                foreach ($t as $t) {
                  ?>
                  <option value="<?php echo $t->nilai;?>"><?php echo $t->kesesuaian;?></option>
                  <?php
                }
                ?>


              </select>
              </div>
            </div>

          </div>







<!--
          <div class="form-group">
            <label class="col-sm-2 control-label" for="form-control-1"></label>
            <div class="col-sm-10">
              <button class="btn btn-info" id="btn_cari">Proses</button>

            </div>
          -->

      </div>






    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">



            </div>
            <strong>Daftar Detil Laporan Harian per
              <?php
              $tgl = date('d-m-Y', strtotime($detil->tanggal));
              $hr  = date('D', strtotime($detil->tanggal));
              if ($hr == 'Sun')
              {
                $hrr = 'Minggu';
              }
              else if ($hr == 'Mon')
              {
                $hrr = 'Senin';
              }
              else if ($hr == 'Tue')
              {
                $hrr = 'Selasa';
              }
              else if ($hr == 'Wed')
              {
                $hrr = 'Rabu';
              }
              else if ($hr == 'Thu')
              {
                $hrr = 'Kamis';
              }
              else if ($hr == 'Fri')
              {
                $hrr = 'Jumat';
              }
              else if ($hr == 'Sat')
              {
                $hrr = 'Sabtu';
              }




             echo $hrr . ', ' .$tgl . ' ( ' .$detil_peg->gelar_depan. $detil_peg->nama . $detil_peg->gelar_belakang . ' )';

             ?>
              <button class="btn btn-primary" data-toggle="modal" data-target="#Ket2" type="button"><span class="icon icon-twitch"> Petunjuk</button>

          </div>
          <div class="card-body">
            <table class="table table-bordered" id="mydata">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr style="background-color: #4CAF50;color: white;">
                  <th>No</th>
                  <th>Uraian Tugas</th>
                  <th>Jam</th>
                  <th>Output</th>

                </tr>
              </thead>

              <tbody id="show_datal">
                <?php
                $no=1;
                foreach ($tes as $t) {
                  ?>
                  <tr
                  <?php
                  if(preg_match("/izin keluar kantor/i", $t->uraian_tugas)) {
                    ?>
                    style="background-color: red;color: white;"

                    <?php

                  }
                  else if(preg_match("/Istirahat/i", $t->uraian_tugas)) {
                    ?>
                    style="background-color: yellow;color: black;"

                    <?php

                  }
                  else if(preg_match("/Ishoma/i", $t->uraian_tugas)) {
                    ?>
                    style="background-color: yellow;color: black;"

                    <?php

                  }
                  else
                  {

                  }

                  ?>

                  >
                  <td><?php echo $no;?></td>
                  <td><?php echo $t->uraian_tugas;?></td>
                  <td><?php echo $t->jam;?></td>
                  <td><?php echo $t->output;?></td>

                  </tr>

                  <?php

                  /*if(preg_match("/izin/i", $t->uraian_tugas)) {
                    echo "Ya";
                  }
                  else {
                    echo "no";
                  }
                  */

                  //echo $t->uraian_tugas.'<br>';
                  $no++;

                }
                ?>



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="ModalKirim" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <span class="text-success icon icon-paper-plane icon-5x"></span>
              <h3 class="text-danger">Proses Persetujuan ?</h3>
              <p>Pastikan bahwa persetujuan yang diberikan sudah sesuai <br> Persetujuan yang diberikan  <b>tidak dapat direvisi lagi </b>.
              </p>
                <input type="hidden" name="kodee" id="textkodep" value="">
              <div class="m-t-lg">
                <button class="btn btn-success" data-dismiss="modal" id="item_prosess"  type="button">Proses</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
  //  alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#mydata').dataTable();
    $('#mydata');

		//fungsi tampil data
		function tampil_data(){
		    $.ajax({
		        //type  : 'ajax',
		        url   : '<?php echo base_url()?>peg/acc_lap/data_detil/<?php echo $this->uri->segment(4)?>',
            async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
                $no =1;

		            for(i=0; i<data.length; i++){



                    html +=
                          '<tr>'+
                          '<td>'+data[i].urutan+'</td>'+
                          '<td>'+data[i].uraian_tugas+'</td>'+
                          '<td>'+data[i].jam+'</td>'+
                          '<td>'+data[i].output+'</td>'+

		                        '</tr>';

		            $no++;}
		            $('#show_data').html(html);
		        }

		    });
		}

    $('.item_proses').on('click',function(){
          //var a=$('.acuan_kirim').val();
          //var id=$(this).attr('data');
          $('#ModalKirim').modal('show');
          $('[name="kodee"]').val(a);
      });


        //Update Barang
		$('#item_prosess').on('click',function(){
      //alert('ooiiiiiiii');
            var a=$('.a').val();
            var b=$('.b').val();
            var c=$('.c').val();
            var d=$('.d').val();

            var e=$('.acuan_kirim').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('peg/acc_lap/verif')?>",
                dataType : "JSON",
                data : {a:a , b:b, c:c, d:d, e:e},
                success: function(data){
                    $('.a').val("");
                    $('.b').val("");
                    $('.c').val("");
                    $('.d').val("");
                    $('.acuan_kirim').val("");
                    window.location='../../../peg/acc_lap';
                }
            });
            return false;
        });



	});

</script>
