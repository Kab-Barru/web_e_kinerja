
<div class="layout-content">
  <div class="layout-content-body">

    <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="demo-form-wrapper">
                <form action="<?php echo site_url('peg/password/ubah');?>" method="post" >
                  <?php
                                    if ($this->session->flashdata('ada')==NULL)
                                    {

                                    }
                                    else
                                    {?>



                  <div class="alert alert-info">
                      <button data-dismiss="alert" class="close">
                        &times;
                      </button>

                      <a class="alert-link" href="#">
                      <?php echo $this->session->flashdata('ada');?> </a>
                  </div>
                <?php
                  }
                ?>

                  <div class="form-group">
                    <label for="name-1" class="control-label">Password Lama</label>
                    <input id="form-control-1" placeholder="Masukkan Password Lama" name="a" class="form-control a" type="text">
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Password Baru</label>
                    <input id="form-control-2" name="b" minlength="6" placeholder="Masukkan Password Baru" class="form-control b" type="text" />
                    <small>*Silahkan Masukkan Password Sebelumnya dan Password Baru</small> <br>
                    <small>*Minimal password baru adalah 6 karakter</small>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


    </div>
</div>
