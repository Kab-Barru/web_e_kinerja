<?php   $this->session->set_userdata('menu', '3'); ?>
<style>
body{
font-family: 'Lato', sans-serif;

}

.profile-bar{
background-image: url(https://i.pinimg.com/originals/ae/84/18/ae8418bc8397210c37ba7fc802dbc020.jpg);
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
max-height: 100%;
max-width: 100%;
color: #eee;
}

.profile-bar .contents{
background-color: rgba(0,0,0,0.65);
}

.profile-bar .contents img{
display: block;
width: 70px;
margin: auto;
padding-top: 25px;
}

.profile-bar .contents .profile-name{
text-align: center;
margin: 10px 0px;
font-size: 18px;
font-weight: 300;
}

.profile-bar .contents .profile-description{
text-align: center;
margin: 10px 0px;
font-weight: 300;
}

.profile-bar .contents .buttons{
text-align: center;
background-color: rgba(31,45,61,.7);
}

.profile-bar .contents .buttons ul{
list-style: none;
-webkit-padding-start: 0;
}

.profile-bar .contents .buttons ul li{
display: inline-block;
margin: 15px 20px;
}

.profile-bar .contents .buttons ul li a{
color: #eee;
font-size: 32px;
display: block;
text-decoration: none;
opacity: 0.7;
transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a:hover{
opacity: 1;
transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a span{
font-size: 14px;
display: block;
}
</style>
    <?php

    $nik = $this->session->userdata('username');
    $cek = $this->db->query("select * from ref_log where username = '$nik'")->num_rows();
    $cek_det = $this->db->query("select * from ref_log where username = '$nik'")->row();
    $peg = $this->db->query("select * from ref_pegawai where nik = '$nik'")->row();
    $nip=$_SESSION['nip'];

    if ($cek > 0) {
      if ($cek_det->lev == 'user_su') {
        $adm = "Super User";
      } else if ($cek_det->lev == 'user_admin') {
        $adm = $cek_det->nama_adm;
      }
    }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:white">

  <!-- Content Header (Page header) -->
  <div class="content-header">


<?php
$na=$yy->nik_atasan;
 if ($na<2) {?>
   <div class="container-fluid">
             <div class="profile-bar">
               <div class="contents">


                 <div align="center">
                   <img src="https://c.tenor.com/zTKB-sgR15sAAAAM/smile-eyes-smiley.gif" alt="" class="img-circle">
                   <strong>Belum Ada Atasan..!!</strong>
                 </div>

               </div>

             </div>

     </div>
<?php }else{ ?>

    <div class="container-fluid">
              <div class="profile-bar">
                <div class="contents">
                  <?php if (strlen($yyy->foto)<4) {?>
                            <img src="<?php echo base_url() ?>/foto/user.png" class="img-circle" alt="" style="width:100px;height:100px">

                  <?php }else{ ?>
                          <img src="<?php echo base_url() ?>/foto/<?php echo $yyy->foto ?>" class="img-circle" alt="" style="width:100px;height:100px">

                  <?php } ?>


                <p class="profile-name"><i><?php echo $yyy->nama;?><?php echo$yyy->gelar_belakang;?><br><?php echo $yy->nik_atasan;?> </i></p>

                  <div align="center">

                    <?php
                    $ij=$yyy->id_jabatan;
                     $jbt=$this->db->query("Select * from ref_jabatan where id_jabatan=$ij")->row(); ?>
                      <p><i> <?php echo $jbt->jabatan ?></i></p>
                  </div>

                </div>

              </div>

      </div>
    <?php } ?>
      <div class="card-body">
        <div class="datatable-responsive" style="max-width:100%;overflow-x:auto">
          <table id="datatable" class="table table-striped table-hover w-100 cs-table" cellspacing="0">
            <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody >
                  <?php
                  $nik=$_SESSION['nip'];
                  $id_unit=$_SESSION['id_unker'];
                  $cek=$this->db->query("select * from ref_pegawai where nik=$nik")->row();
                  $id_pangkat=$cek->id_pangkat;
                    $bos=$this->db->query("select * from ref_pegawai where id_unit_kerja=$id_unit and id_pangkat>$id_pangkat");
                    $bosku=$bos->num_rows();
                    if ($bosku>0) {
                        $atasan=$bos->result();
                    }else{
                        $atasan=$this->db->query("select * from ref_pegawai where id_pangkat>$id_pangkat")->result();
                    }



                   ?>

                   <?php $no=1;
                   foreach ($atasan as $ats){ ?>
                     <tr>
                       <td><?php echo $no++ ?></td>
                       <?php if (strlen($ats->foto)<4) {?>
                            <td><img src="<?php echo base_url() ?>/foto/user.png" class="img-circle" alt="" style="width:90px;height:90px"></td>

                       <?php }else{ ?>
                           <td><img src="<?php echo base_url() ?>/foto/<?php echo $ats->foto ?>" class="img-circle" alt="" style="width:90px;height:90px"></td>

                       <?php } ?>

                       <td><?php echo $ats->nama ?><?php echo $ats->gelar_belakang ?></td>
                       <td><?php echo $ats->nik ?></td>
                       <td>
                         <?php
                         $uk= $ats->id_unit_kerja;
                         $jbt=$ats->id_jabatan;
                         $bos=$this->db->query("select * from ref_jabatan where id_unit_kerja=$uk and id_jabatan=$jbt")->row();
                          echo $bos->jabatan;
                          ?>
                       </td>
                       <td>
                         <div class="" style="padding:10px;color:black">
                           <br>
                           <button onclick="pilih('<?php echo $ats->nik?>')" class="btn btn-primary" value="<?php  echo $ats->nama ?>" name="<?php echo $ats->nik; ?>"><i class="fas fa-handshake" aria-hidden="true"></i> Pilih
                           </button>

                         </div>

                       </td>
                     </tr>

                 <?php } ?>


                </tbody>
            </table>

        </div>
      </div>


</div>
</div>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/tilt.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert2.all.min.js"></script>
<script>
  $(document).ready(function() {
     $('#datatable').DataTable();
    var ms = '<?php echo $_SESSION['kode_mesin'] ?>';
    $.ajax({
      url: "https://e-finger.barrukab.go.id/ambil-data/"+ ms,
      type: "get", // To protect sensitive data
      data: {},
      success: function(response) {
        // Handle the response object
        alert(response);
      }
    });
  });




  var oilCanvas = document.getElementById("oilChart");

  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 18;

  var oilData = {
    labels: [
      "Tepat Waktu",
      "Terlambat",
      "Tidak Hadir",

    ],
    datasets: [{
      data: [10, 20, 1],
      backgroundColor: [
        "#28a745",
        "#ffc107",
        "#dc3545"
      ]
    }]
  };

  var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
  });

  function pilih(nik){
    var srv='<?php echo base_url() ?>';

     $.getJSON(srv+'peg/Atasan/cek_nip/'+nik,function(response){
   nama=response.nama;
   gelar=response.gelar_belakang;
   Swal.fire({
      title: 'konfirmasi',
      text: "Apakah Anda Yakin ingin memilih "+nama+gelar+' '+'Sebagai Atasan Anda?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya'
    }).then((result ) => {
      if (result.value) {

          $.post(srv+'peg/Atasan/pilih/'+nik,function(response){
            var result = $.parseJSON(response);
            console.log();
                if (result.status == true) {
                  Swal.fire({
                    type: 'success',
                    title: 'Success',
                    text: result.messages
                  });

                  // dt.ajax.reload();

                  location.reload();
                //$('.form-kinerja').attr('action', server + 'admin/kinerja/edit_kinerja');
                } else {
                  Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    html: result.messages
                  });
                }
          })
        }
   });
 });

         }
</script>
