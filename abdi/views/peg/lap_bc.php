<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
      <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>
    </div>
    <?php
                      if ($this->session->flashdata('ada')==NULL)
                      {

                      }
                      else
                      {?>
                      <div class="alert alert-info">
                          <button data-dismiss="alert" class="close">
                            &times;
                          </button>

                          <a class="alert-link" href="#">
                          <?php echo $this->session->flashdata('ada');?> </a>
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
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar Laporan Harian</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>

                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Hari Kerja</th>
                  <th>Nilai</th>
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
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label class="control-label">Tanggal Laporan</label>
            <input class="form-control a" autocomplete="off" name="a" type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-today-highlight="true">

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

		//$('#mydata').dataTable();
    //$('#mydata').dataTable({    "aaSorting": [],  });

		//fungsi tampil data
		function tampil_data(){
		    $.ajax({
		        //type  : 'ajax',
		        url   : '<?php echo base_url()?>peg/lap/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
                var tt;

		            for(i=0; i<data.length; i++){
                  if (data[i].ket == 0)
                  {
                    $oi = 'Ya';

                  }
                  else {
                    $oi = 'Tdk';
                  }

                  //$tt = date('d F Y', strtotime('1994-02-15'));

                    html += '<tr>'+
		                  		'<td>'+data[i].asu+'</td>'+
                          '<td> <span class="label arrow-right arrow-info">'+data[i].status_detil+'</span></td>'+
                          '<td> <span class="label arrow-right arrow-success">'+$oi+'</span></td>'+
                          '<td> <span class="label arrow-right arrow-success">'+data[i].jum+'</span></td>'+
		                        '<td style="text-align:center;">'+
                                    '<a href="<?php echo base_url("peg/lap/detil/'+data[i].id_pro_lap+'")?>" class="btn btn-info btn-icon sq-24" data="'+data[i].id_pro_lap+'"><span class="icon icon-mail-forward"></span></a>'+
                                    '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id_pro_lap+'"><span class="icon icon-times"></span></a>'+
                                '</td>'+
		                        '</tr>';

		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('admin/jabatan/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id_jabatan,id_unit_kerja,jabatan){
                  $('#ModalaEdit').modal('show');
            			$('[name="aa"]').val(data.id_jabatan);
            			$('[name="bb"]').val(data.jabatan);
            		});
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

		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var a=$('.a').val();
            var b=$('.b').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('peg/lap/simpan')?>",
                dataType : "JSON",
                data : {a:a,b:b},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //Update Barang
		$('#btn_update').on('click',function(){
            var aa=$('#aa').val();
            var bb=$('#bb').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/jabatan/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/peg/lap/hapus')?>",
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
