<?php   $this->session->set_userdata('menu', '6'); ?>
<style>
  /* .btn-sm{
    width:20px;height:20px;
    font-size:8px;
  } */
</style>
<!-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->


<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">
      <div class="layout-content">
        <div class="layout-content-body">






    <div class="row gutter-xs">
            <div class="col-lg-12 col-xs-12">
              <div class="card">
                <div class="card-header">
                <div class="card-actions">
            <!-- <button type="button" class="card-action card-reload" title="Reload"></button> -->
            </div>
          <strong>Laporan Bawahan</strong>

                </div>
                <div class="card-body">


                  <div class="datatable-responsive">
                    <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
                      <thead>
                            <tr>
                              <th>No.</th>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <!-- <tbody id="show_data">


                          </tbody> -->
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- MODAL ADD -->
  <div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">

        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h6 class="modal-title">Input Laporan Harian</h6>
            </div>
            <div class="modal-body">
              <form>

                <div class="form-group">
                  <label class="control-label">Kegiatan Ke-</label>
                  <input type="number" class="form-control e" name="e" />
                </div>

                <div class="form-group">
                  <label class="control-label">Uraian Tugas</label>
                  <textarea rows="5" class="form-control a" name="a"></textarea>
                </div>

                <div class="form-group">
                  <label class="control-label">Jam</label>
                  <input class="form-control b" autocomplete="off" name="b" type="text" />
                  <input type="hidden" class="d" value="<?php echo $this->uri->segment(4);?>" />
                </div>


                <div class="form-group">
                  <label class="control-label">Output</label>
                  <textarea rows="5" class="form-control c" name="c"></textarea>
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

      </div>
    </div>
  </div>
</div>
<!-- MODAL EDIT -->
<div id="ModalaEdit" tabindex="-1" role="dialog" class="modal fade">

      <div class="modal-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <span class="modal-title">Edit Data</span>
      </div>
      <div class="modal-body">

        <form>

          <div class="form-group">
            <label class="control-label">Kegiatan Ke-</label>
            <input type="number" class="form-control ee" name="ee" />
          </div>


          <div class="form-group">
            <label class="control-label">Uraian Tugas</label>
            <textarea rows="5" class="form-control aa" name="aa"></textarea>
          </div>

          <div class="form-group">
            <label class="control-label">Jam</label>
            <input class="form-control bb" autocomplete="off" name="bb" type="text" />
            <input type="hidden" class="dd"  />
          </div>

          <div class="form-group">
            <label class="control-label">Output</label>
            <textarea rows="5" class="form-control cc" name="cc"></textarea>
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>
<!--END MODAL EDIT-->


<div id="ModalKirim" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <span class="text-success icon icon-paper-plane icon-5x"></span>
              <h3 class="text-danger">Kirim Laporan Keatasan</h3>
              <p>Pastikan terlebih dahulu detil kegiatan telah diinputkan. <br>
                Lanjut mengirim laporan ke Atasan ?
              </p>
                      <input type="hidden" name="kodee" id="textkodep" value="">
              <div class="m-t-lg">
                <button class="btn btn-success" data-dismiss="modal" id="item_kirimm"  type="button">Kirim</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

<!--MODAL HAPUS-->

<div id="ModalHapus" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <span class="text-danger icon icon-times-circle icon-5x"></span>
              <h3 class="text-danger">Hapus Data</h3>
              <p>Apakah Anda yakin mau memhapus data ini ?
              </p>
                <input type="hidden" name="kode" id="textkode" value="">
              <div class="m-t-lg">
                <button class="btn btn-danger" data-dismiss="modal" id="btn_hapus"  type="button">Hapus</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>


<!--END MODAL HAPUS-->
<!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script> -->

<script
  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url() ?>assets/js/fungsi.js" >
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){

   var dt = $("#datatable").DataTable({
             //"ajax": srv + "admin/Kinerja/",
             "ajax":"<?php echo base_url() ?>peg/Cek_lap/lap_bawahan/",
             "lengthChange":true,
                   "bInfo": false,
               "searching":true,
               "deferRender": false,
               "pageLength":10,
               "scrollX": true,
               "paging":true,
                   "columns": [
           {
             render: function(data, type, row, meta){
               return meta.row  + 1 + '.';
             },
           },

           { "data": "nik"},

           {
             render: function(data, type, row, meta){
               return row.nama+row.gelar_belakang;
             },
           },

           {
             render: function(data, type, row, meta){
               return tgl1(row.tanggal)
             },
           },

           {
              "width":"50px",
              render: function(data, type, row){
                var srv='<?php echo base_url()?>';
                url='peg/Cek_lap/periksa/';
                id=row.id_pro_lap;
                detail= '<div class="" style="color:white" align="center">'+
                        '<a href="'+srv+url+id+'" class="btn btn-primary btn-xs mr-1"  data-toggle="tooltip" data-placement="top" title="Buka"  type="button"   ><span class="fas fa-unlock-alt"></span></a>'+
                        '</div>';
              return detail;
             },
             sortable: false
           }
           ]
           }); /*end datatables*/



	});



</script>
