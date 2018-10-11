<?php

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post Venda incorreto!"));
  exit;
}

include ("../../config/config.php");

$idVenda = $_POST['id'];

$query =
" SELECT V.idVenda, V.idCliente, C.nome, V.desconto, V.valorVenda, V.formaPagamento, F.descricao, V.dataVenda
  FROM vendas V
  LEFT JOIN clientes C ON V.idCliente = C.idCliente
  LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
  WHERE V.idVenda = $idVenda AND V.status = 1
";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $aux        = explode(" ",$linha["dataVenda"]);
  $data       = implode("/",array_reverse(explode("-",$aux[0])));

  $retorno = array(
    "id"              => $linha['idVenda'],
    "codigo"          => str_pad($linha['idVenda'], 5, '0', STR_PAD_LEFT),
    "cliente"         => $linha['idCliente'],
    "nome"            => $linha['nome'],
    "desconto"        => str_replace('.',',',$linha['desconto'])."%",
    "total"           => "R$ " . str_replace('.',',',$linha['valorVenda']),
    "idFormaPag"      => $linha['formaPagamento'],
    "formaPagamento"  => utf8_encode($linha["descricao"]),
    "dataVenda"       => $data
  );
}

echo json_encode($retorno);

?>