<?php

include ("../../config/config.php");

$idProduto = $_POST["id"];

$query = "SELECT descricaoProduto FROM produtos WHERE idProduto = $idProduto";
$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $descricao = $linha["descricaoProduto"];
}


$query =
" SELECT E.DATE_CREATED, E.quantidade, E.precoUnitario as preco, F.nomeFornecedor as nome, E.dataCompra as 'data', 1 as tipo
  FROM entradaprodutos E
  LEFT JOIN fornecedores F ON F.idFornecedor = E.fornecedor
  WHERE E.idProduto = $idProduto
  UNION
  SELECT I.DATE_CREATED, I.quantidade, I.precoUnitario as preco, C.nome as nome, V.dataVenda as 'data', 2 as tipo
  FROM itensVenda I
  INNER JOIN vendas V ON V.idVenda = I.idVenda
  LEFT JOIN clientes C ON C.idCliente = V.idCliente
  WHERE I.idProduto = $idProduto AND V.status = 1
  UNION
  SELECT D.DATE_CREATED, D.quantidade, 'preco' = NULL, 'nome'=NULL, D.dataDescarte as 'data', 3 as tipo
  FROM itensDesconsiderar D
  WHERE D.idProduto = $idProduto
  ORDER BY DATE_CREATED DESC
";

$resultado = $database->getQuery($query);

$count = 0;
$retorno = "";

foreach( $resultado as $linha ){
  $count++;

  $tipo       = $linha["tipo"];
  $quantidade = $linha["quantidade"];
  $preco      = str_replace(".",",",$linha["preco"]);
  $pessoa     = $linha["nome"];

  $aux        = explode(" ",$linha["data"]);
  $data       = implode("/",array_reverse(explode("-",$aux[0])));

  if ($tipo == 1)
  {
    $retorno .=
    " <tr class=\"bg-info\">
        <td class=\"text-center\">$count</td>
        <td>$descricao</td>
        <td class=\"text-center\">R$ $preco</td>
        <td class=\"text-center\">$quantidade</td>
        <td>$pessoa</td>
        <td class=\"text-center\">$data</td>
        <td class=\"text-center\"><span class=\"label label-primary pl-md pr-md\">Compra</span></td>
      </tr>
    ";
  }
  elseif ($tipo == 2)
  {
    $retorno .=
    " <tr class=\"bg-success align-middle\">
        <td class=\"text-center\">$count</td>
        <td>$descricao</td>
        <td class=\"text-center\">R$ $preco</td>
        <td class=\"text-center\">$quantidade</td>
        <td>$pessoa</td>
        <td class=\"text-center\">$data</td>
        <td class=\"text-center\"><span class=\"label label-success pl-md pr-md\">Venda</span></td>
      </tr>
    ";
  }
  elseif ($tipo == 3)
  {
    $retorno .=
    " <tr class=\"bg-danger\">
        <td class=\"text-center\">$count</td>
        <td>$descricao</td>
        <td class=\"text-center\"> <b>-</b> </td>
        <td class=\"text-center\">$quantidade</td>
        <td>$pessoa</td>
        <td class=\"text-center\">$data</td>
        <td class=\"text-center\"><span class=\"label label-danger pl-md pr-md\">Perda</span></td>
      </tr>
    ";
  }

}


echo ($retorno);

?>