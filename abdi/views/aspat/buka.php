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
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript">
//Datemask dd/mm/yyyy

	$(document).ready(function(){
   $('#datatable').DataTable();


    $('#timepicker').datetimepicker({
      format: 'H:m:s'
    })



  });

function edit(id){
alert(id)
}

function hapus(kode){
  var srv='<?php echo base_url() ?>';


 Swal.fire({
    title: 'konfirmasi',
    text: "Apakah Anda Yakin ingin Menghapus Absen Ini?",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
  }).then((result ) => {
    if (result.value) {

        $.post(srv+'peg/Absensi/hapus_buka/'+kode,function(response){
          var result = $.parseJSON(response);
          console.log();
              if (result.status == true) {
                Swal.fire({
                  type: 'success',
                  title: 'Success',
                  text: result.messages
                });

                // dt.ajax.reload();

                location.reload();
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

function masuk(kode){
var id='<?php echo $this->uri->segment(4) ?>';
   auto_simpan(kode,id);

	 //
   // location.reload();
	 // alert(kode);
}


function auto_simpan(kode,id) {
$.ajax({
type: "POST",
url: "<?php echo base_url('peg/lap/auto_tarik') ?>",
dataType: "JSON",
data: {
  id: id,
  kode:kode,

},
success: function(data) {
  if (data.query) {
    console.log(data.query);

    tampil_data();

    location.reload();

    $.notify("Data berhasil disimpan", 'success');

  } else {
    console.log(data.query);
    $.notify('Proses simpan gagal silahkan coba lagi', 'error');

  }
}
});
location.reload();
}


</script>

<div id="myModal" class="modal fade">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						</div>
						<form method = "post" action = "<?php echo base_url() ?>peg/Testing/simpan_buka">
						<div class="modal-body">

							<input type="text" name="nip" value="<?php echo $id_absensi ?>">

							<input type="hidden" name="sn" value="<?php echo $sn ?>">
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


						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
						</div>
							</form>
				</div>
		</div>
</div>


<div class="content-wrapper" style="background-color:white">

  <!-- Content Header (Page header) -->
  <div class="content-header">


<div class="container-fluid">

<div class="" align="right" style="padding:10px">
  <a href="<?php echo base_url()?>peg/Testing/bantu" class="btn btn-warning btn-sm" style="color:white">Kembali</a>
  <a href="#myModal"   class="btn btn-primary btn-sm " data-toggle="modal">Tambah Absen</a>
</div>
<div class="card-body">


  <div class="datatable-responsive" style="max-width:100%;overflow-x:auto">
    <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0" >

      <thead>
            <tr>
              <th>No</th>
              <th>Nip</th>
              <th>nama</th>

              <th>Aksi</th>

      </tr>
          </thead>
          <!-- <tbody > -->

           <?php
           $no=1;
           foreach ($buka as $asn) {?>
             <tr>
               <td><?php echo $no++ ?></td>
               <td><?php echo $asn->nip ?></td>
               <td><?php echo $asn->password ?></td>
               <td>
								 <div class="">
					 					<a href="#" onclick="edit('<?php echo $asn->nip ?>')" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
					 					<a href="#" onclick="hapus('<?php echo $asn->nip?>')"class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
					 			</div> </td>

             </tr>

            <?php } ?>
          <!-- </tbody> -->



      </table>
  </div>
</div>
</div>
</div>
</div>



    <!-- Modal HTML -->
