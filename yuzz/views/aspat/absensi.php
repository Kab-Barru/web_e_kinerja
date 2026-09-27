<?php   $this->session->set_userdata('menu', '2'); ?>
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


                          <div class="datatable-responsive" style="max-width:100%;overflow-x:auto">
                            <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0" >

                              <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kode</th>
                                      <th>Tanggal</th>
                                      <th>Jam Masuk</th>
                                      <th>Jam Siang</th>
                                      <th>Jam Pulang</th>
                                      <!-- <th>Keterangan</th> -->
                              </tr>
                                  </thead>
                                  <!-- <tbody > -->

                                   <?php
                                   $no=1;
                                   foreach ($absen as $asn) {?>
                                     <tr>
                                       <td><?php echo $no++ ?></td>
                                       <td><?php echo $asn->kode ?></td>
                                       <td><?php
                                       $kode= substr($asn->kode,5,15);  // returns "abcde"substring(5,15);
                                       $tgl = date('d-m-Y', strtotime($kode));
                                       $hr  = date('D', strtotime($kode));
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



                                         ?></td>
                                       <td>
                                      <?php
                                       $pertama  = strtotime($asn->jam_masuk); //waktu awal

                                       if ($pertama=='') {
                                         echo 'Tidak Hadir';
                                       }else{
                                         echo $asn->jam_masuk;
                                       }

                                       $akhir = strtotime('07:35:00'); //waktu akhir


                                       $kurang=strtotime('07:30:00'); //waktu akhir

                                       if ($pertama=='') {
                                         $awal=strtotime('12:00:00');
                                         $selisih='2';
                                       }else if ($pertama<$akhir) {
                                         $awal=strtotime('07:30:00');
                                         $selisih='0';
                                         // $lambat='0';
                                       }else{
                                         $awal=$pertama;
                                         $selisih='1';
                                         // $lambat= '1';
                                       }

                                       $diff  = $awal - $kurang;

                                       $jam   = floor($diff / (3600));

                                       $menit = $diff-( $jam * (3600) );

                                       $detik = $diff % 60;



                                       // $jam   = floor($diff / (60 * 60));
                                       // $menit = $diff - ( $jam * (60 * 60) );
                                       // $detik = $diff % 60;



                                       if ($selisih=='0') {
                                          echo '</br><span style="color:green">Tepat Waktu</span>';
                                       }else{

                                      // echo '</br><span style="color:orange">Selisih '.number_format($diff,0,",",".").' detik<br />';
                                      echo  '</br><span style="color:red">Keterlambatan: ' . $jam .  ' jam, ' . floor($menit / 60)  . ' menit, '. $detik . ' detik</span><br>';

                                      // echo $lambat;
                                    }
                                        echo ' <span class="badge badge-success">'.$asn->ket_1.'</span>';


                                       ?>
                                     </td>

                                       <td>
                                         <?php
                                         $kedua  = strtotime($asn->jam_siang); //waktu awal
                                               if ($kedua=='') {
                                                 echo 'Tidak Hadir';
                                               }else{
                                                 echo $asn->jam_siang;
                                               }

                                               $akhir1 = strtotime('12:50:00'); //waktu akhir
                                               if ($hrr == 'Jumat') {
                                                    $kurang1=strtotime('13:50:00');
                                                 $akhir1 =$kurang1;
                                               }else{
                                                    $kurang1=strtotime('12:50:00');
                                                       $akhir1 =$kurang1;
                                               }
                                               // $kurang1=strtotime('12:50:00'); //waktu akhir
                                               if ($kedua=='') {
                                                 $awal1=strtotime('16:00:00');
                                                 $selisih1='2';
                                               }else if ($kedua<$akhir1) {
                                                 $awal1=$akhir1;
                                                 $selisih1='0';
                                               }else{
                                                 $awal1=$kedua;
                                                 $selisih1='1';

                                               }

                                               $diff1  = $awal1-$kurang1;

                                               $jam1   = floor($diff1 / (3600));

                                               $menit1 = $diff1 - ( $jam1 * (3600) );

                                               $detik1 = $diff1 % 60;






                                               if ($selisih1=='0') {
                                                  echo '</br><span style="color:green">Tepat Waktu</span>';
                                               }else{

                                                 echo  '</br><span style="color:red">Keterlambatan: ' . $jam1 .  ' jam, ' . floor($menit1 / 60) . ' menit, '.$detik1 . ' detik</span><br>';

                                                 // echo $lambat;

                                              }
                                            echo ' <span class="badge badge-success">'.$asn->ket_2.'</span>';
                                          ?>


                                       </td>
                                       <td>
                                         <?php $pulang= $asn->jam_pulang;
                                         if ($pulang=='') {
                                           echo '<span style="color:red">Tidak Absen</span>';
                                         }else{
                                           echo $pulang;
                                         }
                                         echo ' </br><span class="badge badge-success">'.$asn->ket_3.'</span>';
                                           ?>

                                       </td>
                                       <!-- <td><?php echo $asn->keterangan ?></td> -->
                                     </tr>

                                    <?php } ?>
                                  <!-- </tbody> -->
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

<script
  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url() ?>assets/js/fungsi.js" >
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

     $('#datatable').DataTable();

    $('#bantuan').on('click', function() {

      var uk = '<?php echo $_SESSION['id_unit_kerja'] ?>';
        var ms = '<?php echo $_SESSION['kode_mesin'] ?>';
      tgl = '<?php echo date("Y-m-d"); ?>';
      id_absen = '<?php echo $_SESSION['id_peg'] ?>';
      //
      //
      // $.ajax({
      //   type: "GET",
      //   // url:'<?php echo base_url('api/Api/finger') ?>',
      //   url: 'https://e-finger.barrukab.go.id/api/data-absensi',
      //   dataType: 'json',
      //   data: {
      //     tanggal: tgl,
      //     // tanggal: "2021-11-08",
      //     waktu: "1",
      //     unker: uk,
      //     id_absensi: id_absen,
      //
      //     // id_absensi: "555"
      //   },
      //
      //
      //   success: function(response) {
      //
      //
      //     if (response!='data baru tidak di temukan'){
      //       alert('Data Baru Tidak Ditemukan');
      //     } else {
      //       alert('Data Baru Telah ditambahkan');
      //       location.reload();
      //
      //
      //
      //     }
      //      var json = JSON.parse(response);
      //     alert(cek);
      //     console.log(cek);
      //
      //
      //   }
      // })
      $.ajax({
        url: "https://e-finger.barrukab.go.id/ambil-data/"+ ms,
        type: "get", // To protect sensitive data
        data: {},
        success: function(response) {
          // Handle the response object
          alert(response);
        }
      });
      location.reload();
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
   // var dt = $("#datatable").DataTable({
   //
   //           "ajax":"<?php echo base_url() ?>peg/Absensi/detail_absen/<?php echo $_SESSION['id_peg']?>",
   //           "lengthChange":true,
   //                 "bInfo": false,
   //             "searching":true,
   //             "deferRender": false,
   //             "pageLength":10,
   //             "scrollX": true,
   //             "paging":true,
   //                 "columns": [
   //         {
   //           render: function(data, type, row, meta){
   //             return meta.row  + 1 + '.';
   //           },
   //         },
   //        { "data": "kode"},
   //         {
   //           render: function(data, type, row, meta){
   //             let tgl=row.kode;
   //            var tglnya=tgl.substring(5,15);
   //             return tgl1(tglnya);
   //           },
   //         },
   //
   //         { "data": "jam_masuk"},
   //
   //         { "data": "jam_siang"},
   //         { "data": "jam_pulang"},
   //         { "data": "keterangan"},
   //
   //
   //         ]
   //         });
   //


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
