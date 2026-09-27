


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="content-header">

        <div class="container-fluid">
          <div class="layout-content">
            <div class="layout-content-body">

            <div class="row gutter-xs">
                    <div class="col-lg-12 col-xs-12">
                      <div class="card">
                        <div class="card-header">
                        <div class="card-actions">
                          <b>Note :</b> <br>
                          Jika <b>Absensi</b> Anda Pada Mesin Telah berhasil.Namun Data Absen anda belum tercatat pada halaman ini Maka silahkan Tekan Tombol Bantuan di bawah..!
                          </b>
                          <hr>
                              <div class="" align="right" style="padding:10px;">
                                <button type="button" id="bantuan" class="btn btn-warning" name="button" style="color:white"><i class="fa fa-hands-helping" style="color:black"></i> Bantuan</button>
                              </div>
                    </div>

                        </div>
                        <div class="card-body">


                          <div class="datatable-responsive">
                            <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                              <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kode</th>
                                      <th>Tanggal</th>
                                      <th>Jam Masuk</th>
                                      <!-- <th> Selisih Jam Masuk</th> -->
                                      <th>Jam Siang</th>
                                      <th>Jam Pulang</th>
                                      <th>Keterangan</th>

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
        <h4 class="modal-title">Edit Data</h4>
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
<script
    src="<?php echo base_url() ?>assets/js/fungsi.js" >
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

    $('#bantuan').on('click', function() {
      var uk = '<?php echo $_SESSION['id_unit_kerja'] ?>';
      tgl = '<?php echo date("Y-m-d"); ?>';
      id_absen = '<?php echo $_SESSION['id_peg'] ?>';


      $.ajax({
        type: "GET",
        // url:'<?php echo base_url('api/Api/finger') ?>',
        url: 'https://e-finger.barrukab.go.id/api/data-absensi',
        dataType: 'json',
        data: {
          tanggal: tgl,
          // tanggal: "2021-11-08",
          waktu: "1",
          unker: uk,
          id_absensi: id_absen,

          // id_absensi: "555"
        },


        success: function(response) {


          if (response!='data baru tidak di temukan'){
            alert('Data Baru Tidak Ditemukan');
          } else {
            alert('Data Baru Telah ditambahkan');
            location.reload();



          }
          //  var json = JSON.parse(response);
          // alert(cek);
          console.log(cek);


        }
      })
    });



//     $('#ModalaAdd').on('shown.bs.modal', function () {
//                    $('[name="a"]').val("Masuk kantor");
//                     $('[name="b"]').val("07:00-16:00");
//                     $('[name="c"]').val("tanda tangan daftar hadir");

//                     $('[name="e"]').val("1");
// ;            })
    // $('#ModalaEdit').on('shown.bs.modal', function () {
    //                $('[name="a"]').val("Masuk kantor");
    //                 $('[name="b"]').val("07:00-16:00");
    //                 $('[name="c"]').val("tanda tangan daftar hadir");
    //
    //                 $('[name="e"]').val("1");
    //                })
   var dt = $("#datatable").DataTable({
             //"ajax": srv + "admin/Kinerja/",
             "ajax":"<?php echo base_url() ?>peg/Absensi/detail_absen/<?php echo $_SESSION['id_peg']?>",
             "lengthChange":true,
                   "bInfo": false,
               "searching":true,
               "deferRender": false,
               "pageLength":10,
               "scrollX": true,
               "paging":true,
                   "columns": [
           {
             render: function(data, type, row, meta){
               return meta.row  + 1 + '.';
             },
           },
          { "data": "kode"},
           {
             render: function(data, type, row, meta){
               let tgl=row.kode;
              var tglnya=tgl.substring(5,15);
               return tgl1(tglnya);
             },
           },

           // { "data": "tanggal"},
           { "data": "jam_masuk"},
           // {
           // render: function(data, type, row, meta){
           //   var a=new  date(row.jam_masuk);
           //       b= new date('07:35:00');
           //       aa=a.getTime();
           //       bb=b.getTime();
           //       hasil=aa-bb;
           //    return (hasil/1000);
           //     },
           //   },
           { "data": "jam_siang"},
           { "data": "jam_pulang"},
           { "data": "keterangan"},


           // {
           //    "width":"50px",
           //    render: function(data, type, row){
           //      return detail= '<div class="d-flex" style="color:white">'+
           //
           //            '<a type="button" class="btn btn-warning btn-xs mr-1" data-toggle="modal" data-target=".bd-example-modal-sm" title="Edit Agenda" onclick="show('+row.id_pro_lap_detil+')"><span class="fas fa-edit"></span></a>'+
           //            '<a href="javascript:;"  class="btn btn-danger btn-xs mr-1" data-toggle="tooltip" data-placement="top" title="Hapus"  onclick="hapus('+row.id_pro_lap_detil+')" ><span class="fas fa-trash"></span></a></div>';
           //
           //
           //   },
           //   sortable: false
           // }
           ]
           }); /*end datatables*/


		// $('#mydata').dataTable();
    // $('#mydata');

		//fungsi tampil data
		// function tampil_data(){



		    // $.ajax({
		    //     //type  : 'ajax',
		    //     url   : '<?php echo base_url()?>peg/lap/data_detil/<?php echo $this->uri->segment(4)?>',
		    //     async : false,
		    //     dataType : 'json',
		    //     success : function(data){
		    //         var html = '';
		    //         var i;
        //         $no = 1;
        //
		    //         for(i=0; i<data.length; i++){
		    //             html += '<tr>'+
        //                   '<td>'
        //                     +data[i].urutan+'</td>'+
		    //               		'<td>'+data[i].uraian_tugas+'</td>'+
        //                   '<td>'+data[i].jam+'</td>'+
        //                   '<td>'+data[i].output+'</td>'
        //                     <?php
        //                     if ($detil->status == 2 or $detil->status == 1 )
        //                     {
        //                       ?>
        //
        //
        //                       <?php
        //
        //
        //                     }
        //                     else
        //                     {
        //                       ?>
        //                       +
    		//                         '<td style="text-align:center;">'
        //                         +
        //                       '<a id="show" data-toggle="modal" data-target="#ModalaEdit" type="button" class="btn btn-info btn-icon sq-24 item_edit btn-sm" data="'+data[i].id_pro_lap_detil+'" style="width:30px;height:30px;color:white"><span class="fa fa-edit"></span></a>'+
        //                       '<a  class="btn btn-danger btn-icon sq-24 item_hapus btn-sm"  onclick="hapus('+data[i].id_pro_lap_detil+')"  style="width:30px;height:30px;color:white"><span class="fa fa-times"></span></a>'+
        //                       <?php
        //                     }
        //                      ?>
        //
        //
        //
        //                         '</td>'+
		    //                     '</tr>';
        //
		    //         $no++;}
		    //         $('#show_data').html(html);
		    //     }
        //
		    // });
		// }



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
		// $('#show_data').on('click','.item_hapus',function(){
    //         var id=$(this).attr('data');
    //         $('#ModalHapus').modal('show');
    //         $('[name="kode"]').val(id);
    //     });



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
                    $('.aa').val("");
                    $('.bb').val("");
                    $('.cc').val("");
                    $('.dd').val("");
                    $('.ee').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data();
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



</script>
