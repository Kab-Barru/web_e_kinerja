

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label">NIK</label>
            <input name="asu" readonly="true" value="<?php echo $detil->nik;?>" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Gelar Depan</label>
            <input name="g11" autocomplete="off" value="<?php echo $detil->gelar_depan;?>" autofocus id="bb" class="form-control bb" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Gelar Belakang</label>
            <input name="g22" autocomplete="off" value="<?php echo $detil->gelar_belakang;?>" autofocus id="bb" class="form-control bb" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input name="bbb" autocomplete="off" value="<?php echo $detil->nama;?>" autofocus id="bb" class="form-control bb" type="text">
            <input name="ccc" autocomplete="off" value="<?php echo $detil->id_unit_kerja;?>" autofocus id="bb" class="form-control cc" type="hidden">
          </div>

          <!--<div class="form-group">
            <label class="control-label">Unit Kerja</label>

            <select readonly="readonly" name="ccc" id="demo-select2-1" class="form-control cc">

              <option value="<?php echo $detil->id_unit_kerja;?>"><?php echo $detil->unit_kerja;?></option>
            </select>
          </div>
        -->

          <div class="form-group">
            <label class="control-label">Jabatan</label>
            <select name="ddd" id="demo-select2-1" class="form-control dd">
              <!--<option value="<?php echo $detil->id_jabatan;?>"><?php echo $detil->jabatan;?></option>-->
              <?php
              foreach ($jabatan as $jab) {
                ?>
                <option value="<?php echo $jab->id_jabatan;?>" <?php if($jab->id_jabatan==$detil->id_jabatan)
                { ?> selected="selected" <?php } ?>><?php echo $jab->jabatan;?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Golongan</label>
            <select name="eee" class="form-control ee">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($golongan as $gol) {
                ?>
                <option value="<?php echo $gol->id_pangkat;?>" <?php if($gol->id_pangkat==$detil->id_pangkat)
                { ?> selected="selected" <?php } ?>><?php echo $gol->golongan;?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Agama</label>
            <select name="ff" class="form-control ff">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($agama as $agama) {
                ?>
                <option value="<?php echo $agama->id_agama;?>" <?php if($agama->id_agama==$detil->agama)
                { ?> selected="selected" <?php } ?>><?php echo $agama->agama;?></option>
                <?php
              }
              ?>
            </select>
          </div>


          <div class="form-group">
            <label class="control-label">Pendidikan Terakhir</label>
            <select name="pendi" class="form-control ff">
              <option value="">--- PILIH DATA ---</option>
              <?php
              foreach ($pend as $pend) {
                ?>
                <option value="<?php echo $pend->id_pendidikan;?>" <?php if($pend->id_pendidikan==$detil->pendidikan_terakhir)
                { ?> selected="selected" <?php } ?>><?php echo $pend->pendidikan;?></option>
                <?php
              }
              ?>
            </select>
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
              var bb=$('[name="bbb"]').val();
              var cc=$('[name="ccc"]').val();
              var dd=$('[name="ddd"]').val();
              var ee=$('[name="eee"]').val();
              var ff=$('[name="ff"]').val();
              var g1=$('[name="g11"]').val();
              var g2=$('[name="g22"]').val();
              var pendi=$('[name="pendi"]').val();

              $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url('admin/data_pegawai/update')?>",
                  dataType : "JSON",
                  data : {a:aa , b:bb,c:cc , d:dd, e:ee, f:ff, g1:g1, g2:g2, pendi:pendi},
                  success: function(data){
                      $('.aa').val("");
                      $('.bb').val("");
                      $('.cc').val("");
                      $('.dd').val("");
                      $('.ee').val("");
                      $('.ff').val("");
                      //$('#ModalEditji').modal('hide');
                      location.href = '<?php echo site_url('admin/data_pegawai')?>';
                      //location.href="../admin/data_pegawai";
                      //tampil_dataji();
                  }
              });
              return false;
          });



        $(".dd").select2({
            placeholder: "Pilih Data Golongan"
        });


        $(".ee").select2({
            placeholder: "Pilih Data Golongan"
        });

        $(".ff").select2({
            placeholder: "Pilih Data Agama"
        });

</script>
