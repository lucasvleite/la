<?php

if(($_POST['id']) == ""){
  echo json_encode(array("error","Post Venda incorreto!"));
  exit;
}

include ("../../config/config.php");

$idVenda = $_POST['id'];


$query = "DELETE FROM itensVenda WHERE idVenda = $idVenda";
$resultado1 = $database->getQuery($query);

$query = "UPDATE vendas V SET V.status = 2 WHERE idVenda = $idVenda";
$resultado2 = $database->getQuery($query);


if($resultado1 > 0 && $resultado2 > 0){
  echo json_encode(array("success","A venda '$id' foi excluída com sucesso!"));
} else {
  echo json_encode(array("error","Não foi possível excluir a venda $id! Erro: ".$resultado));
}

?>