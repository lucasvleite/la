<!-- Modal -->
<div class="modal fade modal-default" id="modal-produto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">CADASTRAR UM NOVO PRODUTO</h4>
      </div>

      <form method="POST" class="form-horizontal" role="form" id="formNovoProduto">
      <div class="modal-body">
        <!-- <div class="form-group">
          <label for="codigoProduto" class="col-sm-3 col-lg-2 control-label">Código Produto *</label>
          <div class="col-sm-9">
            <input type="text" name="codigoProduto" id="codigoProduto" class="form-control" placeholder="Código" value="ALEATÓRIO" required>
          </div>
        </div> -->
        <div class="form-group">
          <label for="descricaoProduto" class="col-sm-3 col-lg-2 control-label">Descrição do Produto *</label>
          <div class="col-sm-9">
            <input type="text" name="descricaoProduto" id="descricaoProduto" class="form-control" placeholder="Descrição Produto" required>
          </div>
        </div>
        <div class="form-group">
          <label for="estoque" class="col-sm-3 col-lg-2 control-label">Quantidade *</label>
          <div class="col-sm-9">
            <input type="number" name="estoque" id="estoque" class="form-control" min=0 step="1" placeholder="Quantidade" required>
          </div>
        </div>
        <div class="form-group">
          <label for="precoUnitario" class="col-sm-3 col-lg-2 control-label">Preço Compra *</label>
          <div class="col-sm-9">
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              <input type="number" name="precoUnitario" id="precoUnitario" class="form-control" min=0 step=".01" placeholder="Preço Compra" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="precoVenda" class="col-sm-3 col-lg-2 control-label">Preço Venda *</label>
          <div class="col-sm-9">
            <div class="input-group">
              <span class="input-group-addon">R$</span>
              <input type="number" name="precoVenda" id="precoVenda" class="form-control" min=0 step=".01" placeholder="Preço Venda" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="dataCompra" class="col-sm-3 col-lg-2 control-label">Data compra Produto</label>
          <div class="col-sm-9">
            <input type="text" name="dataCompra" id="dataCompra" class="form-control" placeholder="00/00/0000">
          </div>
        </div>
        <div class="form-group">
          <label for="fornecedor" class="col-sm-3 col-lg-2 control-label">Fornecedor</label>
          <div class="col-sm-9">
            <div class="input-group">
              <select name="fornecedor" id="fornecedor" class="form-control">
                <option value="">Selecione um Fornecedor</option>
              </select>
              <a class="input-group-addon" href="#" data-toggle="modal" data-target="#modal-fornecedor" role="button">
                <i class="fa fa-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="estoqueMinimo" class="col-sm-3 col-lg-2 control-label">Estoque Mínimo</label>
          <div class="col-sm-9">
            <input type="number" name="estoqueMinimo" id="estoqueMinimo" class="form-control" min=0 step="1" value=0 placeholder="Estoque">
          </div>
        </div>
        <div class="form-group">
          <label for="categoriaProduto" class="col-sm-3 col-lg-2 control-label">Categoria</label>
          <div class="col-sm-9">
            <div class="input-group">
              <select name="categoriaProduto" id="categoriaProduto" class="form-control">
                <option value="">Selecione uma categoria</option>
              </select>
              <a class="input-group-addon" href="#" data-toggle="modal" data-target="#modal-categoria" role="button">
                <i class="fa fa-plus"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o mr-xs"></i> Inserir Produto</button>
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
