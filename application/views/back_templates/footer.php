<footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
        <b>Text right</b>
    </div>-->
    <strong>Copyright &copy; <a href="#">SGR Agence Immobilier</a></strong>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('back_assets/js/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('back_assets/js/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('back_assets/js/bootstrap.min.js') ?>"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url('back_assets/js/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('back_assets/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('back_assets/js/adminlte.min.js') ?>"></script>

 <script src="<?php echo base_url('data_table/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('data_table/dataTables.bootstrap.min.js') ?>"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>