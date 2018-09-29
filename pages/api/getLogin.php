<?php

$login  = $_POST['login'];
$senha  = $_POST['senha'];

if( empty($login) || empty($senha) ) {
  echo json_encode(array("error","Login ou senha inválidos.<br>Por favor, tente novamente!"));
}
else
{
  include("../../config/config.php");

  session_start();

  // if(strpos($login,"@")) {
  //   $query = "SELECT * FROM users WHERE email like %$login%";
  // } else {
  //   $query = "SELECT * FROM users WHERE phone like %$login%";
  // }

  $query = "SELECT * FROM users WHERE users.login LIKE '$login' AND users.senha LIKE '$senha'";

  $resultado = $database->getQuery($query);

  $logado = false;
  foreach( $resultado as $linha ){
    $_SESSION['user'] = $linha['login'];
    $logado = true;
  }


  // if( isset($_SESSION['user']) ){
  if( $logado ){
    echo json_encode(array("success","Sucesso"));
  } else {
    unset($_SESSION['user']);
    echo json_encode(array("error","Result: ".print_r($resultado)));
  }
}