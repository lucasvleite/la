<?php

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

if(($_POST['data']) == ""){
  echo json_encode(array("error","Post Data incorreto!"));
  exit;
}

include ("../../config/config.php");

$data = $_POST['data'];
$data = implode("-",array_reverse(explode("/",$data)));

$formaPagamento = $_POST["formaPagamento"];

if( $formaPagamento == 0 ) {
  $query =
  " SELECT
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome as nome
    FROM vendas V
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
    WHERE V.status = 1 AND V.dataVenda = DATE('$data')
    ORDER BY V.idVenda DESC
  ";
} else {
  $query =
  " SELECT
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome as nome
    FROM vendas V
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON F.idFormaPagamento = '$formaPagamento'
    WHERE V.status = 1 AND V.dataVenda > DATE('$data') AND V.formaPagamento = '$formaPagamento'
    ORDER BY V.idVenda DESC
  ";
}


$resultado = $database->getQuery($query);

$retorno = "";

foreach ($resultado as $linha) {
  $idVenda = $linha['idVenda'];

  $produtos["codigo"]     = "";
  $produtos["descricao"]  = "";
  $produtos["preco"]      = "";
  $produtos["quantidade"] = "";
  $produtos["desconto"]   = "";
  $produtos["subtotal"]   = "";
  $produtos["total"]      = "";

  $query2 =
  " SELECT P.idProduto, P.codigoProduto, P.descricaoProduto, I.precoUnitario, I.desconto, I.quantidade
    FROM itensVenda I
    INNER JOIN produtos P ON P.idProduto = I.idProduto
    WHERE I.idVenda='$idVenda'
  ";

  $resultado2 = $database->getQuery($query2);

  $contador = 0;

  foreach ($resultado2 as $linha2) {
    $contador++;

    $descricao    = utf8_encode($linha2["descricaoProduto"]);
    $preco        = "R$ " . number_format($linha2["precoUnitario"],2,",",".");
    $quantidade   = $linha2["quantidade"];
    $desconto     = (isset($linha2["desconto"])) ? number_format(floatval($linha2["desconto"]), 2,",","." ) . "%" : "0%";
    $subtotal     = "R$ " . number_format(floatval($linha2["precoUnitario"]) * floatval($linha2["quantidade"]), 2,",","." );
    $total        = "R$ " . number_format( floatval($linha2["precoUnitario"]) * floatval($linha2["quantidade"]) * (1-floatval($linha2["desconto"])/100), 2,",",".");

    $produtos["codigo"]     .= $linha2['codigoProduto'] . "<br>";
    $produtos["descricao"]  .= $descricao . "<br>";
    $produtos["preco"]      .= $preco . "<br>";
    $produtos["quantidade"] .= $quantidade . "<br>";
    $produtos["desconto"]   .= $desconto . "<br>";
    $produtos["subtotal"]   .= $subtotal . "<br>";
    $produtos["total"]      .= $total . "<br>";

  }

  $aux            = explode(" ",$linha["dataVenda"]);
  $dataVenda      = implode("/",array_reverse(explode("-",$aux[0])));
  $idVenda        = $linha['idVenda'];
  $codigo         = str_pad($linha['idVenda'], 5, '0', STR_PAD_LEFT);
  $icone          = utf8_encode($linha['icone']);
  $formaPgto      = utf8_encode($linha['descricaoPgto']);
  $cliente        = utf8_encode($linha['nome']);
  $descontoVenda  = number_format(floatval($linha["descontoLoja"]), 2,",","." ) . "%";
  $totalVenda     = "R$ ". number_format(floatval($linha["valorVenda"]), 2,",","." );

  /* *********************************************************************************************
  * Montando as linhas da tabela
  ************************************************************************************************/

  $retorno .= 
  " <tr>
      <td rowspan=2 class='text-center vertical-center'>Venda <b>#$codigo</b><br><i class='fa $icone'></i> $formaPgto</td>
      <td>".substr($produtos["descricao"],0,-4)."</td>
      <td class='text-center'>".substr($produtos["preco"],0,-4)."</td>
      <td class='text-center'>".substr($produtos["quantidade"],0,-4)."</td>
      <td class='text-center'>".substr($produtos["subtotal"],0,-4)."</td>
      <td class='text-center'>".substr($produtos["desconto"],0,-4)."</td>
      <td class='text-center'>".substr($produtos["total"],-0,4)."</td>
    </tr>
    <tr class='info-venda'>
      <td colspan=2><b>".(($cliente == "") ? "" : ("Cliente: ". $cliente) )."</b></td>
      <td class='text-center' colspan=2><b>".(($dataVenda == "") ? "" : ("Data: ". $dataVenda) )."</b></td>
      <td class='text-center'><b>$descontoVenda</b></td>
      <td class='text-center'><b>$totalVenda</b></td>
    </tr>
    <tr><td colspan=7 class='active'></td></tr>
  ";

}


if($retorno == "") {
  echo "<tr><td colspan=7 class='text-center'>NÃO ENCONTRAMOS NENHUM DADO DE VENDAS NO SISTEMA PARA $data</td></tr>";
} else {
  echo $retorno;
}

?>