



<!-- /.contentnya -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="background-color:black">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy;2021 IT-APTIKA <a href="<?php echo base_url() ?>peg/Testing/admin">DISKOMINSTA</a>.</strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

</body>
</html>

<script type="text/javascript">
var menu='<?php echo $_SESSION['menu'] ?>';
if (menu=='1') {
  $('#ma').addClass('active');
  $('#mb').removeClass('active');
  $('#mc').removeClass('active');
  $('#md').removeClass('active');
  $('#me').removeClass('active');
  $('#mf').removeClass('active');
}else if (menu=='2') {
  $('#mb').addClass('active');
  $('#ma').removeClass('active');
  $('#mc').removeClass('active');
  $('#md').removeClass('active');
  $('#me').removeClass('active');
  $('#mf').removeClass('active');
}else if (menu=='3') {
  $('#mc').addClass('active');
  $('#ma').removeClass('active');
  $('#mb').removeClass('active');
  $('#md').removeClass('active');
  $('#me').removeClass('active');
  $('#mf').removeClass('active');
}else if (menu=='4') {
  $('#md').addClass('active');
  $('#ma').removeClass('active');
  $('#mb').removeClass('active');
  $('#mc').removeClass('active');
  $('#me').removeClass('active');
  $('#mf').removeClass('active');
}else if (menu=='5') {
  $('#me').addClass('active');
  $('#ma').removeClass('active');
  $('#mb').removeClass('active');
  $('#mc').removeClass('active');
  $('#md').removeClass('active');
  $('#mf').removeClass('active');
}else if (menu=='6') {
  $('#mf').addClass('active');
  $('#ma').removeClass('active');
  $('#mb').removeClass('active');
  $('#mc').removeClass('active');
  $('#md').removeClass('active');
  $('#me').removeClass('active');
}


</script>
