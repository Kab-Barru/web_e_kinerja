<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>/plugins/fontawesome-free/css/all.min.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<?php if (empty($this->uri->segment(4))) {
  $link='1';
}else {
    $link=$this->uri->segment(4);
}
if ($link=='1') {
  $a='active';
  $aa='show active';
  $b='';
  $bb='';
  $c='';
  $cc='';
}else if ($link=='2') {
  $a='';
  $aa='';
  $b='active';
  $bb='show active';
  $c='';
  $cc='';
}else{
  $a='';
  $aa='';
  $c='active';
  $cc='show active';
  $b='';
  $bb='';
}
 ?>


<div class="content-wrapper" style="background-color:white">
  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">
      <div class="layout-content">
        <div class="layout-content-body" >
          <div class="" align="center">
            <!-- <img src="<?php echo base_url() ?>foto/izin.gif" alt="" style="width:100%;height:500px;margin-left:auto;margin-right:auto"> -->
            <br>

<div style="width:95%;margin-left:auto;margin-right:auto">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item">
               <a class="nav-link <?php echo $a ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Izin</a>
             </li>
             <li class="nav-item">
               <a class="nav-link <?php echo $b ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >Cuti</a>
             </li>
             <li class="nav-item">
               <a class="nav-link <?php echo $c ?>" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tugas Luar</a>
             </li>
           </ul>
           <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade <?php echo $aa ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="" style="padding:10px">
                 <div class="btn-group">
                    <!-- <button type="button" class="btn btn-default">Izin Satu Hari</button>
                    <button type="button" class="btn btn-default">Izin Beberapa Hari</button>
                    <button type="button" class="btn btn-default">Izin Jam Tertentu</button> -->
                    <b>  Untuk izin silahkan sampaikan ke admin instansi Masing-masing...!!!</b>


                  </div>
               </div>
           </div>
             <div class="tab-pane fade <?php echo $bb ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <div class="card" style="padding:10px;border-radius:10px">
                 <form class="" id="cuti">
                   <div class="row" align="" >
                        <div class="col-lg-6">
                          <div class="" align="left">
                            <label for="">Tanggal Awal Cuti</label>

                            <input type="date" name="tgl1" value="" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="" align="left">
                            <label for="">Tanggal Akhir Cuti</label>
                            <input type="date" name="tgl2" value="" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="" align="left">
                            <label for="">Alasan/Keterangan</label>
                            <textarea name="keterangan" rows="12" style="width:100%;height:100px"></textarea>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="" align="left">
                              <label for="">Input File Pendukung</label>

                              <br>
                              <input type="file" name="file" value="">
                              <br>
                            <span>Foto Surat Cuti<b style="color:red">(Hanya File Foto)</b></span>
                          </div>
                        </div>
                   </div>
                   <div class="" align="right" style="padding:10px">
                     <button type="submit" name="button" class="btn btn-primary" id="tbl"> Ajukan Cuti</button>
                   </div>
                 </form>
               </div>
               <div class="card" style="padding:10px">
               <h5>Riwayat Cuti</h5>
               <hr>
               <div class="datatable-responsive" style="width:100%;overflow-x:auto">
                 <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                   <thead>
                     <tr class="tr1">
                       <td>No</td>
                       <td>Tanggal Awal</td>
                       <td>Tanggal Akhir</td>
                       <td>Status</td>
                       <td>File</td>
                       <td>Alasan</td>
                       <td>Alasan Penolakan</td>
                       <td>#</td>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
                     $no=1;
                     foreach ($cuti as $ct) {?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $ct->tgl_awal?></td>
                        <td><?php echo $ct->tgl_akhir?></td>
                        <td><?php if ($ct->status=='0') {
                            $status='<span class="badge badge-primary">Belum Terverifikasi</span>';
                          }else if ($ct->status=='2') {
                                  $status='<span class="badge badge-danger">Di Tolak</span>';
                          }else{
                            $status='<span class="badge badge-success">Di Terima</span>';
                          }
                          echo $status;

                        ?></td>
                        <td> <a href="<?php echo base_url() ?>uploads/<?php echo $ct->file ?>" target="_blank">
                          <img src="<?php echo base_url() ?>uploads/<?php echo $ct->file ?>" alt="" style="width:80px;height:80px">
                          </a>

                          </td>
                        <td><?php echo $ct->alasan ?></td>
                        <td><?php echo $ct->alasan_penolakan ?></td>
                        <td><?php if ($status==0) {?>
                        <a href="#" class="btn btn-primary btn-sm" onclick="batal_cuti('<?php echo $ct->id ?>')">Batalkan</a>
                      <?php }else{ ?>
                          <a href="#" class="btn btn-secondary btn-sm">Batalkan </a>
                      <?php } ?>
                      </td>
                      </tr>
                     <?php } ?>
                   </tbody>
                 </table>
               </div>
             </div>

             </div>
             <div class="tab-pane fade <?php echo $cc ?>" id="contact" role="tabpanel" aria-labelledby="contact-tab">
               <!-- <h4 style="color:red">*~Masih Dalam Pengerjaan~*</h4> -->

               <div class="card" style="padding:10px;margin-top:8px;width:95%">
               <form method ="post" action="#" id="tl">
                 <div class="form-group">
                   <label for="exampleFormControlInput1">Tanggal</label>
                   <input type="date" class="form-control" name="tanggal" >
                 </div>
                 <div class="form-group">
                   <label for="exampleFormControlSelect1">Waktu Tugas Luar</label>
                   <select class="form-control waktu" id="exampleFormControlSelect1 " name="waktu" >
                     <option value="0">Full 1 Hari</option>
                     <option value="1">Pagi</option>
                     <option value="2">Siang</option>
                     <option value="3">Pulang</option>
                   </select>
                 </div>

                 <!-- <div class="form-group" >
                   <label for="exampleFormControlInput1">Jam</label>
                   <div class="input-group date" id="timepicker" data-target-input="nearest" >

                     <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/  name="jam" id="jam" >
                     <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                         <div class="input-group-text"><i class="far fa-clock"></i></div>
                     </div>
                     </div>

                 </div> -->
                 <label for="">Keterangan</label>
                 <textarea name="alasan" rows="8" cols="80" style="width:100%;height:100px"></textarea>
                 <div class="" align="left">
                   <label for="">File Pendukung</label>
                   <input type="file" name="file" value="">
                   <br>
                     <span>Foto Surat Tugas/Foto Kegiatan <b style="color:red">(Hanya File Foto)</b></span>
                 </div>

                 <div class="">
                   <input type="hidden" name="lat" value="" id="lat">
                    <input type="hidden" name="long" value="" id="long">
                 </div>
               <div class="" align="right">
                 <button type="submit" class="btn btn-primary">Kirim</button>
               </div>
               </form>

               </div>

               <div style="width:95%;padding:10px" class="card">
                      <h5>Riwayat Tugas Luar</h5>
                      <hr>
                 <div class="datatable-responsive" style="width:100%;overflow-x:auto">
                   <table id="datatable2" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                     <thead>
                       <tr class="tr1">
                         <td>No</td>
                         <td>Tanggal </td>
                         <td>Tipe Absen</td>
                         <td>Status</td>
                         <td>File</td>
                         <td>Alasan</td>
                         <td>Alasan Penolakan</td>
                         <td>#</td>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                       $no=1;
                       foreach ($tugas_luar as $tl) {?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $tl->tgl?></td>
                          <td>
                            <?php
                          $tipe=$tl->jenis_absen;
                          if ($tipe=='0') {
                              $type='Full 1 Hari';
                          }else if ($tipe=='1') {
                              $type='Pagi';
                          }else if ($tipe=='2') {
                              $type='Siang';
                          }else{
                              $type='Pulang';
                          }
                          echo $type;
                          ?>
                        </td>

                          <td><?php if ($tl->status=='0') {
                              $status='<span class="badge badge-primary">Belum Terverifikasi</span>';
                            }else if ($tl->status=='2') {
                                    $status='<span class="badge badge-danger">Di Tolak</span>';
                            }else{
                              $status='<span class="badge badge-success">Di Terima</span>';
                            }
                            echo $status;

                          ?></td>
                          <td> <a href="<?php echo base_url() ?>uploads/<?php echo $tl->file ?>" target="_blank">
                            <img src="<?php echo base_url() ?>uploads/<?php echo $tl->file ?>" alt="" style="width:80px;height:80px">
                            </a>

                            </td>
                          <td><?php echo $tl->keterangan ?></td>
                          <td><?php echo $tl->alasan_penolakan ?></td>
                          <!-- <td> <a href="https://www.google.co.id/maps/place/<?php echo $tl->lat?>,<?php echo $tl->long ?>" target="_blank"> lihat lokasi</a> </td> -->
                          <td><?php if ($tl->status=='0') {?>
                          <a href="#" class="btn btn-primary btn-sm" onclick="batal_tl('<?php echo $tl->id ?>')">Batalkan</a>
                        <?php }else{ ?>
                            <a href="#" class="btn btn-secondary btn-sm">Batalkan </a>
                        <?php } ?>
                        </td>
                        </tr>
                       <?php } ?>
                     </tbody>
                   </table>
                 </div>
               </div>


          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url() ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url() ?>dist/js/demo.js"></script> -->
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!--
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->
<script type="text/javascript">
var srv='<?php echo base_url() ?>';

	$(document).ready(function(){

    var link='<?php echo $link ?>';
   if (link=='1') {

   }
//     if (navigator.geolocation) {
//   navigator.geolocation.getCurrentPosition(
//     (position) => {
//       const pos = {
//         lat: position.coords.latitude,
//         lng: position.coords.longitude,
//       };
//
//   // /    infoWindow.setPosition(pos);
//       infoWindow.setContent("Location found.");
//       infoWindow.open(map);
//       map.setCenter(pos);
//     },
//     () => {
//       handleLocationError(true, infoWindow, map.getCenter());
//     }
//   );
// } else {
//   => Browser doesn't support Geolocation
//   handleLocationError(false, infoWindow, map.getCenter());
//   console.log(lat);
// }




if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
         // console.log(position);
          console.log(position.coords.latitude);
          console.log(position.coords.longitude);
          $('#lat').val(position.coords.latitude);
          $('#long').val(position.coords.longitude);
        },
        () => {

        }
      );
    } else {

    }

    // if (navigator.geolocation) { //check if geolocation is available
    //             navigator.geolocation.getCurrentPosition(function(position){
    //
    //               console.log(position);
    //             });
    //         }

   var dt1=$("#datatable").DataTable();
  var dt2=$("#datatable2").DataTable();

  // $('.waktu').on('change', function() {
  //   var waktu =$('.waktu').val();
  //   if (waktu=='0') {
  //    $("#jam").prop("disabled",true);
  //    $("#jam").val('');
  //    alert(this.val());
  //    }else{
  //       $("#jam").prop("disabled",false);
  //
  //    }
  // });
  //    $("#jam").prop("disabled",true);


    $('#datemask').inputmask('dd/mm/yyyy',{ 'placeholder': 'dd/mm/yyyy' })

    $('#datemask2').inputmask('mm/dd/yyyy',{ 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()



    $('#timepicker').datetimepicker({
      format: 'H:m:s'
    })

    $('#timepicker2').datetimepicker({
  format: 'H:m:s'
    })

        $('#cuti').submit(function (e) {
                     e.preventDefault();
                     var kode=$('#tbl').val();

                      dataUrl='<?php echo base_url() ?>peg/Absensi/cuti';

                     $.ajax({
                         url:dataUrl, //URL submit
                         type:"post", //method Submit
                         data:new FormData(this), //penggunaan FormData
                         processData:false,
                         contentType:false,
                         cache:false,
                         async:false,
                          success: function(response){
                          var result = $.parseJSON(response);
                          console.log();
                              if (result.status == true) {

                                Swal.fire({
                                  type: 'success',
                                  title: 'Success',
                                  text: result.messages
                                });

                                     window.location.assign('<?php echo base_url() ?>peg/izin/ajukan_izin/2');

                              //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                              } else {
                                Swal.fire({
                                  type: 'error',
                                  title: 'Oops...',
                                  html: result.messages
                                });
                              }
                        }

                })
       });

               $('#tl').submit(function (e) {
                            e.preventDefault();

                             dataUrl='<?php echo base_url() ?>peg/Absensi/tl';

                            $.ajax({
                                url:dataUrl, //URL submit
                                type:"post", //method Submit
                                data:new FormData(this), //penggunaan FormData
                                processData:false,
                                contentType:false,
                                cache:false,
                                async:false,
                                 success: function(response){
                                 var result = $.parseJSON(response);
                                 console.log();
                                     if (result.status == true) {

                                       Swal.fire({
                                         type: 'success',
                                         title: 'Success',
                                         text: result.messages
                                       });

                                           window.location.assign('<?php echo base_url() ?>peg/izin/ajukan_izin/3');

                                     //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                                     } else {
                                       Swal.fire({
                                         type: 'error',
                                         title: 'Oops...',
                                         html: result.messages
                                       });
                                     }
                               }

                       })
              });
  });

  function batal_cuti(kode){
           Swal.fire({
              title: 'Peringatan',
              text: "Apakah Anda Yakin Ingin Membatalkan Cuti anda?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya'
            }).then((result ) => {
              if (result.value) {
                  $.post(srv+'peg/Absensi/batal_cuti/'+kode,function(response){
                    var result = $.parseJSON(response);
                    console.log();
                        if (result.status == true) {
                          Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: result.messages
                          });

                             window.location.assign('<?php echo base_url() ?>peg/izin/ajukan_izin/2');
                          // dt1.ajax.reload();

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



     function batal_tl(kode){
              Swal.fire({
                 title: 'Peringatan',
                 text: "Apakah Anda Yakin Ingin Membatalkan Tugas Luar anda?",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ya'
               }).then((result ) => {
                 if (result.value) {
                     $.post(srv+'peg/Absensi/batal_tl/'+kode,function(response){
                       var result = $.parseJSON(response);
                       console.log();
                           if (result.status == true) {
                             Swal.fire({
                               type: 'success',
                               title: 'Success',
                               text: result.messages
                             });

                             // location.reload();
                             window.location.assign('<?php echo base_url() ?>peg/izin/ajukan_izin/3');

                             // dt1.ajax.reload();

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
