<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-left m-b">
      <b>Note</b> : <br>
      1. Jika tombol edit/atur besaran TPP  maksimal <a href="javascript:;" class="btn btn-info btn-icon sq-24 "><span class="icon icon-pencil"></span></a> <i> tidak tampil </i>, silahkan menghubungi admin kabupaten untuk diaktifkan.

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Atur TPP Maksimal dan Kelas Jabatan Pegawai</strong>
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
                  <th>Kelas Jabatan</th>
                  <th>TPP Maksimal</th>
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
<div id="ModalaEdit"  role="dialog" class="modal fade">

<div class="modal-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Atur TPP Maksimal</h4>
      </div>
      <div class="modal-body">

        <form>
          <div class="form-group">
            <label class="control-label">NIP</label>
            <input name="aa" readonly="true" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input name="bb" readonly="true" autocomplete="off" autofocus id="bb" class="form-control bb" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Jabatan</label>
            <input name="cc" readonly="true" autocomplete="off" autofocus id="bb" class="form-control cc" type="text">
          </div>



          <div class="form-group">
            <label class="control-label">Golongan</label>
            <input name="dd" readonly="true" autocomplete="off" autofocus id="bb" class="form-control dd" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Kelas Jabatan</label>
            <input name="kelas" autofocus="true" autocomplete="off" autofocus id="bb" class="form-control kelas" maxlength="14" type="number">
            <b><small>Note : Silahkan diisi dengan kelas jabatan yang sesuai (1 - 14)</small></b>
          </div>

          <div class="form-group">
            <label class="control-label">TPP Maksimal</label>
            <input name="ee" autofocus="true" autocomplete="off" autofocus id="bb" class="form-control ee" type="text">
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

<!-- tes edit -->


<div id="ModalEditji" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>


<script type="text/javascript">
	$(document).ready(function(){
    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		$('#mydata').dataTable();

		//fungsi tampil data
		function tampil_data(){
		    $.ajax({
		        //type  : 'ajax',
		        url   : '<?php echo base_url()?>index.php/admin/atur_tpp/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;

                for(i=0; i<data.length; i++){

                  if (data[i].key_tpp == '0')
                  {
                    $cek = '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit" data="'+data[i].nik+'"><span class="icon icon-pencil"></span></a>';

                  }
                  else
                  {
                    $cek = '';

                  }
		                html += '<tr>'+
                          '<td>'+data[i].nik+'</td>'+
                          '<td>'+data[i].nama+'</td>'+
		                        /*'<td>'+data[i].unit_kerja+'</td>'+*/
                            '<td>'+data[i].jabatan+'</td>'+
                            '<td>'+data[i].golongan+'</td>'+
                            '<td>'+data[i].kelas_jabatan+'</td>'+
                            '<td>'+data[i].ini_tpp.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</td>'+
		                        '<td style="text-align:right;">'
                            +
                            $cek
                            +' '+
                                '</td>'
                                +
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
                url  : "<?php echo base_url('admin/atur_tpp/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(nik,nama,jabatan,golongan){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aa"]').val(data.nik);
                         $('[name="bb"]').val(data.nama);
                         $('[name="cc"]').val(data.jabatan);
                         $('[name="dd"]').val(data.golongan);
                         $('[name="ee"]').val(data.tpp_max);
                         $('[name="kelas"]').val(data.kelas_jabatan);
            		});
                }
            });
            return false;
        });


    //GET TES

        $(".item_edit_tes").click(function(e) {
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

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/data_pegawai/simpan')?>",
                dataType : "JSON",
                data : {a:a,b:b,c:c,d:d,e:e},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    //$('[name="c"]').val("");
                    $('[name="d"]').val("");
                    $('[name="e"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //Update
		$('#btn_update').on('click',function(){
            var aa=$('.aa').val();
            var bb=$('.bb').val();
            var cc=$('.cc').val();
            var dd=$('.dd').val();
            var ee=$('.ee').val();
            var kelas=$('.kelas').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/atur_tpp/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb,c:cc , d:dd, e:ee, kelas:kelas},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
                    $('[name="dd"]').val("");
                    $('[name="ee"]').val("");
                    $('[name="kelas"]').val("");
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
        $(".cc").select2({
            placeholder: "Pilih Data Jabatan"
        });

        $(".dd").select2({
            placeholder: "Pilih Data Golongan"
        });
    });
</script>
