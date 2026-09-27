<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">
                <div class="col-md-8">

                    <form class="form form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
                        <div class="col-sm-9">
                        <select id="form-control-21" class="custom-select tahun">
                          <?php
                          foreach ($tahun as $tahun) {
                            ?>
                            <option value="<?php echo $tahun->tahun;?>"><?php echo $tahun->tahun;?></option>
                            <?php
                          }
                           ?>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Bulan</label>
                        <div class="col-sm-9">
                          <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
                          <select id="form-control-21" class="custom-select bulan">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>

                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1"></label>
                        <div class="col-sm-9">
                          <button class="btn btn-info" id="btn_cari">Tampilkan Absensi TK</button>

                        </div>

                  </div>
                </div>

              <div class="col-md-12">
                <div class="text-right m-b">
                  <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Set Absensi</button>
                </div>
              </div>

    <div class="text-right m-b">

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar Absensi Pegawai ( <?php echo $pegawai->nik;?> / <?php echo $pegawai->gelar_depan . $pegawai->nama . $pegawai->gelar_belakang;?> )</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="yuz">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Tanggal</th>
                  <th>Apel Msk</th>
                  <th>A. Plg</th>
                  <th>Upacara Senin</th>
                  <th>U. Besar</th>
                  <th>Ket</th>
                  <th>Pagi</th>
                  <!--<th>Siang</th>-->
                  <th>Pulang</th>
                  <th>Total Izin</th>
                  <th>Aksi</th>
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


<!-- MODAL ADD -->
<div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Absensi Pegawai (<?php echo $pegawai->nama;?>)</h4>
      </div>
      <div class="modal-body">
        <form id="userInfo" class="form-horizontal">
          <div class="form-group">
            <label class="control-label">Tanggal</label>
            <input class="form-control a" name="a" autocomplete="off" type="text" data-provide="datepicker" data-date-today-btn="linked">
          </div>

          <div class="form-group">
            <label class="control-label">Status Kehadiran</label>
            <select name="b"  class="form-control b">
              <option value="1">Hadir </option>
              <option value="0">Tidak Hadir / Cuti </option>
              <option value="2">Tugas Luar</option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Apel / Upacara</label>
            <select name="c"  class="form-control c">
              <option value="1">Hadir Apel Pagi </option>
              <option value="2">Hadir Upacara Hari Senin </option>
              <option value="3">Hadir Upacara Hari Besar </option>
              <option value="4">Tdk Hadir Apel Pagi / Upacara Hari Senin / Upacara Hari Besar </option>

            </select>
            <small>Jika Pegawai Tugas Luar maka silahkan pilih "Hadir Apel Pagi / Hadir Upacara Hari Senin / Hadir Upacara Hari Besar" sesuai dengan Apel / Ucapara pada hari itu </small>
          </div>

          <div class="form-group">
            <label class="control-label">Apel Pulang</label>
            <select name="d"  class="form-control d">
              <option value="1">Ya</option>
              <option value="0">Tidak</option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Jam Masuk</label>
            <input id="" class="form-control e" maxlength="5" name="e" type="text" placeholder="jam:menit">
            <span class="help-block">Silahkan input dengan format jam sebagai berikut <b> (jam:menit) </b>.</span>
          </div>

        <!--  <div class="form-group" data-toggle="match-height">
            <label class="control-label">Jam Masuk Siang</label>
            <input id="form-control" class="form-control f" maxlength="5" name="f" type="text" placeholder="jam:menit">
          </div>
        -->


          <div class="form-group">
            <label class="control-label">Jam Pulang</label>
            <input id="form-control-2"  class="form-control g" maxlength="5" name="g" type="text" placeholder="jam:menit">
          </div>

          <div class="form-group">
            <label class="control-label">Total Jam Izin</label>
            <input name="h" autocomplete="off" autofocus id="cc" maxlength="5" placeholder="jam:menit" class="form-control h" type="text">
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan">Simpan</button>
          </div>

        </form>
      </div>
    </div>

</div>

</div>
<!--END MODAL ADD-->



<!-- MODAL EDIT -->

<div id="ModalEditji"  role="dialog" class="modal fade"></div>


<!--END MODAL EDIT-->


<!--MODAL HAPUS-->

<div id="ModalHapus" tabindex="-1" role="dialog" class="modal fade">
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
              <span class="text-danger icon icon-times-circle icon-5x"></span>
              <h3 class="text-danger">Hapus Data</h3>
              <p>Apakah Anda yakin mau memhapus data ini ?
              </p>
                <input type="hidden" name="kode" id="textkode" value="">
              <div class="m-t-lg">
                <button class="btn btn-danger" data-dismiss="modal" id="btn_hapus"  type="button">Hapus</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

<!--END MODAL HAPUS-->



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>


<script type="text/javascript">
	$(document).ready(function(){
    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#yuz').dataTable();
    $('#yuz');

		//fungsi tampil data
		function tampil_data(){
      var aa=$('.tahun').val();
      var bb=$('.bulan').val();
      var cc=$('.nik').val();
		    $.ajax({
          url   : '<?php echo base_url()?>/admin/absensi/load_absen_detil_sd/',
          dataType : "JSON",
          data : {a:aa , b:bb, c:cc},
          success: function(data){
		            var html = '';
		            var i;
                $no = 1;
		            for(i=0; i<data.length; i++){
                  if (data[i].apel_masuk == 1)
                  {
                    $tes = "Ya";
                  }
                  else {
                    $tes = "Tidak";
                  }

                  if (data[i].tanggal1 == 'Sun')
                  {
                    $dayy = "Minggu";
                  }
                  else if (data[i].tanggal1 == 'Mon')
                  {
                    $dayy = "Senin";
                  }
                  else if (data[i].tanggal1 == 'Tue')
                  {
                    $dayy = "Selasa";
                  }
                  else if (data[i].tanggal1 == 'Wed')
                  {
                    $dayy = "Rabu";
                  }
                  else if (data[i].tanggal1 == 'Thu')
                  {
                    $dayy = "Kamis";
                  }
                  else if (data[i].tanggal1 == 'Fri')
                  {
                    $dayy = "Jumat";
                  }
                  else if (data[i].tanggal1 == 'Sat')
                  {
                    $dayy = "Sabtu";
                  }
                  else {
                    $dayy = "False";
                  }

                  html += '<tr>'+
                    '<td>'+$no+'</td>'+
                    '<td>'+$dayy+'</td>'+

                        '<td>'+data[i].tanggal+'</td>'+
                        '<td>'+data[i].apel_masuk+'</td>'+
                        '<td>'+data[i].apel_pulang+'</td>'+
                        '<td>'+data[i].upacara_hari_senin+'</td>'+
                        '<td>'+data[i].upacara_hari_besar+'</td>'+
                        '<td>'+data[i].ket_status+'</td>'+
                        '<td>'+data[i].jam_masuk_1+'</td>'+
                        /*'<td>'+data[i].jam_masuk_2+'</td>'+*/
                        '<td>'+data[i].jam_pulang+'</td>'+
                        '<td>'+data[i].jam_izin+'</td>'+
                          '<td style="text-align:right;">'+
                                  '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit_tes" data="'+data[i].id+'"><span class="icon icon-pencil"></span></a>'+' '+
                                  '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id+'"><span class="icon icon-times"></span></a>'+
                          '</td>'+
                          '</tr>';

		           $no++; }
		            $('#show_data').html(html);
		        }

		    });
		}





		//GET UPDATE
    $('#show_data').on('click','.item_edit_tes',function(){

      //  $(".item_edit_tes").click(function(e) {
            //alert('nita sayang');
            var id=$(this).attr('data');
            $.ajax({
                url  : "<?php echo base_url('admin/absensi/acuan_tk')?>",
                type: "GET",
                data : {id: id,},
                success: function (ajaxData){
                    $("#ModalEditji").html(ajaxData);
                    $("#ModalEditji").modal('show',{backdrop: 'true'});
                }
            });

        });

		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('admin/absensi/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id_jabatan,jabatan,tpp_max){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aaa"]').val(data.id);
                         $('[name="bbb"]').val(data.nik);
                         $('[name="aa"]').val(data.tanggal);
                         $('[name="dd"]').val(data.apel_masuk);
                         $('[name="ee"]').val(data.apel_pulang);
                         $('[name="ff"]').val(data.upacara_hari_senin);
                         $('[name="gg"]').val(data.upacara_hari_besar);
                         $('[name="hh"]').val(data.hari_kerja);
                         $('[name="ii"]').val(data.jam_masuk_1);
                         $('[name="jj"]').val(data.jam_masuk_2);
                         $('[name="kk"]').val(data.jam_pulang);
                         $('[name="ll"]').val(data.jam_izin);

            		});
                }
            });
            return false;
        });

        //btn_cari
		$('#btn_cari').on('click',function(){
            var aa=$('.tahun').val();
            var bb=$('.bulan').val();
            var cc=$('.nik').val();

            $.ajax({
                type : "GET",
                url   : '<?php echo base_url()?>/admin/absensi/load_absen_detil_sd/',
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc},
                success: function(data){
                  var html = '';
                  var i;
                  $no=1;
                  for(i=0; i<data.length; i++){
                    if (data[i].apel_masuk == 1)
                    {
                      $tes = "Ya";
                    }
                    else {
                      $tes = "Tidak";
                    }

                    if (data[i].tanggal1 == 'Sun')
                    {
                      $dayy = "Minggu";
                    }
                    else if (data[i].tanggal1 == 'Mon')
                    {
                      $dayy = "Senin";
                    }
                    else if (data[i].tanggal1 == 'Tue')
                    {
                      $dayy = "Selasa";
                    }
                    else if (data[i].tanggal1 == 'Wed')
                    {
                      $dayy = "Rabu";
                    }
                    else if (data[i].tanggal1 == 'Thu')
                    {
                      $dayy = "Kamis";
                    }
                    else if (data[i].tanggal1 == 'Fri')
                    {
                      $dayy = "Jumat";
                    }
                    else if (data[i].tanggal1 == 'Sat')
                    {
                      $dayy = "Sabtu";
                    }
                    else {
                      $dayy = "False";
                    }

                      html += '<tr>'+
                        '<td>'+$no+'</td>'+
                        '<td>'+$dayy+'</td>'+

                            '<td>'+data[i].tanggal+'</td>'+
                            '<td>'+data[i].apel_masuk+'</td>'+
                            '<td>'+data[i].apel_pulang+'</td>'+
                            '<td>'+data[i].upacara_hari_senin+'</td>'+
                            '<td>'+data[i].upacara_hari_besar+'</td>'+
                            '<td>'+data[i].ket_status+'</td>'+
                            '<td>'+data[i].jam_masuk_1+'</td>'+
                            '<td>'+data[i].jam_pulang+'</td>'+
                            '<td>'+data[i].jam_izin+'</td>'+
                              '<td style="text-align:right;">'+
                                      '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit_tes" data="'+data[i].id+'"><span class="icon icon-pencil"></span></a>'+' '+
                                      '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id+'"><span class="icon icon-times"></span></a>'+
                              '</td>'+
                              '</tr>';

                  $no++;}
                  $('#show_data').html(html);
                }
            });
            return false;
        });

        //Simpan
        $('#btn_simpan').on('click',function(){
                var a=$('.a').val();
                var b=$('.b').val();
                var c=$('.c').val();
                var d=$('.d').val();
                var e=$('.e').val();
                var f=$('.f').val();
                var g=$('.g').val();
                var h=$('.h').val();
                var nik=$('.nik').val();


                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/absensi/simpan_tk')?>",
                    dataType : "JSON",
                    data : {a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,nik:nik},
                    success: function(data){
                        $('[name="a"]').val("");
                        $('[name="b"]').val("");
                        $('[name="c"]').val("");
                        $('[name="d"]').val("");
                        $('[name="e"]').val("");
                        $('[name="f"]').val("");
                        $('[name="g"]').val("");
                        $('[name="h"]').val("");
                        $('#ModalaAdd').modal('hide');
                        tampil_data();
                    }
                });
                return false;
            });




        //Update
		$('#btn_update').on('click',function(){
            var aa=$('#aa').val();
            var bb=$('#bb').val();
            var cc=$('#cc').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/set_tpp/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
                var id=$(this).attr('data');
                $('#ModalHapus').modal('show');
                $('[name="kode"]').val(id);
            });



        //Hapus
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/absensi/hapus_sd')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data();
                    }
                });
                return false;
            });



	});



</script>
