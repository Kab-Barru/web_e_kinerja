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


<div class="container">
  <div class="card" style="padding:10px">
<form method = "post" action = "<?php echo base_url() ?>peg/Testing/ceklok">
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tipe absen</label>
    <select class="form-control" id="exampleFormControlSelect1" name="status">
      <option value="1">Pagi</option>
      <option value="2">Siang</option>
      <option value="3">Pulang</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jam</label>
    <div class="input-group date" id="timepicker" data-target-input="nearest">
      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/  name="jam" >
      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="far fa-clock"></i></div>
      </div>
      </div>

  </div>
<div class="" align="right">
  <button type="submit" class="btn btn-primary">Kirim</button>
</div>
</form>
  </div>
<div class="" style="margin-top:0px">
  <a href="<?php echo base_url() ?>peg/Testing/bantu" class="btn btn-outline-primary" style="width:100%;">Layanan Bantuan <i class="fas fa-arrow-circle-right"></i></a>
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


<!--
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script> -->
<script type="text/javascript">
//Datemask dd/mm/yyyy

	$(document).ready(function(){



    $('#timepicker').datetimepicker({
      format: 'H:m:s'
    })




  });



</script>
