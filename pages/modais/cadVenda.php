<!-- Modal -->
<div class="modal fade modal-default" id="modal-venda">
  <div class="modal-dialog modal-xlg">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">REGISTRAR UMA NOVA VENDA</h4>
      </div>

      <!-- form start -->
      <form method="POST" role="form" id="formVenda">
      <div class="modal-body">

        <div class="form-horizontal">
          <div class="form-group">
            <label for="clientes" class="col-sm-2 control-label">Cliente</label>
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

        <hr>
        
        <div class="row">
          <div class="col-sm-12">
            <button id="addProduto" class="btn btn-info pull-right"><i class="fa fa-plus mr-sm"></i> Adicionar Produto</button>
            <input type="hidden" id="contador" name="contador" value="0" />
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 mt-md">
            <table id="produtosSelecionados" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th class="text-center"><b>#</b></th>
                  <th class="text-center">Código</th>
                  <th class="text-left">Nome Produto</th>
                  <th class="text-center">Quantidade</th>
                  <th class="text-center">Preço Unitário</th>
                  <th class="text-center">Subtotal</th>
                  <th class="text-center">Desconto</th>
                  <th class="text-center">Preço Final</th>
                  <th class="text-center">Excluir</th>
                </tr>
              </thead>
              <tbody id="bodyProdutos"></tbody>
            </table>
          </div>
        </div>

        <hr>
        <!-- Subtotal -->
        <div class="row">
          <div class="col-sm-8">
            <h4 class="text-right pull-right nmt"> Subtotal:</h4>
          </div>
          <div class="col-sm-4">
            <h3 class="text-center font-weight-bold nmt" id="subtotal"></h3>
            <input type="hidden" value="" id="inputSubtotal" name="inputSubtotal" />
          </div>
        </div>

      </div>



      <?php // include"cadVenda2.php"; ?>

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

<select name="produtos" id="selectProdutos" class="hidden"></select>