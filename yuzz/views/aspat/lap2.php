<?php   $this->session->set_userdata('menu', '5'); ?>
<style>
  /* .btn-sm{
    width:20px;height:20px;
    font-size:8px;
  } */
</style>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>





<?php
 error_reporting(0);
date_default_timezone_set('Asia/Makassar');
$ip=$_SESSION['id_peg'];
$skr=date('Y-m-d');

$ceklok=$this->db2->query("select * from `t_kehadirans` where `id_absensi`='$ip' and `tanggal`='$skr' and `status`=1")->num_rows();

if (strlen($ceklok)<1) {
$jam_ckl='';
}else{
  $ckl=$this->db2->query("select * from `t_kehadirans` where `id_absensi`='$ip' and `tanggal`='$skr' and `status`=1")->row();
  $jam_ckl=$ckl->scan_date;
}




$batas_absen = date('H:i:s', strtotime('06:00:00'));
$batas_pulang = date('H:i:s', strtotime('16:00:00'));
$date_now=date('Y-m-d',strtotime('now'));
$now = date('H:i:s');
$np = $_SESSION['nip'];
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
<!-- <h1><?php echo $date_now ?>/ <?php echo $np ?></h1> -->
    <div class="container-fluid">
      <div class="layout-content">
        <div class="layout-content-body">

          <div class="text-left m-b" style="font-size:10px">
            <b>Catatan :</b> <br>
            1. klik absen Masuk untuk membuat laporan pertama <br>
            2. Jika Terdapat Pesan anda belum Absen Periksa Absensi(anda dapat memngunakan tomol bantuan di halaman absensi untuk menarik data)<br>
            3. Laporan harian yang telah lewat <i>5 hari</i> tidak dapat <b>dibuat</b> dan <b>dikirim</b> keatasan.<br>
            <!-- <?php echo $jam_ckl ?> -->

            </b>
            <hr>



            <div class="text-right m-b">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>
            </div>
            <br>
          </div>

          <?php
          if ($this->session->flashdata('ada') == NULL) {
          } else { ?>
            <div class="alert alert-info">
              <button data-dismiss="alert" class="close">
                &times;
              </button>

              <a class="alert-link" href="#">
                <?php echo $this->session->flashdata('ada'); ?> </a>
            </div>

          <?php

          }

          ?>
          <div class="row gutter-xs">
            <div class="col-lg-12 col-xs-12">
              <div class="card">
                <div class="card-header">

                  <strong>Daftar Laporan Harian </strong>
                </div>
                <div class="card-body">
                  <table class="table table-responsive-xl" id="mydata">
                    <thead>
                      <tr class="table-dark">
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Hari Kerja</th>
                        <th>Nilai</th>
                        <!-- <th>Aksi</th> -->
                        <th></th>
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
    </div>
  </div>
</div>
<!-- MODAL ADD -->
<div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">

  <div class="modal-dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h6 class="modal-title">Tambah Data</h6>
        </div>
        <div class="modal-body">
          <form>

            <?php



            $now = date("d/m/Y");
            //echo $now;
            ?>

            <div class="form-group">
              <label class="control-label">Tanggal Laporan</label>
              <input class="form-control dt" autocomplete="off" name="a" id="datepicker-13" type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-today-highlight="true">

              <small>Contoh penulisan : tgl-bln-thn </small>
            </div>

            <div class="form-group">
              <label class="control-label">Status</label>
              <select class="form-control b" name="status">
                <option value="0">Hari Kerja</option>
                <option value="1">Bukan Hari Kerja / Libur</option>
              </select>
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
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div id="ModalaEdit" tabindex="-1" role="dialog" class="modal fade">



</div>
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
            <button class="btn btn-danger" data-dismiss="modal" id="btn_hapus" type="button">Hapus</button>
            <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<!--END MODAL HAPUS-->

<div id="ModalEditji" role="dialog" class="modal fade">

</div>

<!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script> -->

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url() ?>assets/js/fungsi.js" >
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>



<!-- <script src = "https://code.jquery.com/jquery-1.10.2.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();


    $('#mydata').dataTable({
      "aaSorting": [],
      "responsive": true,
      "autoWidth": false,

    });

    $('#masuk').on('click', function() {
      var uk = '<?php echo $_SESSION['id_unit_kerja'] ?>';
      tgl = '<?php echo date("Y-m-d"); ?>';
      id_absen = '<?php echo $_SESSION['id_peg'] ?>';

      ceklok='<?php echo $ceklok ?>';
        if (ceklok<1) {
            // alert('Anda belum Absen Jam Pertama');
            Swal.fire(
              'Gagal Menambahkan data!',
              'Data Absen Jam Pertama Tdk di temukan',
              'danger'
            )

        }else{
          var nip ='<?php echo $_SESSION['username'] ?>';
          jam ='<?php echo $jam_ckl ?>';
         unit_kerja='<?php echo $_SESSION['id_unit_kerja'] ?>';
         auto_simpan(nip,jam,unit_kerja);
     location.reload();
        }


    });


    // $('#myTable').DataTable({});

    $(".dt").datepicker({
//mulai dari sini
      //
      // startDate: "-3d",
      // endDate: "0d"

  //sampai sini

    });
    //$(".a").datepicker({startDate: "-8d", endDate: "0d"  });


    function tampil_data() {
      $.ajax({
        // type: 'GET',
        url: '<?php echo base_url() ?>peg/lap/data',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          var tt;

          for (i = 0; i < data.length; i++) {

            if (data[i].keterangan == 0) {
              $oi = 'Ya';

            }
             else {
              $oi = 'Tdk';
            }


            if (data[i].status == 2) {
              $nita = '';


            } else if (data[i].status == 1) {
              $nita = '';


            } else {
              // $nita ='<a href="javascript:;" class="btn btn-success btn-sm sq-24 item_edit_tes" data="' + data[i].id_pro_lap + '"><span class="fa fa-edit"></span></a>';
              $nita = '<a href="javascript:;"class="btn btn-success btn-sm sq-24 item_edit_tes" data="' + data[i].id_pro_lap + '"><span class="fa fa-edit"></span></a>';


            }

            if (data[i].status == 2) {
              $hps = '';


            } else {
              $hps = '<a href="javascript:;" class="btn btn-danger btn-sm sq-24 item_hapus" data="' + data[i].id_pro_lap + '"><span class="fa fa-times"></span></a>';


            }


            //$tt = date('d F Y', strtotime('1994-02-15'));

            html += '<tr>' +
              '<td>' + tgl1(data[i].asu) + '</td>' +
              '<td> ' + data[i].status_detil + '</td>' +
              '<td> <span class="label arrow-right arrow-success">' + $oi + '</span></td>' +
              '<td> <span class="label arrow-right arrow-success">' + data[i].jum + '</span></td>' +
              '<td style="text-align:center;">' +
              '<a href="<?php echo base_url("peg/laporan/detil/'+data[i].id_pro_lap+'") ?>" class="btn btn-info btn-sm sq-24" data="' + data[i].id_pro_lap + '"><span class="fa fa-share"></span></a> &nbsp' +
              '</td>' +
              '</tr>';
            console.log(html);
          }
          $('#show_data').html(html);

        }

      });
    }



    $(".a").datepicker({
// mulai dari sini
//
      startDate: "-3d",
      endDate: "0d"

//   sampai sini

    });
    //$(".a").datepicker({startDate: "-8d", endDate: "0d"  });




    //GET UPDATE
    $('#show_data').on('click', '.item_edit', function() {
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?php echo base_url('admin/jabatan/acuan') ?>",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_jabatan, id_unit_kerja, jabatan) {
            $('#ModalaEdit').modal('show');
            $('[name="aa"]').val(data.id_jabatan);
            $('[name="bb"]').val(data.jabatan);
          });
        }
      });
      return false;
    });


    //GET HAPUS
    $('#show_data').on('click', '.item_hapus', function() {
      var id = $(this).attr('data');
      $('#ModalHapus').modal('show');
      $('[name="kode"]').val(id);
    });

    //Simpan Barang
    $('#btn_simpan').on('click', function() {

      var a = $('.a').val();


      var b = $('.b').val();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('peg/lap/simpan') ?>",
        dataType: "JSON",
        data: {
          a: a,
          b: b
        },
        success: function(data) {
          if (data.query) {
            console.log(data.query);
            $('[name="a"]').val("");
            $('[name="b"]').val("");
            //('#ModalaAdd').modal('hide');
            tampil_data();
            $('#ModalaAdd').modal('toggle');
            $.notify("Data berhasil disimpan", 'success');

          } else {
            console.log(data.query);
            $.notify('Proses simpan gagal silahkan coba lagi', 'error');

          }
        }
      });
      return false;
    });

    function auto_simpan(nip,jam,unit_kerja) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('peg/lap/auto_simpan') ?>",
        dataType: "JSON",
        data: {
          nip: nip,
          jam: jam,
          uk:unit_kerja
        },
        success: function(data) {
          if (data.query) {
            console.log(data.query);

            tampil_data();

            location.reload();

            $.notify("Data berhasil disimpan", 'success');

          } else {
            console.log(data.query);
            $.notify('Proses simpan gagal silahkan coba lagi', 'error');

          }
        }
      });
      return false;
    }

    //Update Barang
    $('#btn_update').on('click', function() {
      var aa = $('#aa').val();
      var bb = $('#bb').val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/jabatan/update') ?>",
        dataType: "JSON",
        data: {
          a: aa,
          b: bb
        },
        success: function(data) {
          $('[name="aa"]').val("");
          $('[name="bb"]').val("");
          $('#ModalaEdit').modal('hide');
          tampil_data();
        }
      });
      return false;
    });

    $('#show_data').on('click', '.item_edit_tes', function() {


      var id = $(this).attr('data');
      $.ajax({
        url: "<?php echo base_url('peg/lap/acuanji') ?>",
        type: "GET",
        data: {
          id: id,
        },

        success: function(ajaxData) {
          $("#ModalEditji").html(ajaxData);
          $("#ModalEditji").modal('show', {
            backdrop: 'true'

          });
        }
      });

    });


    //Hapus Barang
    $('#btn_hapus').on('click', function() {
      var kode = $('#textkode').val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/peg/lap/hapus') ?>",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          if (data.query) {
            $('[name="a"]').val("");
            $('[name="b"]').val("");
            //('#ModalaAdd').modal('hide');
            tampil_data();
            $('#ModalHapus').modal('toggle');
            $.notify("Data berhasil dihapus", 'success');

          } else {
            $.notify('error', 'error');

          }
        }
      });
      return false;
    });

  });
</script>
