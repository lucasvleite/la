function gerarDataTable(idTable) {
  $("#" + idTable).DataTable({
    destroy: true,
    ajax: "pages/api/getProdutos.php",
    columns: [
      { "data": "contador" },
      { "data": "descricao" },
      { "data": "precoVenda" },
      { "data": "estoque" },
      { "data": "descCategoria" },
      { "data": "estoqueM" },
      { "data": "acao" }
    ],
    "columnDefs": [
      { "className": "text-center", "targets": [0, 2, 3, 5, 6] }
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


function preencherFornecedores(selected) {
  // Preencher select Fornecedor
  $.ajax({
    type: "POST",
    url: "pages/api/getFornecedores.php",
    data: { codigo: $("#codigoProduto").val() },
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function (obj) {
      if (obj != null) {
        var data = obj.data
        $('#fornecedor').find('option').remove()
        $('#Efornecedor').find('option').remove()

        $('<option>').val("").text("Selecione um Fornecedor").appendTo($('#fornecedor'))
        $('<option>').val("").text("Selecione um Fornecedor").appendTo($('#Efornecedor'))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.nome).appendTo($('#fornecedor'))
          $('<option>').val(d.id).text(d.nome).appendTo($('#Efornecedor'))
        })
      }
      $('#fornecedor').val(selected)
      $('#Efornecedor').val(selected)
    }
  })

}


function preencherCategorias(selected) {
  // Preencher select Categoria
  $.ajax({
    type: "POST",
    url: "pages/api/getCategorias.php",
    data: { codigo: $("#codigoProduto").val() },
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    success: function (obj) {
      if (obj != null) {
        var data = obj.data
        $('#categoriaProduto').find('option').remove()
        $('EcategoriaProduto').find('option').remove()

        $('<option>').val("").text("Selecione uma categoria").appendTo($('#categoriaProduto'))
        $('<option>').val("").text("Selecione uma categoria").appendTo($('#EcategoriaProduto'))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.descricao).appendTo($('#categoriaProduto'))
          $('<option>').val(d.id).text(d.descricao).appendTo($('#EcategoriaProduto'))
        })
      }
      $('#categoriaProduto').val(selected)
      $('#EcategoriaProduto').val(selected)
    }
  })

}


// Preencher modal Edit Produto
$('#modal-editProduto').on('shown.bs.modal', function (e) {
  var idProduto = $(e.relatedTarget).data('id')
  $("#idProduto").val(idProduto)

  $.ajax({
    type: 'post',
    url: 'pages/api/getProduto.php',
    data: 'id=' + idProduto,
    dataType: 'json',
    success: function (data) {
      $("#EcodigoProduto").val(data["codigo"])
      $("#EdescricaoProduto").val(data["descricao"])
      $("#Eestoque").val(data["estoque"])
      $("#EprecoVenda").val(data["precoVenda"])
      $("#Efornecedor").val(data["fornecedor"])
      $("#EestoqueMinimo").val(data["estoqueM"])
      $("#EcategoriaProduto").val(data["categoria"])
    },
    error: function (err) {
      $("#formEditProduto").find('input').val('')
    }
  })
})

// Preencher modal Descarte de Produtos
$('#modal-descarte').on('shown.bs.modal', function (e) {
  var idProduto = $(e.relatedTarget).data('id')
  $("#idProdutoD").val(idProduto)

  $.ajax({
    type: 'post',
    url: 'pages/api/getProduto.php',
    data: 'id=' + idProduto,
    dataType: 'json',
    success: function (data) {
      $("#spanCodigoD").html(data["codigo"])
      $("#spanDescricaoD").html(data["descricao"])
      $("#descricaoD").val(data["descricao"])
      $("#spanEstoqueD").html(data["estoque"])
      $("#spanCategoriaD").html(data["descCategoria"])
      $("#quantidadeD").attr("max", data["estoque"])
    },
    error: function (err) {
      $("#formDescarte").find('input').val('')
    }
  })
})


$(document).ready(function () {
  preencherCategorias("")
  preencherFornecedores("")

  gerarDataTable("tabela-produtos")


  $("#cnpj").inputmask('99.999.999/0001-99')

  $("#contato1").inputmask('(99) 99999-999[9]')
  $('#contato1').blur(function (event) {
    if ($(this).val().length == 14) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $(this).inputmask('(99) 9999-9999[9]')
    } else {
      $(this).inputmask('(99) 99999-999[9]')
    }
  })

  $("#contato2").inputmask('(99) 99999-999[9]')
  $('#contato2').blur(function (event) {
    if ($(this).val().length == 14) { // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $(this).inputmask('(99) 9999-9999[9]');
    } else {
      $(this).inputmask('(99) 99999-999[9]');
    }
  })

  $('#dataCompra, #dataDescarte').datepicker({
    autoclose: true,
    language: "pt-BR",
    format: "dd/mm/yyyy",
    endDate: "1d"
  })

  // Submit Form Fornecedor
  $("#formNovoFornecedor").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setFornecedor.php",
      type: "POST",
      data: $("#formNovoFornecedor").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            preencherFornecedores(data[2])
            $("#formNovoFornecedor").find('input').val('')
            $("#modal-fornecedor").modal("hide")
          })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })

  // Submit Form Categoria
  $("#formNovaCategoria").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCategoria.php",
      type: "POST",
      data: $("#formNovaCategoria").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            preencherCategorias(data[2])
            $("#descricaoCategoria").val("")
            $("#modal-categoria").modal("hide")
          })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })

  // Submit Form Descarte
  $("#formDescarte").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setDescarte.php",
      type: "POST",
      data: $("#formDescarte").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            gerarDataTable("tabela-produtos")
            $("#formDescarte").find('input').val('')
            $("#modal-descarte").modal("hide")
          })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })

  // Submit do Form Produto
  $("#formNovoProduto").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setProduto.php",
      type: "POST",
      data: $("#formNovoProduto").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal('Oops...', data[1], 'error')
        } else {
          swal('Yes...', data[1], 'success').then((result) => {
            $("#formNovoProduto").find('input').val('')
            location.href = "./home.php?id=cadProduto"
          })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })

})
