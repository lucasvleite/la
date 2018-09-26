<!-- Modal -->
<div class="modal fade modal-default" id="modal-editProduto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">EDITAR UM PRODUTO</h4>
      </div>

      <form method="POST" role="form" id="formEditProduto">
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label for="descricaoProduto" class="col-sm-3 col-lg-2 control-label">Descrição do Produto *</label>
            <div class="col-sm-9">
              <input type="text" name="descricaoProduto" id="EdescricaoProduto" class="form-control" placeholder="Descrição Produto" required>
            </div>
          </div>
          <div class="form-group">
            <label for="estoque" class="col-sm-3 col-lg-2 control-label">Quantidade *</label>
            <div class="col-sm-9">
              <input type="number" name="estoque" id="Eestoque" class="form-control" min=0 step="1" placeholder="Quantidade" required>
            </div>
          </div>
          <div class="form-group">
            <label for="precoVenda" class="col-sm-3 col-lg-2 control-label">Preço Venda *</label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="number" name="precoVenda" id="EprecoVenda" class="form-control" min=0 step=".01" placeholder="Preço Venda" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="fornecedor" class="col-sm-3 col-lg-2 control-label">Fornecedor</label>
            <div class="col-sm-9">
              <div class="input-group">
                <select name="fornecedor" id="Efornecedor" class="form-control">
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
              <input type="number" name="estoqueMinimo" id="EestoqueMinimo" class="form-control" min=0 step="1" value=0 placeholder="Estoque">
            </div>
          </div>
          <div class="form-group">
            <label for="categoriaProduto" class="col-sm-3 col-lg-2 control-label">Categoria</label>
            <div class="col-sm-9">
              <div class="input-group">
                <select name="categoriaProduto" id="EcategoriaProduto" class="form-control">
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
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-edit mr-xs"></i>Editar Produto</button>
          <input type="hidden" id="idProduto" name="idProduto">
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
<div class="modal fade modal-default" id="modal-descarte">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">RETIRAR PRODUTOS DO ESTOQUE</h4>
      </div>

      <form method="POST" role="form" id="formDescarte">
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <label for="codigoProduto">Código Produto</label>
              <span id="spanCodigoD" class="form-control" disabled></span>
            </div>
            <div class="col-sm-9">
              <label for="descricaoProduto">Descrição do Produto</label>
              <span id="spanDescricaoD" class="form-control" disabled></span>
              <input type="hidden" name="descricao" id="descricaoD">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <label for="estoqueD">Quant. Estoque</label>
              <span id="spanEstoqueD" class="form-control" disabled></span>
            </div>
            <div class="col-sm-9">
              <label for="categoriaProdutoE">Categoria</label>
              <span id="spanCategoriaD" class="form-control" disabled></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-6">
              <label for="quantidade">Quantidade Descarte*</label>
              <input type="number" name="quantidade" id="quantidadeD" class="form-control" min=0 max=0 step="1" placeholder="Quantidade" required>
            </div>
            <div class="col-xs-6">
              <label for="dataDescarte">Data descarte</label>
              <input type="text" name="dataDescarte" id="dataDescarte" class="form-control" placeholder="00/00/0000" value="<?php echo date("d/m/Y"); ?>">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer bg-success">
        <div class="text-center">
          <button type="button" class="btn btn-primary mr-md" data-dismiss="modal"><i class="fa fa-ban mr-xs"></i> Cancelar</button>
          <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-circle-down mr-xs"></i> Retirar do Estoque</button>
          <input type="hidden" name="idProduto" id="idProdutoD">
        </div>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
