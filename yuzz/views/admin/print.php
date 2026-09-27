<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">

            <div class="col-md-8">
              <?php
                $iddd = $this->session->userdata('id_unit_kerja');
                $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
                if ($query->kode == 0)
                {
                  ?>
                  <form target="_blank" action="<?php echo site_url('admin/printt/view');?>" method="post" class="form form-horizontal">
                  <?php
                }
                else if ($query->kode == 1)
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 2)
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 3) //pus 6
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 4) //pus shift
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 5)
                {
                  ?>

                  <?php

                }

                //rs start
                else if ($query->kode == 6)
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 7)
                {
                  ?>

                  <?php

                }
                else if ($query->kode == 8)
                {
                  ?>

                  <?php

                }

                //rs end

                else
                {
                  ?>

                  <?php

                }
              ?>

                <!--<form target="_blank" action="<?php echo site_url('admin/cetak/view');?>" method="post" class="form form-horizontal">-->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Pilih Tahun</label>
                    <div class="col-sm-9">
                    <select name="tahun" id="form-control-21" class="custom-select tahun">
                      <!-- <?php
                      foreach ($tahun as $tahun) {
                        ?>
                        <option value="<?php echo $tahun->tahun;?>"><?php echo $tahun->tahun;?></option>
                        <?php
                      }
                       ?> -->
                       <?php
                       $th=date('Y')+1;
                       for ($i=2019; $i < $th; $i++) {?>
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
