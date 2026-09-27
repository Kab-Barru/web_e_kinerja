<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<div class="content-wrapper" style="background-color:white">

  <!-- Content Header (Page header) -->
  <div class="content-header">


<div class="container-fluid">



<div class="card-body">
  <label for="">PILIH INSTANSI</label>


  <div class="row">
    <div class="col-lg-10">
      <select class="form-control" name="unker" id='unker'>
    <option value="0">Semua</option>
        <?php foreach ($unit_kerja as $unker) {?>
            <option value="<?php echo $unker->kode_unit_kerja ?>"><?php echo $unker->nama_unit_kerja ?></option>
      <?php } ?>
      </select>
    </div>
      <div class="col-lg-2">
        <button type="button" name="button" class="btn btn-primary filter" id="filter">Filter</button>
      </div>
  </div>


<hr>

  <div class="datatable-responsive" style="max-width:100%;overflow-x:auto">
    <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0" >

      <thead>
            <tr>
              <th>No</th>
              <th>Id Absensi</th>
              <th>Nip</th>
              <th>Nama Pegawai</th>
              <th>Instansi</th>
              <th>Kunjungi</th>
      </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($pegawai as $pgw) {?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $pgw->id ?></td>
              <td><?php echo $pgw->nik ?></td>
              <td><?php echo $pgw->nama ?></td>
              <td><?php
              $instansi=$pgw->id_unit_kerja;
              $this->db->where('id_unit_kerja',$instansi);
              $unker=$this->db->get('ref_unit_kerja')->row();
              echo $unker->unit_kerja;
               ?></td>
              <td> <a href="<?php echo base_url() ?>/peg/Testing/data_absen/<?php echo $pgw->id ?>" class="btn btn-primary" > <i class="fas fa-arrow-circle-right"></i> </a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
</div>

<!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url() ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!--
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->
<script type="text/javascript">
//Datemask dd/mm/yyyy

	$(document).ready(function(){
  $("#datatable").DataTable();
   var get='<?php echo $this->uri->segment(4); ?>';
   if (get!='') {
     $('#unker').val(get);
   }else{
      $('#unker').val('1');
   }




    $('#timepicker').datetimepicker({
      format: 'H:m:s'
    })

    $(".filter").click(function(){
      // alert('ok');
    var  id=$('#unker').val();
      $(location).attr("href", "<?php echo base_url() ?>peg/Testing/bantu/"+id);
    });






});








</script>
