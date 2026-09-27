<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>




<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>

<div class="layout-content">
  <div class="layout-content-body">

    <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="demo-form-wrapper">
                <form action="<?php echo site_url('peg/atasan/simpan');?>" method="post" >
                  <?php
                                    if ($this->session->flashdata('ada')==NULL)
                                    {

                                    }
                                    else
                                    {?>



                  <div class="alert alert-info">
                      <button data-dismiss="alert" class="close">
                        &times;
                      </button>

                      <a class="alert-link" href="#">
                      <?php echo $this->session->flashdata('ada');?> </a>
                  </div>
                <?php
                  }
                ?>

                  <div class="form-group">
                    <label for="name-1" class="control-label">NIP</label>
                    <input id="form-control-1" value="<?php echo $yy->nik_atasan;?>" name="a" readonly="true" class="form-control a" type="text">
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Nama</label>
                    <input id="form-control-2" value="<?php echo $yyy->nama;?>" name="b" readonly="true" class="form-control b" type="text" />
                  </div>
                  <div class="form-group">
                    <label for="biography-1" class="control-label">Pilih Atasan</label>
                    <!--<select  id='form-control-6' class="form-control selUser" name="aa"></select>-->
                    <select id="form-control-6" class="form-control selUser" name="aa">

                      </select>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
















    </div>
</div>






<script type="text/javascript">

$(".selUser").select2({
  placeholder: '--- Masukkan NIP Atasan ---',
   minimumInputLength: 5,
  ajax: {
   url: "<?php echo base_url('peg/atasan/yusran')?>",
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
    return {
      searchTerm: params.term // search term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });










</script>
