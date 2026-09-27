\<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
      <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>
    </div>
    <div class="text-left m-b">
      <b>Catatan :</b> <br>
      1. Mohon agar "Laporan Harian" yang telah <i>dibuat dan disetujui</i> agar tidak dihapus karna dapat berpengaruh pada peroleh TPP yang akan diterima perbulan tersebut. <br>
      2. Bagi Pegawai yang status kehadirannya "Sakit / Cuti / Izin (lebih dari 1 hari)" agar tidak membuat laporan harian. <br>
      3. Laporan harian yang telah lewat <i>5 hari</i> tidak dapat <b>dibuat</b> dan <b>dikirim</b> keatasan.<br>

      <!--<b>1. Laporan harian untuk bulan Desember 2024 hanya sampai tanggal 18 Desember 2025 yang dinilai sebagai hari kerja. </b><br>
       <b>2. Bagi pegawai yang membuat laporan harian tanggal 21 Desember 2020 - 31 Desember 2020 harap untuk memilih status laporan harian menjadi bukan hari kerja. </b><br>
       -->


      </b>
        <input type="hidden" name="" id="d1" value="">
          <input type="hidden" name="" id="d2" value="">


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
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
            </div>
            <strong>Daftar Laporan Harian</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">

              <thead>
                <tr class="table-dark">
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Hari Kerja</th>
                  <th>Nilai</th>
                  <th colspan="2" align="center">Aksi</th>
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
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <form>


            <?php
      // date_default_timezone_set('');

            date_default_timezone_set('Asia/Makassar');

            $now = date("d/m/Y");
              $tanggal = date("m/d/Y");

            //echo $now;
//
 // echo "<H1>".$now."-".$tanggal."</H1>";


            ?>



            <div class="form-group">
              <label class="control-label">Tanggal Laporan</label>
              <input class="form-control a" autocomplete="off" name="a" value="" type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-today-highlight="true">

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

  <div class="modal-dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-group">
              <label class="control-label">Jabatan</label>
              <input name="bb" autocomplete="off" autofocus id="bb" class="form-control bb" type="text">
            </div>

            <div class="modal-footer">
              <input name="aa" autocomplete="off" autofocus id="aa" class="form-control aa" type="hidden">
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

<div id="ModalEditji" role="dialog" class="modal fade"></div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

<?php   date_default_timezone_set('Asia/Makassar'); ?>
<script type="text/javascript">
  $(document).ready(function() {



    //alert('oi');
    tampil_data(); //pemanggilan fungsi tampil barang.

    //$('#mydata').dataTable();
    //$('#mydata').dataTable({    "aaSorting": [],  });

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        //type  : 'ajax',
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

            } else {
              $oi = 'Tdk';
            }


            if (data[i].status == 2) {
              $nita = '';


            } else if (data[i].status == 1) {
              $nita = '';


            } else {
              $nita = '<a href="javascript:;" class="btn btn-success btn-icon sq-24 item_edit_tes" data="' + data[i].id_pro_lap + '"><span class="icon icon-pencil"></span></a>';


            }

            if (data[i].status == 2) {
              $hps = '';


            } else {
              $hps = '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="' + data[i].id_pro_lap + '"><span class="icon icon-times"></span></a>';


            }




            //$tt = date('d F Y', strtotime('1994-02-15'));

            html += '<tr>' +
              '<td>' + data[i].asu + '</td>' +
              '<td> ' + data[i].status_detil + '</td>' +
              '<td> <span class="label arrow-right arrow-success">' + $oi + '</span></td>' +
              '<td> <span class="label arrow-right arrow-success">' + data[i].jum + '</span></td>' +
              '<td style="text-align:center;">' +

              '<a href="<?php echo base_url("peg/lap/detil/'+data[i].id_pro_lap+'") ?>" class="btn btn-info btn-icon sq-24" data="' + data[i].id_pro_lap + '"><span class="icon icon-mail-forward"></span></a> &nbsp' +
              $nita +

              '</td>' +
              '<td style="text-align:center;">' +
              /*  '<a href="<?php echo base_url("peg/lap/detil/'+data[i].id_pro_lap+'") ?>" class="btn btn-info btn-icon sq-24" data="'+data[i].id_pro_lap+'"><span class="icon icon-mail-forward"></span></a>'+*/
              '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="' + data[i].id_pro_lap + '"><span class="icon icon-times"></span></a> ' +
              '</td>' +
              '</tr>';

          }
          $('#show_data').html(html);
        }

      });
    }
  // date_default_timezone_set('asia/Makassar');


    $(".a").datepicker({


//mulai dari sini

 //-------------------------------------------
startDate:"-07d",
endDate:"0d"
      //-----------------------------------------
//sampai sini

    });
    // $(".a").datepicker({startDate: "-5d", endDate: "0d"  });

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
            $.notify('error', 'error');

          }
        }
      });
      return false;
    });

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


    //GET TES
    $('#show_data').on('click', '.item_edit_tes', function() {

      //  $(".item_edit_tes").click(function(e) {
      //alert('nita sayang');
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

  function clock() {
    var dt=new Date('<?php echo $tanggal ?>');


    var strDate1 = dt.getDate()+ "/" + (dt.getMonth()+1) + "/" + dt.getFullYear() ;

    var d = new Date();
    var strDate2 = d.getDate()+ "/" + (d.getMonth()+1) + "/" + d.getFullYear() ;

    $('#d1').val(strDate1);
    $('#d2').val(strDate2);

      if (strDate1 !== strDate2) {
        var nm="<?php echo $_SESSION['nama']?>";
        alert(nm+',\n Kami menemukan tindak kecurangan pada pengaturan perangkat anda,dan atas pelanggaran anda maka kami mengenakan anda peringatan KARTU KUNING ,Maka segera perbaiki kembali pengaturan tanggal anda atau akun anda akan TERBLOKIR..!!  ');
  location.reload();
      }

    }

  clock();


</script>
