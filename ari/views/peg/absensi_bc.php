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
                <td><?php echo $acuan->gelar_depan." ". $acuan->nama ." " .$acuan->gelar_belakang ;?></td>
                <td><?php echo $acuan->jabatan;?></td>

                <td>
                  <a href="<?php echo site_url('peg/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-mail-forward"></span></a>
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
