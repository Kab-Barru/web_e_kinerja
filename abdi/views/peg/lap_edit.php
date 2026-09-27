

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Tanggal</label>
            <!--<input name="asu" value="<?php echo $detil->tanggal;?>" autocomplete="off" data-date-today-highlight="true" autofocus id="bb" class="form-control aa" type="text">-->
            <input class="form-control aa" autocomplete="off" name="asu" value="<?php echo $detil->tanggal;?>"  type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-today-highlight="true">
            <b><small>Contoh penulisan : thn-bln-tgl </small> </b>
            <input name="oi" readonly="true" value="<?php echo $detil->id_pro_lap;?>" autocomplete="off" autofocus id="bb" class="form-control oi" type="hidden">

          </div>



          <div class="form-group">
            <label class="control-label">Status</label>
            <select name="asuu" id="demo-select2-1" class="form-control bb">
              <option value="0" selected="selected">Hari Kerja</option>
              <option value="1">Bukan Hari Kerja / Libur</option>
            </select>
            <b><small>Note : Silahkan periksa kembali status laporan anda </small></b>
          </div>



          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="oi">Simpan</button>
          </div>

      </div>
    </div>
  </div>


<script>
$('#oi').on('click',function(){
              //alert('jalan');
              var aa=$('[name="asu"]').val();
              var bb=$('[name="asuu"]').val();
              var cc=$('[name="oi"]').val();


              $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url('peg/lap/update')?>",
                  dataType : "JSON",
                  data : {a:aa , b:bb, c:cc},
                  success: function(data){
                      $('.aa').val("");
                      $('.bb').val("");
                      $('.oi').val("");
                      //$('#ModalEditji').modal('hide');
                      location.href = '<?php echo site_url('peg/lap')?>';
                      //location.href="../admin/data_pegawai";
                      //tampil_dataji();
                  }
              });
              return false;
          });

$(".aa").datepicker({startDate: "-4d", endDate: "0d"  });





        $(".ee").select2({
            placeholder: "Pilih Data Golongan"
        });

        $(".ff").select2({
            placeholder: "Pilih Data Agama"
        });

</script>
