<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="demo-form-wrapper">
          <form id="demo-form-wizard-1" novalidate>
            <ul class="steps">
              <li class="step col-xs-6 active">
                <a class="step-segment" href="#tab-1" data-toggle="tab">
                  <span class="step-icon icon icon-recycle"></span>
                </a>
                <div class="step-content">
                  <strong class="hidden-xs">Belum Diproses</strong>
                </div>
              </li>
              <li class="step col-xs-6">
                <a class="step-segment" href="#tab-2" data-toggle="tab">
                  <span class="step-icon icon icon-thumbs-up"></span>
                </a>
                <div class="step-content">
                  <strong class="hidden-xs">Sudah Diproses</strong>
                </div>
              </li>

            </ul>
            <div class="tab-content">
              <div id="tab-1" class="tab-pane active">
                <h4 class="text-center m-y-md">
                  <span>Daftar Izin Yang Belum Diproses</span>
                </h4>
                <h6 class="text-justify m-y-md">
                  <span>
                    <b>Note : </b> <br>
                    <!--1. Tombol Warna Biru : Berfungsi untuk memproses izin pegawai (edit data absensi pada menu absensi).<br>-->
                    1. Tombol Warna Merah Muda : Berfungsi untuk memproses izin pegawai.
                  </span>
                </h6>
                <?php
                                  if ($this->session->flashdata('ada')==NULL)
                                  {

                                  }
                                  else
                                  {?>
                                  <div class="alert alert-info">
                                      <button data-dismiss="alert" class="close">
                                        &times;
                                      </button>

                                      <a class="alert-link" href="#">
                                      <?php echo $this->session->flashdata('ada');?> </a>
                                  </div>

                                <?php

                                  }

                                ?>
                <div class="row gutter-xs">
                  <div class="col-xs-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="card-actions">
                          <button type="button" class="card-action card-toggler" title="Collapse"></button>
                          <button type="button" class="card-action card-reload" title="Reload"></button>

                        </div>
                        <strong>Belum Diproses</strong>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped" id="mydata">
                        <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
                          <thead>
                            <tr>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Total Izin</th>
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
                            <td><?php echo $acuan->tanggal;?></td>
                            <td><?php echo $acuan->total_izin;?></td>

                            <td>
                              <!--<a target="_blank" href="<?php echo site_url('admin/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-edit"></span></a>-->
                              <a href="<?php echo site_url('admin/izin/proses/'.$acuan->id_izin.'/'.$acuan->nik.'/'.$acuan->tanggal.'/'.$acuan->total_izin);?>" class="btn btn-success btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-check"></span></a>
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
              <div id="tab-2" class="tab-pane">
                <h4 class="text-center m-y-md">
                  <span>Daftar Izin Yang Telah Diproses</span>
                </h4>
                <div class="row gutter-xs">
                  <div class="col-xs-12">
                    <div class="card">
                      <div class="card-header">
                        <div class="card-actions">
                          <button type="button" class="card-action card-toggler" title="Collapse"></button>
                          <button type="button" class="card-action card-reload" title="Reload"></button>

                        </div>
                        <strong>Set TPP Maksimal</strong>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped" id="mydata">
                        <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
                          <thead>
                            <tr>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Total Izin</th>

                            </tr>
                          </thead>

                          <tbody id="show_data">
                            <?php
                            $no =1;
                            foreach($zz as $acuan1){
                        ?>
                        <tr class="odd gradeX">

                            <td><?php echo $acuan1->nik;?></td>
                            <td><?php echo $acuan1->gelar_depan." ". $acuan1->nama ." " .$acuan1->gelar_belakang ;?></td>
                            <td><?php echo $acuan1->tanggal;?></td>
                            <td><?php echo $acuan1->total_izin;?></td>


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
                <div class="form-group text-center">
                  <p>
                    <small>Daftar Izin Pegawai Yang Telah Diproses</small>
                  </p>

                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
</div>




<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
