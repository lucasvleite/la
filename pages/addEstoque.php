<section class="content-header">
  <h1>
    <i class="fa fa-th mr-md"></i>Controle Estoque <small>Estoque dos Produtos</small>
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
      <h2 class="box-title ">Relação dos Produtos</h2>
      <!-- <button class="btn bg-purple pull-right" data-toggle="modal" data-target="#modal-produto"><i class="fa fa-plus mr-xs"></i> Adicionar Produto</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-produtos" class="table table-hover table-striped">
        <thead>
          <tr>
            <th class="text-center"><b>*</b></th>
            <!-- <th class="text-center">Código</th> -->
            <th>Descricão</th>
            <th class="text-center">Preço Venda</th>
            <th class="text-center">Estoque</th>
            <th class="text-center">Estoque Mín.</th>
            <!-- <th class="text-center">Data Cadastro</th> -->
            <th class="text-center">Histórico</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody id="body-produtos">
        </tbody>
      </table>
    </div>
    <div class="box-footer">
    </div>
  </div>
</section>



<?php include "modais/addEstoque.php";?>
<?php include "modais/cadProduto.php";?>
<?php include "modais/editProduto.php";?>

<?php  
  include "modais/cadFornecedor.php";
  include "modais/cadCategoria.php";
  include "modais/histProduto.php";
  $arquivosJS = "<script src='assets/js/controle-addEstoque.js'></script>";

?>
