<?php

include ("../../config/config.php");

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post produto incorreto!"));
  exit;
}

$idProduto = $_POST['id'];

$query =
" SELECT P.idProduto, P.codigoProduto, descricaoProduto, categoria, descricaoCategoria, fornecedor, nomeFornecedor, precoVenda, precoUnitario as precoCompra, estoque, estoqueMinimo, dataCompra
  FROM produtos P
  INNER JOIN entradaprodutos E ON E.idProduto = $idProduto
  LEFT JOIN categorias C ON P.categoria = C.idCategoria
  LEFT JOIN fornecedores F ON E.fornecedor = F.idFornecedor
  WHERE P.idProduto = $idProduto
  ORDER BY E.DATE_CREATED DESC
  LIMIT 1
";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
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
    "dataUltCompra" => $linha['dataCompra']
  );
}

echo json_encode($retorno);

?>