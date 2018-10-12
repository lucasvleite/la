<?php

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post produto incorreto!"));
  exit;
}

include ("../../config/config.php");

$idProduto = $_POST['id'];

$query =
" SELECT P.idProduto, P.codigoProduto, descricaoProduto, categoria, descricaoCategoria, fornecedor, nomeFornecedor, precoVenda, precoUnitario as precoCompra, estoque, estoqueMinimo, dataCompra
  FROM produtos P
  INNER JOIN entradaprodutos E ON E.idProduto = '$idProduto'
  LEFT JOIN categorias C ON P.categoria = C.idCategoria
  LEFT JOIN fornecedores F ON E.fornecedor = F.idFornecedor
  WHERE P.idProduto = '$idProduto'
  ORDER BY E.DATE_CREATED DESC
  LIMIT 1
";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $aux        = explode(" ",$linha["dataCompra"]);
  $data       = implode("/",array_reverse(explode("-",$aux[0])));

  $retorno = array(
    "id"            => $idProduto,
    "codigo"        => $linha['codigoProduto'],
    "descricao"     => $linha['descricaoProduto'],
    "categoria"     => $linha['categoria'],
    "descCategoria" => $linha['descricaoCategoria'],
    "fornecedor"    => $linha['fornecedor'],
    "descFornecedor"=> $linha['nomeFornecedor'],
    "precoVenda"    => $linha['precoVenda'],
    "estoqueM"      => $linha['estoqueMinimo'],
    "estoque"       => $linha['estoque'],
    "precoUltCompra"=> $linha['precoCompra'],
    "dataUltCompra" => $data
  );
}

echo json_encode($retorno);

?>