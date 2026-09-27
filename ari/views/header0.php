<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Kinerja &middot; Pemerintahan Kabupaten Barru.</title>
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="manifest.json">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#f7a033">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/elephant.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/application.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard-3.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/errors.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->


</head>

<body class="layout layout-header-fixed">

  <div class="layout-header">
    <div class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand navbar-brand-center" href="index-2.html">
          <!-- <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/img/logo.svg" alt="oi"> -->
          <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/img/logo4.png" alt="oi">
        </a>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
          <span class="sr-only">Toggle navigation</span>
          <span class="bars">
            <span class="bar-line bar-line-1 out"></span>
            <span class="bar-line bar-line-2 out"></span>
            <span class="bar-line bar-line-3 out"></span>
          </span>
          <span class="bars bars-x">
            <span class="bar-line bar-line-4"></span>
            <span class="bar-line bar-line-5"></span>
          </span>
        </button>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="arrow-up"></span>
          <span class="ellipsis ellipsis-vertical">
            <img class="ellipsis-object" width="32" height="32" src="<?php echo base_url(); ?>assets/img/3002121059.jpg" alt="Teddy Wilson">
          </span>
        </button>
      </div>
      <div class="navbar-toggleable">
        <nav id="navbar" class="navbar-collapse collapse">
          <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
              <span class="bar-line bar-line-4 in"></span>
              <span class="bar-line bar-line-5 in"></span>
              <span class="bar-line bar-line-6 in"></span>
            </span>
          </button>
          <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs-block">

              <?php
              $nik = $this->session->userdata('username');
              $cek = $this->db->query("select * from ref_log where username = '$nik'")->num_rows();
              $cek_det = $this->db->query("select * from ref_log where username = '$nik'")->row();
              $peg = $this->db->query("select * from ref_pegawai where nik = '$nik'")->row();
              ?>
              <?php
              if ($cek > 0) {
                if ($cek_det->lev == 'user_su') {
                  echo "Super User";
                } else if ($cek_det->lev == 'user_admin') {
                  echo $cek_det->nama_adm;
                } else {
                  ?>
                  <h4 class="navbar-text text-center"><?php echo $peg->gelar_depan . " " .  ucwords($peg->nama) . " " . $peg->gelar_belakang; ?></h4>
              <?php
                  //echo $peg->gelar_depan." " .  ucwords($peg->nama)." ".$peg->gelar_belakang;
                }
              }

              ?>

            </li>


            <li class="dropdown hidden-xs">
              <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                <!-- ini dia besar-->
                <img class="circle" width="36" height="36" src="<?php echo base_url(); ?>assets/img/3002121059.jpg" alt="Teddy Wilson">
                <?php
                if ($cek > 0) {
                  if ($cek_det->lev == 'user_su') {
                    echo "Super User";
                  } else if ($cek_det->lev == 'user_admin') {
                    echo $cek_det->nama_adm;
                  } else {
                    echo $peg->gelar_depan . " " .  ucwords($peg->nama) . " " . $peg->gelar_belakang;
                  }
                }

                ?>

                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-right">
                <li>
                  <a href="upgrade.html">
                    <h5 class="navbar-upgrade-heading">
                      Keterangan
                      <small class="navbar-upgrade-notification">Start on Februari 2019.</small>
                    </h5>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="navbar-upgrade-version">Version: 1.1</li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('peg/password'); ?>">Ganti Password</a></li>
                <li><a href="<?php echo site_url('log/logout'); ?>">Sign out</a></li>
              </ul>
            </li>

            <li class="visible-xs-block">
              <a href="<?php echo site_url('peg/password'); ?>">
                <span class="icon icon-user icon-lg icon-fw"></span>
                Ganti Password
              </a>
            </li>
            <li class="visible-xs-block">
              <a href="<?php echo site_url('log/logout'); ?>">
                <span class="icon icon-power-off icon-lg icon-fw"></span>
                Sign out
              </a>
            </li>
          </ul>
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">e-Kinerja</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <p class="title-bar-description">
              <small>Elektronik Kinerja Pegawai<a href="#"> Pemerintahan Kabupaten Barru</a>.</small>
            </p>
          </div>
        </nav>
      </div>
    </div>
  </div>