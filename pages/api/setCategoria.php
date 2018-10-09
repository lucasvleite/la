<?php

include ("../../config/config.php");

$descricao    = $_POST["descricaoCategoria"];
$idCategoria  = $_POST["idCategoria"];

if($descricao == ""){
  echo json_encode(array("error","Campo descrição obrigatório!"));
  exit;
}


if($idCategoria == ""){

  /**********************************************************************************
   * Verifica se há algum nome ou código cadastrado
   **********************************************************************************/
  $query = "SELECT * FROM categorias WHERE descricaoCategoria like '%$descricao'";

  $resultado = $database->getQuery($query);

  foreach( $resultado as $linha ){
    echo json_encode(array("error","O produto \"$descricao\" já possui cadastro no sistema como " . $linha['descricaoCategoria']));
    exit;
  }
  /*===============================================================================*/

  $query = "INSERT INTO categorias SET descricaoCategoria = '$descricao'";
  $resultado = $database->runQuery($query);

  $query = "SELECT idCategoria FROM categorias WHERE descricaoCategoria = '$descricao'";
  $resultado2 = $database->getQuery($query);
  foreach( $resultado2 as $linha ){ $retorno = $linha["idCategoria"]; }


  if($resultado > 0){
    echo json_encode(array("success","Cadastro de $descricao foi efetuado com sucesso!",$retorno));
  } else {
    echo json_encode(array("error","Não foi possível cadastrar $descricao neste momento! Erro: ".$resultado));
  }

}
else
{
  $query = "UPDATE categorias SET descricaoCategoria = '$descricao' WHERE idCategoria = $idCategoria";
  $resultado = $database->runQuery($query);

  if($resultado > 0){
    echo json_encode(array("success","Alteração de $descricao foi efetuado com sucesso!",$retorno));
  } else {
    echo json_encode(array("error","Não foi possível alterar $descricao neste momento! Erro: ".$resultado));
  }

}

?>