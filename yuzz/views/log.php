<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-Kinerja &middot; Pemerintahan Kabupaten Barru.</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="e-Kinerja (elektronik Kinerja) merupakan aplikasi berbasis web yang berfungsi mengukur kinerja dari tiap pegawai.">
    <meta property="og:url" content="https://e-kinerja.barrukab.go.id">
    <meta property="og:type" content="website">
    <meta property="og:title" content="e-Kinerja (elektronik Kinerja) merupakan aplikasi berbasis web yang berfungsi mengukur kinerja dari tiap pegawai.">
    <meta property="og:description" content="Dibuatkan oleh Adhi Yusran Ibrahim">
    <meta property="og:image" content="../../elephant.html">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="Aplikasi E-Kinerja Pemkab Barru">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="../../elephant.html">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#f7a033">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../../../fonts.googleapis.com/css089b.css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login-2.min.css">
  </head>
  <body>
<style>
  body {
 background-image: url("<?php echo base_url();?>assets/img/kantorbupati2.jpg");
 background-color: #cccccc;
 background-size:cover;
}
</style>
    <div class="login">
      <div class="login-body">

                  <div class="card text-center">
                    <div class="card-image">
                      <div class="overlay">
                        <!-- <div class="overlay-gradient">
                          <img class="card-img-top img-responsive" src="<?php echo base_url();?>assets/img/kantorbupati2.jpg" alt="Instagram App">
                        </div> -->

                        <div class="overlay-content">
                          <div class="pull-right">
                          <?php
                            if ($this->session->flashdata('ada')==NULL)
                            {

                            }
                            else
                            {
                            ?>
                              <div class="alert alert-danger">
                                    <button data-dismiss="alert" class="close">
                                      &times;
                                    </button>

                                    <a class="alert-link" href="#">
                                    <?php echo $this->session->flashdata('ada');?>
                              </div>
                            <?php
                            }
                            ?>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="card-avatar">
                      <a class="card-thumbnail rounded sq-100" href="#" style="background-color:transparent;border-color:transparent">
                        <img class="img-responsive" src="<?php echo base_url();?>assets/img/2.png" alt="e-kinerja">
                      </a>
                    </div>
                    <div class="card-body">
                                      <div class="login-form">
                        <form action="<?php echo site_url('log/proses');?>" method="POST" data-toggle="validator">
                          <div class="form-group">
                            <label for="email">Nomor Induk Pegawai</label>
                            <input id="email" autofocus placeholder="Masukkan NIP disini" name="username" class="form-control" type="text" spellcheck="false" autocomplete="off" data-msg-required="Please enter your NIP." required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" placeholder="Masukkan Password disini" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                          </div>

                          <button class="btn btn-info btn-block" type="submit" style="background-color:#a29bfe;border-color:#a29bfe">Masuk</button>
                        </form>

                      </div>

                    </div>

                  </div>
                <div style="background-color:#fff;padding:10px;font-size:10px;border-radius:11px;height:50px" align="center">
                  <ul class="list-inline">
                        <li><a class="link-muted" href="">E-Kinerja Pemkab Barru</a></li>
                        <li><a class="link-muted" href="#">© By IT DISKOMINSTA</a></li>
                        <!-- <li>|</li> -->
                        <li>Version 1.2</li>
                        <li>|</li>
                        <li><a class="link-muted" href="#">Start on Oktober 2021</a></li>
                      </ul>
               </div>

      </div>
      <div class="login-footer">
        <!-- <ul class="list-inline">
          <li><a class="link-muted" href="">Aplikasi E-Kinerja Pemerintahan Kabupaten Barru</a></li>
          <li><a class="link-muted" href="#">© By IT BKPSDM</a></li>
          <li>|</li>

          <li>Version 1.1</li>
          <li>|</li>

          <li><a class="link-muted" href="#">Start on Feb 2019</a></li>
        </ul> -->
      </div>
    </div>






    <!-- <div class="login">
      <div class="login-body">
        <a class="login-brand" href="">
          <img class="img-responsive" height="200" src="<?php echo base_url();?>assets/img/e-kinerja.jpeg" alt="Logo Barru">
        </a>
         <h3 align="center" class="login-heading">Elektronik Kinerja Pemerintah Kab Barru</h3>
        <?php
          if ($this->session->flashdata('ada')==NULL)
          {
        
          }
          else
          {
          ?>
            <div class="alert alert-danger">
                  <button data-dismiss="alert" class="close">
                    &times;
                  </button>

                  <a class="alert-link" href="#">
                  <?php echo $this->session->flashdata('ada');?>
            </div>
          <?php
          }
          ?>
        <div class="login-form">
          <form action="<?php echo site_url('log/proses');?>" method="POST" data-toggle="validator">
            <div class="form-group">
              <label for="email">Nomor Induk Pegawai</label>
              <input id="email" name="username" class="form-control" type="text" spellcheck="false" autocomplete="off" data-msg-required="Please enter your NIP." required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Masuk</button>
          </form>
        </div>
      </div>

    </div>
  -->
    <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/elephant.min.js"></script>
    <script>

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>

</html>
