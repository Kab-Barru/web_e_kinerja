<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
      <!--<button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>-->
      <!-- <a href="<?php echo site_url('admin/file/add');?>" > <button class="btn btn-primary" type="button">Tambah Data</button> </a>-->

    </div>

    <div class="text-left m-b">
      <?php
    	if($this->session->userdata('status_upload')!=null){
    	echo $this->session->userdata('status_upload');  // menampilkan pesan error upload
    	}

    	if($this->session->userdata('status_hapus')!=null){
    	echo $this->session->userdata('status_hapus');  // menampilkan pesan error upload
    	}



    	if($this->session->userdata('status_upload')!=null){ // menghapus pesan error upload
    	$this->session->unset_userdata('status_upload');
    	}

    	if($this->session->userdata('status_hapus')!=null){ // menghapus pesan error upload
    	$this->session->unset_userdata('status_hapus');
    	}
    	?>

    </div>


    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar File</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Ket</th>
                  <!--<th>Unit Kerja</th>-->
                  <th>Nama File</th>
                  <th>Nama Pegawai</th>

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
<div id="ModalaAdd" role="dialog" class="modal fade">

  <div class="modal-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">



	         <?php echo form_open_multipart('admin/file/save');?>

          <div class="form-group">
            <label class="control-label">NIP</label>
            <input name="a" readonly autocomplete="off" value="<?php echo $this->session->userdata('username');?>" autofocus id="b" class="form-control a" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">File</label>
            <input name="berkas" readonly autocomplete="off" value="<?php echo $this->session->userdata('username');?>" autofocus id="b" class="form-control a" type="file">
          </div>

          <div class="progress">
    				  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    					<span id="status"></span>
    				  </div>
    			</div>






          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan">Simpan</button>
          </div>


      </div>
    </div>
  </div>
</div>

</div>
<!--END MODAL ADD-->



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

<!-- tes edit -->


<!--<div id="ModalEditji" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false"></div>-->
<div id="ModalEditji"  role="dialog" class="modal fade"></div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>


<script type="text/javascript">
	$(document).ready(function(){
    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#mydata').dataTable();
    $('#mydata').dataTable();;


		//fungsi tampil data
		function tampil_data(){
		    $.ajax({
		        //type  : 'ajax',
		        url   : '<?php echo base_url()?>index.php/admin/file/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
                <?php echo base_url()?>index.php/admin/file/data;

		            for(i=0; i<data.length; i++){
                  $h = data[i].nama_file;
		                html += '<tr>'+
                          '<td>'+data[i].tgl+'</td>'+
                          '<td>'+data[i].keterangan+'</td>'+
		                        /*'<td>'+data[i].unit_kerja+'</td>'+*/
                            '<td> <a target=_blank href=<?php echo base_url()?>assets/bidang_1/'+data[i].nama_file+'>'+data[i].nama_file+'</a></td>'+
                            '<td>'+data[i].nama+'</td>'+

		                        '<td style="text-align:right;">'+
                                    '<a href="<?php echo base_url()?>assets/bidang_1/'+data[i].nama_file+'" download class="btn btn-info btn-icon sq-24" ><span class="icon icon-download"></span></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id+'"><span class="icon icon-times"></span></a>'+
                                '</td>'+

		                        '</tr>';

		            }
		            $('#show_data').html(html);
		        }

		    });
		}

    //GET TES
    $('#show_data').on('click','.item_edit_tes',function(){

      //  $(".item_edit_tes").click(function(e) {
            //alert('nita sayang');
            var id=$(this).attr('data');
            $.ajax({
                url: "<?php echo base_url('admin/data_pegawai/acuanji')?>" ,
                type: "GET",
                data : {id: id,},
                success: function (ajaxData){
                    $("#ModalEditji").html(ajaxData);
                    $("#ModalEditji").modal('show',{backdrop: 'true'});
                }
            });

        });




		//GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });



        //Update
		$('#btn_update').on('click',function(){
      alert('tes');
            var aa=$('#aa').val();
            var bb=$('#bb').val();
            var cc=$('#cc').val();
            var dd=$('#dd').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/data_pegawai/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb,c:cc , d:dd},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
                    $('[name="dd"]').val("");
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
            url  : "<?php echo base_url('admin/file/hapus')?>",
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
<script>
    $(document).ready(function () {
        $(".d").select2({
            placeholder: "Pilih Data Jabatan"
        });

        $(".e").select2({
            placeholder: "Pilih Data Golongan"
        });
        $(".f").select2({
            placeholder: "Pilih Data Agama"
        });
        $(".cc").select2({
            placeholder: "Pilih Data Jabatan"
        });

        $(".dd").select2({
            placeholder: "Pilih Data Golongan"
        });
    });
</script>
