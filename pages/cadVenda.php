<section class="content-header">
  <h1>
    <i class="fa fa-shopping-cart mr-md"></i>Vendas <small>Lista de Vendas</small>
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
      <table id="tabela-vendas" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center" width="3%">*</th>
            <th class="text-center" width="4%">Código</th>
            <th width="%37">Cliente</th>
            <th class="text-center" width="4%">Desconto Loja</th>
            <th class="text-center" width="4%">Valor Total</th>
            <th class="text-center" width="12%">Forma Pagamento</th>
            <th class="text-center" width="4%">Data da Venda</th>
            <!-- <th class="text-center">Imprimir</th> -->
            <th class="text-center" width="22%">Ações</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</section>

<?php
  include "modais/cadVenda.php";
  include "modais/cadCliente.php";
  include "modais/produtosVenda.php";
  $arquivosJS = "<script src='assets/js/controle.js'></script>"
                ."<script src='assets/js/controle-vendas.js'></script>";
?>
