<?php

include ("../../config/config.php");

$query =
" SELECT P.idProduto, P.codigoProduto, descricaoProduto, categoria, descricaoCategoria, precoVenda, estoque, estoqueMinimo
  FROM produtos P
  LEFT JOIN categorias C ON P.categoria = C.idCategoria
  ORDER BY P.DATE_CREATED DESC
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
      "descricao"     => "<button class=\"btn-link\" data-id='$linha[idProduto]' data-target=\"#modal-editProduto\" data-toggle=\"modal\">$linha[descricaoProduto]</button></td>",
      "descProduto"   => "$linha[descricaoProduto]",
      "categoria"     => $linha['categoria'],
      "descCategoria" => $linha['descricaoCategoria'],
      "precoVenda"    => $linha['precoVenda'],
      "estoqueM"      => $linha['estoqueMinimo'],
      "estoque"       => $linha['estoque'],
      "historico"     => "<td class=\"text-center\"><button class=\"btn btn-xs btn-primary pl-sm pr-sm\" data-id='$linha[idProduto]' data-target=\"#modal-historico\" data-toggle=\"modal\"><i class=\"fa fa-history\"> Histórico</i></button></td>",
      "acao"          => "<button class=\"btn btn-xs btn-danger mr-md\" data-id='$linha[idProduto]' data-target=\"#modal-descarte\" data-toggle=\"modal\"><i class=\"fa fa-arrow-circle-down mr-xs\"></i>Descartar</button>".
                         "<button class=\"btn btn-xs btn-success pl-sm pr-sm\" data-id='$linha[idProduto]' data-target=\"#modal-addEstoque\" data-toggle=\"modal\"\"><i class=\"fa fa-plus\"> Adicionar</i></button>",
      "contador"      => $contador
    ]
  );
}
echo json_encode($retorno);

?>