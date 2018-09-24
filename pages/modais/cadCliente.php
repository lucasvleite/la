<!-- Modal -->
<div class="modal fade modal-default" id="modal-cliente">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">CADASTRAR UM NOVO CLIENTE</h4>
      </div>

      <form method="POST" id="formNovoCliente" class="form-horizontal" role="form">
      <div class="modal-body">

        <div class="box-header with-border mb-md">
          <h2 class="box-title">Dados Pessoais</h2>
        </div>

        <div class="form-group">
          <label for="nome" class="col-sm-3 col-lg-2 control-label">Nome Completo *</label>
          <div class="col-sm-9">
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
          </div>
        </div>

        <div class="form-group">
          <label for="cpf" class="col-sm-3 col-lg-2 control-label">CPF</label>
          <div class="col-sm-9">
            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF">
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
          <label for="tel1" class="col-sm-3 col-lg-2 control-label">Telefone 1</label>
          <div class="col-sm-9">
            <input type="text" name="tel1" id="tel1" class="form-control" placeholder="Telefone">
          </div>
        </div>

        <div class="form-group">
          <label for="tel2" class="col-sm-3 col-lg-2 control-label">Telefone 2</label>
          <div class="col-sm-9">
            <input type="text" name="tel2" id="tel2" class="form-control" placeholder="Telefone">
          </div>
        </div>

        <div class="box-header with-border mb-md">
          <h2 class="box-title">Endereço</h2>
        </div>

        <div class="form-group">
          <label for="logradouro" class="col-sm-3 col-lg-2 control-label">Rua</label>
          <div class="col-sm-9">
            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Rua">
          </div>
        </div>

        <div class="form-group">
          <label for="numero" class="col-sm-3 col-lg-2 control-label">Número</label>
          <div class="col-sm-9">
            <input type="text" name="numero" id="numero" class="form-control" placeholder="Número">
          </div>
        </div>

        <div class="form-group">
          <label for="bairro" class="col-sm-3 col-lg-2 control-label">Bairro</label>
          <div class="col-sm-9">
            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
          </div>
        </div>

        <div class="form-group">
          <label for="cidade" class="col-sm-3 col-lg-2 control-label">Cidade</label>
          <div class="col-sm-9">
            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
          </div>
        </div>

        <div class="form-group">
          <label for="estado" class="col-sm-3 col-lg-2 control-label">Estado</label>
          <div class="col-sm-9">
            <select id="estado" name="estado" class="form-control">
              <option value="">Selecione um estado</option>
              <option value="AC">AC</option>
              <option value="AL">AL</option>
              <option value="AP">AP</option>
              <option value="AM">AM</option>
              <option value="BA">BA</option>
              <option value="CE">CE</option>
              <option value="DF">DF</option>
              <option value="ES">ES</option>
              <option value="GO">GO</option>
              <option value="MA">MA</option>
              <option value="MT">MT</option>
              <option value="MS">MS</option>
              <option value="MG" selected>MG</option>
              <option value="PA">PA</option>
              <option value="PB">PB</option>
              <option value="PR">PR</option>
              <option value="PE">PE</option>
              <option value="PI">PI</option>
              <option value="RJ">RJ</option>
              <option value="RN">RN</option>
              <option value="RS">RS</option>
              <option value="RO">RO</option>
              <option value="RR">RR</option>
              <option value="SC">SC</option>
              <option value="SP">SP</option>
              <option value="SE">SE</option>
              <option value="TO">TO</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="cep" class="col-sm-3 col-lg-2 control-label">CEP</label>
          <div class="col-sm-9">
            <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP">
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
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Cadastrar Cliente</button>
          <input type="hidden" name="idCliente" id="idCliente">
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
