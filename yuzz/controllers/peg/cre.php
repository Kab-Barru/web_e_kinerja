<div class="layout-content">
  <div class="layout-content-body">

    <div class="row gutter-xs">
      <div class="row gutter-xs">
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-body text-center" data-toggle="match-height">
            <a class="label label-success label-pill" href="#">
              <span>QR Code</span>
            </a>
            <span class="label arrow-left arrow-outline-success">
              <span>Anda</span>
            </span>
            <p>
              <p>
                <small><code>Silahkan lakukan scan QR Code pada mesin Scanner Kehadiran dikantor Anda.</code></small>
              </p>
              <span class="label label-info">
                <?php
                $nip = $this->session->userdata('username');
                echo $nip;

                ?>
                <img src="<?php echo base_url('uploads/qr_image/' . $nip . '.png'); ?>" alt="QRCode Image">
          </div>
        </div>

      </div>






    </div>



  </div>
</div>