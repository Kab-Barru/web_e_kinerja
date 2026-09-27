<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">

            <div class="col-md-8">
              <?php
                $iddd = $this->uri->segment('4');

                  ?>
                  <form target="_blank" action="<?php echo site_url('su/select_printt/view/'.$iddd);?>" method="post" class="form form-horizontal">


                <!--<form target="_blank" action="<?php echo site_url('admin/cetak/view');?>" method="post" class="form form-horizontal">-->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Pilih Tahun</label>
                    <div class="col-sm-9">
                    <select name="tahun" id="form-control-21" class="custom-select tahun">
              

                       <?php
                       $th=date('Y');
                       for ($i=$th; $i >2018; $i--) {?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                      <?php } ?>
                    </select>
                    </div>
                  </div>







                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1"></label>
                    <div class="col-sm-9">
                      <button class="btn btn-info href="oi.php" item-print" id="item_print">Cetak Laporan</button>
                    </div>
                  </div>
            </div>

          </div>
        </div>
      </div>

      <div id="ModalEditji" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      </div>

      <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

      <script>
          $(document).ready(function () {
              $(".d").select2({
                  placeholder: "Yang Mengetahui"
              });

              $(".e").select2({
                  placeholder: "Pengelola TPP"
              });
              $(".cc").select2({
                  placeholder: "Pilih Data Jabatan"
              });

              $(".dd").select2({
                  placeholder: "Pilih Data Golongan"
              });
          });
      </script>
