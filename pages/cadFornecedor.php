<section class="content-header">
  <h1>
    <i class="fa fa-truck mr-md"></i>Fornecedores <small>Lista dos Fornecedores</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./home.php?id=page1"><i class="fa fa-home"></i> Início</a></li>
    <li class="active">Fornecedor</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h2 class="box-title">Relação dos Fornecedores</h2>
      <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-fornecedor"><i class="fa fa-plus mr-xs"></i> Adicionar Fornecedor</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-fornecedores" class="table table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center"><b>*</b></th>
            <!-- <th class="text-center">Código</th> -->
            <th>Nome</th>
            <th class="text-center">CNPJ</th>
            <th class="text-center">Contato1</th>
            <th class="text-center">Contato2</th>
            <th class="text-center">Email</th>
            <th>Info. Adicional</th>
            <th class="text-center">Ação</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<?php
  include("modais/cadFornecedor.php");
  $arquivosJS = "<script src='assets/js/controle-fornecedor.js'></script>";
?>
