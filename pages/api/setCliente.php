<?php

include ("../../config/config.php");

$nome        = $_POST["nome"];
$cpf         = $_POST["cpf"];
$email       = $_POST["email"];
$tel1        = $_POST["tel1"];
$tel2        = $_POST["tel2"];
$logradouro  = $_POST["logradouro"];
$numero      = $_POST["numero"];
$bairro      = $_POST["bairro"];
$cidade      = $_POST["cidade"];
$estado      = $_POST["estado"];
$cep         = $_POST["cep"];
$inf_adicionais = $_POST["inf_adicionais"];

$idCliente = (isset($_POST["idCliente"])) ? $_POST["idCliente"] : 0;

if($nome == ""){
  echo json_encode(array("error","Campo nome obrigatório!"));
  exit;
}


$query = "nome = '$nome'";

/**********************************************************************************
 * Verificar variáveis e retirar caracteres especiais
 **********************************************************************************/
$query .= ( $cpf == "" )         ? "" : ", cpf_cnpj = '".str_replace(array('.',',','(',')','-','_',' '),"",$cpf) . "'";
$query .= ( $tel1 == "" )        ? "" : ", tel1 = '".str_replace(array('.',',','(',')','-','_',' '),"",$tel1) . "'";
$query .= ( $tel2 == "" )        ? "" : ", tel2 = '".str_replace(array('.',',','(',')','-','_',' '),"",$tel2) . "'";
$query .= ( $cep == "" )         ? "" : ", cep = '" . str_replace('-',"",$cep) . "'";
$query .= ( $email == "" )       ? "" : ", email = '$email'";
$query .= ( $logradouro == "")   ? "" : ", logradouro = '$logradouro'";
$query .= ( $numero == "" )      ? "" : ", numero = '$numero'";
$query .= ( $bairro == "" )      ? "" : ", bairro = '$bairro'";
$query .= ( $cidade == "" )      ? "" : ", cidade = '$cidade'";
$query .= ( $estado == "" )      ? "" : ", estado = '$estado'";
$query .= ( $inf_adicionais=="") ? "" : ", inf_adicionais = '$inf_adicionais'";



/**********************************************************************************
 * Verifica se é UPDATE ou INSERT - Se for 0 é INSERT, senão UPDATE
 **********************************************************************************/
if( $idCliente == 0 ){
  /**********************************************************************************
   * Verifica se há algum nome ou código cadastrado
   **********************************************************************************/
  $queryVerifica = "SELECT * FROM clientes WHERE nome like '%$nome'";

  $resultado = $database->getQuery($queryVerifica);

  foreach( $resultado as $linha ){
    echo json_encode(array("error","O nome $nome já possui cadastro no sistema como $linha[nome]."));
    exit;

  }
  /*===============================================================================*/


  /**********************************************************************************
   * Inserindo os dados
   **********************************************************************************/
  $query = "INSERT INTO clientes SET $query";

  $resultado = $database->runQuery($query);

  if($resultado){
    echo json_encode(array("success","Cadastro de $nome foi efetuado com sucesso!",$resultado));
  } else {
    echo json_encode(array("error","Não foi possível cadastrar $nome neste momento! Erro: ".$resultado));
  }

}
else
{

  /**********************************************************************************
   * Atualizado os dados
   **********************************************************************************/
  $query = "UPDATE clientes SET $query WHERE idCliente = $idCliente";

  $resultado = $database->runQuery($query);

  if($resultado){
    echo json_encode(array("success","Alteração de $nome foi efetuado com sucesso!",$resultado));
  } else {
    echo json_encode(array("error","Não foi possível alterar $nome neste momento! Erro: ".$resultado));
  }

}

?>