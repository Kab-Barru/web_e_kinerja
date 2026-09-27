<div class="layout-main">
  <div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
      <div class="custom-scrollbar">
        <nav id="sidenav" class="sidenav-collapse collapse">
          <ul class="sidenav level-1">
            <li class="sidenav-search">

            </li>

            <li class="sidenav-item">
              <a href="<?php echo site_url('su/unit_kerja'); ?>">
                <span class="sidenav-icon icon icon-institution"></span>
                <span class="sidenav-label">Unit Kerja</span>
              </a>
            </li>

            <li class="sidenav-item">
              <a href="<?php echo site_url('su/mutasi/'); ?>">
                <span class="sidenav-icon icon icon-exchange"></span>
                <span class="sidenav-label">Mutasi / Pindah Pegawai</span>
              </a>
            </li>


            <!--  <li><a href="<?php echo site_url('su/jabatan'); ?>">Jabatan</a></li> -->


            <li class="sidenav-item has-subnav open active">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-warning"></span>
                <span class="sidenav-label">Main Data</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Main Data</li>

                <li><a href="<?php echo site_url('su/bobot'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Bobot TPP</a>
                </li>

                <li><a href="<?php echo site_url('su/set'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja (5 Hari Kerja)</a>
                </li>
                <li><a href="<?php echo site_url('su/set_2'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja (SD SMP TK)</a>
                </li>

                <li><a href="<?php echo site_url('su/set_rs_ok'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja RS (Shift OK)</a>
                </li>

                <li><a href="<?php echo site_url('su/set_rs_6'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja RS (6 Hari)</a>
                </li>

                <li><a href="<?php echo site_url('su/set_rs_shift'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja RS (Shift)</a>
                </li>

                <li><a href="<?php echo site_url('su/set_pus_6'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja Puskesmas (6 Hari Kerja)</a>
                </li>

                <li><a href="<?php echo site_url('su/set_pus_shift'); ?>">
                    <span class="sidenav-icon icon icon-wrench"></span>Set Hari Kerja Puskesmas (Shift)</a>
                </li>
                <!--  <li><a href="<?php echo site_url('su/set_tpp'); ?>">Set TPP Maksimal</a></li> -->

                <!--<li><a href="<?php echo site_url('su/lase'); ?>">Hitung TPP</a></li>-->
              </ul>
            </li>
            <li class="sidenav-item">
              <a href="<?php echo site_url('su/baru'); ?>">
                <span class="sidenav-icon icon icon-user-secret"></span>
                <span class="sidenav-label">User Admin SKPD</span>
              </a>
            </li>

            <li class="sidenav-item">
              <a href="<?php echo site_url('su/detail'); ?>">
                <span class="sidenav-icon icon icon-line-chart"></span>
                <span class="sidenav-label">Detil Total Pegawai</span>
              </a>
            </li>


            <li class="sidenav-item">
              <a href="<?php echo site_url('su/select_printt/'); ?>">
                <span class="sidenav-icon icon icon-bar-chart"></span>
                <span class="sidenav-label">Kinerja Setahun
                  <span class="sidenav-badge badge badge-primary">
                    New</span>
                </span>
              </a>
            </li>

            <!--<li><a href="<?php echo site_url('su/baru'); ?>">User Admin SKPD</a></li> -->





          </ul>
        </nav>
      </div>
    </div>
  </div>