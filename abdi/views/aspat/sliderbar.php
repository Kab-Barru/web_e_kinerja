<style media="screen">
.nav-link.active {
  background-color:#fff!important;
  color:black!important;
}
</style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('peg/Testing') ?>" class="brand-link" style="background-color:black">
      <img src="<?php echo base_url() ?>assets/img/log_barru.png" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size:14px"><b>E-Kinerja | Kab.Barru</b></span>

    </a>


    <!-- Sidebar -->
    <div class="sidebar" style="background-color:black">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">

            <ul class="nav nav-treeview">
            <li class="nav-header">Dashboard</li>
              <li class="nav-item">
                <a href="<?php echo base_url('peg/dasb')?>" class="nav-link" id="ma">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Halaman Utama</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url('peg/dash')?>" class="nav-link" id="ma">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Versi Lama</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-header">Indikator Kedisiplinan</li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>peg/Absensi" class="nav-link" id="mb">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Absensi Pegawai
              </p>
            </a>
          </li>
          <li class="nav-header">Indikator Kinerja</li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>peg/Atasan/set_atasan" class="nav-link" id="mc">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Setting Atasan
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>peg/izin/ajukan_izin" class="nav-link" id="md">
              <i class="nav-icon fas fa-calendar-times"></i>
              <p>
                Ajukan Izin
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php
                   if($this->session->userdata('username')== 196811041994031004)
	                  {
	                ?>
	                 <a href="<?php echo site_url('peg/lap/hack');?>" class="nav-link">
                  	<?php
                  	}
                  	else
                  	{
                  	?>
                     <a href="<?php echo site_url('peg/laporan/');?>" class="nav-link" id="me">
                  	<?php
                  	}
                    ?>

            <!-- <a href="pages/widgets.html" class="nav-link"> -->
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Buat Laporan Harian
                <span class="right badge badge-primary">
                <?php
                   $nip = $this->session->userdata('username');
                   $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3' "); //masih manual
                   $tampill = $queryy->row();
                   echo $tampill->revisi;
                   ?>
                </span>
              </p>
            </a>
          </li>
          <?php
          $nipnya=$_SESSION['nip'];
          $bawahan = $this->db->query("select * from  ref_pegawai where nik_atasan=$nipnya");
          $jumlah = $bawahan->num_rows();
          $bwh=$bawahan->result();
          if ($jumlah>0) {?>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>peg/cek_lap" class="nav-link" id="mf">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                Laporan Bawahan
                <span class="right badge badge-primary">
                    <?php
                    $nip = $this->session->userdata('username');
                    $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                    $tampil = $query->row();
                    echo $tampil->jum;

                    ?>
                </span>
              </p>
            </a>
          </li>
        <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
