<div class="layout-content">
  <div class="layout-content-body">
    <div class="text-right m-b">
    </div>

    <div class="row gutter-xs">

      <div class="col-md-12">
        <div class="text-right m-b">
          <button class="btn btn-success" onclick="history.back()" type="button">Kembali</button>

        </div>
      </div>
    </div>
    
      <div class="row gutter-xs">
        <div class="card-header">

          <strong>Data Sekarang / Awal (<i>Tidak untuk diisi </i>)</strong>
        </div>
            <div class="col-xs-12 col-md-6">
              <div class="panel panel-body text-center" data-toggle="match-height">
                <h5><b>NIP Pegawai</b></h5>
                <div class="input-group input-daterange">
                  <input name="asu" readonly="true" value="<?php echo $yy->nik;?>" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="panel panel-body text-center" data-toggle="match-height">
                <h5><b>Nama Pegawai</b></h5>
                <div class="input-group input-daterange">
                  <input name="asu" readonly="true" value="<?php echo $yy->gelar_depan ." " .$yy->nama ." " .$yy->gelar_belakang;?>" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
                </div>
              </div>
            </div>
          </div>

          <div class="row gutter-xs">
                <div class="col-xs-12 col-md-6">
                  <div class="panel panel-body text-center" data-toggle="match-height">
                    <h5><b>Jabatan</b></h5>
                    <div class="input-group input-daterange">
                      <input name="asu" readonly="true" value="<?php echo $yy->jabatan;?>" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-6">
                  <div class="panel panel-body text-center" data-toggle="match-height">
                    <h5><b>Unit Kerja</b></h5>
                    <div class="input-group input-daterange">
                      <input name="asu" readonly="true" value="<?php echo $yy->unit_kerja;?>" autocomplete="off" autofocus id="bb" class="form-control aa" type="text">
                    </div>
                  </div>
                </div>
              </div>







    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
            </div>
            <strong>Di Ubah Ke (<i>Data Diubah Sini</i>)<br>
            Jika Jabatan Tidak Ada / Muncul, Silahkan meminta admin terkait untuk menginput data jabatan pada unit kerja tersebut</strong>
          </div>

          <div class="card-body">
            <form action="<?php echo site_url('su/mutasi/save')?>" method="POST">

            <div class="form-group">
              <label class="control-label">Unit Kerja</label>
              <input type="hidden" value="<?php echo $yy->nik;?>" name="nik" />
              <select name="b" required class="form-control d" id='unit_kerja'>
                <option value="">--- PILIH DATA ---</option>
                <?php
                foreach ($list as $d) {
                  ?>
                  <option value="<?php echo $d->id_unit_kerja;?>"><?php echo $d->unit_kerja;?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Jabatan</label>
              <select name="jabatan" required class="form-control f" id='jabatan'>
                <option value="">--- PILIH DATA ---</option>
              </select>
            </div>
            <div class="m-t-lg">
              <button class="btn btn-danger" data-dismiss="modal" id="btn_simpan"  type="submit">Simpan</button>
            </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya

    $("#unit_kerja").change(function(){ // Ketika user mengganti atau memilih data provinsi
      //alert('Silahkan pilih data jabatan');

      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/su/mutasi/proses"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#unit_kerja").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          //$("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#jabatan").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });





  </script>

<script>
    $(document).ready(function () {
        $(".d").select2({
            placeholder: "Pilih Data"
        });

        $(".e").select2({
            placeholder: "Pilih Data"
        });
        $(".f").select2({
            placeholder: "Pilih Data "
        });
        $(".cc").select2({
            placeholder: "Pilih Data"
        });

        $(".dd").select2({
            placeholder: "Pilih Data"
        });
    });
</script>
