<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Kinerja &middot; Pemerintahan Kabupaten Barru.</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@madebytilde">
  <meta name="twitter:creator" content="@madebytilde">
  <meta name="twitter:title" content="Aplikasi E-Kinerja Pemerintahan Kabupaten Barru">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>apple-touch-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?php echo base_url(); ?>manifest.json">
  <link rel="mask-icon" href="<?php echo base_url(); ?>safari-pinned-tab.svg" color="#f7a033">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/elephant.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/application.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard-3.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/errors.min.css">
  -->

</head>

<body class="layout layout-header-fixed">

  <div class="layout-header">
    <div class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand navbar-brand-center" href="<?php echo base_url(); ?>peg/dash">
          <!-- <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/img/logo.svg" alt="oi"> -->
          <!-- <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/img/E.png" alt="oi"> -->
          <!-- <svg width="551" height="50" viewBox="0 0 1251 276" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M387.492 135.406C377.18 135.406 368.789 132.031 362.32 125.281C355.852 118.484 352.617 109.414 352.617 98.0703V95.6797C352.617 88.1328 354.047 81.4062 356.906 75.5C359.812 69.5469 363.844 64.9062 369 61.5781C374.203 58.2031 379.828 56.5156 385.875 56.5156C395.766 56.5156 403.453 59.7734 408.938 66.2891C414.422 72.8047 417.164 82.1328 417.164 94.2734V99.6875H365.625C365.812 107.188 367.992 113.258 372.164 117.898C376.383 122.492 381.727 124.789 388.195 124.789C392.789 124.789 396.68 123.852 399.867 121.977C403.055 120.102 405.844 117.617 408.234 114.523L416.18 120.711C409.805 130.508 400.242 135.406 387.492 135.406ZM385.875 67.2031C380.625 67.2031 376.219 69.125 372.656 72.9688C369.094 76.7656 366.891 82.1094 366.047 89H404.156V88.0156C403.781 81.4062 402 76.2969 398.812 72.6875C395.625 69.0312 391.312 67.2031 385.875 67.2031Z" fill="#FA0505" />
            <path d="M459.352 95.8203H425.039V85.2031H459.352V95.8203ZM500.133 86.3984L487.617 99.4062V134H474.117V31.625H487.617V82.25L533.109 31.625H549.422L509.133 76.8359L552.586 134H536.414L500.133 86.3984ZM576.492 134H563.484V57.9219H576.492V134ZM562.43 37.7422C562.43 35.6328 563.062 33.8516 564.328 32.3984C565.641 30.9453 567.562 30.2188 570.094 30.2188C572.625 30.2188 574.547 30.9453 575.859 32.3984C577.172 33.8516 577.828 35.6328 577.828 37.7422C577.828 39.8516 577.172 41.6094 575.859 43.0156C574.547 44.4219 572.625 45.125 570.094 45.125C567.562 45.125 565.641 44.4219 564.328 43.0156C563.062 41.6094 562.43 39.8516 562.43 37.7422ZM609.68 57.9219L610.102 67.4844C615.914 60.1719 623.508 56.5156 632.883 56.5156C648.961 56.5156 657.07 65.5859 657.211 83.7266V134H644.203V83.6562C644.156 78.1719 642.891 74.1172 640.406 71.4922C637.969 68.8672 634.148 67.5547 628.945 67.5547C624.727 67.5547 621.023 68.6797 617.836 70.9297C614.648 73.1797 612.164 76.1328 610.383 79.7891V134H597.375V57.9219H609.68ZM708.398 135.406C698.086 135.406 689.695 132.031 683.227 125.281C676.758 118.484 673.523 109.414 673.523 98.0703V95.6797C673.523 88.1328 674.953 81.4062 677.812 75.5C680.719 69.5469 684.75 64.9062 689.906 61.5781C695.109 58.2031 700.734 56.5156 706.781 56.5156C716.672 56.5156 724.359 59.7734 729.844 66.2891C735.328 72.8047 738.07 82.1328 738.07 94.2734V99.6875H686.531C686.719 107.188 688.898 113.258 693.07 117.898C697.289 122.492 702.633 124.789 709.102 124.789C713.695 124.789 717.586 123.852 720.773 121.977C723.961 120.102 726.75 117.617 729.141 114.523L737.086 120.711C730.711 130.508 721.148 135.406 708.398 135.406ZM706.781 67.2031C701.531 67.2031 697.125 69.125 693.562 72.9688C690 76.7656 687.797 82.1094 686.953 89H725.062V88.0156C724.688 81.4062 722.906 76.2969 719.719 72.6875C716.531 69.0312 712.219 67.2031 706.781 67.2031ZM789.961 69.5938C787.992 69.2656 785.859 69.1016 783.562 69.1016C775.031 69.1016 769.242 72.7344 766.195 80V134H753.188V57.9219H765.844L766.055 66.7109C770.32 59.9141 776.367 56.5156 784.195 56.5156C786.727 56.5156 788.648 56.8438 789.961 57.5V69.5938ZM815.414 57.9219V142.789C815.414 157.414 808.781 164.727 795.516 164.727C792.656 164.727 790.008 164.305 787.57 163.461V153.055C789.07 153.43 791.039 153.617 793.477 153.617C796.383 153.617 798.586 152.82 800.086 151.227C801.633 149.68 802.406 146.961 802.406 143.07V57.9219H815.414ZM801.07 37.7422C801.07 35.6797 801.703 33.9219 802.969 32.4688C804.281 30.9688 806.18 30.2188 808.664 30.2188C811.195 30.2188 813.117 30.9453 814.43 32.3984C815.742 33.8516 816.398 35.6328 816.398 37.7422C816.398 39.8516 815.742 41.6094 814.43 43.0156C813.117 44.4219 811.195 45.125 808.664 45.125C806.133 45.125 804.234 44.4219 802.969 43.0156C801.703 41.6094 801.07 39.8516 801.07 37.7422ZM883.406 134C882.656 132.5 882.047 129.828 881.578 125.984C875.531 132.266 868.312 135.406 859.922 135.406C852.422 135.406 846.258 133.297 841.43 129.078C836.648 124.812 834.258 119.422 834.258 112.906C834.258 104.984 837.258 98.8438 843.258 94.4844C849.305 90.0781 857.789 87.875 868.711 87.875H881.367V81.8984C881.367 77.3516 880.008 73.7422 877.289 71.0703C874.57 68.3516 870.562 66.9922 865.266 66.9922C860.625 66.9922 856.734 68.1641 853.594 70.5078C850.453 72.8516 848.883 75.6875 848.883 79.0156H835.805C835.805 75.2188 837.141 71.5625 839.812 68.0469C842.531 64.4844 846.188 61.6719 850.781 59.6094C855.422 57.5469 860.508 56.5156 866.039 56.5156C874.805 56.5156 881.672 58.7187 886.641 63.125C891.609 67.4844 894.188 73.5078 894.375 81.1953V116.211C894.375 123.195 895.266 128.75 897.047 132.875V134H883.406ZM861.82 124.086C865.898 124.086 869.766 123.031 873.422 120.922C877.078 118.812 879.727 116.07 881.367 112.695V97.0859H871.172C855.234 97.0859 847.266 101.75 847.266 111.078C847.266 115.156 848.625 118.344 851.344 120.641C854.062 122.938 857.555 124.086 861.82 124.086Z" fill="white" />
          </svg> -->
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" style="width:100px">



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
                <img class="circle" width="36" height="36" src="<?php echo base_url(); ?>assets/img/3002121059.jpg" alt="Adhi Yusran Ibrahim">
                <?php
                if ($cek > 0) {
                  if ($cek_det->lev == 'user_su') {
                    echo "Super User";
                  } else if ($cek_det->lev == 'user_admin') {
                    echo $cek_det->nama_adm;
                  } else if ($cek_det->lev == 'user_sdm') {
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
              <!-- <strong style="font-size:30px;color:#273c75;font-family:emoji;">Elektronik Kinerja Pegawai</strong>
              <span class="d-ib" style="font-family:emoji!important;">Pemerintahan Kabupaten Barr</span> -->
                <small style="font-size:10px">Elektronik Kinerja Pegawai<a href="#"> Pemerintahan Kabupaten Barru</a>.</small>
              <!-- <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span> -->
            </h1>
            <p class="title-bar-description">
              <!-- <small>Elektronik Kinerja Pegawai<a href="#"> Pemerintahan Kabupaten Barru</a>.</small> -->
            </p>
          </div>
        </nav>
      </div>
    </div>
  </div>