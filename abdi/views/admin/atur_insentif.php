


<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-left m-b">
      <!-- <b>Note</b> : <br> -->
      <!-- 1. Jika tombol edit/atur besaran Insentif   <a href="javascript:;" class="btn btn-info btn-icon sq-24 "><span class="icon icon-pencil"></span></a> <i> tidak tampil </i>, silahkan menghubungi admin kabupaten untuk diaktifkan. -->

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">


            </div>
            <strong>Atur insentif Pegawai Triwulan <?php echo $this->uri->segment(5) ?> Tahun <?php echo $this->uri->segment(4) ?> </strong>
          </div>

              <div class="datatable-responsive">
                <form class="" action="<?php echo base_url() ?>admin/Atur_insentif/update_data/" method="post">

        <input type="hidden" name="tahun" value="<?php echo $this->uri->segment(4) ?>">
        <input type="hidden" name="triwulan" value="<?php echo $this->uri->segment(5) ?>">
                <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>

                  <th rowspan="2">NIP</th>
                  <th rowspan="2">Nama</th>
                  <!--<th>Unit Kerja</th>-->
                  <th colspan="2" style="background-color:blue;color:white;" ><p align="center">Pajak</p></th>
                  <th colspan="2"style="background-color:green;color:white;" ><p align="center">Retribusi <p></th>
                    <!-- <th rowspan="2">Total</th> -->
                </tr>
                <tr>
                  <th style="background-color:blue;color:white;">Jumlah diterima</th>
                  <th style="background-color:blue;color:white;">PPh</th>


                  <th style="background-color:green;color:white;">Jumlah diterima</th>
                  <th style="background-color:green;color:white;">PPh</th>

                </tr>
              </thead>

              <tbody >
                <?php
                  $where=['tahun'=> $this->uri->segment(4),'triwulan'=>$this->uri->segment(5)];
                    $this->db->order_by("kelas_jabatan", "DESC");
                  $this->db->where($where);
                  $insentif=$this->db->get('view_insentif_bapenda')->result_array();

                  foreach ($insentif as $ins) {?>
                <tr>

                      <td><?php echo $ins['nip'] ?> <input type="hidden" name="id[]" value="<?php echo $ins['id'] ?>"></td>
                      <td><?php echo $ins['nama'] ?></td>
                      <td ><input type="text" name="a[]" value="<?php echo $ins['p-terima'] ?>" style="width:200px;"  class="uang"> </td>
                      <td ><input type="text" name="b[]" value="<?php echo $ins['p-pph'] ?>"style="width:200px"  class="uang"> </td>

                      <td ><input type="text" name="c[]" value="<?php echo $ins['r-terima'] ?>"style="width:200px"  class="uang"> </td>
                      <td><input type="text" name="d[]" value="<?php echo $ins['r-pph'] ?>" style="width:200px"  class="uang"> </td>


                      <!-- <td><?php echo $ins['total'] ?></td> -->

                </tr>
  <?php } ?>
              </tbody>
            </table>
            <br>
            <div class="" align="right">
              <button type="submit" name="button" class="btn btn-primary">Simpan Data</button>
            </div>

                    </form>

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

<script src="<?php echo base_url(); ?>asset/admin/plugins/jquery/jquery.min.js"></script>

<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script>


$('.uang').mask('0.000.000.000', {reverse: true});

</script>
