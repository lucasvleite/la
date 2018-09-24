<?php

include ("../../config/config.php");

$query = "SELECT * FROM fornecedores F ORDER BY F.DATE_CREATED ASC LIMIT 1000";

$resultado = $database->getQuery($query);

$retorno["data"] = array();

$contador = 0;

foreach( $resultado as $linha ){
  $contador++;

  $cnpj = ( isset($linha['cnpj']) ) ? vsprintf("%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s", str_split($linha['cnpj'])) : "";
  $contato1 = $linha['contato1'];
  if( strlen($contato1) == 10 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato1)); }
  if( strlen($contato1) == 11 ){ $contato1 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato1)); }

  $contato2 = $linha['contato2'];
  if( strlen($contato2) == 10 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($contato2)); }
  if( strlen($contato2) == 11 ){ $contato2 = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($contato2)); }


  array_push(
    $retorno["data"],
    [
      "id"              => $linha['idFornecedor'],
      "nome"            => $linha['nomeFornecedor'],
      "cnpj"            => $cnpj,
      "contato1"        => $contato1,
      "contato2"        => $contato2,
      "email"           => $linha['email'],
      "info_adicionais" => $linha['inf_adicionais'],
      "acao"            => "<button class=\"btn btn-xs btn-primary\" data-id='$linha[idFornecedor]' data-target=\"#modal-fornecedor\" data-toggle=\"modal\"><i class=\"fa fa-edit mr-xs\"></i>Editar</button>",
      "contador"        => $contador
    ]
  );
}

echo json_encode($retorno);

?>