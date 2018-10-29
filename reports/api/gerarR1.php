<?php

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

if( !isset($_GET["data"]) ){
  echo json_encode(array("error","Post Data incorreto!"));
}else{
	include ("../../config/config.php");

  $dataFormatada = $_GET['data'];
  $data = implode("-",array_reverse(explode("/",$dataFormatada)));

  $formaPagamento = (isset($_GET["formaPagamento"])) ? base64_decode($_GET["formaPagamento"]) : 0;


	if($formaPagamento == 0){
		$query =
		"	SELECT * FROM
			(	SELECT COUNT(V.idVenda) as contDinheiro, SUM(V.valorVenda) as totalDinheiro FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 1
			) V1,
			(	SELECT COUNT(V.idVenda) as contCredito, SUM(V.valorVenda) as totalCredito FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 2
			) V2,
			(	SELECT COUNT(V.idVenda) as contDebito, SUM(V.valorVenda) as totalDebito FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 3
			) V3,
			(	SELECT COUNT(V.idVenda) as contCheque, SUM(V.valorVenda) as totalCheque FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 4
			) V4,
			(	SELECT COUNT(V.idVenda) as contBoleto, SUM(V.valorVenda) as totalBoleto FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 5
			) V5,
			(	SELECT COUNT(V.idVenda) as contOutro, SUM(V.valorVenda) as totalOutro FROM vendas V
				WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = 6
			) V6
		";
	} else {
		$query =
		"	SELECT COUNT(V.idVenda) as contador, SUM(V.valorVenda) as total, F.descricao, F.icone
			FROM vendas V,
			(	SELECT descricao, icone FROM formapagamento FP WHERE FP.idFormaPagamento = '$formaPagamento' ) F
			WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = '$formaPagamento'
		";
	}

	$resultado = $database->getQuery($query);

	$infPagamentos = "";

		foreach( $resultado as $linha ){
			if($formaPagamento == 0) {
				$infPagamentos .= ($linha["totalDinheiro"] == NULL) ? "" : "<i class=\"fa fa-money mr-xs\"></i>Dinheiro: <b>R$ " . number_format($linha["totalDinheiro"], 2,",","." )
					. "</b> em " . ( $linha["contDinheiro"] == 1 ? "1 venda" : $linha["contDinheiro"]." vendas") .".<br>";
				$infPagamentos .= ($linha["totalCredito"] == NULL) 	? "" : "<i class=\"fa fa-credit-card-alt mr-xs\"></i>Cartão de Crédito: <b>R$ " . number_format($linha["totalCredito"], 2,",","." )
					. "</b> em " . ( $linha["contCredito"] == 1 ? "1 venda" : $linha["contCredito"]." vendas") .".<br>";
				$infPagamentos .= ($linha["totalDebito"] == NULL) ? "" : "<i class=\"fa fa-fa-credit-card mr-xs\"></i>Cartão de Débito: <b>R$ " . number_format($linha["totalDebito"], 2,",","." )
					. "</b> em " . ( $linha["contDebito"] == 1 ? "1 venda" : $linha["contDebito"]." vendas") .".<br>";
				$infPagamentos .= ($linha["totalCheque"] == NULL) ? "" : "<i class=\"fa fa-cc mr-xs\"></i>Cheque: <b>R$ " . number_format($linha["totalCheque"], 2,",","." )
					. "</b> em " . ( $linha["contCheque"] == 1 ? "1 venda" : $linha["contCheque"]." vendas") .".<br>";
				$infPagamentos .= ($linha["totalBoleto"] == NULL) ? "" : "<i class=\"fa fa-barcode mr-xs\"></i>Boleto Bancário: <b>R$ " . number_format($linha["totalBoleto"], 2,",","." )
					. "</b> em " . ( $linha["contBoleto"] == 1 ? "1 venda" : $linha["contBoleto"]." vendas") .".<br>";
				$infPagamentos .= ($linha["totalOutro"] == NULL) ? "" : "<i class=\"fa fa-usd mr-xs\"></i>Outro: <b>R$ " . number_format($linha["totalOutro"], 2,",","." )
					. "</b> em " . ( $linha["contOutro"] == 1 ? "1 venda" : $linha["contOutro"]." vendas") .".<br>";

			} else {
				$infPagamentos .= ($linha["total"] == NULL) ? "" : "<i class=\"fa ".$linha["icone"]." mr-xs\"></i>".$linha["descricao"].": <b>R$ " . number_format($linha["total"], 2,",","." )
					. "</b> em " . ( $linha["contador"] == 1 ? "1 venda" : $linha["contador"]." vendas") .".<br>";
			}
		}

?>

<xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0//EN" "http://www.w3.org/Math/DTD/mathml2/xhtml-math11-f.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--This file was converted to xhtml by LibreOffice - see http://cgit.freedesktop.org/libreoffice/core/tree/filter/source/xslt for the code.-->

<head profile="http://dublincore.org/documents/dcmi-terms/">
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<title xml:lang="pt-BR"> -= Loucuras da Arte =- </title>
	<meta name="DCTERMS.title" content="" xml:lang="en-US" />
	<meta name="DCTERMS.language" content="en-US" scheme="DCTERMS.RFC4646" />
	<meta name="DCTERMS.source" content="http://xml.openoffice.org/odf2xhtml" />
	<meta name="DCTERMS.issued" content="2018-10-07T16:07:25.250369922" scheme="DCTERMS.W3CDTF" />
	<meta name="DCTERMS.modified" content="2018-10-07T18:10:52.700003827" scheme="DCTERMS.W3CDTF" />
	<meta name="DCTERMS.provenance" content="" xml:lang="en-US" />
	<meta name="DCTERMS.subject" content="," xml:lang="en-US" />
	<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" hreflang="en" />
	<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" hreflang="en" />
	<link rel="schema.DCTYPE" href="http://purl.org/dc/dcmitype/" hreflang="en" />
  <link rel="schema.DCAM" href="http://purl.org/dc/dcam/" hreflang="en" />
	<link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/css/myStyle.css">

	<style type="text/css">
		@page {}

    .border-black{
      border: 1px solid #0c0c0c !important;
    }
    
		#tabela-vendas {
			width: 20.003cm;
			float: none;
		}


		table {
			border-collapse: collapse;
			border-spacing: 0;
			empty-cells: show
		}

		td,
		th {
			vertical-align: top;
			font-size: 12pt;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			clear: both;
		}

		ol,
		ul {
			margin: 0;
			padding: 0;
		}

		li {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		/* "li span.odfLiEnd" - IE 7 issue*/
		li span {
			clear: both;
			line-height: 0;
			width: 0;
			height: 0;
			margin: 0;
			padding: 0;
		}

		span.footnodeNumber {
			padding-right: 1em;
		}

		span.annotation_style_by_filter {
			font-size: 95%;
			font-family: Arial;
			background-color: #fff000;
			margin: 0;
			border: 0;
			padding: 0;
		}

		span.heading_numbering {
			margin-right: 0.8rem;
		}

		* {
			margin: 0;
		}

		.fr1 {
			font-size: 12pt;
			font-family: Liberation Serif;
			text-align: center;
			vertical-align: top;
		}

		.fr2 {
			font-size: 12pt;
			font-family: Liberation Serif;
			vertical-align: top;
		}

		.fr3 {
			font-size: 12pt;
			font-family: Liberation Serif;
			text-align: center;
			vertical-align: top;
		}

		.P1 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
		}

		.P1-title {
			line-height: 135% ! important;
		}

		.P10 {
			font-size: 6pt;
			font-family: Liberation Serif;
			writing-mode: page;
			margin-top: 0cm;
			margin-bottom: 0cm;
			line-height: 100%;
		}

		.P2 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: Georgia;
			writing-mode: page;
			text-align: center ! important;
		}

		.P3_borderStart {
			font-size: 12pt;
			line-height: 115%;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
			font-weight: normal;
			background-color: #cccccc;
			padding-bottom: 0.049cm;
			border-bottom-style: none;
		}

		.P3 {
			font-size: 12pt;
			line-height: 115%;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
			font-weight: normal;
			background-color: #cccccc;
			padding-bottom: 0.049cm;
			padding-top: 0cm;
			border-top-style: none;
			border-bottom-style: none;
		}

		.P3_borderEnd {
			font-size: 12pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
			font-weight: normal;
			background-color: #cccccc;
			padding-top: 0cm;
			border-top-style: none;
		}

		.P4 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
		}

		.P5 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: right ! important;
		}

		.P6 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
		}

		.P7 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			font-weight: bold;
		}

		.P8 {
			font-size: 11pt;
			line-height: 115%;
			margin-bottom: 0.049cm;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			text-align: center ! important;
			font-weight: bold;
		}

		.P9_borderStart {
			font-size: 6pt;
			line-height: 100%;
			margin-top: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			background-color: #eeeeee;
			padding-bottom: 0cm;
			border-bottom-style: none;
		}

		.P9 {
			font-size: 6pt;
			line-height: 100%;
			font-family: FreeSans;
			writing-mode: page;
			background-color: #eeeeee;
			padding-bottom: 0cm;
			padding-top: 0cm;
			border-top-style: none;
			border-bottom-style: none;
		}

		.P9_borderEnd {
			font-size: 6pt;
			line-height: 100%;
			margin-bottom: 0cm;
			font-family: FreeSans;
			writing-mode: page;
			background-color: #eeeeee;
			padding-top: 0cm;
			border-top-style: none;
		}

		.Standard {
			font-size: 12pt;
			font-family: Liberation Serif;
			writing-mode: page;
		}

		.Text_20_body {
			font-size: 11pt;
			font-family: FreeSans;
			writing-mode: page;
			margin-top: 0cm;
			margin-bottom: 0.049cm;
			line-height: 115%;
		}

		.Tabela1 {
			width: 20.003cm;
			float: none;
		}

		.Tabela1_A1 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-width: thin;
			border-top-style: solid;
			border-top-color: #000000;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A10 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A2 {
			padding: 0.097cm;
			border-left-style: none;
			border-right-style: none;
			border-top-width: thin;
			border-top-style: solid;
			border-top-color: #000000;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A3 {
			background-color: #cccccc;
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-width: thin;
			border-right-style: solid;
			border-right-color: #000000;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A5 {
			background-color: #eeeeee;
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-width: thin;
			border-right-style: solid;
			border-right-color: #000000;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_B7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_C7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_D1 {
			padding: 0.097cm;
			border-width: thin;
			border-style: solid;
			border-color: #000000;
		}

		.Tabela1_E10 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_F7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_G10 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-width: thin;
			border-right-style: solid;
			border-right-color: #000000;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_H7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_I7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-style: none;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_J7 {
			padding: 0.097cm;
			border-left-width: thin;
			border-left-style: solid;
			border-left-color: #000000;
			border-right-width: thin;
			border-right-style: solid;
			border-right-color: #000000;
			border-top-style: none;
			border-bottom-width: thin;
			border-bottom-style: solid;
			border-bottom-color: #000000;
		}

		.Tabela1_A {
			width: 0.497cm;
		}

		.Tabela1_B {
			width: 1.699cm;
		}

		.Tabela1_C {
			width: 3.808cm;
		}

		.Tabela1_D {
			width: 0.661cm;
		}

		.Tabela1_E {
			width: 5.937cm;
		}

		.Tabela1_F {
			width: 0.73cm;
		}

		.Tabela1_G {
			width: 1.069cm;
		}

		.Tabela1_H {
			width: 1.79cm;
		}

		.Tabela1_I {
			width: 2.009cm;
		}

		.Tabela1_J {
			width: 1.801cm;
		}

		.Internet_20_link {
			color: #000080;
			text-decoration: underline;
		}

		/* ODF styles with no properties representable as CSS */
		.Endnote_20_Symbol .Footnote_20_Symbol {}
	</style>
</head>

<body dir="ltr" style="max-width:21.001cm;margin-top:1cm; margin-bottom:1cm; margin-left:0.499cm; margin-right:0.499cm; background-color:transparent; ">
	<table border="0" cellspacing="0" cellpadding="0" class="Tabela1">
		<colgroup>
			<col width="22" />
			<col width="74" />
			<col width="166" />
			<col width="29" />
			<col width="259" />
			<col width="32" />
			<col width="47" />
			<col width="78" />
			<col width="88" />
			<col width="79" />
		</colgroup>
		<tr>
			<td colspan="3" style="text-align:left;" class="Tabela1_A1">
				<!-- Next 'div' was a 'text:p'.-->
				<div class="P1">
					<!-- Next' span' is a draw:frame. -->
					<span style="height:1.556cm;width:4.898cm; padding:0;" class="fr1" id="Figura1">
						<img style="height:1.556cm;width:4.898cm;margin: 5px 0;" alt="" src="../../assets/img/LogoLA.png" />
					</span>
				</div>
				<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				<p class="P2">Venda de artefatos diversos de madeira MDF</p>
			</td>
			<td colspan="7" style="text-align:left;" class="Tabela1_D1">
				<!-- Next 'div' was a 'text:p'.-->
				<div class="P1 P1-title">Tel.: (35) 99804-7317 e (35) 99225-4907
					<!-- Next ' span' is a draw:frame. -->
					<span style="height:0.39cm;width:0.39cm; padding:0; " class="fr2" id="Figura3">
						<img style="height:0.39cm;width:0.39cm;" alt="" src="../../assets/img/whats.png" />
					</span>
				</div>
				<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				<!-- Next 'div' was a 'text:p'.-->
				<div class="P1 P1-title"><a href="http://www.facebook.com/pg/LoucurasDaArte" class="Internet_20_link">www.facebook.com/pg/LoucurasDaArte</a>
					<!-- Next ' span' is a draw:frame. -->
					<span style="height:0.379cm;width:0.379cm; padding:0; " class="fr3" id="Figura2">
						<img style="height:0.379cm;width:0.379cm;" alt="" src="../../assets/img/face.png" />
					</span>
				</div>
				<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				<p class="P1 P1-title">Rua 7 de setembro 50A, Centro – Perdões/MG</p>
				<p class="P1 P1-title">CEP: 37260-000 – Brasil</p>
				<p class="P1 P1-title">CNPJ: 17.736.405/0001-95</p>
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:left;width:0.497cm; " class="Tabela1_A2">
				<p class="P10"> </p>
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:left;width:0.497cm; " class="Tabela1_A3">
				<p class="P3">Romaneio de Vendas - <b><?php echo $dataFormatada . ( $formaPagamento==0 ?"":" - <i class=\"fa ".$linha["icone"]." mr-xs\"></i>".$linha["descricao"]); ?></b></p>
			</td>
		</tr>
    <tr>
			<td colspan="8" style="text-align:left;width:0.497cm; " class="Tabela1_A1">
				<p class="Text_20_body"><?php echo $infPagamentos; ?></p>
			</td>
			<td colspan="10" style="text-align:left;width:4.009cm;" class="Tabela1_D1">
				<p class="P1">Documento Emitido</p>
				<p class="P1"><?php echo date("d/m/Y")." às ".date("H:m"); ?></p>
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:left;width:0.497cm; " class="Tabela1_A5">
				<p class="P9"> </p>
			</td>
		</tr>
	</table>

	<table border=0 cellspacing="0" cellpadding="0" class="Tabela1"">
    <thead>
      <tr class="active">
        <th class="text-center Tabela1_A1" width="20%">Venda</th>
        <th width="30%" class="Tabela1_A1">Produto</th>
        <th class="text-center Tabela1_A1" width="10%">Preço</th>
        <th class="text-center Tabela1_A1" width="10%">Quantidade</th>
        <th class="text-center Tabela1_A1" width="10%">Subtotal</th>
        <th class="text-center Tabela1_A1" width="10%">Desconto</th>
        <th class="text-center Tabela1_D1" width="10%">Total</th>
      </tr>
    </thead>

    <tbody>

		<?php

if( $formaPagamento == 0 ) {
  $query =
  " SELECT
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome as nome
    FROM vendas V
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
    WHERE V.status = 1 AND V.dataVenda = DATE('$data')
    ORDER BY V.idVenda ASC
  ";
} else {
  $query =
  " SELECT
        V.idVenda, V.dataVenda, V.valorVenda, V.desconto as descontoLoja, 
        F.idFormaPagamento, F.descricao as descricaoPgto, F.icone,
        C.idCliente, C.nome as nome
    FROM vendas V
    LEFT JOIN clientes C ON V.idCliente = C.idCliente
    LEFT JOIN formapagamento F ON F.idFormaPagamento = '$formaPagamento'
    WHERE V.status = 1 AND V.dataVenda = DATE('$data') AND V.formaPagamento = '$formaPagamento'
    ORDER BY V.idVenda ASC
  ";
}  

$resultado = $database->getQuery($query);

foreach ($resultado as $linha) {
  $idVenda = $linha['idVenda'];

  $produtos["codigo"]     = "";
  $produtos["descricao"]  = "";
  $produtos["preco"]      = "";
  $produtos["quantidade"] = "";
  $produtos["desconto"]   = "";
  $produtos["subtotal"]   = "";
  $produtos["total"]      = "";

  $query2 =
  " SELECT P.idProduto, P.codigoProduto, P.descricaoProduto, I.precoUnitario, I.desconto, I.quantidade
    FROM itensVenda I
    INNER JOIN produtos P ON P.idProduto = I.idProduto
    WHERE I.idVenda='$idVenda'
  ";

  $resultado2 = $database->getQuery($query2);

	$contador = 0;
	$totalSubTotal=0;

  foreach ($resultado2 as $linha2) {
    $contador++;

    $descricao    = utf8_encode($linha2["descricaoProduto"]);
    $preco        = "R$ " . number_format($linha2["precoUnitario"],2,",",".");
    $quantidade   = $linha2["quantidade"];
    $desconto     = (isset($linha2["desconto"])) ? number_format(floatval($linha2["desconto"]), 2,",","." ) . "%" : "0%";
    $subtotal     = "R$ " . number_format(floatval($linha2["precoUnitario"]) * floatval($linha2["quantidade"]), 2,",","." );
    $total        = "R$ " . number_format( (floatval($linha2["precoUnitario"]) * floatval($linha2["quantidade"]) * (1-floatval($linha2["desconto"])/100)), 2,",",".");

		$totalSubTotal += floatval($linha2["precoUnitario"]) * floatval($linha2["quantidade"]) * (1-floatval($linha2["desconto"])/100);

    $produtos["codigo"]     .= $linha2['codigoProduto'] . "<br>";
    $produtos["descricao"]  .= $descricao . "<br>";
    $produtos["preco"]      .= $preco . "<br>";
    $produtos["quantidade"] .= $quantidade . "<br>";
    $produtos["desconto"]   .= $desconto . "<br>";
    $produtos["subtotal"]   .= $subtotal . "<br>";
    $produtos["total"]      .= $total . "<br>";

  }

  $aux            = explode(" ",$linha["dataVenda"]);
  $dataVenda      = implode("/",array_reverse(explode("-",$aux[0])));
  $idVenda        = $linha['idVenda'];
  $codigo         = str_pad($linha['idVenda'], 5, '0', STR_PAD_LEFT);
  $icone          = utf8_encode($linha['icone']);
  $formaPgto      = utf8_encode($linha['descricaoPgto']);
  $cliente        = utf8_encode($linha['nome']);
  $descontoVenda  = number_format(floatval($linha["descontoLoja"]), 2,",","." ) . "%";
  $totalVenda     = "R$ ". number_format(floatval($linha["valorVenda"]), 2,",","." );

  /* *********************************************************************************************
  * Montando as linhas da tabela
  ************************************************************************************************/

  echo
  " <tr>
      <td rowspan=2 class='text-center vertical-center Tabela1_A1'>Venda <b>#$codigo</b><br><i class='fa $icone'></i> $formaPgto</td>
      <td class='Tabela1_A1'>".substr($produtos["descricao"],0,-4)."</td>
      <td class='text-center Tabela1_A1'><p class=\"P1\">".substr($produtos["preco"],0,-4)."</p></td>
      <td class='text-center Tabela1_A1'><p class=\"P1\">".substr($produtos["quantidade"],0,-4)."</p></td>
      <td class='text-center Tabela1_A1'><p class=\"P1\">".substr($produtos["subtotal"],0,-4)."</p></td>
      <td class='text-center Tabela1_A1'><p class=\"P1\">".substr($produtos["desconto"],0,-4)."</p></td>
      <td class='text-center Tabela1_D1'><p class=\"P1\">".substr($produtos["total"],0,-4)."</p></td>
    </tr>
    <tr class='info-venda'>
      <td colspan=2 class=' Tabela1_A1'><p class=\"P4\">".(($cliente == "") ? "" : ("Cliente: <b>". $cliente) )."</b></p></td>
      <td class='text-center Tabela1_A1' colspan=2><p class=\"P1\">SubTotal: <b>R$ ".number_format($totalSubTotal, 2,",","." )."</b></p></td>
      <td class='text-center Tabela1_A1'><p class=\"P1\"><b>$descontoVenda</b></p></td>
      <td class='text-center Tabela1_D1'><p class=\"P1\"><b>$totalVenda</b></p></td>
    </tr>
    <tr><td colspan=7 class='Tabela1_A5'><p class=\"P9\">&nbsp;</p></td></tr>
  ";

}
		?>

    </tbody>
  </table>
</body>

<!-- <script> window.print() </script> -->

</html>

<?php } ?>