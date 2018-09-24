<section class="content-header">
  <h1>
    <i class="fa fa-user-plus mr-md"></i>Cliente <small>Cadastro de Cliente</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./home.php?id=page1"><i class="fa fa-home"></i> Início</a></li>
    <li class="active">Cliente</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- MAP & BOX PANE -->
  <div class="box box-solid">
    <div class="box-header with-border">
      <h2 class="box-title">Relação dos Clientes</h2>
      <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-cliente"><i class="fa fa-plus mr-xs"></i> Cadastrar novo Cliente</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-clientes" class="table table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center"><b>*</b></th>
            <!-- <th class="text-center">Código</th> -->
            <th>Nome</th>
            <th class="text-center">CPF</th>
            <th class="text-center">Contato1</th>
            <th class="text-center">Contato2</th>
            <th class="text-center">Email</th>
            <!-- <th>Endereço</th>
            <th class="text-center">CEP</th> -->
            <th class="text-center">Ação</th>
          </tr>
        </thead>
      </table>
    </div>

  </div>
</section>

<?php
  include("modais/cadCliente.php");
  $arquivosJS = "<script src='assets/js/controle.js'></script>" .
                "<script src='assets/js/controle-clientes.js'></script>";
?>
