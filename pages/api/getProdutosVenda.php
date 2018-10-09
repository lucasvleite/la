<?php

if(($_POST['id']) == ""){
  echo json_encode(array("error","Venda produto incorreto!"));
  exit;
}

include ("../../config/config.php");

$idVenda = $_POST['id'];


$query =
" SELECT P.idProduto, P.descricaoProduto, I.precoUnitario, I.desconto, I.quantidade
  FROM itensVenda I
  INNER JOIN produtos P ON P.idProduto = I.idProduto
  WHERE I.idVenda = $idVenda
";

$resultado = $database->getQuery($query);

$retorno = "";
$contador = 0;

foreach( $resultado as $linha ){
  $contador++;

  $descricao  = utf8_encode($linha["descricaoProduto"]);
  $preco      = "R$ ".number_format($linha["precoUnitario"],2,",",".");
  $quantidade = $linha["quantidade"];
  $desconto   = str_replace('.',',',$linha["desconto"]) . "%";
  $subtotal   = "R$ " . number_format( floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]), 2,",","." );
  $total = "R$ ". number_format(floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]) * (1-floatval($linha["desconto"])/100),2,",",".");

  $retorno .=
  " <tr class=\"bg-success\">
      <td class=\"text-center\">$contador</td>
      <td>$descricao</td>
      <td class=\"text-center\">$preco</td>
      <td class=\"text-center\">$quantidade</td>
      <td class=\"text-center\">$subtotal</td>
      <td class=\"text-center\">$desconto</td>
      <td class=\"text-center\">$total</td>
    </tr>
  ";
}

echo $retorno;
?>