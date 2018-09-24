<section class="content-header">
  <h1>
    <i class="fa fa-cubes mr-md"></i>Vendas <small>Lista de Vendas</small>
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
      <h2 class="box-title">Relação de Vendas</h2>
      <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-venda"><i class="fa fa-plus mr-xs"></i> Cadastrar nova venda</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">*</th>
            <th>Cliente</th>
            <th class="text-center">Desconto Loja</th>
            <th class="text-center">Total da Venda</th>
            <th class="text-center">Forma de Pagamento</th>
            <th class="text-center">Data da Venda</th>
            <th class="text-center">Produtos</th>
            <th class="text-center">Excluir</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<?php
  include "modais/cadVenda.php";
  include "modais/cadCliente.php";
  $arquivosJS = "<script src='assets/js/controle-vendas.js'></script>";
?>
