<div class="layout-content">
  <div class="layout-content-body">
    <div class="text m-b">
Note : <br>
1. Data yang diproses (dihitung TPP) adalah pegawai yang penerima TPP. <br>
2. Disarankan untuk tidak memproses data yang bukan penerima TPP (Kepala Sekolah atau Pengawan yang tidak menerima TPP). <br>
3. Pastikan TPP Maksimal pegawai telah diisi, absensi pegawai, dan laporan harian pegawai telah diselesai sebelum memproses TPP. <br>
4. Jika ada perubahan absensi atau laporan harian yang baru mendapatkan persetujuan, silahkan untuk memproses ulang hitungan TPP pada menu <b> Rekap dan Proses TPP </b>

    </div>
    <div class="row gutter-xs">

      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar Pegawai</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">
            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>

                
                </tr>
              </thead>

              <tbody id="show_data">
                <?php
                $no =1;
                foreach($yy as $acuan){
            ?>
            <tr class="odd gradeX">

                <td><?php echo $acuan->nik;?></td>
                <td><?php echo $acuan->gelar_depan ." " .$acuan->nama ." " .$acuan->gelar_belakang;?></td>
                <td><?php echo $acuan->jabatan;?></td>




                <td>
                  <?php
                    $iddd = $this->session->userdata('id_unit_kerja');
                    $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
                    if ($query->kode == 0)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php
                    }
                    else if ($query->kode == 1)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_sd/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 2)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_smp/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 3)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_pus_6/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 4)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_pus_shift/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 5)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_tk/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 6)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_rs_ok/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 7)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_rs_shift/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 8)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set_rs_6/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else
                    {
                      ?>
                      <a href="<?php echo site_url('admin/tpp/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                  ?>
                  <!--<a href="<?php echo site_url('admin/tpp/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>-->
                </td>
            </tr>


      <?php
      $no++;

    }?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script type="text/javascript">
	$(document).ready(function(){

    $('#mydata').dataTable({    "aaSorting": [],  });




</script>
