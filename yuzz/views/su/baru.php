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
            <!--<strong>Daftar User Admin SKPD</strong> <br>-->
            <b>Note :</b><br>
            1. Tombol biru berfungsi untuk mereset password. <br>
            2. Password default setelah direset adalah "<b>123456</b>".
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">
            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level User</th>
                  <th>Unit Kerja</th>
                  <th>Status</th>
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
        <h4 class="modal-title">Tambah Dataji</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="control-label">Unit Kerja</label>
            <!--<select name="a" id="demo-select2-1" class="form-control a">-->
            <select required="required" name="a" class="form-control a">


              <?php
              foreach ($u_kerja as $u_kerja) {
                ?>
                <option value="<?php echo $u_kerja->id_unit_kerja;?>"><?php echo $u_kerja->unit_kerja;?></option>
                <?php
              }

              ?>


            </select>
            <small>Note : Pastikan memilih unit kerja yang sesuai</small>
          </div>


          <div class="form-group">
            <label class="control-label">Nama</label>
            <input name="b" autocomplete="off" autofocus id="" class="form-control b" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Username</label>
            <input name="c" autocomplete="off" autofocus id="" class="form-control c" type="text">
            <small>Note : Username yang diinputkan tidak boleh menggunakan spasi. Contoh : <b><i> admin_bkpsdm </i></b></small>
          </div>


          <div class="form-group">
            <label class="control-label">Password</label>
            <input name="d" readonly autocomplete="off" value="123456" autofocus id="" class="form-control d" type="text">
            <small>Note : Password yang dimasukkan minimal 6 karakter. Contoh : <b><i> 123456 </i></b></small>
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
            <label class="control-label">Tahun</label>
            <input name="aa" autocomplete="off" autofocus id="aa" class="form-control c" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Bulan</label>
            <input name="bb" autocomplete="off" autofocus id="bb" class="form-control c" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Hari Kerja</label>
            <input name="cc" autocomplete="off" autofocus id="cc" class="form-control c" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Total Upacara Hari Senin</label>
            <input name="dd" autocomplete="off" autofocus id="dd" class="form-control d" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Total Apel Masuk</label>
            <input name="ee" autocomplete="off" autofocus id="ee" class="form-control e" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Total Upacara Hari Besar</label>
            <input name="ff" autocomplete="off" autofocus id="ff" class="form-control f" type="number">
          </div>



          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <input name="gg" autocomplete="off" autofocus id="gg" class="form-control f" type="hidden">
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

<!--MODAL RESET-->

<div id="ModalReset" tabindex="-1" role="dialog" class="modal fade">
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
              <span class="text-info icon icon-times-circle icon-5x"></span>
              <h3 class="text-info">Reset Data</h3>
              <p>Apakah Anda yakin mau mereset password admin ini ?
              </p>
                <input type="hidden" name="kode" id="textkodee" value="">
              <div class="m-t-lg">
                <button class="btn btn-info" data-dismiss="modal" id="btn_reset"  type="button">Reset</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

<!--END MODAL RESET-->

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
		        url   : '<?php echo base_url()?>index.php/su/baru/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
                $no = 1;
                var l;
                var sta;

		            for(i=0; i<data.length; i++){
                  $l = data[i].active;
                  if ($l == '1')
                  {
                    $sta = 'Aktif';
                  }
                  else
                  {
                    $sta = 'Tidak Aktif';
                  }

		                html += '<tr>'+
		                  		'<td>'+$no+'</td>'+
                          '<td>'+data[i].nama_adm+'</td>'+
                          '<td>'+data[i].username+'</td>'+
                          '<td>'+data[i].lev+'</td>'+
                          '<td>'+data[i].unit_kerja+'</td>'+
                          '<td>'+$sta+'</td>'+

		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_reset" data="'+data[i].id_adm+'"><span class="icon icon-refresh"></span></a>'+
                                    '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id_adm+'"><span class="icon icon-times"></span></a>'+
                                '</td>'+
		                        '</tr>';

		            $no++;}
		            $('#show_data').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('su/set/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(apel_masuk,bulan,id_tpp,hari_besar,hari_kerja,tahun,upacara_hari_senin){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aa"]').val(data.tahun);
                         $('[name="bb"]').val(data.bulan);
                         $('[name="cc"]').val(data.hari_kerja);
                         $('[name="dd"]').val(data.upacara_hari_senin);
                         $('[name="ee"]').val(data.apel_masuk);
                         $('[name="ff"]').val(data.hari_besar);
                         $('[name="gg"]').val(data.id_tpp);

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

        //GET RESET
    		$('#show_data').on('click','.item_reset',function(){
                var id=$(this).attr('data');
                $('#ModalReset').modal('show');
                $('[name="kode"]').val(id);
            });

		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var a=$('.a').val();
            var b=$('.b').val();
            var c=$('.c').val();
            var d=$('.d').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('su/baru/simpan')?>",
                dataType : "JSON",
                data : {a:a,b:b,c:c,d:d},
                success: function(data){
                    $('[name="a"]').val("");
                    $('[name="b"]').val("");
                    $('[name="c"]').val("");
                    //$('[name="d"]').val("");

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
            var cc=$('#cc').val();
            var dd=$('#dd').val();
            var ee=$('#ee').val();
            var ff=$('#ff').val();
            var gg=$('#gg').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('su/set/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc, d:dd, e:ee, f:ff,g:gg},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
                    $('[name="dd"]').val("");
                    $('[name="ee"]').val("");
                    $('[name="ff"]').val("");
                    $('[name="gg"]').val("");
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
            url  : "<?php echo base_url('index.php/su/baru/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data();
                    }
                });
                return false;
            });

            //Reset Password
            $('#btn_reset').on('click',function(){
                var kode=$('#textkodee').val();
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/su/baru/reset')?>",
                dataType : "JSON",
                        data : {kode: kode},
                        success: function(data){
                                $('#ModalReset').modal('hide');
                                tampil_data();
                        }
                    });
                    return false;
                });

	});

</script>

<script>
    $(document).ready(function () {
        $(".a").select2({
            placeholder: "Pilih Unit Kerja"
        });


    });
</script>
