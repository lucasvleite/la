<?php

include ("../../config/config.php");

$cliente          = ( isset($_POST["clientes"]) )       ? $_POST["clientes"] : NULL;
$quantProdutos    = ( isset($_POST["contador"]) )       ? $_POST["contador"] : NULL;
$vetorProdutos    = ( isset($_POST["produtos"]) )       ? $_POST["produtos"] : NULL;
$vetorQuantidade  = ( isset($_POST["quantidade"]) )     ? $_POST["quantidade"] : NULL;
$vetorPreco       = ( isset($_POST["precoUnitario"]) )  ? $_POST["precoUnitario"] : NULL;
$vetorDesconto    = ( isset($_POST["desconto"]) )       ? $_POST["desconto"] : NULL;
$vetorPrecoTotal  = ( isset($_POST["precoTotal"]) )     ? $_POST["precoTotal"] : NULL;
$formaPagamento   = ( isset($_POST["formaPagamento"]) ) ? $_POST["formaPagamento"] : NULL;
$dataVenda        = ( isset($_POST["dataVenda"]) )      ? $_POST["dataVenda"] : NULL;
$porcentDesconto  = ( isset($_POST["inputDesconto"]) )  ? $_POST["inputDesconto"] : NULL;
$valorFinal       = ( isset($_POST["inputTotal"]) )     ? $_POST["inputTotal"] : NULL;

if($quantProdutos == NULL) {
  echo json_encode(array("error","Campos obrigatórios não preenchidos!"));
  exit;
}


$query = "SELECT count(*) as contador FROM vendas";
$resultado = $database->getQuery($query);
$idVenda = 0;
foreach( $resultado as $linha ){
  $idVenda = (int)$linha['contador'] + 1;
}

$queryVenda = "valorVenda = '$valorFinal'";
$queryVenda .= ($cliente == "")         ? "" : ", idCliente = '$cliente'";
$queryVenda .= ($formaPagamento == "")  ? "" : ", formaPagamento = '$formaPagamento'";
$queryVenda .= ($dataVenda == "")       ? "" : ", dataVenda = '" . implode("-",array_reverse(explode("/",$dataVenda))) . "'";
$queryVenda .= ($porcentDesconto == "") ? "" : ", desconto = '" . floatval($porcentDesconto) . "'";


$query = "INSERT INTO vendas SET $queryVenda";
$resultado = $database->runQuery($query);


$queryItens = "";
for($i=0; $i < $quantProdutos; $i++){
  $queryItens .= ", ('$idVenda'";
  $queryItens .= ", '$vetorProdutos[$i]'";
  $queryItens .= ", '$vetorPreco[$i]'";
  $queryItens .= ", '".floatval($vetorDesconto[$i])."'";
  $queryItens .= ", '$vetorQuantidade[$i]')";
}
$queryItens = substr($queryItens, 1);


$queryItens = "INSERT INTO itensVenda (idVenda, idProduto, precoUnitario, desconto, quantidade) VALUES $queryItens";
$resultado2 = $database->runQuery($queryItens);


if( $resultado > 0 ){
  echo json_encode(array("success","A venda foi concluída com sucesso!"));
} else {
  echo json_encode(array("error","Não foi possível efetuar a venda neste momento! Erro: ".$resultado));
}

?>
