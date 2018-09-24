<?php

include ("../../config/config.php");

$query = "SELECT * FROM categorias ORDER BY `DATE_CREATED` ASC LIMIT 1000";

$resultado = $database->getQuery($query);

$retorno["data"] = array();

foreach( $resultado as $linha ){
  array_push(
    $retorno["data"],
    [
      "id"        => $linha['idCategoria'],
      "descricao" => $linha['descricaoCategoria']
    ]
  );
}

echo json_encode($retorno);

?>