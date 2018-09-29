<?php

include ("../../config/config.php");

// $codigo       = $_POST["codigoProduto"];
$descricao    = $_POST["descricaoProduto"];
$quantidade   = $_POST["estoque"];
$precoCompra  = $_POST["precoUnitario"];
$precoVenda   = $_POST["precoVenda"];
$dataCompra   = $_POST["dataCompra"];
$fornecedor   = $_POST["fornecedor"];
$categoria    = $_POST["categoria"];

$idProduto = (isset($_POST["idProduto"])) ? $_POST["idProduto"] : 0;


/**********************************************************************************
 * Verifica se é UPDATE ou INSERT - Se for 0 é INSERT, senão UPDATE
 **********************************************************************************/
if( $idProduto == 0 ){
  echo json_encode(array("error","Erro de inserção!<br>Atualize a página e tente novamente"));
} else{

  $queryProduto = "precoVenda = '" . (float)str_replace(",",".",$precoVenda) . "', estoque = estoque + $quantidade";

  $insertEntradaP = "idProduto = '$idProduto', quantidade = '$quantidade', precoUnitario = '$precoCompra'";

  /**********************************************************************************
   * Verificar variáveis, retirar caracteres especiais e convertendo as datas
   **********************************************************************************/
  $insertEntradaP .= ($fornecedor == "") ? "" : ", fornecedor = $fornecedor";
  $insertEntradaP .= ($categoria  == "") ? "" : ", categoria = $categoria";
  $insertEntradaP .= ($dataCompra == "") ? "" : ", dataCompra = '" . implode("-",array_reverse(explode("/",$dataCompra))) . "'";


  /**********************************************************************************
   * Alterando e Inserindo os dados
   **********************************************************************************/
  $query = "UPDATE produtos P SET $queryProduto WHERE idProduto = $idProduto";
  $resultado1 = $database->runQuery($query);

  $query = "INSERT INTO entradaprodutos SET $insertEntradaP";
  $resultado2 = $database->runQuery($query);


  if($resultado1 > 0 && $resultado2 > 0){
    echo json_encode(array("success","$quantidade unidades foram adicionados no estoque de $descricao!"));
  } else {
    echo json_encode(array("error","Não foi possível adicionar $quantidade unidades no estoque de $descricao neste momento! Erro: ".$resultado2));
  }

}

?>