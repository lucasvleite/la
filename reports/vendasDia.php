<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o mr-md"></i> Relatório de Vendas <small>Vendas do dia</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./home.php?id=page1"><i class="fa fa-home"></i> Início</a></li>
    <li class="active">Vendas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h2 class="box-title">Relatório de Vendas diário</h2>
      <!-- <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-cliente"><i class="fa fa-plus mr-xs"></i> Imprimir Relatório</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <!-- Cliente -->
      <div class="form-horizontal">
        <div class="form-group">
          <label for="data" class="col-sm-2 control-label">Selecione o dia:</label>
          <div class="col-sm-3 col-md-2">
            <div class="input-group">
              <input type="text" name="data" id="data" class="form-control" value="<?php echo date('d/m/Y') ?>">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
            </div>
          </div>
          <label for="formaPagamento" class="col-sm-2 col-md-2 control-label">Forma de Pagamento:</label>
          <div class="col-sm-3">
            <select id="formaPagamento" name="formaPagamento" class="form-control selectpicker" required>
              <option value="0" selected>Selecione forma de pagamento</option>
              <option value="1" data-icon="fa fa-money mr-md"> Dinheiro</option>
              <option value="2" data-icon="fa fa-credit-card-alt mr-md"> Cartão de Crédito</option>
              <option value="3" data-icon="fa fa-credit-card mr-md"> Cartão de Débito</option>
              <option value="4" data-icon="fa fa-cc mr-md"> Cheque</option>
              <option value="5" data-icon="fa fa-barcode mr-md"> Boleto Bancário</option>
              <option value="6" data-icon="fa fa-usd mr-md"> Outro</option>
              <option value="0" data-icon="fa fa-th mr-md"> Todas formas pagamento</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-3">
            <button class="btn btn-primary pull-right" id="impressao"><i class="fa fa-print mr-sm"></i> Imprimir Relatório</button>
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-sm-12 mt-md">
          <table id="tabela-vendas" class="table table-hover border-black">
            <thead>
              <tr class="active">
                <th class="text-center" width="15%">Venda</th>
                <th width="35%">Produto</th>
                <th class="text-center" width="10%">Preço</th>
                <th class="text-center" width="10%">Quantidade</th>
                <th class="text-center" width="10%">Subtotal</th>
                <th class="text-center" width="10%">Desconto</th>
                <th class="text-center" width="10%">Total</th>
              </tr>
            </thead>
            <tbody id="body-vendas">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<?php $arquivosJS = "<script src='assets/js/r1.js'></script>"; ?>
