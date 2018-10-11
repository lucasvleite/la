$(document).ready(function () {

  $.ajax({
    url: "pages/api/Inicio.php",
    dataType: 'json',
    success: function (data) {
      if (data[0] == 'error') {
        swal(data[1],'', 'error')
      } else {
        if (data.totalVendas == 0) {
          $("#totalVendas").html("0,00")
        } else {
          $("#totalVendas").html(data.totalVendas.replace(".", ","))
        }
        if (data.quantidadeVendas == 0 || data.quantidadeVendas == 1) {
          $("#quantidadeVendas").html(data.quantidadeVendas + " Venda")
        } else {
          $("#quantidadeVendas").html(data.quantidadeVendas + " Vendas")
        }
        $("#totalProdutos").html(data.totalProdutos)
        $("#totalClientes").html(data.totalClientes)
        $("#totalFornecedores").html(data.totalFornecedores)
      }

    },
    error: function (erro, er) {
      swal({
        type: 'error',
        title: 'Oops...',
        text: "Houve um erro de conexão. Por favor, tente novamente!"
      })
    }
  })
})
