<?php   $this->session->set_userdata('menu', '6'); ?>
<style>
  /* .btn-sm{
    width:20px;height:20px;
    font-size:8px;
  } */
</style>
<!-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->


<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">

    <div class="container-fluid">
      <div class="layout-content">
        <div class="layout-content-body">

          <div id="Ket2" tabindex="-1" role="dialog" class="modal fade">

          <div class="modal-dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title">Petunjuk Penggunaan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">x</button>
                </div>
                <div class="modal-body">
                  <form>

                    <div class="form-group">
                      Record / isi tabel akan <b>berwarna merah</b> jika dalam uraian kegiatan pegawai terdapat <b>kegiatan izin</b>.
                    </div>
                    <div class="form-group">
                      Jika pada uraian kegiatan bawahan terdapat kegiatan <b>Izin (Izin Pada Saat Jam Kerja / Izin Diantara Jam Kerja)</b> Silahkan memastikan terlebih dahulu apakah bawahan telah <b>menginput izin atau tidak</b> dengan cara <i>mengecek informasi keterangan izin yang ditampilkan oleh sistem</i>
                    </div>

                    <div class="form-group">
                      Jika pada baris berwarna merah namun uraian kegiatan yang dituliskan <b>bukan izin keluar kantor / izin diantara jam kerja</b>, atasan dapat mengabaikan warna yang diberikan oleh sistem
                    </div>

<!--

                    <div class="modal-footer">
                      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>

                    </div> -->

                  </form>
                </div>
              </div>
            </div>
          </div>

          </div>

          <div id="Ket1" tabindex="-1" role="dialog" class="modal fade">

          <div class="modal-dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h6 class="modal-title">Petunjuk Penggunaan</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">x</button>
                </div>
                <div class="modal-body">
                  <form>

                    <div class="form-group">
                      Informasi tambahan yang diberikan keatasan apakah kegiatan yang diinputkan bawahan termasuk <b>hari kerja atau diluar hari kerja</b>.
                    </div>

                    <div class="form-group">
                      Informasi tambahan yang diberikan keatasan <b>apakah pegawai(bawahan) telah menginput izin atau tidak menginput izin</b> pada sistem, <b>total waktu izin</b> yang diinputkan.
                    </div>

                    <div class="form-group">
                      Informasi <b>selisih hari</b> antara <i>tanggal laporan</i> dengan <i>tanggal pengiriman laporan</i>, <b> rekomendasi penilai ketepatan waktu</b> untuk laporan bawahan.
                    </div>

                    <!-- <div class="modal-footer">
                      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>

                    </div> -->

                  </form>
                </div>
              </div>
            </div>
          </div>

          </div>

          <div class="layout-content">
            <div class="layout-content-body">
              <div class="card">
                <div class="text-right m-b" style="padding:10px">

                  <button class="btn btn-info item_proses" type="button" onclick="proses()">Proses</button> &nbsp;&nbsp;
                  <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>

                  <input class="acuan_kirim" value="<?php echo $this->uri->segment(4);?>" type="hidden"/>
                </div>
              </div>


              <div class="col-md-12">

                  <form class="form form-horizontal">
                    <div class="card" style="padding:10px">
                      <div class="form-group">

                        <div align="center" class="col-sm-12">
                          <h5><b>INFORMASI DARI SISTEM</b></h5>
                          <hr>

                        </div>
                      </div>
                      <div class="row">

                        <div class="col-sm-4">
                        <label class="col-sm-4 control-label" for="form-control">Status Laporan</label>
                        <input type="text" readonly class="form-control" value="<?php
                        if ($detil->ket == 0)
                        {
                          echo "Termasuk hari kerja";
                        }
                        else {
                          echo "Bukan hari kerja";
                        }

                        ?>"/>
                        </div>


                        <div class="col-sm-4">
                        <label class="col-sm-4 control-label" for="form-control-1">Keterangan Izin</label>
                        <input type="text" readonly class="form-control" value="<?php
                        if ($cek == 0)
                        {
                          echo "Tidak input izin";
                        }
                        else {
                          echo "Sudah input izin".", Total Waktu : ".$cek_detil->total_izin ;
                        }

                        ?>"/>
                        </div>





                        <div class="col-sm-4">
                        <label class="col-sm-4 control-label" for="form-control-1">Ketepatan Waktu</label>
                          <input readonly="true" type="text" class="form-control" value="<?php
                          $harii  = date('D', strtotime($detil->tanggal));
                          $tgl1 = date_create($detil->tanggal);
                          $tgl2 = date_create($detil->tanggal_kirim);
                          $info = date_diff($tgl2,$tgl1);
                          $days = $info->format("%a");

                          echo "Selisih " . $days . " hari dari tanggal laporan";

                          $hey = $detil_peg->id_unit_kerja;

                          $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$hey'")->row();

                          if($query->kode == 0){
                            if($harii <> 'Fri')
                            {
                              if ($days > 1)
                              {
                                echo " => (TERLAMBAT)";
                              }
                              else {
                                echo " => (TEPAT WAKTU)";
                              }
                            }
                            else {
                              if ($days > 3)
                              {
                                echo " => (TERLAMBAT)";
                              }
                              else {
                                echo " => (TEPAT WAKTU)";
                              }
                            }

                          }
                          else if($query->kode == 1 or $query->kode == 2 or $query->kode == 5) {
                            if($harii <> 'Sat')
                            {
                              if ($days > 1)
                              {
                                echo " => (TERLAMBAT)";
                              }
                              else {
                                echo " => (TEPAT WAKTU)";
                              }
                            }
                            else {
                              if ($days > 3)
                              {
                                echo " => (TERLAMBAT)";
                              }
                              else {
                                echo " => (TEPAT WAKTU)";
                              }
                            }

                          }
                          else {
                            if ($days > 1)
                            {
                              echo " => (TERLAMBAT)";
                            }
                            else {
                              echo " => (TEPAT WAKTU)";
                            }
                          }



                          ?>
                          " />
                        </div>



                      </div>
                      <div style="padding:5px;"align="right">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#Ket1" type="button"><span>Petunjuk</button>
                      </div>
                    </div>

                    <div align="center" class="card">
                      <h5><b>PUTUSAN / PENILAIAN ATASAN</b></h5>
                      <hr>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="form-control-1">Putusan</label>
                        <div class="col-sm-6">
                        <select id="form-control-21" class="custom-select a">
                            <option value="2">Disetujui</option>
                            <option value="3">Revisi</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="form-control-1">Catatan Revisi</label>
                        <div class="col-sm-6">
                          <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
                          <textarea class="form-control b" rows="5" ><?php echo $detil->note;?></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="form-control-1">Ketepatan Waktu</label>
                        <div class="col-sm-6">
                        <select id="form-control-21" class="custom-select tahun c">
                          <?php
                          foreach ($k as $k) {
                            ?>
                            <option value="<?php echo $k->nilai;?>"><?php echo $k->ketepatan;?></option>
                            <?php
                          }
                          ?>

                        </select>
                        </div>



                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="form-control-1">Kesesuaian Laporan</label>
                        <div class="col-sm-6">
                        <select id="form-control-21" class="custom-select tahun d">
                          <?php
                          foreach ($t as $t) {
                            ?>
                            <option value="<?php echo $t->nilai;?>"><?php echo $t->kesesuaian;?></option>
                            <?php
                          }
                          ?>


                        </select>
                        </div>
                      </div>

                    </div>







          <!--
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="form-control-1"></label>
                      <div class="col-sm-10">
                        <button class="btn btn-info" id="btn_cari">Proses</button>

                      </div>
                    -->

                </div>






                  <div class="card">
                    <div class="card-header">
                      <div class="card-actions">



                      </div>
                      <strong>Daftar Detil Laporan Harian per
                        <?php
                        $tgl = date('d-m-Y', strtotime($detil->tanggal));
                        $hr  = date('D', strtotime($detil->tanggal));
                        if ($hr == 'Sun')
                        {
                          $hrr = 'Minggu';
                        }
                        else if ($hr == 'Mon')
                        {
                          $hrr = 'Senin';
                        }
                        else if ($hr == 'Tue')
                        {
                          $hrr = 'Selasa';
                        }
                        else if ($hr == 'Wed')
                        {
                          $hrr = 'Rabu';
                        }
                        else if ($hr == 'Thu')
                        {
                          $hrr = 'Kamis';
                        }
                        else if ($hr == 'Fri')
                        {
                          $hrr = 'Jumat';
                        }
                        else if ($hr == 'Sat')
                        {
                          $hrr = 'Sabtu';
                        }




                       echo $hrr . ', ' .$tgl . ' ( ' .$detil_peg->gelar_depan. $detil_peg->nama . $detil_peg->gelar_belakang . ' )';

                       ?>
                       <div class="" align="right">
                             <button class="btn btn-primary" data-toggle="modal" data-target="#Ket2" type="button"><span class="icon icon-twitch"> Petunjuk</button>
                       </div>


                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="mydata">

                      <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
                        <thead>
                          <tr style="background-color: #4CAF50;color: white;">
                            <th>No</th>
                            <th>Uraian Tugas</th>
                            <th>Jam</th>
                            <th>Output</th>

                          </tr>
                        </thead>

                        <tbody id="show_datal">
                          <?php
                          $no=1;
                          foreach ($tes as $t) {
                            ?>
                            <tr
                            <?php
                            if(preg_match("/izin keluar kantor/i", $t->uraian_tugas)) {
                              ?>
                              style="background-color: red;color: white;"

                              <?php

                            }
                            else if(preg_match("/Istirahat/i", $t->uraian_tugas)) {
                              ?>
                              style="background-color: yellow;color: black;"

                              <?php

                            }
                            else if(preg_match("/Ishoma/i", $t->uraian_tugas)) {
                              ?>
                              style="background-color: yellow;color: black;"

                              <?php

                            }
                            else
                            {

                            }

                            ?>

                            >
                            <td><?php echo $no;?></td>
                            <td><?php echo $t->uraian_tugas;?></td>
                            <td><?php echo $t->jam;?></td>
                            <td><?php echo $t->output;?></td>

                            </tr>

                            <?php

                            /*if(preg_match("/izin/i", $t->uraian_tugas)) {
                              echo "Ya";
                            }
                            else {
                              echo "no";
                            }
                            */

                            //echo $t->uraian_tugas.'<br>';
                            $no++;

                          }
                          ?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url() ?>assets/js/fungsi.js" >
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
function proses(){
  var srv='<?php echo base_url() ?>';

 Swal.fire({
    title: 'konfirmasi',
    text: "Apakah Anda Yakin untuk memproses Laporan ini?",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
  }).then((result ) => {
    if (result.value) {
      var a=$('.a').val();
      var b=$('.b').val();
      var c=$('.c').val();
      var d=$('.d').val();

      var e=$('.acuan_kirim').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url('peg/acc_lap/verif')?>",
          dataType : "JSON",
          data : {a:a , b:b, c:c, d:d, e:e},
          success: function(data){
            Swal.fire({
              type: 'success',
              title: 'Success',
              text: result.messages
            });
              window.location='../../../peg/cek_lap';
          }
      });
      return false;
      }
 });


       }
</script>
