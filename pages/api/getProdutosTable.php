<?php

include ("../../config/config.php");

$query = "SELECT * FROM produtos ORDER BY produtos.DATE_CREATED DESC LIMIT 1000";

$resultado = $database->getQuery($query);

$count = 0;
$retorno = "";

foreach( $resultado as $linha ){
  $count++;

  // $aux = explode(" ",$linha[DATE_CREATED]);
  // $data = implode("/",array_reverse(explode("-",$aux[0]))) . "<br><small>".$aux[1]."</small>";

  $retorno .=
  "<tr>
    <td class=\"text-center\">$count</td>
    <td><button class=\"btn-link\" data-id='$linha[idProduto]' data-target=\"#modal-editProduto\" data-toggle=\"modal\">$linha[descricaoProduto]</button></td>
    <td class=\"text-center\">R$ ".str_replace(".",",",$linha['precoVenda'])."</td>
    <td class=\"text-center\">$linha[estoque]</td>
    <td class=\"text-center\">$linha[estoqueMinimo]</td>

    <td class=\"text-center\"><button class=\"btn btn-xs btn-primary pl-sm pr-sm\" data-id='$linha[idProduto]' data-target=\"#modal-historico\" data-toggle=\"modal\"><i class=\"fa fa-history\"> Histórico</i></button></td>
    <td class=\"text-center\"><button class=\"btn btn-xs btn-success pl-sm pr-sm\" data-id='$linha[idProduto]' data-target=\"#modal-addEstoque\" data-toggle=\"modal\"\"><i class=\"fa fa-plus\"> Adicionar</i></button></td>
  </tr>";


  // array_push(
  //   $retorno[data],
  //   [
  //     "contador"    => $count,
  //     "codigo"      => $linha['codigoProduto'],
  //     "descricao"   => $linha['descricaoProduto'],
  //     "quantidade"  => $linha['estoque'],
  //     "precoVenda"  => $linha['precoVenda'],
  //     "estoque"     => $linha['estoqueMinimo'],
  //     "button"      => "<button type=\"button\" class=\"btn btn-sm btn-success\"><i class=\"fa fa-plus\"></i> Add</button>"

  //     // "estoqueMinimo" => $linha['estoqueMinimo'],

  //   ]
  // );
}

echo ($retorno);

?>