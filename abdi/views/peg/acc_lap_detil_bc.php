<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">

      <button class="btn btn-info item_proses" type="button">Proses</button> &nbsp;&nbsp;
      <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>

      <input class="acuan_kirim" value="<?php echo $this->uri->segment(4);?>" type="hidden"/>
    </div>

    <div class="col-md-12">

        <form class="form form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="form-control-1">Keterangan</label>
            <div class="col-sm-5">
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
            <label class="col-sm-2 control-label" for="form-control-1">Putusan</label>
            <div class="col-sm-5">
            <select id="form-control-21" class="custom-select a">
                <option value="2">Disetujui</option>
                <option value="3">Revisi</option>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="form-control-1">Catatan Revisi</label>
            <div class="col-sm-10">
              <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
              <textarea class="form-control b" rows="5" ><?php echo $detil->note;?></textarea>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="form-control-1">Ketepatan Waktu</label>
            <div class="col-sm-3">
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

            <label class="col-sm-2 control-label" for="form-control-1">Rekomendasi Sistem</label>
            <div class="col-sm-5">
            <input readonly="true" type="text" class="form-control" value="<?php
            $tgl1 = date_create($detil->tanggal);
            $tgl2 = date_create($detil->tanggal_kirim);
            $info = date_diff($tgl2,$tgl1);
            echo "Selisih " . $info->a . " hari dari waktu pembuatan laporan";?>
            " />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="form-control-1">Kesesuaian Laporan</label>
            <div class="col-sm-10">
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

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

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

             ?></strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Uraian Tugas</th>
                  <th>Jam</th>
                  <th>Output</th>

                </tr>
              </thead>

              <tbody id="show_data">


              </tbody>
            </table>
          </div>
        </div>
      </div>
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
		                html += '<tr>'+
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


        //Update Barang
		$('.item_proses').on('click',function(){
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
