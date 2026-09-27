<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">

            <div class="col-md-8">


                <form  action="<?php echo base_url('admin/cetak/data_insentif')?>" method="post" class="form form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
                    <div class="col-sm-9">
                    <select name="tahun" id="form-control-21" class="custom-select tahun">


                        <?php
                            $tahun=date('Y');
                        for ($i=$tahun; $i >=2022; $i--) {?>
                           <option value="<?php echo $i;?>"><?php echo $i;?></option>
                       <?php } ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Triwulan</label>
                      <div class="col-sm-9">

                        <select name="triwulan" id="form-control-21" class="custom-select bulan">
                          <option value="I">I</option>
                          <option value="II">II</option>
                          <option value="III">III</option>
                          <option value="IV">IV</option>
                        </select>
                      </div>
                    </div>


                <!-- <div class="form-group">
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
                  </div> -->

                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Tanggal Laporan</label>
                      <div class="col-sm-9">

                        <input class="form-control a" placeholder="Tanggal Cetak" autocomplete="off" name="tanggal" type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-today-highlight="true">
                      </div>
                    </div>


                  <div class="form-group">
                      <label class="col-sm-3 control-label" for="form-control-1">Jenis</label>
                      <div class="col-sm-9">

                        <select name="jenis" id="form-control-21" class="custom-select bulan">
                          <option value="1">Pajak</option>
                          <option value="2">Retiribusi</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Yang Mengetahui</label>
                        <div class="col-sm-9">
                          <select required="required" name="ttd1" class="form-control d">
                            <option value="">--- PILIH DATA ---</option>
                            <?php
                            $hasil=$this->db->query("select * from ref_jabatan WHERE `jabatan` LIKE '%kepala bad%' or `jabatan` LIKE '%kepala tata usaha%' or `jabatan` LIKE '%kepala din%' or `jabatan` LIKE '%sekr%' or `jabatan` LIKE '%seker%' or `jabatan` LIKE '%camat%' or `jabatan` LIKE '%direktur%' or `jabatan` LIKE '%kepala sekolah%' or `jabatan` LIKE '%asisten administrasi umum%' or `jabatan` LIKE '%Kepala Pelaksana%' or `jabatan` LIKE '%Kepala Satuan Polisi%' or `jabatan` LIKE '%Inspektur%' or `jabatan` LIKE '%Asisten administrasi perekonomian dan pembangunan%' or `jabatan` LIKE '%Dokter Madya%' or `jabatan` LIKE '%Penyuluh kesmas Muda/ Kepala Puskemas%' or `jabatan` LIKE '%Staf Ahli Bidang Pembangunan dan Ekonomi%'  or `jabatan` LIKE '%Kepala Puskesmas%' or `jabatan` LIKE '%Kepala UPTD%' or `jabatan` LIKE '%Kepala Bagian Umum%' or `jabatan` LIKE '%Asisten administrasi pemerintahan dan kesejahteraan rakyat%'  ")->result();
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
                          <label class="col-sm-3 control-label" for="form-control-1">Pembuat Daftar</label>
                          <div class="col-sm-9">
                            <select required="required" name="ttd2" class="form-control e">
                              <option value="">--- PILIH DATA ---</option>
                              <?php
                              if ($query->kode == 3 or $query->kode == 4)
                              {
                                foreach ($peg_12 as $yu) {
                                    ?>
                                    <option value="<?php echo $yu->nik;?>"><?php echo $yu->nik .' ('. $yu->nama.')'?></option>
                                    <?php
                                  }

                              }
                              else {
                                foreach ($peg as $yu) {
                                    ?>
                                    <option value="<?php echo $yu->nik;?>"><?php echo $yu->nik .' ('. $yu->nama.')'?></option>
                                    <?php
                                  }
                              }

                                ?>
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
          </form>
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
