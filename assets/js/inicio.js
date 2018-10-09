$(document).ready(function () {

  $.ajax({
    url: "pages/api/Inicio.php",
    dataType: 'json',
    success: function (data) {
      if (data[0] == 'error') {
        swal('Oops...', data[1], 'error')
      } else {
        if (data.quantidadeVendas == 1) {
          $("#quantidadeVendas").html("1 Venda")
        } else {
          $("#quantidadeVendas").html(data.quantidadeVendas + " Vendas")
        }
        $("#totalProdutos").html(data.totalProdutos)
        $("#totalClientes").html(data.totalClientes)
        $("#totalFornecedores").html(data.totalFornecedores)
        $("#totalVendas").html(data.totalVendas.replace(".", ","))
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
