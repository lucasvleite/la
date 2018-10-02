<?php

include ("../../config/config.php");

$query =
" SELECT totalProdutos, quantidadeVendas, totalVendas, totalClientes, totalFornecedores
  FROM
    ( SELECT COUNT(P.idProduto) AS totalProdutos FROM produtos P WHERE P.estoque > 0 ) Pro,
    ( SELECT COUNT(C.idCliente) AS totalClientes FROM clientes C ) Cli,
    ( SELECT COUNT(F.idFornecedor) AS totalFornecedores FROM fornecedores F ) Forn,
    ( SELECT COUNT(V.idVenda) AS quantidadeVendas, SUM(V.valorVenda) AS totalVendas FROM vendas V WHERE V.DATE_CREATED >= CURRENT_DATE ) Ven
";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
  $contador++;

  $retorno =
  [
    "totalProdutos" => $linha[ totalProdutos ],
    "totalClientes" => $linha[ totalClientes ],
    "totalFornecedores" => $linha[ totalFornecedores ],
    "quantidadeVendas" => $linha[ quantidadeVendas ],
    "totalVendas" => isset($linha[totalVendas]) ? $linha[totalVendas] : 0
  ];
}
echo json_encode($retorno);

?>
