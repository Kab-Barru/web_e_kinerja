

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
                  <span>Daftar Tugas Luar Yang Belum Diproses</span>
                </h4>
                <h6 class="text-justify m-y-md">
                  <span>
                    <!-- <b>Note : </b> <br>

                    1. Tombol Warna Merah Muda : Berfungsi untuk memproses izin pegawai.
                  </span> -->
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
                        <button type="button" name="button" class="btn btn-primary btn-sm">Tambah Tugas Luar</button>
                        <!-- <table class="table table-striped table-hover w-100 cs-table" id="datatable"> -->
                        <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Jenis Tugas Luar</th>
                              <th>Keterangan</th>
                              <th>File</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>

                          <tbody id="show_data">
                            <?php
                            $no =1;
                            foreach($yy as $acuan){
                        ?>
                        <tr class="odd gradeX">

                            <td><?php echo $acuan->nip;?></td>
                            <td><?php
                                $nm=$this->db->query("SELECT * FROM `ref_pegawai` WHERE `nik`='$acuan->nip'")->row();
                                $nama=$nm->nama;
                                echo $nama;
                                ?>
                          </td>
                            <td><?php echo $acuan->tgl;?></td>
                            <td><?php
                            $ac=$acuan->jenis_absen;
                            if ($ac=='0') {
                              $ja='Full Satu Hari';
                            }else if($ac=='1'){
                              $ja='Pagi';
                            }else if ($ac=='2') {
                              $ja='Siang';
                            }else{
                                $ja='Pulang';
                            }
                            echo $ja;
                            ?>
                          </td>
                          <td><?php echo $acuan->keterangan ?></td>
                          <td>
                            <?php if (strlen($acuan->file)>4) {?>
                          <a href="<?php echo base_url() ?>uploads/<?php echo $acuan->file ?>" target="_blank">
                              <img src="<?php echo base_url() ?>uploads/<?php echo $acuan->file ?>" alt="" style="width:100px;height:100px">
                          </a>
                        <?php }else{ ?>
                          <span>Tidak Ada Gambar</span>
                        <?php } ?>

                          </td>

                            <td>
                              <!--<a target="_blank" href="<?php echo site_url('admin/absensi/set/'.$acuan->nik.'');?>" class="btn btn-info btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-edit"></span></a>-->

                              <!-- <a href="<?php echo site_url('admin/izin/proses/'.$acuan->id.'/'.$acuan->nip.'/'.$acuan->tgl);?>" class="btn btn-success btn-icon sq-24 item_hapus" data="'+data[i].id_jabatan+'"><span class="icon icon-check"></span></a> -->
                              <a href="#" class="btn btn-success" onclick="terima(<?php echo $acuan->id ?>)">Terima</a>
                              <atype="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Tolak</a>
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


<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLongTitle"><strong>Masukkan Alasan Penolakan</strong></h5>
        <textarea name="name" rows="8" cols="80"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>
</div>


<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">

     function terima(kode){
       srv='<?php echo base_url() ?>';
              Swal.fire({
                 title: 'Peringatan',
                 text: "Apakah Anda Yakin Ingin Menerima Ajuan Tugas Luar ini?",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Ya'
               }).then((result ) => {
                 if (result.value) {
                     $.post(srv+'admin/Absensi/terima_tl/'+kode,function(response){
                       var result = $.parseJSON(response);
                       console.log();
                           if (result.status == true) {
                             Swal.fire({
                               type: 'success',
                               title: 'Success',
                               text: result.messages
                             });

                             location.reload();

                             // dt1.ajax.reload();

                           //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                           } else {
                             Swal.fire({
                               type: 'error',
                               title: 'Oops...',
                               html: result.messages
                             });
                           }
                     })
                   }
        });
      }

</script>
