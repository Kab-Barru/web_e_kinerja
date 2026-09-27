


<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">
      <div class="layout-content">
        <div class="layout-content-body">

          <div class="text-left m-b" style="font-size:10px">
          <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>
          <!-- <a href="javascript:;"  class="btn btn-danger btn-xs mr-1" data-toggle="tooltip" data-placement="top" title="Hapus" id="hapuz" ><span class="fas fa-trash"></span></a> -->
      <a href="<?php echo site_url('peg/lap/cetak/'.$this->uri->segment('4'));?>" ><button class="btn btn-danger" href="<?php echo site_url('peg/lap/cetak/');?>" type="button">Cetak</button></a>
      <?php
      if ($detil->status == 2 or $detil->status == 1 )
      {

      }
      else
      {
        date_default_timezone_set('Asia/Jakarta');
  			$now = date("Y-m-d"); //tgl server
  			$tgl1 = date_create($detil->tanggal);
  			$tgl2 = date_create($now);
  			$info = date_diff($tgl2,$tgl1);
  			$days = $info->format("%a");

        ?>
        <button class="btn btn-info " onclick="kirim('<?php echo $this->uri->segment('4') ?>')">Kirim Laporan Keatasan</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah</button>

        <?php


      }

       ?>


      <input class="acuan_kirim" value="<?php echo $this->uri->segment(4);?>" type="hidden"/>
          </div>



    <?php

if ($detil->status == 3)
{
  ?>
  <div class="row gutter-xs">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="media">
                  <div class="media-middle media-left">
                    <span class="bg-gray sq-64 circle">
                      <span class="icon-works">&#228;</span>
                    </span>
                  </div>
                  <div class="media-middle media-body">
                    <h3 class="media-heading">
                      <span class="fw-l">Catatan / Revisi dari Atasan</span>
                      <span class="fw-b fz-sm text-danger">
                        <span class="icon icon-caret-down">Cek dibawah</span>
                      </span>
                    </h3>
                    <?php echo $detil->note;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

}


?>

<b>Note :</b> <br>
Bagi pegawai yang <b>IZIN DIANTARA JAM KERJA</b> untuk keperluan seperti <i> izin acara nikahan, izin menjenguk, dan lain-lain </i> selama beberapa jam / menit dapat menuliskan <b>URAIAN TUGAS</b> pada laporan harian dengan format <b><i> "IZIN KELUAR KANTOR" </i></b>.

</b>



    <div class="row gutter-xs">
            <div class="col-lg-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                <div class="card-actions">
            <!-- <button type="button" class="card-action card-reload" title="Reload"></button> -->
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


             echo $hrr . ', ' .$tgl;

             ?></strong>
                </div>
                <div class="card-body">


                  <div class="datatable-responsive">
                    <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                      <thead>
                            <tr>
                              <th>No</th>
                              <th>Uraian Tugas</th>
                              <th>Jam</th>
                              <th>Output</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <!-- <tbody id="show_data">


                          </tbody> -->
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL ADD -->
  <div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">

        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h6 class="modal-title">Input Laporan Harian</h6>
            </div>
            <div class="modal-body">
              <form>

                <div class="form-group">
                  <label class="control-label">Kegiatan Ke-</label>
                  <input type="number" class="form-control e" name="e" />
                </div>

                <div class="form-group">
                  <label class="control-label">Uraian Tugas</label>
                  <textarea rows="5" class="form-control a" name="a"></textarea>
                </div>

                <div class="form-group">
                  <label class="control-label">Jam</label>
                  <input class="form-control b" autocomplete="off" name="b" type="text" />
                  <input type="hidden" class="d" value="<?php echo $this->uri->segment(4);?>" />
                </div>


                <div class="form-group">
                  <label class="control-label">Output</label>
                  <textarea rows="5" class="form-control c" name="c"></textarea>
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

      </div>
    </div>
  </div>
</div>
<!-- MODAL EDIT -->
<div id="ModalaEdit" tabindex="-1" role="dialog" class="modal fade">

      <div class="modal-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <span class="modal-title">Edit Data</span>
      </div>
      <div class="modal-body">

        <form>

          <div class="form-group">
            <label class="control-label">Kegiatan Ke-</label>
            <input type="number" class="form-control ee" name="ee" />
          </div>


          <div class="form-group">
            <label class="control-label">Uraian Tugas</label>
            <textarea rows="5" class="form-control aa" name="aa"></textarea>
          </div>

          <div class="form-group">
            <label class="control-label">Jam</label>
            <input class="form-control bb" autocomplete="off" name="bb" type="text" />
            <input type="hidden" class="dd"  />
          </div>

          <div class="form-group">
            <label class="control-label">Output</label>
            <textarea rows="5" class="form-control cc" name="cc"></textarea>
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>
<!--END MODAL EDIT-->


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
              <h3 class="text-danger">Kirim Laporan Keatasan</h3>
              <p>Pastikan terlebih dahulu detil kegiatan telah diinputkan. <br>
                Lanjut mengirim laporan ke Atasan ?
              </p>
                      <input type="hidden" name="kodee" id="textkodep" value="">
              <div class="m-t-lg">
                <button class="btn btn-success" data-dismiss="modal" id="item_kirimm"  type="button">Kirim</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

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
<!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script> -->

<script
  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

   var dt = $("#datatable").DataTable({
             //"ajax": srv + "admin/Kinerja/",
             "ajax":"<?php echo base_url() ?>peg/lap/data_detil/<?php echo $this->uri->segment(4)?>",
             "lengthChange":true,
                   "bInfo": false,
               "searching":true,
               "deferRender": false,
               "pageLength":10,
               "scrollX": true,
               "paging":true,
                   "columns": [


           { "data": "urutan"},

           { "data": "uraian_tugas"},
             { "data": "jam"},
               { "data": "output"},


           {
              "width":"50px",
              render: function(data, type, row){
                if (row.urutan=='1') {
                detail= '<div class="d-flex" style="color:white">'+
                        '<a disabled="" class="btn btn-danger btn-xs mr-1" type="button"   ><span class="fas fa-lock"></span></a>'+
                        '</div>';
                }else{
                 status='<?php echo $detil->status   ?>';
                  if (status==0||status==3) {
                    detail= '<div class="d-flex" style="color:white">'+
                            '<a data-toggle="modal" data-target="#ModalaEdit" type="button" class="btn btn-warning btn-xs mr-1"  title="Edit" onclick="show('+row.id_pro_lap_detil+')"><span class="fas fa-edit"></span></a>'+
                            '<a  class="btn btn-danger btn-xs mr-1" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="hapus('+row.id_pro_lap_detil+')" ><span class="fas fa-trash"></span></a>'+
                            '</div>';
                  }else{
                    detail= '<div class="d-flex" style="color:white">'+
                            // '<a disabled="" type="button" class="btn btn-warning btn-xs mr-1"  ><span class="fas fa-edit"></span></a>'+
                            '<a disabled="" class="btn btn-danger btn-xs mr-1" type="button"   ><span class="fas fa-lock"></span></a>'+
                            '</div>';
                  }


                }
           return detail;
             },
             sortable: false
           }
           ]
           }); /*end datatables*/





        // alert('oi');

    	//	tampil_data();	//pemanggilan fungsi tampil barang.
    //KIRIM
    $('#item_kirimm').on('click',function(){
      //alert('tes');
            //var a=$('.acuan_kirim').val();
            var a=$('#textkodep').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('peg/lap/kirim')?>",
                dataType : "JSON",
                data : {a:a},
                success: function(data){
                    $('.acuan_kirim').val("");
                    $('.tes').append('berhasil');
                    window.location='../../../peg/lap';
                }
            });
            return false;
        });


		//GET UPDATE
		$('#show').on('click','.item_edit',function(){
  // $('#ModalaEdit').show();

            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('peg/lap/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(uraian_tugas,jam,output,id_pro_lap_detil){
                  $("#ModalaEdit").modal('show');
            			$('.aa').val('sjdcjksd');
            			$('[name="bb"]').val(data.jam);
                  $('[name="cc"]').val(data.output);
                  $('.dd').val(data.id_pro_lap_detil);
                  $('.ee').val('1');

            		});
                }
            });
            return false;

        });

        //konfirmasi kirim
    		//$('#show_data').on('click','.item_kirim',function(){
          $('.item_kirim').on('click',function(){
                var a=$('.acuan_kirim').val();
                //var id=$(this).attr('data');
                $('#ModalKirim').modal('show');
                $('[name="kodee"]').val(a);
            });


		//GET HAPUS




		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var a=$('.a').val();
            var b=$('.b').val();
            var c=$('.c').val();
            var d=$('.d').val();
            var e=$('.e').val();
            // var table=()
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('peg/lap/simpan_detil')?>",
                dataType : "JSON",
                data : {a:a,b:b,c:c,d:d,e:e},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    $('[name="c"]').val("");
                    $('[name="d"]').val("");
                    $('[name="e"]').val("");
                    location.reload();

                    // $('#ModalaAdd').modal('hide');
                    // tampil_data();
                }
            });
            return false;
        });

        //Update Barang
		$('#btn_update').on('click',function(){
            var aa=$('.aa').val();
            var bb=$('.bb').val();
            var cc=$('.cc').val();
            var dd=$('.dd').val();
            var ee=$('.ee').val();


            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('peg/lap/update_det')?>",
                dataType : "JSON",
                data : {a:aa , b:bb,c:cc,d:dd,e:ee},
                success: function(data){
                  Swal.fire(
                    'Sukses..!!',
                    'Data di Perbaruhi !',
                    'success'
                  )
                        location.reload();
                }
            });
            return false;
        });


	});

  function hapus(id){
    var srv='<?php echo base_url() ?>';
    Swal.fire({
       title: 'Peringatan',
       text: "Apakah Anda Yakin Ingin Mengapus Data Ini?",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya'
     }).then((result ) => {
       if (result.value) {
           $.post(srv+'peg/Lap/hapus_laporan/'+id,function(response){
             var result = $.parseJSON(response);
             console.log();
                 if (result.status == true) {
                   Swal.fire({
                     type: 'success',
                     title: 'Success',
                     text: result.messages
                   });

                   // dt.ajax.reload();

                   location.reload();
                 //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                 } else {
                   Swal.fire({
                     type: 'error',
                     title: 'Oops...',
                     html: result.messages
                   });
                 }
           })
         }
    });
  }

  function show(id){
    var srv='<?php echo base_url() ?>';
         $.getJSON(srv+'peg/lap/acuan/'+id,function(data){
                 $('.aa').val(data.uraian_tugas);
                 $('[name="bb"]').val(data.jam);
                 $('[name="cc"]').val(data.output);
                 $('.dd').val(data.id_pro_lap_detil);
                 $('.ee').val(data.urutan);
            });
  }

  function kirim(id){
    var srv='<?php echo base_url() ?>';
    Swal.fire({
       title: 'konfirmasi',
       text: "Apakah Anda Yakin Ingin Mengirim data?",
       type: 'question',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya'
     }).then((result ) => {
       if (result.value) {

           $.post(srv+'peg/lap/kirim/'+id,function(response){
             var result = $.parseJSON(response);
             console.log();
                 if (result.status == true) {
                   Swal.fire({
                     type: 'success',
                     title: 'Success',
                     text: result.messages
                   });

                   // dt.ajax.reload();

                   location.reload();
                 //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                 } else {
                   Swal.fire({
                     type: 'error',
                     title: 'Oops...',
                     html: result.messages
                   });
                 }
           })
         }
    });
  }

</script>
