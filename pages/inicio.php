<section class="content-header">
  <h1>
    Início
    <small>Painel de Controle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Início</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class=" col-md-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><small class="bg-green">R$ </small><span id="totalVendas"></span></h3>

          <p><span id="quantidadeVendas"></span> </p>
        </div>
        <div class="icon">
          <i class="fa fa-shopping-cart"></i>
        </div>
        <a href="./home.php?id=vendas" class="small-box-footer">Total de Vendas <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class=" col-md-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h3><span id="totalProdutos"></span></h3>

          <p>Produtos</p>
        </div>
        <div class="icon">
          <i class="fa fa-cubes"></i>
        </div>
        <a href="./home.php?id=addEstoque" class="small-box-footer">Total de Produtos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class=" col-md-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><span id="totalClientes"></span></h3>

          <p>Clientes</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="./home.php?id=cadCliente" class="small-box-footer">Total de Clientes <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class=" col-md-3 col-xs-6">
      <!-- small box -->
      <a href="./home.php?id=cadFornecedor">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><span id="totalFornecedores"></span></h3>

            <p>Fornecedores</p>
          </div>
          <div class="icon">
            <i class="fa fa-truck"></i>
          </div>
          <div class="small-box-footer">Total de Fornecedores <i class="fa fa-arrow-circle-right"></i></div>
        </div>
      </a>
    </div>

  </div>

</section>



  <!-- // "Relatórios:
  * Fechar caixa diário (Listar produto, quantidade e separar se recebeu por cartão, dinheiro ou cheque);
  Bruto e Líquido;
  Produtos e quantidades vendidos no intervalo de datas;
  Produtos mais vendidos no intervalo de datas;
  // " -->

<?php $arquivosJS = "<script src='assets/js/inicio.js'></script>"; ?>
