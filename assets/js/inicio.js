$(document).ready(function () {

  $.ajax({
    url: "pages/api/Inicio.php",
    dataType: 'json',
    success: function (data) {
      if (data[0] == 'error') {
        swal('Oops...', data[1], 'error')
      } else {
        $("#totalVendas").html((data.totalVendas.toFixed(2)).replace(".", ","))
        $("#quantidadeVendas").html(data.quantidadeVendas + " Vendas")
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
