<!-- Modal -->
<div class="modal fade modal-default" id="modal-fornecedor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">CADASTRAR UM NOVO FORNECEDOR</h4>
      </div>
      <form method="POST" id="formNovoFornecedor" class="form-horizontal" role="form">
      <div class="modal-body">

        <div class="box-header with-border mb-md">
          <h2 class="box-title">Dados da empresa</h2>
        </div>

        <div class="form-group">
          <label for="nomeFornecedor" class="col-sm-3 col-lg-2 control-label">Nome Completo *</label>
          <div class="col-sm-9">
            <input type="text" name="nomeFornecedor" id="nomeFornecedor" class="form-control" placeholder="Nome" required>
          </div>
        </div>

        <div class="form-group">
          <label for="cnpj" class="col-sm-3 col-lg-2 control-label">CNPJ</label>
          <div class="col-sm-9">
            <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ">
          </div>
        </div>

        <div class="box-header with-border mb-md">
          <h2 class="box-title">Contatos</h2>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-3 col-lg-2 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" name="email" id="email" class="form-control" placeholder="e-mail">
          </div>
        </div>

        <div class="form-group">
          <label for="contato1" class="col-sm-3 col-lg-2 control-label">Telefone 1</label>
          <div class="col-sm-9">
            <input type="text" name="contato1" id="contato1" class="form-control" placeholder="Telefone">
          </div>
        </div>

        <div class="form-group">
          <label for="contato2" class="col-sm-3 col-lg-2 control-label">Telefone 2</label>
          <div class="col-sm-9">
            <input type="text" name="contato2" id="contato2" class="form-control" placeholder="Telefone">
          </div>
        </div>

        <div class="form-group">
          <label for="inf_adicionais" class="col-sm-3 col-lg-2 control-label">Informações Adicionais</label>
          <div class="col-sm-9">
            <textarea name="inf_adicionais" id="inf_adicionais" class="form-control" placeholder="Informações Adicionais" rows="3"></textarea>
          </div>
        </div>

      </div>

      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Cadastrar Fornecedor</button>
          <input type="hidden" name="idFornecedor" id="idFornecedor">
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
