  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-left m-b">

      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h6 class="card-title font-weight-bold">Atur Insentif Bersasarkan Triwulan</h6>
            </div>


            <div class="card-body pt-0">

              <div  class="d-flex justify-content-between">
                <div class="p-2">
               <!-- <button type="button" class="btn btn-primary btn-sm add" data-toggle="modal" data-target=".bd-example-modal-sm"> <i class="fas fa-plus"></i> Triwulan</button> -->

                </div>
                <div align="right" style="margin-top:10px;">
                <!-- <input type="text" name="" id='myInput' placeholder="Cari"> -->
              </div>
              </div>
                <div class="datatable-responsive">
                  <div class="datatable-responsive">
                    <div class="datatable-responsive">
                      <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                        <thead>
                          <tr class="tr1">

                        <th>Tahun</th>
                        <th>Triwulan I</th>
                        <th>Triwulan II</th>
                        <th>Triwulan III</th>
                         <th>Triwulan IV</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $tahun=date('Y');
                          for ($i=$tahun; $i >=2022; $i--) {?>
                          <tr>
                              <td><?php echo $i ?></td>
                              <td>
                                <?php
                                $triwulan=['triwulan' =>'I','tahun'=>$i];
                                    $this->db->where($triwulan);
                                    $row1=$this->db->get('insentif_bapenda')->num_rows();

                              if ($row1==0) {?>
                              <a href="<?php echo base_url() ?>admin/Atur_insentif/insert_triwulan/<?php echo $i?>/I" class="btn btn-success btn-sm">Tambah Data</a>
                              <?php }else{ ?>
                              <a href="<?php echo base_url() ?>admin/Atur_insentif/getdata/<?php echo $i?>/I" class="btn btn-primary btn-sm">Cek data</a>
                            <?php } ?>
                              </td>
                              <td>
                                <?php
                                $triwulan=['triwulan' =>'II','tahun'=>$i];
                                    $this->db->where($triwulan);
                                 $row2=$this->db->get('insentif_bapenda')->num_rows();
                                  if ($row2==0) {?>
                                  <a href="<?php echo base_url() ?>admin/Atur_insentif/insert_triwulan/<?php echo $i?>/II" class="btn btn-success btn-sm">Tambah Data</a>
                                  <?php }else{ ?>
                                  <a href="<?php echo base_url() ?>admin/Atur_insentif/getdata/<?php echo $i?>/II" class="btn btn-primary btn-sm">Cek data</a>
                                <?php } ?>

                              </td>
                              <td>
                                <?php
                                $triwulan=['triwulan' =>'III','tahun'=>$i];
                                    $this->db->where($triwulan);
                                    $row3=$this->db->get('insentif_bapenda')->num_rows();

                              if ($row3==0) {?>
                              <a href="<?php echo base_url() ?>admin/Atur_insentif/insert_triwulan/<?php echo $i?>/III" class="btn btn-success btn-sm">Tambah Data</a>
                              <?php }else{ ?>
                              <a href="<?php echo base_url() ?>admin/Atur_insentif/getdata/<?php echo $i?>/III" class="btn btn-primary btn-sm">Cek data</a>
                            <?php } ?>

                              </td>
                              <td>
                                <?php
                                $triwulan=['triwulan' => 'IV','tahun'=>$i];
                                    $this->db->where($triwulan);
                                    $row4=$this->db->get('insentif_bapenda')->num_rows();

                                if ($row4==0) {?>
                                <a href="<?php echo base_url() ?>admin/Atur_insentif/insert_triwulan/<?php echo $i?>/IV" class="btn btn-success btn-sm">Tambah Data</a>
                                <?php }else{ ?>
                                <a href="<?php echo base_url() ?>admin/Atur_insentif/getdata/<?php echo $i?>/IV" class="btn btn-primary btn-sm">Cek data</a>
                              <?php } ?>

                              </td>
                              <!-- <td>
                              <?php
                                  $this->db->where('tahun',$i);
                                  $row=$this->db->get('insentif_bapenda')->num_rows();

                                  if ($row==0) {?>
                                  <a class="btn btn-success btn-sm" onclick="tmb('<?php echo $i ?>')">Tambah data</a>
                                <?php }else{ ?>
                                  <a href="<?php echo base_url() ?>admin/data_umum_pkk/<?php echo $i ?>" class="btn btn-primary btn-sm">Cek data</a>
                                <?php } ?>

                           </td> -->
                          </tr>
                            <?php } ?>
                        </tbody>

                      </table>
                    </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      </div>
    </div>
  </div>
    </div>
  </div>



<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="example-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
  <form class="" id="insentif" method="post">

      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle">Tambah Triwulan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Pilih Triwulan</label>
        <select name="triwulan" class="form-control" id="triwulan">
            <option value="I">I</option>
            <option value="II">I</option>
            <option value="III">I</option>
            <option value="IV">I</option>
        </select>
        <label for="">Pilih Tahun</label>
        <select name="tahun" class="form-control" id="tahun">
          <?php
          $th=date('Y');
          for ($i=$th; $i >2022; $i--) {?>
             <option value="<?php echo $i;?>"><?php echo $i;?></option>
         <?php } ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary sbmt" value="" id="tbl">Simpan</button>
      </div>
      </form>
    </div>
    </div>
</div>


<!--MODAL HAPUS-->



<!--END MODAL HAPUS-->

<!-- tes edit -->




<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$('#insentif').submit(function (e) {
             e.preventDefault();
             var kode=$('#tbl').val();

              dataUrl='<?php echo base_url() ?>admin/Atur_insentif/insert_triwulan/';

             $.ajax({
                 url:dataUrl, //URL submit
                 type:"post", //method Submit
                 data:new FormData(this), //penggunaan FormData
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(response){
                  var result = $.parseJSON(response);
                  console.log();
                      if (result.status == true) {

                        Swal.fire({
                          type: 'success',
                          title: 'Success',
                          text: result.messages
                        });

                        location.reload();


                      //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                      } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          html: result.messages
                        });
                      }
                }

        })
});


</script>
