<?php
if( !isset($_GET["id"]) ) {
	header("./index.php");
}
else{
	include ("config/config.php");

	$idVenda = base64_decode($_GET["id"]);

	$query = "SELECT "


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
	<style type="text/css">
		@page {}

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

<?php

$totalDesconto = 0;
$totalFinal    = 0;

$query =
"	SELECT V.idCliente, C.nome, C.cpf_cnpj, C.tel1, V.desconto, V.valorVenda, V.formaPagamento, F.descricao, V.dataVenda
	FROM vendas V
	LEFT JOIN clientes C ON V.idCliente = C.idCliente
	LEFT JOIN formapagamento F ON V.formaPagamento = F.idFormaPagamento
	WHERE V.idVenda = $idVenda
";

$resultado = $database->getQuery($query);

foreach( $resultado as $linha ){
	$aux          = explode(" ",$linha["dataVenda"]);
	$data         = implode("/",array_reverse(explode("-",$aux[0])));

	$codCliente 	= $linha["idCliente"];
	$cliente    	= $linha["nome"];
	$totalDesconto= $linha["desconto"];
	$totalFinal   = $linha["valorVenda"];
	$formaPag			= $linha["descricao"];
	$cpf					= $cpf = ( isset($linha['cpf_cnpj']) ) ? vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($linha['cpf_cnpj'])) : "";
	$tel					= $linha['tel1'];
  if( strlen($tel) == 10 ){ $tel = vsprintf("(%s%s) %s%s%s%s-%s%s%s%s", str_split($tel)); }
  if( strlen($tel) == 11 ){ $tel = vsprintf("(%s%s) %s%s%s%s%s-%s%s%s%s", str_split($tel)); }
}

?>

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
						<img style="height:1.556cm;width:4.898cm;margin: 5px 0;" alt="" src="assets/img/LogoLA.png" />
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
						<img style="height:0.39cm;width:0.39cm;" alt="" src="assets/img/whats.png" />
					</span>
				</div>
				<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> </div>
				<!-- Next 'div' was a 'text:p'.-->
				<div class="P1 P1-title"><a href="http://www.facebook.com/pg/LoucurasDaArte" class="Internet_20_link">www.facebook.com/pg/LoucurasDaArte</a>
					<!-- Next ' span' is a draw:frame. -->
					<span style="height:0.379cm;width:0.379cm; padding:0; " class="fr3" id="Figura2">
						<img style="height:0.379cm;width:0.379cm;" alt="" src="assets/img/face.png" />
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
				<p class="P3">Romaneio da Venda <b>#<?php echo str_pad($idVenda, 5, '0', STR_PAD_LEFT); ?></b></p>
			</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:left;width:0.497cm; " class="Tabela1_A1">
				<p class="Text_20_body">Cliente: <?php echo $cliente; ?> </p>
				<?php if( $cpf == "" && $tel == "") {
					echo "<p class=\"Text_20_body\"></p>";
				} else {
					echo "<p class=\"Text_20_body\">" . ($cpf=="") ? "" : "CPF: $cpf" . ($tel=="") ? "" : "   Tel.: $tel" . "</p>";
				} ?>
			</td>
			<td colspan="10" style="text-align:left;width:4.009cm;" class="Tabela1_D1">
				<p class="P1">Documento Emitido</p>
				<p class="P1">05/10/2018 às 11:23</p>
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:left;width:0.497cm; " class="Tabela1_A5">
				<p class="P9"> </p>
			</td>
		</tr>
	</table>

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
		<thead>
			<tr>
				<td style="text-align:left;width:0.497cm; " class="Tabela1_A1">
					<p class="P8">#</p>
				</td>
				<td style="text-align:left;width:1.699cm; " class="Tabela1_A1">
					<p class="P8">Código</p>
				</td>
				<td colspan="3" style="text-align:left;width:3.808cm; " class="Tabela1_A1">
					<p class="P7">Descrição do Produto</p>
				</td>
				<td colspan="2" style="text-align:left;width:0.73cm; " class="Tabela1_A1">
					<p class="P8">Preço</p>
				</td>
				<td style="text-align:left;width:1.79cm; " class="Tabela1_A1">
					<p class="P8">Quant.</p>
				</td>
				<td style="text-align:left;width:2.009cm; " class="Tabela1_A1">
					<p class="P8">Desconto</p>
				</td>
				<td style="text-align:left;width:1.801cm; " class="Tabela1_D1">
					<p class="P8">Total</p>
				</td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10" style="text-align:left;width:0.497cm; " class="Tabela1_A5">
					<p class="P9"> </p>
				</td>
			</tr>
		</tfoot>
		<?php

$query =
" SELECT P.idProduto, P.descricaoProduto, I.precoUnitario, I.desconto, I.quantidade
  FROM itensVenda I
  INNER JOIN produtos P ON P.idProduto = I.idProduto
  WHERE I.idVenda = $idVenda
";

$resultado = $database->getQuery($query);

$retorno   		 = "";
$contador    	 = 0;
$totalValor    = 0;

foreach( $resultado as $linha ){
  $contador++;

	$codigo     = str_pad($linha['idProduto'], 5, '0', STR_PAD_LEFT);
  $produto    = utf8_encode($linha["descricaoProduto"]);
  $preco      = "R$ ".number_format($linha["precoUnitario"],2,",",".");
  $quantidade = $linha["quantidade"];
  $desconto   = str_replace('.',',',$linha["desconto"]) . "%";
  // $subtotal   = "R$ " . number_format( floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]), 2,",","." );
  $total = "R$ ". number_format(floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]) * (1-floatval($linha["desconto"])/100),2,",",".");

echo
" <tr>
		<td style=\"text-align:center;width:0.497cm;\" class=\"Tabela1_A7\">
			<p class=\"P4\">$contador</p>
		</td>
		<td style=\"text-align:center;width:1.699cm;\" class=\"Tabela1_B7\">
			<p class=\"P4\"> </p>
		</td>
		<td colspan=\"3\" style=\"text-align:left;width:3.808cm;\" class=\"Tabela1_C7\">
			<p class=\"P4\">$produto</p>
		</td>
		<td colspan=\"2\" style=\"text-align:center;width:0.73cm;\" class=\"Tabela1_F7\">
			<p class=\"P4\">$preco</p>
		</td>
		<td style=\"text-align:center;width:1.79cm;\" class=\"Tabela1_H7\">
			<p class=\"P4\">$quantidade</p>
		</td>
		<td style=\"text-align:center;width:2.009cm;\" class=\"Tabela1_I7\">
			<p class=\"P4\">$desconto</p>
		</td>
		<td style=\"text-align:center;width:2.801cm;\" class=\"Tabela1_J7\">
			<p class=\"P4\">$total</p>
		</td>
	</tr>";

	$totalValor    += ( floatval($linha["precoUnitario"]) * floatval($linha["quantidade"]) * (0.97-floatval($linha["desconto"])/100) );
}

		?>

		<tr>
			<td style="text-align:left;width:0.497cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td style="text-align:left;width:1.699cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td colspan="3" style="text-align:left;width:3.808cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td colspan="2" style="text-align:left;width:0.73cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td style="text-align:left;width:1.79cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td style="text-align:left;width:2.009cm; " class="Tabela1_A1">
				<p class="P4"> </p>
			</td>
			<td style="text-align:left;width:1.801cm; " class="Tabela1_D1">
				<p class="P4"> </p>
			</td>
    </tr>
	</table>
	<table border="0" cellspacing="0" cellpadding="0" class="Tabela1">
		<colgroup>
				<col width="248" />
				<col width="248" />
				<col width="248" />
		</colgroup>
		<tr>
			<td style="text-align:left;width:5.667cm; " class="Tabela1_A1">
					<p class="P4">Total de Produtos: <b><?php echo $contador; ?></b> </p>
			</td>
			<td style="text-align:left;width:5.667cm; " class="Tabela1_A1">
					<p class="P6">Desconto Final: <b><?php echo str_replace('.',',',$totalDesconto) . "%"; ?></b> </p>
			</td>
			<td style="text-align:left;width:5.667cm; " class="Tabela1_D1">
					<p class="P5">Valor Total: R$ <b><?php echo number_format($totalFinal,2,",",".");?></b> </p>
			</td>
		</tr>
	</table>
	<p class="P1"> </p>
</body>

<script> window.print() </script>

</html>

<?php } ?>