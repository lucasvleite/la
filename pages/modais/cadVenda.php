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

        <!-- Cliente -->
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

        <div id="parteFinal" class="hidden">
          <div class="row">
            <div class="form-group">
              <div class="col-sm-4 col-md-3">
                <label class="control-label" for="formaPagamento">Forma de Pagamento</label>
                <select id="formaPagamento" name="formaPagamento" class="form-control selectpicker" required>
                  <option disabled selected>Selecione forma de pagamento</option>
                  <option value="1" data-icon="fa fa-money mr-md"> Dinheiro</option>
                  <option value="2" data-icon="fa fa-credit-card-alt mr-md"> Cartão de Crédito</option>
                  <option value="3" data-icon="fa fa-credit-card mr-md"> Cartão de Débito</option>
                  <option value="4" data-icon="fa fa-barcode mr-md"> Boleto Bancário</option>
                  <option value="5" data-icon="fa fa-cc mr-md"> Cheque</option>
                  <option value="6" data-icon="fa fa-money mr-md"> Outro</option>
                </select>
              </div>
              <div class="col-sm-3">
                <label for="dataVenda" class="control-label">Data</label>
                <input type="text" name="dataVenda" id="dataVenda" class="form-control" value="<?php echo date('d/m/Y'); ?>">
              </div>
              <div class="col-sm-3 col-md-2 pull-right">
                <label class="control-label">Desconto da Loja (%)</label>

                <div class="input-group">
                  <input type="number" class="col-sm-6 form-control bra-xs" step="0.10" id="inputDesconto" name="inputDesconto" placeholder="Desconto da Loja" max="100" min="0" value=0 maxlength="3" size="3">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button" disabled>%</button>
                  </span>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 pa-lg">
              <div class="col-sm-12 well">

                <div class="col-sm-8 npl">
                  <h4 class="col-sm-12 text-muted nmt">
                    <i class="fa fa-tag mr-md"></i>Resumo da Venda
                  </h4>
                  <span class="col-sm-12 np">Data: <span id="spanData"><b><?php echo date('d/m/Y'); ?></b></span></span>
                  <span class="col-sm-12 np">Forma de Pagamento: <span id="spanPagamento"><b>Selecione forma de pagamento</b></span></span>
                  <!-- <span class="col-sm-12 np">Operador: <span id="Operador"></span></span> -->
                </div>

                <div class="col-sm-4 bl-xs npr">
                  <div class="col-sm-12">
                  </div>

                  <div class="col-sm-12">
                    <div class="col-sm-5 text-right">
                      <h5 class="text-right">Desconto:</h5>
                    </div>
                    <div class="col-sm-7">
                      <h4 class="text-center font-weight-bold" id="spanDesconto"></h4>
                    </div>
                  </div>

                  <div class="col-sm-12 bt-xs">
                    <div class="col-sm-5 text-right pt-lg">
                      <h4 class="text-right"> Total:</h4>
                    </div>
                    <div class="col-sm-7">
                      <h3 class="text-center" id="spanTotal"></h3>
                      <input type="hidden" value="" id="inputTotal" name="inputTotal"/>
                    </div>
                  </div>
                </div>

              </div><!-- end well -->
            </div>
          </div>
        </div>

      </div>

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