<?php

include ("../../config/config.php");

$query = "SELECT * FROM categorias ORDER BY `DATE_CREATED` ASC LIMIT 1000";

$resultado = $database->getQuery($query);

$contador = 0;
$retorno["data"] = array();

foreach( $resultado as $linha ){
  $contador++;

  array_push(
    $retorno["data"],
    [
      "id"        => $linha['idCategoria'],
      "descricao" => $linha['descricaoCategoria'],
      "acao"      => "<button class=\"btn btn-xs btn-primary\" data-id='$linha[idCategoria]' data-target=\"#modal-editCategoria\" data-toggle=\"modal\"><i class=\"fa fa-edit mr-xs\"></i>Editar</button>",
      "contador"  => $contador
    ]
  );
}

echo json_encode($retorno);

?>