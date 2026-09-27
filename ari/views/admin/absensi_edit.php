<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header bg-primary">
    <h4 class="modal-title">Edit Absensi Pegawai</h4>
  </div>
  <div class="modal-body">
    <form action="<?php echo site_url('admin/absensi/update');?>" method="POST">
      <div class="form-group">
        <label class="control-label">Tanggal</label>
        <input class="form-control a" value="<?php echo $detil->id;?>" readonly name="id" autocomplete="off" type="hidden" data-date-today-btn="linked">
        <input class="form-control a" value="<?php echo $detil->nik;?>" readonly name="nik" autocomplete="off" type="hidden" data-date-today-btn="linked">
        <!--<input class="form-control a" name="aa" autocomplete="off" type="text" data-provide="datepicker" data-date-today-btn="linked">-->
        <input class="form-control a" value="<?php echo $detil->tanggal;?>" readonly name="aa" autocomplete="off" type="text" data-date-today-btn="linked">
      </div>

      <div class="form-group">
        <label class="control-label">Apel Masuk</label>
        <select name="bb"  class="form-control b">
          <option value="<?php echo $detil->apel_masuk;?>">
            <?php
            if( $detil->apel_masuk == 1) {
              echo "Hadir";
            }
            else
            {
              echo "Tidak Hadir";
            }
            ?>
          </option>
          <option value="1">Hadir </option>
          <option value="0">Tidak Hadir</option>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Apel Pulang</label>
        <select name="cc"  class="form-control c">
          <option value="<?php echo $detil->apel_pulang;?>">
            <?php
            if( $detil->apel_pulang == 1) {
              echo "Hadir";
            }
            else
            {
              echo "Tidak Hadir";
            }
            ?>
          </option>
          <option value="1">Hadir </option>
          <option value="0">Tidak Hadir</option>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Upacara Hari Senin</label>
        <select name="dd"  class="form-control b">
          <option value="<?php echo $detil->upacara_hari_senin;?>">
            <?php
            if( $detil->upacara_hari_senin == 1) {
              echo "Hadir";
            }
            else
            {
              echo "Tidak Hadir";
            }
            ?>
          </option>
          <option value="1">Hadir </option>
          <option value="0">Tidak Hadir</option>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Status Kehadiran</label>
        <select name="status_kehadiran"  class="form-control b">
          <option value="<?php echo $detil->hari_kerja;?>">
            <?php
            if( $detil->hari_kerja == 1) {
              echo "Hadir";
            }
            else
            {
              echo "Tidak Hadir";
            }
            ?>
          </option>
          <option value="1">Hadir </option>
          <option value="0">Tidak Hadir</option>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Upacara Hari Besar</label>
        <select name="ee"  class="form-control b">
          <option value="<?php echo $detil->upacara_hari_besar;?>">
            <?php
            if( $detil->upacara_hari_besar == 1) {
              echo "Hadir";
            }
            else
            {
              echo "Tidak Hadir";
            }
            ?>
          </option>
          <option value="1">Hadir </option>
          <option value="0">Tidak Hadir</option>
        </select>
      </div>


      <div class="form-group">
        <label class="control-label">Jam Masuk Pagi</label>
        <input id="" value="<?php echo $detil->jam_masuk_1;?>" class="form-control e" maxlength="8" name="ff" type="text" placeholder="jam:menit">
        <span class="help-block">Silahkan input dengan format jam sebagai berikut <b> (jam:menit) </b>.</span>
      </div>

      <div class="form-group" data-toggle="match-height">
        <label class="control-label">Jam Masuk Siang</label>
        <input id="form-control" value="<?php echo $detil->jam_masuk_2;?>" class="form-control f" maxlength="8" name="gg" type="text" placeholder="jam:menit">
      </div>


      <div class="form-group">
        <label class="control-label">Jam Pulang</label>
        <input id="form-control-2" value="<?php echo $detil->jam_pulang;?>"  class="form-control g" maxlength="8" name="hh" type="text" placeholder="jam:menit">
      </div>

      <div class="form-group">
        <label class="control-label">Total Jam Izin</label>
        <input name="ii" autocomplete="off" value="<?php echo $detil->jam_izin;?>" autofocus id="cc" maxlength="8" placeholder="jam:menit" class="form-control h" type="text">
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
