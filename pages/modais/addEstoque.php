<!-- Modal -->
<div class="modal fade modal-default" id="modal-addEstoque">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ADICIONAR PRODUTOS NO ESTOQUE</h4>
      </div>

      <form method="POST" role="form" id="formEstoque">
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <label for="codigoProduto">Código Produto</label>
              <input type="hidden" name="codigoProduto" id="codigoProdutoE" placeholder="Código">
              <span id="spanCodigo" class="form-control" disabled></span>
            </div>
            <div class="col-sm-9">
              <label for="descricaoProduto">Descrição do Produto</label>
              <input type="hidden" name="descricaoProduto" id="descricaoProdutoE" placeholder="Descrição Produto">
              <span id="spanDescricao" class="form-control" disabled></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <label for="precoUnitario">Preço Compra *</label>
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="number" name="precoUnitario" id="precoUnitarioE" class="form-control" min=0 step=".01" placeholder="Preço Compra" required>
              </div>
            </div>
            <div class="col-xs-6">
              <label for="precoVenda">Novo Preço Venda *</label>
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="number" name="precoVenda" id="precoVendaE" class="form-control" min=0 step=".01" placeholder="Preço Venda" required>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <label for="estoque">Quantidade Comprada*</label>
              <input type="number" name="estoque" id="estoqueE" class="form-control" min=0 step="1" placeholder="Quantidade" required>
            </div>
            <div class="col-xs-6">
              <label for="dataCompra">Data compra</label>
              <input type="text" name="dataCompra" id="dataCompraE" class="form-control" placeholder="00/00/0000">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <label for="fornecedor">Fornecedor</label>
              <div class="input-group">
                <select name="fornecedor" id="fornecedorE" class="form-control">
                  <option value="">Selecione um Fornecedor</option>
                </select>
                <a class="input-group-addon" href="#" data-toggle="modal" data-target="#modal-fornecedor" role="button">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="col-sm-6">
            <label for="categoriaProdutoE">Categoria</label>
              <div class="input-group">
                <select name="categoriaProduto" id="categoriaProdutoE" class="form-control">
                  <option value="">Selecione uma categoria</option>
                </select>
                <a class="input-group-addon" href="#" data-toggle="modal" data-target="#modal-categoria" role="button">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus mr-xs"></i> Adicionar no Estoque</button>
          <input type="hidden" name="idProduto" id="idProdutoE">
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
