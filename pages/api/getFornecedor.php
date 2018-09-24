<?php

include ("../../config/config.php");

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post produto incorreto!"));
  exit;
}

$idFornecedor = $_POST['id'];

$query = "SELECT * FROM fornecedores F WHERE F.idFornecedor = $idFornecedor";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $retorno = array(
    "id"              => $idFornecedor,
    "nome"            => $linha['nomeFornecedor'],
    "cnpj"            => $linha['cnpj'],
    "contato1"        => $linha['contato1'],
    "contato2"        => $linha['contato2'],
    "email"           => $linha['email'],
    "info_adicionais" => $linha['inf_adicionais']
  );
}

echo json_encode($retorno);

?>