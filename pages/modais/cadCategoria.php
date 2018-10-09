<!-- Modal -->
<div class="modal fade modal-default" id="modal-categoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">CADASTRAR UMA NOVA CATEGORIA</h4>
      </div>

      <form method="POST" class="form-horizontal" role="form" id="formNovaCategoria">
      <div class="modal-body">
        <div class="form-group">
          <label for="descricaoCategoria" class="col-sm-3 control-label">Descrição Categoria *</label>
          <div class="col-sm-9 col-lg-8">
            <input type="text" name="descricaoCategoria" id="descricaoCategoria" class="form-control " placeholder="Descrição" required>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" id="novoProduto" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Inserir Categoria</button>
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade modal-default" id="modal-editCategoria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">EDITAR CATEGORIA</h4>
      </div>

      <form method="POST" class="form-horizontal" role="form" id="formEditCategoria">
      <div class="modal-body">
        <div class="form-group">
          <label for="descricaoCategoria" class="col-sm-3 control-label">Descrição Categoria *</label>
          <div class="col-sm-9 col-lg-8">
            <input type="text" name="descricaoCategoria" id="descricaoCategoriaE" class="form-control " placeholder="Descrição" required>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" id="novoProduto" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Alterar Categoria</button>
          <input type="hidden" name="idCategoria" id="idCategoria">
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
