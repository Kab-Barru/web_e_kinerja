<div class="layout-main">
  <div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
      <div class="custom-scrollbar">
        <nav id="sidenav" class="sidenav-collapse collapse">
          <ul class="sidenav level-1">

            <li class="sidenav-heading"><b><i>Dashboard</i></b></li>

            <li class="sidenav-item">
              <a href="<?php echo site_url('peg/dash/'); ?>">
                <span class="sidenav-icon icon icon-home"></span>
                <span class="sidenav-label">Halaman Utama</span>
              </a>
            </li>

            <li class="sidenav-heading"><b><i>Indikator Kedisiplinan</i></b></li>

            <!--  <li class="sidenav-item">
              <a href="<?php echo site_url('peg/atasan/'); ?>">
                <span class="sidenav-icon icon icon-user-secret"></span>
                <span class="sidenav-label">Set Atasan</span>
              </a>
            </li>
          -->

            <li class="sidenav-item">
              <a href="<?php echo site_url('peg/absensi/'); ?>">
                <span class="sidenav-icon icon icon-calendar"></span>
                <span class="sidenav-label">Absensi Pegawai</span>
              </a>
            </li>

            <!--<li class="sidenav-item">
              <a href="<?php echo site_url('peg/lap/'); ?>">
                <span class="sidenav-icon icon icon-book"></span>
                <span class="sidenav-label">Laporan Harian</span>
              </a>
            </li>
          -->


            </li>

            <!--
            <li class="sidenav-heading">Indikator Kinerja</li>
            <li class="sidenav-item has-subnav open active">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-newspaper-o"></span>
                <span class="sidenav-label">Laporan Harian</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">UI Elements</li>
                <li><a href="<?php echo site_url('peg/atasan/'); ?>">Atur Atasan</a></li>
                <li><a href="<?php echo site_url('peg/izin/'); ?>">Input Izin</a></li>
                <li><a href="<?php echo site_url('peg/lap/'); ?>">Input Laporan Harian
                  <span class="sidenav-badge badge badge-primary">
                  <?php
                  $nip = $this->session->userdata('username');
                  $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                  $tampill = $queryy->row();
                  echo $tampill->revisi;


                  ?></span>
                </a></li>
                <li><a href="<?php echo site_url('peg/acc_lap/'); ?>">Setujui Lap Bawahan
                  <span class="sidenav-badge badge badge-primary">
                  <?php
                  $nip = $this->session->userdata('username');
                  $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                  $tampil = $query->row();
                  echo $tampil->jum;


                  ?></span>
                </a></li>


              </ul>
            -->
            <li class="sidenav-heading"> <b><i>Indikator Kinerja</i> </b></li>



            <li class="sidenav-item">
            <li><a href="<?php echo site_url('peg/atasan/'); ?>">
                <span class="sidenav-icon icon icon-user-secret"></span>
                <span class="sidenav-label">Atur Atasan</span></a></li>

            <li>
              <a href="<?php echo site_url('peg/izin/'); ?>">
                <span class="sidenav-icon icon icon-calendar-times-o"></span>
                <span class="sidenav-label">Input Izin</span>
              </a>
            </li>

            <li>
              <?php
              if ($this->session->userdata('username') == 123) {
                ?>
                <a href="<?php echo site_url('peg/lap/hack'); ?>">
                <?php
                } else {
                  ?>
                  <a href="<?php echo site_url('peg/lap/'); ?>">
                  <?php
                  }
                  ?>



                  <span class="sidenav-icon icon icon-pencil"></span>
                  <span class="sidenav-label">Buat Laporan Harian
                    <span class="sidenav-badge badge badge-primary">
                      <?php
                      $nip = $this->session->userdata('username');
                      $queryy = $this->db->query("select count(*) as revisi from pro_lap where nik='$nip' and status='3'"); //masih manual
                      $tampill = $queryy->row();
                      echo $tampill->revisi;
                      ?></span>
                  </span>
                  </a>
            </li>

            <li>
              <a href="<?php echo site_url('peg/acc_lap/'); ?>">
                <span class="sidenav-icon icon icon-check-circle"></span>
                <span class="sidenav-label">Setujui Laporan Bawahan
                  <span class="sidenav-badge badge badge-primary">
                    <?php
                    $nip = $this->session->userdata('username');
                    $query = $this->db->query("select count(*) as jum from pro_lap where nik_atasan='$nip' and status='1'"); //masih manual
                    $tampil = $query->row();
                    echo $tampil->jum;


                    ?></span></span>
              </a>
            </li>

          </ul>

          </li>

          <!--
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#110;</span>
                <span class="sidenav-label">Forms</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Forms</li>
                <li><a href="cropper.html">Cropper</a></li>
                <li><a href="form-controls.html">Form controls</a></li>
                <li><a href="form-layouts.html">Form layouts</a></li>
                <li><a href="form-validation.html">Form validation</a></li>
                <li><a href="form-wizard.html">Form wizard</a></li>
                <li><a href="input-mask.html">Input mask</a></li>
                <li><a href="md-form-controls.html">Material form controls</a></li>
                <li><a href="md-form-validation.html">Material form validation</a></li>
                <li><a href="pickers.html">Pickers</a></li>
                <li><a href="select2.html">Select2</a></li>
                <li><a href="sliders.html">Sliders</a></li>
                <li><a href="toggles.html">Toggles</a></li>
                <li><a href="uploader.html">Uploader</a></li>
              </ul>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#97;</span>
                <span class="sidenav-label">Tables</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Tables</li>
                <li><a href="static-tables.html">Static tables</a></li>
                <li><a href="responsive-tables.html">Responsive tables</a></li>
                <li><a href="bootstrap-tables.html">Bootstrap tables</a></li>
                <li><a href="datatables.html">Datatables</a></li>
                <li><a href="datatables-buttons.html">Datatables Buttons</a></li>
                <li><a href="datatables-responsive.html">Datatables Responsive</a></li>
                <li><a href="datatables-fixedheader.html">Datatables FixedHeader</a></li>
                <li><a href="datatables-rowreorder.html">Datatables RowReorder</a></li>
                <li><a href="datatables-colreorder.html">Datatables ColReorder</a></li>
                <li><a href="datatables-scroller.html">Datatables Scroller</a></li>
              </ul>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#61;</span>
                <span class="sidenav-label">Charts</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Charts</li>
                <li><a href="peity.html">Peity</a></li>
                <li><a href="chartjs.html">Chart.js</a></li>
              </ul>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#38;</span>
                <span class="sidenav-label">Maps</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Maps</li>
                <li><a href="vector-maps.html">Vector maps</a></li>
                <li><a href="google-maps.html">Google maps</a></li>
              </ul>
            </li>
            <li class="sidenav-heading">Multi-Level Menu</li>
            <li class="sidenav-item has-subnav">
              <a href="#multi-level-menu" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#103;</span>
                <span class="sidenav-label">With Icons</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">With Icons</li>
                <li class="sidenav-item has-subnav">
                  <a href="#real-time">
                    <span class="icon icon-works">&#105;</span>Real-Time
                  </a>
                  <ul class="sidenav level-3 collapse">
                    <li class="sidenav-item has-subnav">
                      <a href="#overview">
                        <span class="icon icon-works">&#102;</span>Overview
                      </a>
                      <ul class="sidenav level-4 collapse">
                        <li class="sidenav-item has-subnav">
                          <a href="#top-keywords">
                            <span class="icon icon-works">&#83;</span>Top Keywords
                          </a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">
                                <span class="icon icon-works">&#90;</span>Past 24h
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">
                                <span class="icon icon-works">&#90;</span>Past 1wk
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">
                                <span class="icon icon-works">&#90;</span>Past 1mo
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                          <a href="#top-locations">
                            <span class="icon icon-works">&#38;</span>Top Locations
                          </a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">
                                <span class="icon icon-works">&#90;</span>Past 24h
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">
                                <span class="icon icon-works">&#90;</span>Past 1wk
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">
                                <span class="icon icon-works">&#90;</span>Past 1mo
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                          <a href="#top-referrals">
                            <span class="icon icon-works">&#57;</span>Top Referrals
                          </a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">
                                <span class="icon icon-works">&#90;</span>Past 24h
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">
                                <span class="icon icon-works">&#90;</span>Past 1wk
                              </a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">
                                <span class="icon icon-works">&#90;</span>Past 1mo
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="sidenav-item">
                      <a href="#traffic-sources">
                        <span class="icon icon-works">&#213;</span>Traffic Sources
                      </a>
                    </li>
                    <li class="sidenav-item">
                      <a href="#events">
                        <span class="icon icon-works">&#102;</span>Events
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="#audience">
                    <span class="icon icon-works">&#80;</span>Audience
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="#behavior">
                    <span class="icon icon-works">&#70;</span>Behavior
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#multi-level-menu" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#103;</span>
                <span class="sidenav-label">Just Text</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Just Text</li>
                <li class="sidenav-item has-subnav">
                  <a href="#real-time">Real-Time</a>
                  <ul class="sidenav level-3 collapse">
                    <li class="sidenav-item has-subnav">
                      <a href="#overview">Overview</a>
                      <ul class="sidenav level-4 collapse">
                        <li class="sidenav-item has-subnav">
                          <a href="#top-keywords">Top Keywords</a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">Past 24h</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">Past 1wk</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">Past 1mo</a>
                            </li>
                          </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                          <a href="#top-locations">Top Locations</a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">Past 24h</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">Past 1wk</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">Past 1mo</a>
                            </li>
                          </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                          <a href="#top-referrals">Top Referrals</a>
                          <ul class="sidenav level-5 collapse">
                            <li class="sidenav-item">
                              <a href="#past-24h">Past 24h</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1wk">Past 1wk</a>
                            </li>
                            <li class="sidenav-item">
                              <a href="#past-1mo">Past 1mo</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="sidenav-item">
                      <a href="#traffic-sources">Traffic Sources</a>
                    </li>
                    <li class="sidenav-item">
                      <a href="#events">Events</a>
                    </li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="#audience">Audience</a>
                </li>
                <li class="sidenav-item">
                  <a href="#behavior">Behavior</a>
                </li>
              </ul>
            </li>
            <li class="sidenav-heading">Pages</li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#95;</span>
                <span class="sidenav-label">Authentication</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Authentication</li>
                <li><a href="signup-1.html" target="_blank">Sign up 1</a></li>
                <li><a href="signup-2.html" target="_blank">Sign up 2</a></li>
                <li><a href="signup-3.html" target="_blank">Sign up 3</a></li>
                <li><a href="login-1.html" target="_blank">Login 1</a></li>
                <li><a href="login-2.html" target="_blank">Login 2</a></li>
                <li><a href="login-3.html" target="_blank">Login 3</a></li>
                <li><a href="password-1.html" target="_blank">Reset password 1</a></li>
                <li><a href="password-2.html" target="_blank">Reset password 2</a></li>
                <li><a href="password-3.html" target="_blank">Reset password 3</a></li>
              </ul>
            </li>
            <li class="sidenav-item">
              <a href="contacts.html">
                <span class="sidenav-icon icon icon-works">&#80;</span>
                <span class="sidenav-label">Contacts</span>
              </a>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#224;</span>
                <span class="sidenav-label">Mailbox</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Mailbox</li>
                <li><a href="mail.html">Mail 1</a></li>
                <li><a href="inbox.html">Mail 2</a></li>
                <li><a href="compose.html">Compose</a></li>
              </ul>
            </li>
            <li class="sidenav-item">
              <a href="messenger.html">
                <span class="sidenav-icon icon icon-works">&#78;</span>
                <span class="sidenav-label">Messenger</span>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="profile.html">
                <span class="sidenav-icon icon icon-works">&#112;</span>
                <span class="sidenav-label">Profile</span>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="drive.html">
                <span class="sidenav-icon icon icon-works">&#231;</span>
                <span class="sidenav-label">Drive</span>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="landing-page.html" target="_blank">
                <span class="sidenav-icon icon icon-works">&#34;</span>
                <span class="sidenav-label">Landing Page</span>
              </a>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#91;</span>
                <span class="sidenav-label">E-commerce</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">E-commerce</li>
                <li><a href="store.html">Store</a></li>
                <li><a href="shopping-cart.html">Shopping cart</a></li>
                <li><a href="product.html">Product</a></li>
              </ul>
            </li>
            <li class="sidenav-item has-subnav">
              <a href="#" aria-haspopup="true">
                <span class="sidenav-icon icon icon-works">&#68;</span>
                <span class="sidenav-label">Other pages</span>
              </a>
              <ul class="sidenav level-2 collapse">
                <li class="sidenav-heading">Other pages</li>
                <li><a href="blank-page.html">Blank Page</a></li>
                <li><a href="404.html" target="_blank">404</a></li>
                <li><a href="500.html" target="_blank">500</a></li>
                <li><a href="invoice.html">Invoice</a></li>
              </ul>
            </li>
          -->
          </ul>
        </nav>
      </div>
    </div>
  </div>