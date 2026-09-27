<style>
  /* .btn-sm{
    width:20px;height:20px;
    font-size:8px;
  } */
</style>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

<?php
$batas_absen = date('H:i:s', strtotime('06:00:00'));
// $batas_masuk = date('H:i:s', strtotime('07:30:00'));
$batas_pulang = date('H:i:s', strtotime('16:00:00'));
$now = date('H:i:s');
$np = $_SESSION['nip'];
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">
    <div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">

      <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>
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
        <button class="btn btn-info item_kirim" data-toggle="modal" type="button">Kirim Laporan Keatasan</button>
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
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
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


             echo $hrr . ', ' .$tgl;

             ?></strong>
          </div>

          <div class="card-body">
                  <!--<div class="table-responsive">-->
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Uraian Tugas</th>
                          <th>Jam</th>
                          <th>Output</th>
                          <?php
                          if ($detil->status == 2 or $detil->status == 1 )
                          {
                          }
                          else
                          {
                            ?>
                            <th>Aksi</th>
                            <?php
                          }
                            ?>
                        </tr>
                      </thead>
                      <tbody id="show_data">


                      </tbody>
                    </table>
                  <!--</div>-->
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
        <h4 class="modal-title">Input Laporan Harian</h4>
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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){

    $('#ModalaAdd').on('shown.bs.modal', function () {
                   $('[name="a"]').val("kerja ");
                    $('[name="b"]').val("07:30-16:05");
                    $('[name="c"]').val("terlaksana");

                    $('[name="e"]').val("1");
           });


    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#mydata').dataTable();
    $('#mydata');

		//fungsi tampil data
		function tampil_data(){
		    $.ajax({
		        //type  : 'ajax',
		        url   : '<?php echo base_url()?>peg/lap/data_detil2/<?php echo $this->uri->segment(4)?>',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
                $no = 1;

		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
                          '<td>'
                            +data[i].urutan+'</td>'+
		                  		'<td>'+data[i].uraian_tugas+'</td>'+
                          '<td>'+data[i].jam+'</td>'+
                          '<td>'+data[i].output+'</td>'
                            <?php
                            if ($detil->status == 2 or $detil->status == 1 )
                            {
                              ?>


                              <?php


                            }
                            else
                            {
                              ?>
                              +
    		                        '<td style="text-align:center;">'
                                +
                              '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit" data="'+data[i].id_pro_lap_detil+'"><span class="icon icon-pencil"></span></a>'+
                              '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id_pro_lap_detil+'"><span class="icon icon-times"></span></a>'+
                              <?php
                            }
                             ?>



                                '</td>'+
		                        '</tr>';

		            $no++;}
		            $('#show_data').html(html);
		        }

		    });
		}


    //KIRIM
    $('#item_kirimm').on('click',function(){
      //alert('tes');
            //var a=$('.acuan_kirim').val();
            var a=$('#textkodep').val();

            // $.ajax({
            //     type : "POST",
            //     url  : "<?php echo base_url('peg/lap/kirim_lap/')?>",
            //     dataType : "JSON",
            //     data : {a:a},
            //     success: function(result){
            //    location.reload();
            //     }
            // });

             $.post("<?php echo base_url('peg/lap/kirim_lap/')?>"+a, function(data){

            location.reload();
          });
        });


		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('peg/lap/acuanku')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(uraian_tugas,jam,output,id_pro_lap_detil){
                  $('#ModalaEdit').modal('show');
            			$('[name="aa"]').val(data.uraian_tugas);
            			$('[name="bb"]').val(data.jam);
                  $('[name="cc"]').val(data.output);
                  $('.dd').val(data.id_pro_lap_detil);
                  $('.ee').val(data.urutan);

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
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var a=$('.a').val();
            var b=$('.b').val();
            var c=$('.c').val();
            var d=$('.d').val();
            var e=$('.e').val();
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
                    $('#ModalaAdd').modal('hide');
                    tampil_data();
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

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
          //alert('oi');
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/peg/lap/hapus_detil')?>",
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
