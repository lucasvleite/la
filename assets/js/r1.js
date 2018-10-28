function gerarTabela() {

  $.ajax({
    type: 'post',
    url: 'reports/api/getVendasDia.php',
    data: $("#filtro").serialize(),
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

$("#data").on("change", function () {
  gerarTabela()
})

$("#formaPagamento").on("change", function () {
  gerarTabela()
})


$(document).ready(function () {
  gerarTabela();

  $('#data').datepicker({
    autoclose: true,
    language: "pt-BR",
    format: "dd/mm/yyyy",
    endDate: "1d"
  })

  $("#impressao").click(function (e) {
    e.preventDefault()
    data = $("#data").val()
    formapagamento = "&formaPagamento="+btoa($("#formaPagamento").val())
    window.open('./reports/api/gerarR1.php?data='+data+formapagamento, '_blank');
  })

})