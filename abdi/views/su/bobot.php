<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Set Bobot Tambahan Penghasilan Pegawai</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">
            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>Bobot Indikator Disiplin</th>
                  <th>Bobot indikator Kenerja</th>
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
            <label class="control-label">Indikatir Disiplin</label>
            <input name="bb" autocomplete="off" autofocus id="bb" class="form-control c" type="number">
          </div>

          <div class="form-group">
            <label class="control-label">Indikator Kinerja</label>
            <input name="cc" autocomplete="off" autofocus id="cc" class="form-control c" type="number">
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <input name="aa" autocomplete="off" autofocus id="aa" class="form-control f" type="hidden">
            <button class="btn btn-info" id="btn_update">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>
<!--END MODAL EDIT-->



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
		        url   : '<?php echo base_url()?>index.php/su/bobot/data',
		        async : false,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;

		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
		                  		'<td>'+data[i].indikator_disiplin+'</td>'+
                          '<td>'+data[i].indikator_kinerja+'</td>'+

		                        '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-icon sq-24 item_edit" data="'+data[i].id_bobot+'"><span class="icon icon-pencil"></span></a>'+' '+

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
                url  : "<?php echo base_url('su/bobot/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id_bobot,indikator_disiplin,indikator_kinerja){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aa"]').val(data.id_bobot);
                         $('[name="bb"]').val(data.indikator_disiplin);
                         $('[name="cc"]').val(data.indikator_kinerja);


            		});
                }
            });
            return false;
        });




        //Update Barang
		$('#btn_update').on('click',function(){
            var aa=$('#aa').val();
            var bb=$('#bb').val();
            var cc=$('#cc').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('su/bobot/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
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
            url  : "<?php echo base_url('index.php/su/set/hapus')?>",
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
