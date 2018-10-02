<!-- Modal -->
<div class="modal fade modal-default" id="modal-venda">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">REGISTRAR UMA NOVA VENDA</h4>
      </div>

      <!-- form start -->
      <form method="POST" class="form-horizontal" role="form" id="formVenda">
      <div class="modal-body">
        <div class="form-group">
          <label for="clientes" class="col-sm-3 col-lg-2 control-label">Cliente</label>
          <div class="col-sm-9">
            <div class="input-group">
              <select name="clientes" id="clientes" class="form-control">
                <option value="">Selecione um cliente</option>
              </select>
              <a class="input-group-addon" href="#" data-toggle="modal" data-target="#modal-cliente" role="button">
                <i class="fa fa-plus"></i>
              </a>
            </div>
          </div>
        </div>
      </div>




      <br><br><br><br><br>

      <?php include"cadVenda2.php"; ?>

      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Cadastrar Venda</button>
        </div>
      </div>
        <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
