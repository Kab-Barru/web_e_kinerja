<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>Super </b>Admin</a>
  </div>
  <!-- User name -->
  <?php
  $nik = $this->session->userdata('username');

  $peg = $this->db->query("select * from ref_pegawai where nik = '$nik'")->row();
  $nip=$_SESSION['nip'];

  $admin=$this->db->query("select * from testing where nip='$nik' And admin ='1'")->num_rows();
  if ($admin=='1') {
    $title= $peg->nama;
  }else{
    $title="Tabe..',Bukan Ki' Super Admin..!!";
  }
   ?>

  <div class="lockscreen-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url() ?>/foto/<?php echo $peg->foto ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" id="admin">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" >

        <div class="input-group-append">
          <?php if ($admin=='1') {?>
                  <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted" ></i></button>
        <?php }else{?>
              <a class="btn" type="button" onclick="pesan()" style="margin-top:8px"> <i class="fas fa-arrow-right text-muted" ></i></a>
        <?php } ?>

        </div>
      </div>
    </form>

    <!-- /.lockscreen credentials -->

  </div>


  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <div class="">
    <h5 style="color:red" id="pesan"></h5>
    </div>
    <?php if ($admin=='1') {
      echo 'Masukkan mih Password Super Admin ta..!!';
    } else{
      echo 'Kembali maki ke halaman Sebelumya,karna tidak ada juga akun ta..!!';
    }?>

  </div>
  <div class="text-center">
    <a href="<?php echo base_url() ?>peg/dasb">Kembali kehalaman Sebelumya..!</a>

  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy;<?php echo date('Y') ?> <b> </br>  <a href="#" class="text-black">Bidang Aptika Diskominsta Kabupaten Barru</a></b><br>

  </div>
</div>
<!-- /.center -->
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
<!--  -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url() ?>dist/js/demo.js"></script> -->
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>



<script type="text/javascript">
  function pesan(){
    Swal.fire({
      title: 'Na sudah maki je di tanya bilang bukan Ki admin..!!',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    })
  }
</script>

</body>
</html>
