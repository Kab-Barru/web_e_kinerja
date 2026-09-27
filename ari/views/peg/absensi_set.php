<div class="layout-content">
  <div class="layout-content-body">

    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Silahkan Pilih Tahun dan Bulan Terlebih Dahulu</strong>
          </div>
          <div class="card-body">
            <div class="col-md-8">
                <form class="form form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
                    <div class="col-sm-9">
                    <select id="form-control-21" class="custom-select tahun">
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
                      <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
                      <select id="form-control-21" class="custom-select bulan">
                        <option value="01">Januari</option>
                        <option value="02" selected>Februari</option>
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

                      <?php
                        $iddd = $this->session->userdata('id_unit_kerja');
                        $query = $this->db->query("select * from ref_unit_kerja where id_unit_kerja='$iddd'")->row();
                        if ($query->kode == 0)
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari">Tampilan  Absen</button>
                          <?php
                        }
                        else if ($query->kode == 1)
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari_sd">Tampilan Absen SD / SMP</button>
                          <?php

                        }
                        else if ($query->kode == 2)
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari_sd">Tampilan Absen SD / SMP</button>
                          <?php

                        }
                        else if ($query->kode == 3) //puskesmas 6
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari_pus_6">Tampilan Puskesmas (6 Hari Kerja)</button>
                          <?php

                        }
                        else if ($query->kode == 4) //pus shift
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari_pus_6">Tampilan Puskesmas (Shift)</button>
                          <?php

                        }
                        else if ($query->kode == 5)
                        {
                          ?>
                          <button class="btn btn-info" id="btn_cari_sd">Tampilan Absen SD / SMP</button>
                          <?php
                            }


                          else if ($query->kode == 6)
                          {
                            ?>
                            <button class="btn btn-info" id="btn_cari_sd">Tampilkan RS (Shift OK)</button>
                            <?php
                              }

                            else if ($query->kode == 7)
                            {
                              ?>
                              <button class="btn btn-info" id="btn_cari_rs_shift">Tampilkan RS (Shift)</button>
                              <?php
                                }

                              else if ($query->kode == 8)
                              {
                                ?>
                                <button class="btn btn-info" id="btn_cari_sd">Tampilkan RS (6 Hari Kerja)</button>
                                <?php
                                  }

                                else
                                {


                          ?>
                          <button class="btn btn-info" id="btn_cari">Tampilan Absen</button>
                          <?php
                        }
                      ?>


                      <!--
                      <button class="btn btn-info" id="btn_cari">Tampilan Absen</button>

                      <button class="btn btn-info" id="btn_cari_sd">Tampilan Absen SD / SMP</button>
                    -->

                    </div>

              </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    </div>


<div class="row gutter-xs">
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">
              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>
            </div>
            <strong>Daftar Absensi Pegawai</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="mydata">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Apel Msk</th>
                  <th>A. Plg</th>
                  <th>Upacara Senin</th>
                  <th>U. Besar</th>
                  <th>Ket</th>
                  <th>Pagi</th>
                  <th>Siang</th>
                  <th>Pulang</th>
                  <th>Total Izin</th>
                </tr>
              </thead>

              <tbody id="show_data">


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>






</div>










<!-- MODAL ADD -->
<div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Tambah Absensi Pegawai</h4>
      </div>
      <div class="modal-body">
        <form id="demo-inputmask" class="form-horizontal">
          <div class="form-group">
            <label class="control-label">Tanggal</label>
            <input class="form-control a" name="a" autocomplete="off" type="text" data-provide="datepicker" data-date-today-btn="linked">
          </div>

          <div class="form-group">
            <label class="control-label">Status Kehadiran</label>
            <select name="b" id="demo-select2-1" class="form-control b">
              <option value="1">Hadir </option>
              <option value="0">Tidak Hadir / Cuti </option>
              <option value="2">Tugas Luar</option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Apel / Upacara</label>
            <select name="c" id="demo-select2-1" class="form-control c">
              <option value="1">Apel Pagi </option>
              <option value="2">Upacara Hari Senin </option>
              <option value="3">Upacara Hari Besar </option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Apel Pulang</label>
            <select name="d" id="demo-select2-1" class="form-control d">
              <option value="1">Ya</option>
              <option value="0">Tidak</option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Jam Masuk Pagi</label>
            <input id="" class="form-control e" name="e" type="time" placeholder="jam:menit:detik">
            <span class="help-block">Silahkan input dengan format jam sebagai berikut (jam:menit).</span>
          </div>

          <div class="form-group" data-toggle="match-height">
            <label class="control-label">Jam Masuk Siang</label>
            <input id="form-control" class="form-control f" name="f" type="time" placeholder="jam:menit:detik">
          </div>

          <div class="form-group">
            <label class="control-label">Jam Pulang</label>
            <input id="form-control-2"  class="form-control g" name="g" type="time" placeholder="jam:menit:detik">
          </div>

          <div class="form-group">
            <label class="control-label">Total Jam Izin</label>
            <input name="h" autocomplete="off" autofocus id="cc" placeholder="jam:menit" class="form-control h" type="time">
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan">Simpan</button>
          </div>

        </form>
      </div>
    </div>

</div>

</div>
<!--END MODAL ADD-->



<!-- MODAL EDIT -->
<div id="ModalaEdit" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Atur TPP Maksimal Jabatan</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="control-label">Jabatan</label>
            <input name="bb" autocomplete="off" readonly="readonly" autofocus id="bb" class="form-control c" type="text">
          </div>

          <div class="form-group">
            <label class="control-label">TPP Maksimal</label>
            <input name="cc" autocomplete="off" autofocus id="cc" class="form-control c" type="number">
          </div>

          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <input name="aa" autocomplete="off" autofocus id="aa" class="form-control f" type="hidden">
            <button class="btn btn-info" id="btn_update">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</div>

<!--END MODAL EDIT-->


<!--MODAL HAPUS-->

<div id="ModalHapus" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <span class="text-danger icon icon-times-circle icon-5x"></span>
              <h3 class="text-danger">Hapus Data</h3>
              <p>Apakah Anda yakin mau memhapus data ini ?
              </p>
                <input type="hidden" name="kode" id="textkode" value="">
              <div class="m-t-lg">
                <button class="btn btn-danger" data-dismiss="modal" id="btn_hapus"  type="button">Hapus</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

<!--END MODAL HAPUS-->

</div>
</div>



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>


<script type="text/javascript">

	$(document).ready(function(){
    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#yuz').dataTable();
    $('#mydata');
    //$('#mydata').DataTable({iDisplayLength: 100, responsive: true});


		//fungsi tampil data
		function tampil_data(){
      var aa=$('.tahun').val();
      var bb=$('.bulan').val();
      var cc=$('.nik').val();
      $no=1;
		    $.ajax({
          url   : '<?php echo base_url()?>/peg/absensi/load_absen_detil/',
          async : false,
          dataType : "JSON",
          data : {a:aa , b:bb, c:cc},
          success: function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){

		                html += '<tr>'+
                    '<td>'+$no+'</td>'+
                          '<td>'
                          +data[i].tanggal+'</td>'+
		                  		'<td>'+data[i].apel_masuk+'</td>'+
                          '<td>'+data[i].apel_pulang+'</td>'+
                          '<td>'+data[i].upacara_hari_senin+'</td>'+
                          '<td>'+data[i].upacara_hari_besar+'</td>'+
                          '<td>'+data[i].ket_status+'</td>'+
                          '<td>'+data[i].jam_masuk_1+'</td>'+
                          '<td>'+data[i].jam_masuk_2+'</td>'+
                          '<td>'+data[i].jam_pulang+'</td>'+
                          '<td>'+data[i].jam_izin+'</td>'+
		                        '</tr>';

		            $no++;}
		            $('#show_data').html(html);
		        }

		    });
		}



		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('admin/set_tpp/acuan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id_jabatan,jabatan,tpp_max){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aa"]').val(data.id_jabatan);
                         $('[name="bb"]').val(data.jabatan);
                         $('[name="cc"]').val(data.tpp_max);
            		});
                }
            });
            return false;
        });


//rs pus 6
        $('#btn_cari_pus_6').on('click',function(){
                var aa=$('.tahun').val();
                var bb=$('.bulan').val();
                var cc=$('.nik').val();

                $.ajax({
                    type : "GET",
                    url   : '<?php echo base_url()?>/peg/absensi/load_absen_detil_pus_6/',
                    async : false,
                    dataType : "JSON",
                    data : {a:aa , b:bb, c:cc},
                    success: function(data){
                      var html = '';
                      var i;
                      var $no=1;
                      for(i=0; i<data.length; i++){

                        html += '<tr>'+
                        '<td>'+$no+'</td>'+
                              '<td>'
                              +data[i].tanggal+'</td>'+
                              '<td>'+data[i].apel_masuk+'</td>'+
                              '<td>'+data[i].apel_pulang+'</td>'+
                              '<td>'+data[i].upacara_hari_senin+'</td>'+
                              '<td>'+data[i].upacara_hari_besar+'</td>'+
                              '<td>'+data[i].ket_status+'</td>'+
                              '<td>'+data[i].jam_masuk_1+'</td>'+
                              '<td>'+data[i].jam_masuk_2+'</td>'+
                              '<td>'+data[i].jam_pulang+'</td>'+
                              '<td>'+data[i].jam_izin+'</td>'+
                                '</tr>';

                      $no++;}
                      $('#show_data').html(html);
                    }
                });
                return false;
            });


//rs shift
$('#btn_cari_rs_shift').on('click',function(){
        var aa=$('.tahun').val();
        var bb=$('.bulan').val();
        var cc=$('.nik').val();

        $.ajax({
            type : "GET",
            url   : '<?php echo base_url()?>/peg/absensi/load_absen_detil_rs_shift/',
            async : false,
            dataType : "JSON",
            data : {a:aa , b:bb, c:cc},
            success: function(data){
              var html = '';
              var i;
              var $no=1;
              for(i=0; i<data.length; i++){

                html += '<tr>'+
                '<td>'+$no+'</td>'+
                      '<td>'
                      +data[i].tanggal+'</td>'+
                      '<td>'+data[i].apel_masuk+'</td>'+
                      '<td>'+data[i].apel_pulang+'</td>'+
                      '<td>'+data[i].upacara_hari_senin+'</td>'+
                      '<td>'+data[i].upacara_hari_besar+'</td>'+
                      '<td>'+data[i].ket_status+'</td>'+
                      '<td>'+data[i].jam_masuk_1+'</td>'+
                      '<td>'+data[i].jam_masuk_2+'</td>'+
                      '<td>'+data[i].jam_pulang+'</td>'+
                      '<td>'+data[i].jam_izin+'</td>'+
                        '</tr>';

              $no++;}
              $('#show_data').html(html);
            }
        });
        return false;
    });


    //btn_cari
		$('#btn_cari').on('click',function(){
            var aa=$('.tahun').val();
            var bb=$('.bulan').val();
            var cc=$('.nik').val();


            $.ajax({
                type : "GET",
                url   : '<?php echo base_url()?>/peg/absensi/load_absen_detil/',
                async : false,
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc},
                success: function(data){


                  var html = '';
                  var i;
                  var $no=1;
                  for(i=0; i<data.length; i++){

                    html += '<tr>'+
                    '<td>'+$no+'</td>'+
                          '<td>'
                          +data[i].tanggal+'</td>'+
		                  		'<td>'+data[i].apel_masuk+'</td>'+
                          '<td>'+data[i].apel_pulang+'</td>'+
                          '<td>'+data[i].upacara_hari_senin+'</td>'+
                          '<td>'+data[i].upacara_hari_besar+'</td>'+
                          '<td>'+data[i].ket_status+'</td>'+
                          '<td>'+data[i].jam_masuk_1+'</td>'+
                          '<td>'+data[i].jam_masuk_2+'</td>'+
                          '<td>'+data[i].jam_pulang+'</td>'+
                          '<td>'+data[i].jam_izin+'</td>'+
		                        '</tr>';
                  $no++;
                }



                  $('#show_data').html(html);

                }
            });
            return false;
        });


        //btn_cari sd dan smp
      		$('#btn_cari_sd').on('click',function(){
                var aa=$('.tahun').val();
                var bb=$('.bulan').val();
                var cc=$('.nik').val();

                $.ajax({
                    type : "GET",
                    url   : '<?php echo base_url()?>/peg/absensi/load_absen_detil_sd/',
                    async : false,
                    dataType : "JSON",
                    data : {a:aa , b:bb, c:cc},
                    success: function(data){
                      var html = '';
                      var i;
                      var $no=1;
                      for(i=0; i<data.length; i++){

                        html += '<tr>'+
                        '<td>'+$no+'</td>'+
                              '<td>'
                              +data[i].tanggal+'</td>'+
    		                  		'<td>'+data[i].apel_masuk+'</td>'+
                              '<td>'+data[i].apel_pulang+'</td>'+
                              '<td>'+data[i].upacara_hari_senin+'</td>'+
                              '<td>'+data[i].upacara_hari_besar+'</td>'+
                              '<td>'+data[i].ket_status+'</td>'+
                              '<td>'+data[i].jam_masuk_1+'</td>'+
                              '<td>'+data[i].jam_masuk_2+'</td>'+
                              '<td>'+data[i].jam_pulang+'</td>'+
                              '<td>'+data[i].jam_izin+'</td>'+
    		                        '</tr>';

                      $no++;}
                      $('#show_data').html(html);
                    }
                });
                return false;
            });

        //Simpan
        $('#btn_simpan').on('click',function(){
                var a=$('.a').val();
                var b=$('.b').val();
                var c=$('.c').val();
                var d=$('.d').val();
                var e=$('.e').val();
                var f=$('.f').val();
                var g=$('.g').val();
                var h=$('.h').val();
                var nik=$('.nik').val();


                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/absensi/simpan')?>",
                    dataType : "JSON",
                    data : {a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,nik:nik},
                    success: function(data){
                        $('[name="a"]').val("");
                        $('[name="b"]').val("");
                        $('[name="c"]').val("");
                        $('[name="d"]').val("");
                        $('[name="e"]').val("");
                        $('[name="f"]').val("");
                        $('[name="g"]').val("");
                        $('[name="h"]').val("");
                        $('#ModalaAdd').modal('hide');
                        tampil_data();
                    }
                });
                return false;
            });




        //Update
		$('#btn_update').on('click',function(){
            var aa=$('#aa').val();
            var bb=$('#bb').val();
            var cc=$('#cc').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/set_tpp/update')?>",
                dataType : "JSON",
                data : {a:aa , b:bb, c:cc},
                success: function(data){
                    $('[name="aa"]').val("");
                    $('[name="bb"]').val("");
                    $('[name="cc"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
                var id=$(this).attr('data');
                $('#ModalHapus').modal('show');
                $('[name="kode"]').val(id);
            });



        //Hapus
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/absensi/hapus')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data();
                    }
                });
                return false;
            });

	});

</script>
