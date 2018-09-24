<?php

include ("../../config/config.php");

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post Cliente incorreto!"));
  exit;
}

$idCliente = $_POST['id'];

$query = "SELECT * FROM clientes C WHERE idCliente = $idCliente";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $cpf = ( isset($linha['cpf_cnpj']) ) ? vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($linha['cpf_cnpj'])) : "";
  $contato1 = $linha['tel1'];
  if( strlen($contato1) == 10 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato1)); }
  if( strlen($contato1) == 11 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato1)); }

  $contato2 = $linha['tel2'];
  if( strlen($contato2) == 10 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato2)); }
  if( strlen($contato2) == 11 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato2)); }

  $endereco = "$linha[logradouro], $linha[numero]<br><small>$linha[cidade]-$linha[estado]</small>";

  $retorno =
  [
    "id"              => $idCliente,
    "nome"            => $linha['nome'],
    "cpf"             => $cpf,
    "tel1"            => $contato1,
    "tel2"            => $contato2,
    "email"           => $linha['email'],
    "rua"             => $linha['logradouro'],
    "numero"          => $linha['numero'],
    "bairro"          => $linha['bairro'],
    "cidade"          => $linha['cidade'],
    "estado"          => $linha['estado'],
    "cep"             => $linha['cep'],
    "info_adicionais" => $linha['inf_adicionais'],
    "endereco"        => $endereco
  ];
}

echo json_encode($retorno);

?>