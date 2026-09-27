

<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <b>
        Note : <br>
        1. Tombol berwarna "biru" berfungsi untuk penginputan absensi dihari biasa (diluar bulan ramadhan). <br>
        <?php
          $iddd = $this->session->userdata('id_unit_kerja');
          $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
          if ($query->kode == 0)
          {
            ?>
            2. Tombol berwarna "merah muda" berfungsi untuk penginputan absensi bulan mei (format jam kerja bulan ramadhan). <br>
            3. Khusus unit kerja Struktural 5 Hari Kerja : <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;- Absensi pegawai pada bulan mei diinput mulai dari tanggal 1-31 Mei menggunakan format kerja bulan ramadhan. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Senin - Kamis : 08.00 - 15.00. Istirahat : 12.00 - 12.30. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jumat : 08.00 - 15.30. Istirahat : 11.30 - 12.30. <br>

            <?php

          }
          ?>

        </b>

        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Set TPP Maksimal</strong>
          </div>
          <div class="card-body">

            <!--<table id="demo-datatables-2" class="table table-striped yuzee" cellspacing="0" width="100%">-->
              <table class="table table-striped" id="mydata">

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
            <tr>
                <td><?php echo $acuan->nik;?></td>
                <td><?php echo $acuan->gelar_depan." ". $acuan->nama ." " .$acuan->gelar_belakang ;?></td>
                <td><?php echo $acuan->jabatan;?></td>
                <td>
                  <?php
                    $iddd = $this->session->userdata('id_unit_kerja');
                    $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
                    if ($query->kode == 0)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <a href="<?php echo site_url('admin/absensi/set_ra/'.$acuan->nik.'');?>" class="btn btn-success btn-icon sq-32 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-pinterest-p"></span></a>
                      <?php
                    }
                    else if ($query->kode == 1)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_sd/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 2)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_smp/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 3)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_pus_6/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 4)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_pus_shift/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 5)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_tk/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 6)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_rs_ok/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 7)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_rs_shift/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else if ($query->kode == 8)
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set_rs_6/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                    else
                    {
                      ?>
                      <a href="<?php echo site_url('admin/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
                      <?php

                    }
                  ?>
                  <!--<a href="<?php echo site_url('admin/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>-->

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

<script>
    $(document).ready(function() {
        $('#mydata').DataTable( {
            "order": [[ 0, "asc" ]] // "0" means First column and "desc" is order type;
        } );
    } );
</script>
