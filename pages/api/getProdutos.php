<?php

include ("../../config/config.php");

$query =
" SELECT P.idProduto, P.codigoProduto, descricaoProduto, categoria, descricaoCategoria, fornecedor, nomeFornecedor, precoVenda, precoUnitario as precoCompra, estoque, estoqueMinimo, dataCompra
  FROM produtos P
  INNER JOIN entradaprodutos E ON E.idProduto = P.idProduto
  LEFT JOIN categorias C ON P.categoria = C.idCategoria
  LEFT JOIN fornecedores F ON E.fornecedor = F.idFornecedor
  ORDER BY E.DATE_CREATED DESC
  LIMIT 1000
";

$resultado = $database->getQuery($query);

$retorno["data"] = array();


foreach( $resultado as $linha ){
  $contador++;

  array_push(
    $retorno["data"],
    [
      "id"            => $linha['idProduto'],
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
      "dataUltCompra" => $linha['dataCompra'],
      "acao"          => "<button class=\"btn btn-xs btn-danger mr-md\" data-id='$linha[idProduto]' data-target=\"#modal-descarte\" data-toggle=\"modal\"><i class=\"fa fa-arrow-circle-down mr-xs\"></i>Descartar</button>".
                         "<button class=\"btn btn-xs btn-primary\" data-id='$linha[idProduto]' data-target=\"#modal-editProduto\" data-toggle=\"modal\"><i class=\"fa fa-edit mr-xs\"></i>Editar</button>",
      "contador"      => $contador
    ]
  );
}

echo json_encode($retorno);

?>