<?php

// // A sessão precisa ser iniciada em cada página diferente
// if (!isset($_SESSION)) session_start();

// // Verifica se não há a variável da sessão que identifica o usuário
// if (!isset($_SESSION['user'])) {
//   // Destrói a sessão por segurança
//   session_destroy();
//   // Redireciona o visitante de volta pro login
//   header("Location: login.php"); exit;
// }

include("include/top.php");

if(isset($_GET["id"])){
  $pagina = $_GET["id"];

  if ( $pagina == "page1" )         { include("pages/inicio.php"); }
  if ( $pagina == "addEstoque" )    { include("pages/cadProduto.php"); }
  if ( $pagina == "cadCategoria" )  { include("pages/cadCategoria.php"); }
  if ( $pagina == "cadCliente" )    { include("pages/cadCliente.php"); }
  if ( $pagina == "cadFornecedor" ) { include("pages/cadFornecedor.php"); }
  if ( $pagina == "vendas" )        { include("pages/cadVenda.php"); }

  if ( $pagina == "r1" )            { include("reports/listaVendasDia.php"); }

}
else
{
  include("pages/inicio.php");
}

include("include/footer.php");
