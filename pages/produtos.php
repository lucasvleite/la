<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h1 class="box-title">Produtos </h1>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-xs-12">
        <h1><button class="btn btn-primary" data-toggle="modal" data-target="#modal-produto">
          <i class="fa fa-plus">Adicionar Produto</i>
        </button></h1>
      </div>
    </div>
    <div class="box-body">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-xs-12">
        <table id="tabela-produtos" class="table table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Descricão</th>
              <th>Categoria</th>
              <th>Embalagem</th>
              <th>Disponível</th>
              <th>Preço Venda</th>
              <th>Estoque</th>
            </tr>
          </thead>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include "modais/cadProduto.php";
  $arquivosJS = "<script src='assets/js/controle-produtos.js'></script>";
  $arquivosJS .= "<script src='assets/js/controle-categorias.js'></script>";
?>