<section class="content-header">
  <h1>
    <i class="fa fa-th mr-md"></i>Controle Estoque <small>Lista dos Produtos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./home.php?id=page1"><i class="fa fa-home"></i> Início</a></li>
    <li class="active">Estoque</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border pt-lg">
    <h2 class="box-title">Relação dos Produtos</h2>
<button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-produto"><i class="fa fa-plus mr-xs"></i> Cadastrar um novo Produto</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-produtos" class="table table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center"><b>*</b></th>
            <!-- <th class="text-center">Código</th> -->
            <th>Descrição produto</th>
            <th class="text-center">Preço Venda</th>
            <th class="text-center">Estoque</th>
            <!-- <th class="text-center">Categoria</th> -->
            <th class="text-center">Estoque Mín.</th>
            <th class="text-center">Histórico</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php
  include "modais/addEstoque.php";
  include "modais/cadProduto.php";
  include "modais/editProduto.php";
  include "modais/histProduto.php";
  include "modais/cadFornecedor.php";
  include "modais/cadCategoria.php";
  $arquivosJS = "<script src='assets/js/controle-produtos.js'></script>";
?>
