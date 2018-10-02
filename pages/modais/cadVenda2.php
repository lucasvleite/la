  <!-- Barra de progresso upload -->
  <div class="widget-toolbar ml-lg mt-md" role="menu" id="progress" style="display:none">
  <div class="progress progress-striped active" rel="tooltip" data-original-title="100%" data-placement="bottom" style="width: 97%;">
    <div class="progress-bar progress-bar-primary" role="progressbar" style="width: 100%"><strong>Finalizando venda, aguarde...</strong></div>
  </div>
</div>
<div class="row pa-lg disable" id="step3">
  <div class="col-sm-12">
    <h4 class="text-muted"><i class="fa fa-tag mr-md" aria-hidden="true"></i> 3º Passo - Finalizar Compra</h4>
  </div>

  <!-- <div class="col-sm-12 np">
    <div class="col col-sm-6">
      <div class="form-group">
        <label class="control-label col-sm-12 npl npr" for="inputOperador">Operador <small class="pull-right pt-sm text-muted">Não obrigatório!</small></label>
        <input type="text" class="form-control" id="inputOperador" name="inputOperador" >
      </div>
    </div>
  </div> -->

  <div class="col-sm-12 np">

    <div class="col col-sm-2">
      <div class="form-group">
        <label class="control-label">Desconto da Loja (%) :</label>

        <div class="input-group">

          <input type="number" class="col-sm-6 form-control bra-xs" step="0.10" id="inputDesconto" name="inputDesconto" placeholder="Desconto da Loja" max="100" min="0" value="0" maxlength="3" size="3">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button" disabled>%</button>
          </span>

        </div>

      </div>
    </div>


    <div class="col col-sm-3">
      <div class="form-group">
        <label class="control-label" for="inputPagamento">Forma de Pagamento (*)</label>
        <select id="inputPagamento" name="inputPagamento" class="form-control selectpicker" required>
          <option disabled selected>Selecione forma de pagamento</option>
          <option value="1" data-icon="fa fa-money mr-md"> Dinheiro</option>
          <option value="2" data-icon="fa fa-credit-card-alt mr-md"> Cartão de Crédito</option>
          <option value="3" data-icon="fa fa-credit-card mr-md"> Cartão de Débito</option>
          <option value="4" data-icon="fa fa-barcode mr-md"> Boleto Bancário</option>
          <option value="5" data-icon="fa fa-cc mr-md"> Cheque</option>
          <option value="6" data-icon="fa fa-money mr-md"> Outro</option>
        </select>
        <small id="rPagamento" class="disable text-danger">Campo Obrigatório!</small>
      </div>
    </div>

  </div>

  <hr>

  <div class="col-sm-12 pa-lg">
    <div class="col-sm-12 well">

      <div class="col-sm-8 npl">
        <h4 class="col-sm-12 text-muted nmt">
          <i class="fa fa-tag mr-md"></i>Resumo da Venda
        </h4>
        <span class="col-sm-12 np">Data: 24/09/2018</span>
        <span class="col-sm-12 np">Forma de Pagamento: <span id="Pagamento"> </span></span>
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
            <h4 class="text-center font-weight-bold" id="desconto"></h4>
          </div>
        </div>

        <!-- <div class="col-sm-12 disable descontoPontos">
          <div class="col-sm-5 text-right">
            <h5 class="text-right">Desconto c/ Pontos:</h5>
          </div>
          <div class="col-sm-7">
            <h4 class="text-center font-weight-bold" id="descontoPontos"></h4>
          </div>
        </div> -->

        <div class="col-sm-12 bt-xs">
          <div class="col-sm-5 text-right pt-lg">
            <h4 class="text-right"> Total:</h4>
          </div>
          <div class="col-sm-7">
            <h3 class="text-center" id="total"></h3>
            <input type="hidden" value="" id="inputTotal" name="inputTotal"/>
          </div>
        </div>
      </div>

    </div><!-- end well -->			


    <!-- /.box-body -->						
    <div class="box-footer">
      <div class="row">
        <div class="col col-md-12 col-xs-12 pr-xs"> 

            <button type="button" class="btn btn-danger" onclick="location.reload()">
              <i class="fa fa-times mr-md"></i>Cancelar Venda
            </button>

            <div class="pull-right">
            <button type="button" class="btn btn-success" onclick="finalizarVenda()" id="finaliza_venda"><i class="fa fa-floppy-o mr-md" ></i>
              Finalizar Venda
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div><!-- end step3 -->