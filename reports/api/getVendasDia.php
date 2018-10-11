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
        P.idProduto, P.codigoProduto, P.descricaoProduto,
        I.precoUnitario, I.desconto, I.quantidade,
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome
    FROM vendas V
    INNER JOIN itensVenda I ON V.idVenda = I.idVenda
    INNER JOIN produtos P ON P.idProduto = I.idProduto
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
    WHERE V.status = 1 AND V.dataVenda = DATE('$data')
    ORDER BY V.idVenda DESC
  ";
} else {
  $query =
  " SELECT
        P.idProduto, P.codigoProduto, P.descricaoProduto,
        I.precoUnitario, I.desconto, I.quantidade,
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome
    FROM vendas V
    INNER JOIN itensVenda I ON V.idVenda = I.idVenda
    INNER JOIN produtos P ON P.idProduto = I.idProduto
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON F.idFormaPagamento = '$formaPagamento'
    WHERE V.status = 1 AND V.dataVenda > DATE('$data') AND V.formaPagamento = '$formaPagamento'
    ORDER BY V.idVenda DESC
  ";
}

$resultado = $database->getQuery($query);

$retorno    = NULL;
$contador   = 0;
$contLinhas = 0;
$anterior   = "";
$atual      = "";

$produtos["codigo"]     = "";
$produtos["descricao"]  = "";
$produtos["preco"]      = "";
$produtos["quantidade"] = "";
$produtos["desconto"]   = "";
$produtos["subtotal"]   = "";
$produtos["total"]      = "";

foreach( $resultado as $linha ){

  if($anterior == $atual) {
    $contLinhas++;

    $descricao  = utf8_encode($linha["descricaoProduto"]);
    $preco      = "R$ ".number_format($linha["precoUnitario"],2,",",".");
    $quantidade = $linha["quantidade"];
    $desconto   = str_replace('.',',',$linha["desconto"]) . "%";
    $subtotal   = "R$ " . number_format( floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]), 2,",","." );
    $total      = "R$ ". number_format(floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]) * (1-floatval($linha["desconto"])/100),2,",",".");

    $produtos["codigo"]     .= $linha['codigoProduto'] . "<br>";
    $produtos["descricao"]  .= $descricao . "<br>";
    $produtos["preco"]      .= $preco . "<br>";
    $produtos["quantidade"] .= $quantidade . "<br>";
    $produtos["desconto"]   .= $desconto . "<br>";
    $produtos["subtotal"]   .= $subtotal . "<br>";
    $produtos["total"]      .= $total . "<br>";

  }
  else
  {
    $aux        = explode(" ",$linha["dataVenda"]);
    $dataVenda  = implode("/",array_reverse(explode("-",$aux[0])));
    $codigo     = str_pad($linha['idVenda'], 5, '0', STR_PAD_LEFT);
    $icone      = utf8_encode($linha['icone']);
    $formaPgto  = mb_check_encoding($linha['descricaoPgto']);
    $cliente    = utf8_encode($linha['nome']);
    $desconto   = str_replace('.',',',$linha["descontoLoja"]) . "%";
    $total      = "R$ ". number_format(floatval($linha["valorVenda"]), 2,",","." );

    $retorno .= "<tr>".
    "<td rowspan=$contLinhas class='text-center vertical-center'>Venda <strong>#$codigo</strong><br><i class='fa $icone'></i> $formaPgto</td>";

    foreach ($produtos as $produto) {
      $retorno .=
      " <td>".substr_replace($produtos["descricao"],-4)."</td>".
      " <td class='text-center'>".substr_replace($produtos["preco"],-4)."</td>".
      " <td class='text-center'>".substr_replace($produtos["quantidade"],-4)."</td>".
      " <td class='text-center'>".substr_replace($produtos["subtotal"],-4)."</td>".
      " <td class='text-center'>".substr_replace($produtos["desconto"],-4)."</td>".
      " <td class='text-center'>".substr_replace($produtos["total"],-4)."</td>";
    }

    $retorno .=
    " <tr class='info-venda'>".
    "   <td colspan=2><b>".(($cliente == "") ? ("Cliente: ". $cliente) : "")."</b></td>".
    "   <td class='text-center' colspan=2><b>".(($dataVenda == "") ? ("Data: ". $dataVenda) : "")."</b></td>".
    "   <td class='text-center'><b>$desconto</b></td>".
    "   <td class='text-center'><b>$total</b></td>".
    " </tr>".
    " <tr><td colspan=7 class='active'></td></tr>";

      $produtos["codigo"]     = "";
      $produtos["descricao"]  = "";
      $produtos["preco"]      = "";
      $produtos["quantidade"] = "";
      $produtos["desconto"]   = "";
      $produtos["subtotal"]   = "";
      $produtos["total"]      = "";

  }

  $contLinhas = 0;

  $atual = $linha['idVenda'];
  $anterior = $atual;

}

if($retorno == "") {
  echo "<tr><td colspan=7 class='text-center'>NÃO ENCONTRAMOS NENHUM DADO DE VENDAS NO SISTEMA PARA $data</td></tr>";
} else {
  echo json_encode($retorno);
}

?>