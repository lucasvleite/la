<?php

include ("../../config/config.php");

// $codigo         = $_POST["codigoFornecedor"];
$nome           = $_POST["nomeFornecedor"];
$cnpj           = $_POST["cnpj"];
$email          = $_POST["email"];
$contato1       = $_POST["contato1"];
$contato2       = $_POST["contato2"];
$inf_adicionais = $_POST["inf_adicionais"];

$idFornecedor = (isset($_POST["idFornecedor"])) ? $_POST["idFornecedor"] : 0;

if($nome == ""){ echo json_encode(array("error","Campo nome obrigatório!")); exit; }


/**********************************************************************************
 * Verifica se é UPDATE ou INSERT - Se for 0 é INSERT, senão UPDATE
 **********************************************************************************/
if( $idFornecedor == 0 ){

  /**********************************************************************************
   * Verifica se há algum nome ou código cadastrado
   **********************************************************************************/
  $query = "SELECT * FROM fornecedores WHERE codigoFornecedor = '$codigo' OR nomeFornecedor like '%$nome%'";

  $resultado = $database->getQuery($query);

  foreach( $resultado as $linha ){
    $verificaN = $linha['nome'];
    $verificaC = $linha['codigo'];

    if ($codigo == $verificaC) {
      echo json_encode(array("error","O código $codigo já possui cadastro no sistema como $verificaN."));
      exit;
    } else {
      echo json_encode(array("error","O nome $nome já possui cadastro no sistema como $verificaN."));
      exit;
    }
  }
  /*===============================================================================*/


  /**********************************************************************************
   * Gera novo código caso não digitou nenhum código
   **********************************************************************************/
  // if($codigo == "ALEATÓRIO"){

    $query = "SELECT count(*) as contador FROM fornecedores WHERE 1";

    $resultado = $database->getQuery($query);

    foreach( $resultado as $linha ){
      $codigo = (int)$linha['contador'] + 1;
    }
  // }
  /*===============================================================================*/

  $insert = "codigoFornecedor = '$codigo', nomeFornecedor = '$nome'";

  /**********************************************************************************
   * Verificar variáveis e retirar caracteres especiais
   **********************************************************************************/
  $insert .= ($cnpj == "")     ? "" : ", cnpj = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$cnpj) . "'";
  $insert .= ($contato1 == "") ? "" : ", contato1 = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$contato1) . "'";
  $insert .= ($contato2 == "") ? "" : ", contato2 = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$contato2) . "'";
  $insert .= ($email == "")    ? "" : ", email = '$email'";
  $insert .= ($inf_adicionais == "")?"":", inf_adicionais = '$inf_adicionais'";
  /*===============================================================================*/


  /**********************************************************************************
   * Inserindo os dados
   **********************************************************************************/
  $query = "INSERT INTO fornecedores SET $insert";
  $resultado = $database->runQuery($query);


  $query = "SELECT idFornecedor FROM fornecedores WHERE codigoFornecedor = '$codigo'";
  $resultado2 = $database->getQuery($query);
  foreach( $resultado2 as $linha ){ $retorno = $linha["idFornecedor"]; }


  if($resultado){
    echo json_encode(array("success","Cadastro de $nome foi efetuado com sucesso!",$retorno));
  } else {
    echo json_encode(array("error","Não foi possível cadastrar $nome neste momento! Erro: ".$retorno));
  }

}
else
{

  $query = "nomeFornecedor = '$nome'";

  /**********************************************************************************
   * Verificar variáveis e retirar caracteres especiais
   **********************************************************************************/
  $query .= ($cnpj == "")     ? "" : ", cnpj = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$cnpj) . "'";
  $query .= ($contato1 == "") ? "" : ", contato1 = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$contato1) . "'";
  $query .= ($contato2 == "") ? "" : ", contato2 = '" . str_replace(array('.',',','(',')','-','_','/',' '),"",$contato2) . "'";
  $query .= ($email == "")    ? "" : ", email = '$email'";
  $query .= ($inf_adicionais == "")?"":", inf_adicionais = '$inf_adicionais'";
  /*===============================================================================*/


  /**********************************************************************************
   * Inserindo os dados
   **********************************************************************************/
  $query = "UPDATE fornecedores SET $query WHERE idFornecedor = $idFornecedor";
  $resultado = $database->runQuery($query);

  if($resultado){
    echo json_encode(array("success","Atualização de $nome foi efetuado com sucesso!"));
  } else {
    echo json_encode(array("error","Não foi possível cadastrar $nome neste momento! Erro: ".$resultado));
  }

}
?>