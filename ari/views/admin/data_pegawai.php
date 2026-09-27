<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
      <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Tambah Data</button>

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        Note : <br>
        1. Jika ada data pegawai yang tidak tampil, silahkan menuju ke menu<b><i> Data Pegawai</i></b>.  <br>
        2. Kemudian hapus data pegawai (data yang hilang/tidak tampil). <br/>
        3. Lakukan penginputa ulang data pegawai (pastikan data yang diinput adalah data yang valid dan lengkap).
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
                  <th>Pendidikan Terakhir</th>


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
            <input name="a" autocomplete="off" placeholder="Masukkan NIP tanpa menggunakan spasi" autofocus id="b" class="form-control a" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Gelar Depan</label>
            <input name="g1" autocomplete="off" placeholder="Masukkan gelar depan. Contoh : Ir. atau dr. dan lain-lain"  id="g1" class="form-control g1" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Gelar Belakang</label>
            <input name="g2" autocomplete="off" autofocus id="g2" placeholder="Masukkan gelar belakang. Contoh : S.Kom atau M.M, dan lain-lain" class="form-control g2" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input name="b" autocomplete="off" placeholder="Masukkan nama pegawai tanpa gelar. Contoh : Budi" autofocus id="b" class="form-control b" type="text">
            <input name="c" readonly="readonly" value="<?php echo $unit_kerja->id_unit_kerja; ?>" autocomplete="off" autofocus  class="form-control c" type="hidden">
            <!--<input readonly="readonly" value="<?php echo $unit_kerja->unit_kerja; ?>" autocomplete="off"  class="form-control" type="hidden">-->
          </div>

<!--
          <div class="form-group">
            <label class="control-label">Unit Kerja</label>


          </div>

        -->




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

          <div class="form-group">
            <label class="control-label">Pendidikan Terakhir</label>
            <select required="required" name="pend" class="form-control pend">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($pend as $pend) {
                ?>
                <option value="<?php echo $pend->id_pendidikan;?>"><?php echo $pend->pendidikan;?></option>
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
                          '<td style="font-size:10px">'+data[i].nik+'</td>'+
                          '<td>'+data[i].gelar_depan+' '+data[i].nama+' ' +data[i].gelar_belakang+'</td>'+
		                        /*'<td>'+data[i].unit_kerja+'</td>'+*/
                            '<td style="font-size:10px">'+data[i].jabatan+'</td>'+
                            '<td>'+data[i].golongan+'</td>'+
                            '<td>'+data[i].agama+'</td>'+
                            '<td>'+data[i].pendidikan+'</td>'+

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
            var g1=$('.g1').val();
            var g2=$('.g2').val();
            var pend=$('.pend').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/data_pegawai/simpan')?>",
                dataType : "JSON",
                data : {a:a,b:b,c:c,d:d,e:e,f:f,g1:g1,g2:g2,pend:pend},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    $('[name="g1"]').val("");
                    $('[name="g2"]').val("");
                    //$('[name="c"]').val("");
                    //$('[name="d"]').val("");
                    //$('[name="e"]').val("");
                    //$('[name="f"]').val("");
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

        $(".pend").select2({
            placeholder: "Pilih Pendidikan Terakhir"
        });
    });
</script>
