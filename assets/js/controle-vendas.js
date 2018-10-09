function gerarDataTable(idTable) {
  $("#" + idTable).DataTable({
    destroy: true,
    ajax: "pages/api/getVendas.php",
    columns: [
      { "data": "contador" },
      { "data": "codigo" },
      { "data": "nome" },
      { "data": "desconto" },
      { "data": "total" },
      { "data": "formaPagamento" },
      { "data": "dataVenda" },
      { "data": "romaneio" },
      { "data": "acao" }
    ],
    "columnDefs": [
      { "className": "text-center", "targets": [0, 1, 3, 4, 5, 6, 7, 8] }
    ],

    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    // dom: 'Bfrtip',
    // buttons: [{
    //     extend: 'print',
    //     text: "<i class='fa fa-print mr-xs'></i> Tabela"
    // }],
    language: {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
      "sInfoEmpty": "Exibindo 0 até 0 de 0 registros",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Mostrar _MENU_ resultados por página",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
      "sSearch": "<span class='btn btn-sm btn-default pull-right'><i class='glyphicon glyphicon-search'></i></span>",
      "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma crescente",
        "sSortDescending": ": Ordenar colunas de forma decrescente"
      }
    },
  })

  $("#" + idTable).css("width", "100%")

}


function preencherClientes(selected) {
  $.ajax({
    type: "POST",
    url: "pages/api/getClientes.php",
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function (obj) {
      if (obj != null) {
        var data = obj.data
        $('#clientes').find('option').remove()
        $('<option>').val("").text("Selecione um Cliente").appendTo($('#clientes'))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.nome).appendTo($('#clientes'))
        })
      }
      $('#clientes').val(selected)
    }
  })

}


function preencherProdutos(idTable) {
  $.ajax({
    type: "POST",
    url: "pages/api/getProdutos.php",
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function (obj) {
      if (obj != null) {
        var data = obj.data
        $('#' + idTable).find('option').remove()
        $('<option>').val("").text("Selecione um Produto").appendTo($('#' + idTable))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.descProduto).appendTo($('#' + idTable))
        })
      }
    }
  })
}


function calcularValoresFinais() {

  var valorTotal = 0
  $('#produtosSelecionados > tbody  > tr > td > input#precoTotal').each(function () {
    valorTotal += parseFloat($(this).val())
  })

  desconto = $("#inputDesconto").val()
  $("#spanTotal").html("<b>R$ " + ((valorTotal * (1 - desconto / 100)).toFixed(2)).replace(".", ",") + "</b>")
  $("#inputTotal").val((valorTotal * (1 - desconto / 100)).toFixed(2))
}


$("#formaPagamento").on('load change', function () {
  $("#spanPagamento").html('<b>' + $("#formaPagamento option:selected").text() + '</b>');
});

$("#dataVenda").on('load change', function () {
  $("#spanData").html('<b>' + $("#dataVenda").val() + '</b>');
});

$("#inputDesconto").on('load change blur click focusout keypress keydown keyup', function () {
  calcularValoresFinais();
});


// Preencher modal Cliente
$('#modal-cliente').on('shown.bs.modal', function (e) {
  var idCliente = $(e.relatedTarget).data('id')
  if (idCliente > 0) {
    $("#idCliente").val(idCliente)

    $.ajax({
      type: 'post',
      url: 'pages/api/getCliente.php',
      data: 'id=' + idCliente,
      dataType: 'json',
      success: function (data) {
        $("#nome").val(data["nome"])
        $("#cpf").val(data["cpf"])
        $("#email").val(data["email"])
        $("#tel1").val(data["tel1"])
        $("#tel2").val(data["tel2"])
        $("#logradouro").val(data["rua"])
        $("#numero").val(data["numero"])
        $("#bairro").val(data["bairro"])
        $("#cidade").val(data["cidade"])
        $("#estado").val(data["estado"])
        $("#cep").val(data["cep"])
        $("#inf_adicionais").val(data["inf_adicionais"])
      },
      error: function (err) {
        $("#formNovoCliente").find('input').val('')
      }
    })
  } else {
    $("#formNovoCliente").find('input').val('')
  }
})

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


$(document).ready(function () {
  gerarDataTable("tabela-vendas")

  preencherClientes("")

  preencherProdutos("selectProdutos")

  $('#dataVenda').datepicker({
    autoclose: true,
    language: "pt-BR",
    format: "dd/mm/yyyy",
    endDate: "1d"
  })

  $("#cep").inputmask('99999-999', { 'placeholder': '00000-000' })

  $("#tel1").inputmask('(99) 99999-999[9]')
  $('#tel1').blur(function (event) {
    if ($(this).val().length == 14) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $(this).inputmask('(99) 9999-9999[9]')
    } else {
      $(this).inputmask('(99) 99999-999[9]')
    }
  })

  $("#tel2").inputmask('(99) 99999-999[9]')
  $('#tel2').blur(function (event) {
    if ($(this).val().length == 14) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $(this).inputmask('(99) 9999-9999[9]');
    } else {
      $(this).inputmask('(99) 99999-999[9]');
    }
  })

  $("#cpf").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  })
  $("#cpf").on("blur focus keypress keydown change", function () {
    if (valida_cpf_cnpj($(this).val())) {
      $("#cpf").parent().parent().removeClass("has-error").addClass("has-success")
    } else {
      $("#cpf").parent().parent().removeClass("has-success").addClass("has-error")
    }
  })


  // Submit Form Novo Cliente
  $("#formNovoCliente").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCliente.php",
      type: "POST",
      data: $("#formNovoCliente").serialize(),
      dataType: 'json',
      success: function (data) {

        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            preencherClientes(data[2])
            $("#formNovoCliente").find('input').val('')
            $("#modal-cliente").modal("hide")
          })
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


  // Submit Form Venda
  $("#formVenda").submit(function (e) {
    e.preventDefault()
  })

  /**************************************************************************************
   * TABELA DE VENDAS
   **************************************************************************************/
  $("#addProduto").click(function (e) {
    e.preventDefault()

    $("#parteFinal").removeClass("hidden");

    var contador = parseInt($("#contador").val()) + 1
    $("#contador").val(contador)

    var linha = "<tr id=\"" + contador + "\" class=\"animated bounceIn active\">"
      + "  <td class=\"text-center\"><b>" + contador + "</b></td>"
      + "  <td class=\"text-center\"></td>"
      + "  <td class=\"text-left\"><select name=\"produtos[]\" id=\"produtos" + contador + "\" class=\"form-control select2\"></select></td>"
      + "  <td class=\"text-center\"><input type=\"number\" name=\"quantidade[]\" id=\"quantidade\" min=0 class=\"form-control quantidade\" value=0></td>"
      + "  <td class=\"text-center\">R$ 0,00</td>"
      + "  <td class=\"hidden\"><input type=\"hidden\" name=\"precoUnitario[]\" id=\"precoUnitario\" value=0></td>"
      + "  <td class=\"text-center\">R$ 0,00</td>"
      + "  <td class=\"text-center\"><div class=\"input-group\"><input type=\"number\" name=\"desconto[]\" id=\"desconto\" min=0 step=.10 class=\"form-control desconto\" value=0><span class=\"input-group-addon\"> % </span></div></td>"
      + "  <td class=\"text-center\">R$ 0,00</td>"
      + "  <td class=\"text-center\"><button type=\"button\" class=\"btn btn-danger btn-xs excluir\"> <i class=\"fa fa-trash mr-sm\"></i>Excluir</button></td>"
      + "  <td class=\"hidden\"><input type=\"hidden\" name=\"precoTotal[]\" id=\"precoTotal\" value=0></td>"
      + "</tr>"
    $("#bodyProdutos").append(linha)

    var produtos = $("#selectProdutos").html()
    $("#produtos" + contador).html(produtos)
    $(".select2").select2()
  })


  // Preencher ao selecionar um produto
  $("#produtosSelecionados").on("change", ".select2", function (e) {
    var idProduto = $(this).val()
    var linha = (this).closest('tr')

    $.ajax({
      type: 'post',
      url: 'pages/api/getProduto.php',
      data: 'id=' + idProduto,
      dataType: 'json',
      success: function (data) {
        $(linha).find('td').each(function () {
          if (this.cellIndex == 1) {
            $(this).html(data["codigo"])
          }

          if (this.cellIndex == 3) {
            $(this).html("<input type=\"number\" name=\"quantidade[]\" id=\"quantidade\" min=0 max=" + data["estoque"] + " class=\"form-control quantidade\" value=0>")
          }

          if (this.cellIndex == 4) {
            $(this).html("R$ " + (parseFloat(data["precoVenda"]).toFixed(2)).replace(".", ","))
          }

          if (this.cellIndex == 5) {
            $(this).children().val(data["precoVenda"])
          }
        })

      },
      error: function (err) {
        console.log("Error" + err)
      }
    })

  })


  // Preencher ao mudar quantidade
  $("#produtosSelecionados").on("load change blur click focusout keypress keydown keyup", ".quantidade", function (e) {
    var quant = $(this).val()
    var preco = 0
    var desconto = 0

    var linha = (this).closest('tr')
    $(linha).find('td').each(function () {
      if (this.cellIndex == 5) { preco = $(this).children().val() }
      if (this.cellIndex == 6) {
        $(this).html("R$ " + (parseFloat(quant * preco).toFixed(2)).replace(".", ","))
      }
      if (this.cellIndex == 7) {
        desconto = $(this).children().children().val()
      }
      if (this.cellIndex == 8) {
        var precoFinal = parseFloat(quant * preco * (1 - desconto / 100))
        $(this).html("R$ " + (precoFinal.toFixed(2)).replace(".", ","))
      }
      if (this.cellIndex == 10) {
        var precoFinal = parseFloat(quant * preco * (1 - desconto / 100))
        $(this).children().val(precoFinal.toFixed(2))
      }
    })

    calcularValoresFinais()

  })


  // Preencher ao mudar desconto
  $("#produtosSelecionados").on("load change blur click focusout keypress keydown keyup", ".desconto", function (e) {
    var quant = 0
    var preco = 0
    var desconto = $(this).val()

    var linha = (this).closest('tr')
    $(linha).find('td').each(function () {
      if (this.cellIndex == 3) { quant = $(this).children().val() }
      if (this.cellIndex == 5) { preco = $(this).children().val() }
      if (this.cellIndex == 6) {
        $(this).html("R$ " + (parseFloat(quant * preco).toFixed(2)).replace(".", ","))
      }
      if (this.cellIndex == 8) {
        var precoFinal = parseFloat(quant * preco * (1 - desconto / 100))
        $(this).html("R$ " + (precoFinal.toFixed(2)).replace(".", ","))
      }
      if (this.cellIndex == 10) {
        var precoFinal = parseFloat(quant * preco * (1 - desconto / 100))
        $(this).children().val(precoFinal.toFixed(2))
      }
    })

    calcularValoresFinais()

  })


  // Botão de Excluir
  $("#produtosSelecionados").on("click", ".excluir", function (e) {
    $(this).closest('tr').remove()

    $("#contador").val(parseInt($("#contador").val()) - 1)

    count = 0
    $('#produtosSelecionados > tbody  > tr > td').each(function () {
      if (this.cellIndex == 0) {
        count++
        $(this).html("<td class\"text-center\"><b>" + count + "</b></td>")
      }
    })

    count = parseInt($("#contador").val()) - 1
    $("#contador").val(count)


    if (document.getElementById("produtosSelecionados").rows.length == 1) {
      $("#parteFinal").addClass("hidden")
    }

    calcularValoresFinais()

  })


  // Botão Cadastrar Venda
  $("#cadastrarVenda").click(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setVenda.php",
      type: "POST",
      data: $("#formVenda").serialize(),
      dataType: 'json',
      success: function (data) {

        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            gerarDataTable("tabela-vendas")
            $("#bodyProdutos").html("")
            $('#bodyProdutos > tbody  > tr').each(function () {
              $(this).closest('tr').remove()
            })

            $("#formaPagamento").val('')
            $("#clientes").val('')

            $("#parteFinal").addClass("hidden")
            $("#modal-venda").modal("hide")
          })
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


  // $("#modal-venda").modal("show")

})


function deletarVenda(id) {
  $.ajax({
    function(params) {

    }
  })
}