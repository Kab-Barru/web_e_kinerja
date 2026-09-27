<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
      <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Data Pegawai</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <!--<th>Unit Kerja</th>-->
                  <th>Jabatan</th>
                  <th>Golongan</th>
                  <th>Agama</th>
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
        <form>

          <div class="form-group">
            <label class="control-label">NIP</label>
            <input name="a" autocomplete="off" autofocus id="b" class="form-control a" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input name="b" autocomplete="off" autofocus id="b" class="form-control b" type="text">
          </div>


          <div class="form-group">
            <label class="control-label">Unit Kerja</label>
            <input name="c" readonly="readonly" value="<?php echo $unit_kerja->id_unit_kerja; ?>" autocomplete="off" autofocus  class="form-control c" type="hidden">
            <input readonly="readonly" value="<?php echo $unit_kerja->unit_kerja; ?>" autocomplete="off" autofocus  class="form-control" type="text">
            <!--<select required="required" name="c" id="demo-select2-1" class="form-control c">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($unit_kerja as $unit_kerja) {
                ?>
                <option value="<?php echo $unit_kerja->id_unit_kerja;?>"><?php echo $unit_kerja->unit_kerja;?></option>
                <?php
              }
              ?>
            </select>-->
          </div>

          <div class="form-group">
            <label class="control-label">Jabatan</label>
            <select required="required" name="d" class="form-control d">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($jabatan as $jab) {
                ?>
                <option value="<?php echo $jab->id_jabatan;?>"><?php echo $jab->jabatan;?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Golongan</label>
            <select name="e" class="form-control e">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($golongan as $gol) {
                ?>
                <option value="<?php echo $gol->id_pangkat;?>"><?php echo $gol->golongan;?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Agama</label>
            <select name="f" class="form-control f">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($agama as $agama) {
                ?>
                <option value="<?php echo $agama->id_agama;?>"><?php echo $agama->agama;?></option>
                <?php
              }
              ?>
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
		        url   : '<?php echo base_url()?>index.php/admin/data_pegawai/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;

		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
                          '<td>'+data[i].nik+'</td>'+
                          '<td>'+data[i].nama+'</td>'+
		                        /*'<td>'+data[i].unit_kerja+'</td>'+*/
                            '<td>'+data[i].jabatan+'</td>'+
                            '<td>'+data[i].golongan+'</td>'+
                            '<td>'+data[i].agama+'</td>'+
		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit_tes" data="'+data[i].nik+'"><span class="icon icon-pencil"></span></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].nik+'"><span class="icon icon-times"></span></a>'+
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

		//Simpan
		$('#btn_simpan').on('click',function(){
            var a=$('.a').val();
            var b=$('.b').val();
            var c=$('.c').val();
            var d=$('.d').val();
            var e=$('.e').val();
            var f=$('.f').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/data_pegawai/simpan')?>",
                dataType : "JSON",
                data : {a:a,b:b,c:c,d:d,e:e,f:f},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    //$('[name="c"]').val("");
                    $('[name="d"]').val("");
                    $('[name="e"]').val("");
                    $('[name="f"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data();
                }
            });
            return false;
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
            url  : "<?php echo base_url('admin/data_pegawai/hapus')?>",
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
