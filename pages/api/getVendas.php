<?php

include ("../../config/config.php");

$query =
" SELECT V.idVenda, V.idCliente, C.nome, V.desconto, V.valorVenda, V.formaPagamento, F.descricao, F.icone, V.dataVenda
  FROM vendas V
  LEFT JOIN clientes C ON V.idCliente = C.idCliente
  LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
  WHERE V.status = 1
  ORDER BY V.idVenda DESC
  LIMIT 1000
";

$resultado = $database->getQuery($query);

$retorno["data"] = array();
$contador = 0;

foreach( $resultado as $linha ){
  $contador++;

  $aux        = explode(" ",$linha["dataVenda"]);
  $data       = implode("/",array_reverse(explode("-",$aux[0])));

  array_push(
    $retorno["data"],
    [
      "id"              => $linha['idVenda'],
      "codigo"          => str_pad($linha['idVenda'], 5, '0', STR_PAD_LEFT),
      "cliente"         => $linha['idCliente'],
      "nome"            => $linha['nome'],
      "desconto"        => str_replace('.',',',$linha['desconto'])."%",
      "total"           => "R$ " . number_format($linha['valorVenda'],2,",","." ),
      "idFormaPag"      => $linha['formaPagamento'],
      "formaPagamento"  => "<i class=\"fa ".$linha["icone"]." mr-xs\"></i> ".utf8_encode($linha["descricao"]),
      "dataVenda"       => $data,
      // "romaneio"        => "<a href=\"gerarRomaneio.php?id=".base64_encode($linha['idVenda'])."\" target=\"_blank\" class=\"btn btn-xs btn-primary pl-sm pr-sm\"><i class=\"fa fa-print\"> Romaneio</i></a>",
      "acao"            => "<button class=\"btn btn-xs btn-danger pl-sm pr-sm mr-sm mb-sm\" onclick=deletarVenda(".$linha["idVenda"].")><i class=\"fa fa-remove\"> Deletar</i></button>"
                          ."<button class=\"btn btn-xs btn-success pl-sm pr-sm mr-sm mb-sm\" data-id='$linha[idVenda]' data-target=\"#modal-produtos\" data-toggle=\"modal\"><i class=\"fa fa-cubes\"> Produtos</i></button>"
                          ."<a href=\"gerarRomaneio.php?id=".base64_encode($linha['idVenda'])."\" target=\"_blank\" class=\"btn btn-xs btn-primary mb-sm pl-sm pr-sm\"><i class=\"fa fa-print\"> Romaneio</i></a>",
      "contador"        => $contador
    ]
  );

}

echo json_encode($retorno);
?>