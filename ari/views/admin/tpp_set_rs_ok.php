<div class="layout-content">
  <div class="layout-content-body">
    <div class="row">
                <div class="col-md-8">

                    <form class="form form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Tahun</label>
                        <div class="col-sm-9">
                          <input type="hidden" class="nik" value="<?php echo $this->uri->segment(4);?>"/>
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

                    <!--  <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Bulan</label>
                        <div class="col-sm-9">

                          <select id="form-control-21" class="custom-select bulan">
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

                    -->

                      <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1"></label>
                        <div class="col-sm-9">
                          <button class="btn btn-info" id="btn_cari">Cari Data (RS OK)</button>

                        </div>

                  </div>
                </div>

              <div class="col-md-12">
                <div class="text-right m-b">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalaAdd" type="button">Hitung atau Perbaharui TPP</button>
                </div>
              </div>

    <div class="text-right m-b">

    </div>
    <div class="row gutter-xs">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <div class="card-actions">

              <button type="button" class="card-action card-toggler" title="Collapse"></button>
              <button type="button" class="card-action card-reload" title="Reload"></button>

            </div>
            <strong>Daftar Jumlah TPP yang diterima per-Bulan ( <?php echo $pegawai->nik;?> / <?php echo $pegawai->gelar_depan . $pegawai->nama . $pegawai->gelar_belakang;?> )</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="yuz">

            <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Bulan</th>
                  <th>Total TPP Kedisiplinan</th>
                  <th>Total TPP Kinerja</th>
                  <th>Aksi</th>
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
</div>


<!-- MODAL ADD -->
<div id="ModalaAdd" tabindex="-1" role="dialog" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Hitung TPP Pegawai (<?php echo $this->uri->segment(4);?>)</h4>
      </div>
      <div class="modal-body">
        <form id="demo-inputmask" class="form-horizontal">

          <div class="form-group">
            <label class="control-label">Tahun</label>
            <input name="nik" type="hidden" class="nik" value="<?php echo $this->uri->segment(4)?>" />
            <select id="form-control-23" name="tahunn" class="custom-select tahunn">
              <?php
              foreach ($tahunn as $tahun) {
                ?>
                <option value="<?php echo $tahun->tahun;?>"><?php echo $tahun->tahun;?></option>
                <?php
              }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Bulan</label>
            <select id="form-control-21" name="bulann" class="custom-select bulann">
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
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan">Proses</button>
          </div>

        </form>
      </div>
    </div>

</div>

</div>
<!--END MODAL ADD-->



<!-- MODAL EDIT -->
<div id="ModalaEdit" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <div class="text-center">
              <!--<span class="icon icon-laptop icon-5x m-y-lg"></span>-->
              <h4 class="modal-title">Rincian Perhitungan TPP Perbulan</h4>
              <small>
                Silahkan pilih tab bar dibawah ini untuk detil
              </small>
            </div>
          </div>
          <div class="modal-tabs">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#display" data-toggle="tab">Data Dasar</a></li>
              <li><a href="#notifications" data-toggle="tab">Detil Kedisiplinan</a></li>
              <li><a href="#apps" data-toggle="tab">Detil Pembayaran TPP</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="display">
                <form action="http://demo.madebytilde.com/">
                    <div class="form-group">
                      <label class="control-label">Nik</label>
                      <input name="cc" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tahun</label>
                      <input name="aa" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Bulan</label>
                      <input name="bb" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                    </div>

                </form>
                <p>
                  <em>
                    <small>Data diatas merupakan data dasar dari pegawai.</small>
                  </em>
                </p>
              </div>


              <div class="tab-pane fade" id="notifications">
                <div class="form-group">
                  <label class="control-label">Total Absen Masuk</label>
                  <input name="tot_apel_masuk" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>

                <div class="form-group">
                  <label class="control-label">Total Absen Pulang</label>
                  <input name="tot_apel_pulang" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>

                <div class="form-group">
                  <label class="control-label">Total Upacara Hari Senin</label>
                  <input name="tot_upacara_hari_senin" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>

                <div class="form-group">
                  <label class="control-label">Total Masuk Kerja</label>
                  <input name="tot_masuk_kerja" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>

                <div class="form-group">
                  <label class="control-label">Total Upacara Hari Besar / Hari Kesadaran</label>
                  <input name="tot_upacara_hari_besar" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>

                <div class="form-group">
                  <label class="control-label">Total Jam Izin</label>
                  <input name="tot_izin" readonly="true" autocomplete="off" autofocus id="g" class="form-control cc" type="text">
                </div>


                <p>
                  <em>
                    <small>Data diatas merupakan data detil untuk indikator kedisiplinan.</small>
                  </em>
                </p>
              </div>
              <div class="tab-pane fade" id="apps">
                <div class="form-group">

                      <div class="col-xs-6">
                        Maksimal Perhari Apel Pagi
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Apel Pagi
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_apel_masuk" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_apel_masuk" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-6">
                        Maksimal Perhari Apel Pulang
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Apel Pulang
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_apel_pulang" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_apel_pulang" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-6">
                        Maksimal Perhari Hari Besar / Kesadaran
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Hari Besar / Kesadaran
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_hari_besar" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_hari_besar" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-6">
                        Maksimal Perhari Upacara Hari Senin
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Upacara Hari Senin
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_hari_senin" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_hari_senin" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-6">
                        Maksimal Perhari Hari Kerja
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Hari Kerja
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_hari_kerja" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_hari_kerja" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-6">
                        Maksimal Perhari Jam Kerja
                      </div>
                      <div class="col-xs-6">
                        Total Terbayar Jam Kerja
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bh_jam_kerja" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        <input class="form-control" readonly="readonly" name="bb_jam_kerja" type="text" placeholder="col-xs-6">
                      </div>
                      <div class="col-xs-6">
                        &nbsp;
                      </div>
                      <div class="col-xs-6">
                        &nbsp;
                      </div>

                      <div class="col-xs-12">
                        <b> Total Pembayaran Indikator Kedisiplinan </b>
                      </div>
                      <div class="col-xs-12">
                        <input class="form-control" readonly="readonly" name="total_kedisiplinan" type="text" placeholder="col-xs-6">
                      </div>

                      <div class="col-xs-12">
                        <b> Total Pembayaran Indikator Kinerja </b>
                      </div>
                      <div class="col-xs-12">
                        <input class="form-control" readonly="readonly" name="total_kinerja" type="text" placeholder="col-xs-6">
                      </div>



              </div>

              </div>
              <div class="tab-pane fade" id="power">
                <form action="#">
                  <div class="form-group">
                    <h5>On battery power, turn off after:</h5>
                    <select class="custom-select">
                      <option>10 minutes</option>
                      <option>20 minutes</option>
                      <option>30 minutes</option>
                      <option>40 minutes</option>
                      <option>50 minutes</option>
                      <option>60 minutes</option>
                    </select>
                  </div>
                </form>
                <p>
                  <em>
                    <small>Vestibulum mollis diam nec nisl hendrerit, in lacinia nulla aliquet. Ut tortor odio, feugiat ut malesuada ut, pharetra sed ligula. Ut volutpat magna a nisi fermentum, a bibendum lorem sagittis. Nam aliquam, felis at egestas lobortis, lectus ipsum bibendum tellus, et fermentum leo sapien ac ex. Nam dolor massa, aliquam quis magna nec, mattis sollicitudin metus. Phasellus ornare venenatis ipsum, ac cursus mauris. Cras aliquam nibh et libero porttitor fermentum.</small>
                  </em>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Apply</button> -->
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



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>


<script type="text/javascript">

	$(document).ready(function(){
    //alert('oi');
		tampil_data();	//pemanggilan fungsi tampil barang.

		//$('#yuz').dataTable();
    $('#yuz');

		//fungsi tampil data
		function tampil_data(){
      var aa=$('.tahun').val();
      //var bb=$('.bulan').val();
      var cc=$('.nik').val();
		    $.ajax({
          url   : '<?php echo base_url()?>/admin/tpp/load_tpp_detil_rs/',
          dataType : "JSON",
          data : {a:aa , c:cc},
          success: function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){

		                html += '<tr>'+
                          '<td>'+data[i].nik+'</td>'+
                          '<td>'+data[i].huruf+'</td>'+
                          '<td>'+data[i].yusran+'</td>'+
                          '<td>'+data[i].bb_kinerja+'</td>'+
                            '<td style="text-align:right;">'+
                                  '<a href="javascript:;" alt="Liat Detil" class="btn btn-info btn-icon sq-24 item_edit" data="'+data[i].id_pro_tpp_detil+'"><span class="icon icon-search"></span></a>'+
                                  '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id_pro_tpp_detil+'"><span class="icon icon-times"></span></a>'+

                                '</td>'+
		                        '</tr>';

		            }
		            $('#show_data').html(html);
		        }

		    });
		}



		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('admin/tpp/acuan_rs')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(
                    id_pro_tpp_detil,
                    tahun,
                    bulan,
                    nik,
                    tot_apel_masuk,
                    tot_apel_pulang,
                    tot_upacara_hari_senin,
                    tot_masuk_kerja,
                    tot_upacara_hari_besar,
                    tot_izin,
                    bh_apel_masuk,
                    bb_apel_masuk,
                    bh_apel_pulang,
                    bb_apel_pulang,
                    bh_hari_besar,
                    bb_hari_besar,
                    bh_hari_senin,
                    bb_hari_senin,
                    bh_hari_kerja,
                    bb_hari_kerja,
                    bh_jam_kerja,
                    bb_jam_kerja,
                    bb_kinerja
                  ){
                    	   $('#ModalaEdit').modal('show');
                         $('[name="aa"]').val(data.tahun);
                         $('[name="bb"]').val(data.bulan);
                         $('[name="cc"]').val(data.nik);

                         $('[name="tot_apel_masuk"]').val(data.tot_apel_masuk);
                         $('[name="tot_apel_pulang"]').val(data.tot_apel_pulang);
                         $('[name="tot_upacara_hari_senin"]').val(data.tot_upacara_hari_senin);
                         $('[name="tot_masuk_kerja"]').val(data.tot_masuk_kerja);
                         $('[name="tot_upacara_hari_besar"]').val(data.tot_upacara_hari_besar);
                         $('[name="tot_izin"]').val(data.tot_izin);

                         $('[name="bh_apel_masuk"]').val(data.bh_apel_masuk);
                         $('[name="bb_apel_masuk"]').val(data.bb_apel_masuk);

                         $('[name="bh_apel_pulang"]').val(data.bh_apel_pulang);
                         $('[name="bb_apel_pulang"]').val(data.bb_apel_pulang);

                         $('[name="bh_hari_besar"]').val(data.bh_hari_besar);
                         $('[name="bb_hari_besar"]').val(data.bb_hari_besar);

                         $('[name="bh_hari_senin"]').val(data.bh_hari_senin);
                         $('[name="bb_hari_senin"]').val(data.bb_hari_senin);

                         $('[name="bh_hari_kerja"]').val(data.bh_hari_kerja);
                         $('[name="bb_hari_kerja"]').val(data.bb_hari_kerja);

                         $('[name="bh_jam_kerja"]').val(data.bh_jam_kerja);
                         $('[name="bb_jam_kerja"]').val(data.bb_jam_kerja);

                         $('[name="total_kedisiplinan"]').val(data.total_kedisiplinan);
                         $('[name="total_kinerja"]').val(data.total_kinerja);


            		});
                }
            });
            return false;
        });

        //btn_cari
		$('#btn_cari').on('click',function(){
            var aa=$('.tahun').val();
            //var bb=$('.bulan').val();
            var cc=$('.nik').val();

            $.ajax({
              url   : '<?php echo base_url()?>admin/tpp/load_tpp_detil_rs/',
              dataType : "JSON",
              data : {a:aa , c:cc},
              success: function(data){
    		            var html = '';
    		            var i;
                    var tot = 1;
                    var a = 0;
                    var b = 0;
    		            for(i=0; i<data.length; i++){

                      $a = data[i].yusran;
                      $b = data[i].bb_kinerja;

                      $tot = $a + $b;

    		                html += '<tr>'+
    		                  		'<td>'+data[i].nik+'</td>'+
                              '<td>'+data[i].huruf+'</td>'+
                              '<td>'+data[i].yusran+'</td>'+
                              '<td>'+data[i].bb_kinerja+'</td>'+
                              //'<td>'+$tot+'</td>'+
                                '<td style="text-align:right;">'+
                                      '<a href="javascript:;" alt="Liat Detil" class="btn btn-info btn-icon sq-24 item_edit" data="'+data[i].id_pro_tpp_detil+'"><span class="icon icon-search"></span></a>'+
                                      '<a href="javascript:;" class="btn btn-danger btn-icon sq-24 item_hapus" data="'+data[i].id_pro_tpp_detil+'"><span class="icon icon-times"></span></a>'+

                                    '</td>'+
    		                        '</tr>';

    		            }
    		            $('#show_data').html(html);
    		        }

    		    });
            return false;
        });

        //Simpan
        $('#btn_simpan').on('click',function(){
                var a=$('.tahunn').val();
                var b=$('.bulann').val();
                var nik=$('.nik').val();

                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('admin/tpp/simpan_rs_ok')?>",
                    dataType : "JSON",
                    data : {a:a,b:b,nik:nik},
                    success: function(data){
                        $('[name="tahunn"]').val("");
                        $('[name="bulann"]').val("");
                        $('[name="nik"]').val("");
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
            url  : "<?php echo base_url('admin/tpp/hapus_rs')?>",
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
