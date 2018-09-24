<?php

include ("../../config/config.php");

$query = "SELECT * FROM clientes C ORDER BY C.DATE_CREATED ASC LIMIT 1000";

$resultado = $database->getQuery($query);

$retorno["data"] = array();

$contador = 0;

foreach( $resultado as $linha ){
  $contador++;

  $cpf = ( isset($linha['cpf_cnpj']) ) ? vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($linha['cpf_cnpj'])) : "";
  $contato1 = $linha['tel1'];
  if( strlen($contato1) == 10 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato1)); }
  if( strlen($contato1) == 11 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato1)); }

  $contato2 = $linha['tel2'];
  if( strlen($contato2) == 10 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato2)); }
  if( strlen($contato2) == 11 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato2)); }

  $endereco = "$linha[logradouro], $linha[numero]<br><small>$linha[cidade]-$linha[estado]</small>";

  array_push(
    $retorno["data"],
    [
      "id"              => $linha['idCliente'],
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
      "acao"            => "<button class=\"btn btn-xs btn-primary\" data-id='$linha[idCliente]' data-target=\"#modal-cliente\" data-toggle=\"modal\"><i class=\"fa fa-edit mr-xs\"></i>Editar</button>",
      "endereco"        => $endereco,
      "contador"        => $contador
    ]
  );
}

echo json_encode($retorno);

?>