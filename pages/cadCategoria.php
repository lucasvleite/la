<section class="content-header">
  <h1>
    <i class="fa fa-th mr-md"></i>Categoria <small>Cadastro de Categorias</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./home.php?id=page1"><i class="fa fa-home"></i> Início</a></li>
    <li class="active">Categoria</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h2 class="box-title">Relação das Categorias</h2>
      <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-categoria"><i class="fa fa-plus mr-xs"></i> Cadastrar nova Categoria</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-categorias" class="table table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center"><b>*</b></th>
            <th class="text-center">Código</th>
            <th>Descrição Categoria</th>
            <th class="text-center">Ação</th>
          </tr>
        </thead>
      </table>
    </div>

  </div>
</section>

<?php
  include("modais/cadCategoria.php");
  $arquivosJS = "<script src='assets/js/controle-categorias.js'></script>";
?>
