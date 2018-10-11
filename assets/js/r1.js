function gerarTabela() {
  console.log()
  $.ajax({
    type: 'post',
    url: 'reports/api/getVendasDia.php',
    data: { "data": $("#data").val(), "formaPagamento": $("#formaPagamento").val() },
    dataType: 'html',
    success: function (data) {
      $("#body-vendas").html(data)
    },
    error: function (err) {
      console.log(err)
      $("#body-vendas").html("")
    }
  })
}


// Preencher modal ProdutosVenda
$('#modal-produtos').on('shown.bs.modal', function (e) {
  var idVenda = $(e.relatedTarget).data('id')
  $.ajax({
    type: 'post',
    url: 'pages/api/getProdutosVenda.php',
    data: 'id=' + idVenda,
    dataType: 'html',
    success: function (data) {
      $("#body-produtosVenda").html(data)
    },
    error: function (err) {
      console.log(err)
      $("#body-produtosVenda").html("")
    }
  })
})
//Fechar modal ProdutosVenda
$('#modal-produtos').on('hide.bs.modal', function () {
  $("#body-produtosVenda").html("")
})

$("#data").on("change", function () {
  gerarTabela()
})

$("#formaPagamento").on("change", function () {
  gerarTabela()
})


$(document).ready(function () {
  // gerarDataTable("tabela-vendas")
  gerarTabela();

  $('#data').datepicker({
    autoclose: true,
    language: "pt-BR",
    format: "dd/mm/yyyy",
    endDate: "1d"
  })

})