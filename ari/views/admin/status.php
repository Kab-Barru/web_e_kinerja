<div class="layout-content">
  <div class="layout-content-body">

    <div class="col-md-8">

    <form class="form form-horizontal" method="POST" action="<?php echo site_url('admin/status/cek')?>">
          <div class="form-group">
            <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
            <div class="col-sm-9">
            <select id="form-control-21" name="a" class="custom-select tahun">
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
              <input type="hidden" class="unit_kerja" value="<?php echo $this->session->userdata('id_unit_kerja');?>"/>
              <select id="form-control-21" name="b" class="custom-select bulan">
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
            <label class="col-sm-3 control-label" for="form-control-1"></label>
            <div class="col-sm-9">
              <button type="submit" class="btn btn-info">Cek Data</button>
            </div>
          </div>
    </div>

    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar Pegawai</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">
            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tot Kehadiran</th>
                  <th>Total Laporan Termasuk Hari Kerja</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody id="show_data">
                <?php
                $no =1;
                foreach($yy as $acuan){
            ?>
            <tr class="odd gradeX">

                <td><?php echo $no;?></td>
                <td><?php echo $acuan->nik;?></td>
                <td><?php echo $acuan->gelar_depan." ". $acuan->nama ." " .$acuan->gelar_belakang ;?></td>
                <?php
                  $iddd = $this->session->userdata('id_unit_kerja');
                  $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
                  if ($query->kode == 0) // untuk 5 hari kerja
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>
                    <?php
                  }
                  else if ($query->kode == 1) //untuk sd
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_sd` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>
                    <?php

                  }
                  else if ($query->kode == 2) // smp
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_sd` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 3) // pus 6
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_pus` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 4) //pus shift
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_pus` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 5) //tk
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_sd` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 6) //rs_ok
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_sd` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 7) //rs_shift
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_rs` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else if ($query->kode == 8) //rs_6
                  {
                    ?>
                    <td>
                      <?php
                      $j = $this->db->query("SELECT COUNT(*) as tot FROM `pro_tpp_sd` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `hari_kerja` = 1   ");
                      $jj = $j->row();
                      echo $jj->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      $k = $this->db->query("SELECT COUNT(*) as tot FROM `pro_lap` WHERE
                            `nik` = '$acuan->nik' AND `tanggal` LIKE '%$a-$b%' AND `status` = '2' and ket ='0'   ");
                      $kk = $k->row();
                      echo $kk->tot;
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($kk->tot > $jj->tot)
                      {
                        echo "<span class='label arrow-right arrow-success'>Lebih</span>";
                      }
                      else
                      {
                        echo "<span class='label arrow-right arrow-info'>Cukup</span>";
                      }
                      ?>
                    </td>

                    <?php

                  }
                  else
                  {
                    ?>

                    <?php

                  }
                ?>



            </tr>


      <?php
      $no++;

    }?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
