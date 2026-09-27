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
                  <form target="_blank" action="<?php echo site_url('admin/cetak_all/view');?>" method="post" class="form form-horizontal">
                  <?php
                }
                else
                {
                  ?>
                  <form target="_blank" action="<?php echo site_url('admin/cetak_all/view');?>" method="post" class="form form-horizontal">
                  <?php
                }
              ?>

                <!--<form target="_blank" action="<?php echo site_url('admin/cetak/view');?>" method="post" class="form form-horizontal">-->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
                    <div class="col-sm-9">
                    <select name="tahun" id="form-control-21" class="custom-select tahun">
                      <?php
                      foreach ($tahun as $tahun) {
                        ?>
                        <option value="<?php echo $tahun->tahun;?>"><?php echo $tahun->tahun;?></option>
                        <?php
                      }
                       ?>
                    </select>
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Bulan</label>
                    <div class="col-sm-9">

                      <select name="bulan" id="form-control-21" class="custom-select bulan">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Tanggal Laporan</label>
                      <div class="col-sm-9">

                        <input class="form-control a" placeholder="Tanggal Cetak" autocomplete="off" name="tgl" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-today-highlight="true">
                      </div>
                    </div>


                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Jenis Laporan</label>
                      <div class="col-sm-9">

                        <select name="jenis" id="form-control-21" class="custom-select bulan">
                          <option value="01">Cekapitulasi TPP</option>
                          <option value="02">Tanda Terima TPP</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Yang Mengetahui</label>
                        <div class="col-sm-9">
                          <select required="required" name="ttd1" class="form-control d">
                            <option value="">--- PILIH DATA ---</option>
                            <?php
                            $hasil=$this->db->query("select * from ref_jabatan WHERE `jabatan` LIKE '%kepala bad%' or `jabatan` LIKE '%kepala din%' or `jabatan` LIKE '%sekr%' or `jabatan` LIKE '%seker%' or `jabatan` LIKE '%camat%' or `jabatan` LIKE '%direktur%'")->result();
                            foreach ($hasil as $ha) {
                              $query=$this->db->query("select * from ref_pegawai where id_jabatan = $ha->id_jabatan")->result();

                              foreach ($query as $qu) {
                                ?>
                                <option value="<?php echo $qu->nik;?>"><?php echo $qu->nik .' ('. $qu->nama.')'?></option>
                                <?php
                              }
                              }
                              ?>




                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                          <label class="col-sm-3 control-label" for="form-control-1">Pengelola TPP</label>
                          <div class="col-sm-9">
                            <select required="required" name="ttd2" class="form-control e">
                              <option value="">--- PILIH DATA ---</option>
                              <?php
                              foreach ($peg as $yu) {
                                  ?>
                                  <option value="<?php echo $yu->nik;?>"><?php echo $yu->nik .' ('. $yu->nama.')'?></option>
                                  <?php
                                }
                                ?>
                            </select>
                          </div>
                        </div>



                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1"></label>
                    <div class="col-sm-9">
                      <button class="btn btn-info" href="oi.php" id="item_print">Cetak Laporan</button>
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
