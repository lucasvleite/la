<?php

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post Categoria incorreto!"));
  exit;
}

include ("../../config/config.php");

$id = $_POST["id"];

$query = "SELECT * FROM categorias WHERE idCategoria = $id";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $retorno=
  [
    "id"        => $linha['idCategoria'],
    "descricao" => $linha['descricaoCategoria'],
  ];
}

echo json_encode($retorno);

?>