<?php

include ("../../config/config.php");

// $codigo       = $_POST["codigoProduto"];
$descricao    = (isset($_POST["descricaoProduto"])) ? $_POST["descricaoProduto"] : NULL;
$quantidade   = (isset($_POST["estoque"])) ? $_POST["estoque"] : NULL;
$precoCompra  = (isset($_POST["precoUnitario"])) ? $_POST["precoUnitario"] : NULL;
$precoVenda   = (isset($_POST["precoVenda"])) ? $_POST["precoVenda"] : NULL;
$dataCompra   = (isset($_POST["dataCompra"])) ? $_POST["dataCompra"] : NULL;
$fornecedor   = (isset($_POST["fornecedor"])) ? $_POST["fornecedor"] : NULL;
$estoqueM     = (isset($_POST["estoqueMinimo"])) ? $_POST["estoqueMinimo"] : NULL;
$categoria    = (isset($_POST["categoriaProduto"])) ? $_POST["categoriaProduto"] : NULL;

$idProduto = (isset($_POST["idProduto"])) ? $_POST["idProduto"] : 0;


/**********************************************************************************
 * Verifica se é UPDATE ou INSERT - Se for 0 é INSERT, senão UPDATE
 **********************************************************************************/
if( $idProduto == 0 ){
  if ( $descricao == "" || $quantidade == 0 || $precoCompra == 0 || $precoVenda == 0){
    echo json_encode(array("error","Campos obrigatórios não preenchidos!"));
    exit;
  }

  /**********************************************************************************
   * Gera novo código ////caso não digitou nenhum código
   **********************************************************************************/
  // if($codigo == "ALEATÓRIO"){

    $query = "SELECT count(*) as contador FROM `produtos` WHERE 1";

    $resultado = $database->getQuery($query);

    foreach( $resultado as $linha ){
      $codigo = (int)$linha['contador'] + 1;
    }
  // }
  /*===============================================================================*/


  /**********************************************************************************
   * Verifica se há algum nome ou código cadastrado
   **********************************************************************************/
  $query = "SELECT * FROM produtos WHERE codigoProduto = '$codigo' OR idProduto = '$codigo' OR descricaoProduto like '%$descricao'";

  $resultado = $database->getQuery($query);

  foreach( $resultado as $linha ){
    $verificaC = $linha['codigoProduto'];
    $verificaD = $linha['descricaoProduto'];

    if ($codigo == $verificaC) {
      echo json_encode(array("error","O produto de código $codigo já possui cadastro no sistema como $verificaD."));
      exit;
    }else{
      echo json_encode(array("error","O produto \"$descricao\" já possui cadastro no sistema como $verificaD."));
      exit;
    }
  }
  /*===============================================================================*/


  $insertP = "codigoProduto = '$codigo', descricaoProduto = '$descricao', precoVenda = '" .
      (float)str_replace(",",".",$precoVenda) . "', estoque = '$quantidade', disponivel = 1";

  $insertEntradaP = "idProduto = '$codigo', codigoProduto = '$codigo', quantidade = '$quantidade', precoUnitario = '$precoCompra'";

  /**********************************************************************************
   * Verificar variáveis, retirar caracteres especiais e convertendo as datas
   **********************************************************************************/
  $insertP .= ($categoria == "") ? "" : ", categoria = '$categoria'";
  $insertP .= ($estoqueM  == "") ? "" : ", estoqueMinimo = " . (int)$estoqueM;

  $insertEntradaP .= ($fornecedor == "") ? "" : ", fornecedor = $fornecedor";
  $insertEntradaP .= ($dataCompra == "") ? "" : ", dataCompra = '" . implode("-",array_reverse(explode("/",$dataCompra))) . "'";


  /**********************************************************************************
   * Inserindo os dados
   **********************************************************************************/

  $query = "INSERT INTO produtos SET $insertP";
  $resultado1 = $database->runQuery($query);


  $query = "INSERT INTO entradaprodutos SET $insertEntradaP";
  $resultado2 = $database->runQuery($query);


  if($resultado1 > 0 && $resultado2 > 0){
    echo json_encode(array("success","Cadastro de $descricao foi efetuado com sucesso!"));
  } else {
    echo json_encode(array("error","Não foi possível cadastrar $descricao neste momento! Erro: ".$retorno));
  }

}
else
{
  if ( $descricao == "" || $precoVenda == 0){
    echo json_encode(array("error","Campos obrigatórios não preenchidos!"));
    exit;
  }


  /**********************************************************************************
   * Gera novo código caso digitou ALEATÓRIO
   **********************************************************************************
  if($codigo == "ALEATÓRIO"){

    $query = "SELECT count(*) as contador FROM `produtos` WHERE 1";

    $resultado = $database->getQuery($query);

    foreach( $resultado as $linha ){
      $codigo = (int)$linha['contador'] + 1;
    }
  }
  /*===============================================================================*/

  $query = "descricaoProduto = '$descricao', precoVenda = '" . (float)str_replace(",",".",$precoVenda) . "'";

  $query .= ($estoqueM  == "") ? "" : ", estoqueMinimo = " . (int)$estoqueM;
  $query .= ($categoria == "") ? "" : ", categoria = '$categoria'";


  /**********************************************************************************
   * Inserindo ou Alterando os dados
   **********************************************************************************/

  $query = "UPDATE produtos SET $query WHERE idProduto = $idProduto";
  $resultado = $database->runQuery($query);

  if( $resultado > 0 ){
    echo json_encode(array("success","Alteração de $descricao foi efetuado com sucesso!"));
  } else {
    echo json_encode(array("error","Não foi possível alterar $descricao neste momento!"));
  }
}

?>