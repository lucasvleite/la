<?php

include ("../../config/config.php");

// $codigo       = $_POST["codigoProduto"];
$quantidade  = $_POST["quantidade"];
$data        = $_POST["dataDescarte"];
$descricao   = $_POST["descricao"];

$idProduto = (isset($_POST["idProduto"])) ? $_POST["idProduto"] : 0;


/**********************************************************************************
 * Campo obrigatório
 **********************************************************************************/
if( $quantidade > 0 ){

/**********************************************************************************
 * Verifica se é UPDATE ou INSERT - Se for 0 é INSERT, senão UPDATE
 **********************************************************************************/
  if( $idProduto > 0)
  {

    /**********************************************************************************
     * Iserindo os dados
     **********************************************************************************/
    $query  = "idProduto = '$idProduto', quantidade = '$quantidade'";
    $query .= ($data == "") ? "" : ", dataDescarte = '" . implode("-",array_reverse(explode("/",$data))) . "'";

    $query = "INSERT INTO itensDesconsiderar SET $query";
    $resultado = $database->runQuery($query);

    if( $resultado > 0 ){
      echo json_encode(array("success","$quantidade unidades foram desconsideradas no estoque de $descricao!"));
    } else {
      echo json_encode(array("error","Não foi possível desconsiderar $quantidade unidades no estoque de $descricao neste momento! Erro: ".$resultado));
    }
  
  }
  else
  {

    /**********************************************************************************
     * Alterando os dados
     **********************************************************************************/
    $query  = "quantidade = '$quantidade'";
    $query .= ($data == "") ? "" : ", dataDescarte = '" . implode("-",array_reverse(explode("/",$data))) . "'";

    $query = "UPDATE itensDesconsiderar SET $query WHERE idProduto = $idProduto";
    $resultado1 = $database->runQuery($query);


    if($resultado > 0){
      echo json_encode(array("success","$quantidade foram alternos no estoque de $descricao!"));
    } else {
      echo json_encode(array("error","Não foi possível adicionar $quantidade unidades no estoque de $descricao neste momento! Erro: ".$resultado));
    }

  }

}
else
{
  echo json_encode(array("error","Erro no descarte, campo obrigatório não preenchido!<br>Atualize a página e tente novamente"));
}

?>