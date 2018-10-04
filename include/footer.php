  </div>
  <!-- ./content-wrapper -->

  <footer class="main-footer">
    <div class="pull-left"> Versão 1.0 </div>
    <div class="pull-right hidden-xs"> <b>Webmaster:</b> Lucas Vicente Leite </div>
    <div class="text-center"><strong> Copyright &copy; 2018</strong></div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- InputMask -->
<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- Morris.js charts -->
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<script src="assets/bower_components/morris.js/morris.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assets/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- SweetAlert 2 -->
<script src="assets/js/sweetalert2.min.js"></script>
<!-- Select bootstrap -->
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- Caso exista escript da pagina para adicionar -->
<?php echo isset($arquivosJS) ? $arquivosJS : ""; ?>
<script>$(".treeview-menu").show()</script>

</body>
</html>