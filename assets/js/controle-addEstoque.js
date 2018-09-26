function gerarDataTable() {
  $("#tabela-produtos").DataTable().destroy()
  $.ajax({
    url: "pages/api/getEstoque.php",
    dataType: 'html',
    success: function (data) {
      $("#body-produtos").html(data)
      $("#tabela-produtos").DataTable({
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
        }
      })
      $("#tabela-produtos").css("width", "100%")
    }
  })

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
        $('#fornecedorE').find('option').remove()
        $('#Efornecedor').find('option').remove()

        $('<option>').val("").text("Selecione um Fornecedor").appendTo($('#fornecedor'))
        $('<option>').val("").text("Selecione um Fornecedor").appendTo($('#fornecedorE'))
        $('<option>').val("").text("Selecione um Fornecedor").appendTo($('#Efornecedor'))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.nome).appendTo($('#fornecedor'))
          $('<option>').val(d.id).text(d.nome).appendTo($('#fornecedorE'))
          $('<option>').val(d.id).text(d.nome).appendTo($('#Efornecedor'))
        })
      }
      $('#fornecedor').val(selected)
      $('#fornecedorE').val(selected)
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
        $('#categoriaProdutoE').find('option').remove()
        $('#EcategoriaProduto').find('option').remove()

        $('<option>').val("").text("Selecione uma categoria").appendTo($('#categoriaProduto'))
        $('<option>').val("").text("Selecione uma categoria").appendTo($('#categoriaProdutoE'))
        $('<option>').val("").text("Selecione uma categoria").appendTo($('#EcategoriaProduto'))

        $.each(data, function (i, d) {
          $('<option>').val(d.id).text(d.descricao).appendTo($('#categoriaProduto'))
          $('<option>').val(d.id).text(d.descricao).appendTo($('#categoriaProdutoE'))
          $('<option>').val(d.id).text(d.descricao).appendTo($('#EcategoriaProduto'))
        })
      }
      $('#categoriaProduto').val(selected)
      $('#categoriaProdutoE').val(selected)
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

// Preencher modal Estoque
$('#modal-addEstoque').on('shown.bs.modal', function (e) {
  var idProduto = $(e.relatedTarget).data('id')
  $("#idProdutoE").val(idProduto)

  $.ajax({
    type: 'post',
    url: 'pages/api/getProduto.php',
    data: 'id=' + idProduto,
    dataType: 'json',
    success: function (data) {
      $("#codigoProdutoE").val(data["codigo"])
      $("#spanCodigo").html(data["codigo"])

      $("#descricaoProdutoE").val(data["descricao"])
      $("#spanDescricao").html(data["descricao"])

      // $("#estoqueE").val(data["estoque"])
      // $("#precoUnitarioE").val(data["precoCompra"])
      $("#precoVendaE").val(data["precoVenda"])
      // $("#dataCompraE").val(data["dataCompra"])
      $("#fornecedorE").val(data["fornecedor"])
      $("#categoriaProdutoE").val(data["categoria"])
    },
    error: function (err) {
      $("#formEstoque").find('input').val('');
    }
  })
})

// Preencher modal Historico
$('#modal-historico').on('shown.bs.modal', function (e) {
  var idProduto = $(e.relatedTarget).data('id')
  $.ajax({
    type: 'post',
    url: 'pages/api/getHistProduto.php',
    data: 'id=' + idProduto,
    dataType: 'html',
    success: function (data) {
      $("#body-historico").html(data)
    },
    error: function (err) {
      console.log(err)
      $("#body-historico").html("")
    }
  })
})
//Fechar modal Historico
$('#modal-historico').on('hide.bs.modal', function () {
  $("#body-historico").html("")
})



$(document).ready(function () {

  gerarDataTable()
  preencherFornecedores("")
  preencherCategorias("")

  $('#dataCompra, #dataCompraE').datepicker({
    autoclose: true,
    language: "pt-BR",
    format: "dd/mm/yyyy",
    endDate: "1d"
  })


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


  // Submit do Form Fornecedor
  $("#formNovoFornecedor").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setFornecedor.php",
      type: "POST",
      data: $("#formNovoFornecedor").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal({
            type: 'error',
            title: 'Oops...',
            text: data[1]
          })
        } else {
          swal({
            type: 'success',
            title: 'Yes...',
            text: data[1]
          }).then(function () {
            preencherFornecedores(data[2])
            $("#formNovoFornecedor").find('input').val('')
            $("#modal-fornecedor").modal("hide")
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

  // Submit do Form Novo Produto
  $("#formNovoProduto").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setProduto.php",
      type: "POST",
      data: $("#formNovoProduto").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data)
        if (data[0] == 'error') {
          swal({
            type: 'error',
            title: 'Oops...',
            text: data[1]
          })
        } else {
          swal({
            type: 'success',
            title: 'Yes...',
            text: data[1]
          }).then(function () {
            gerarDataTable()
            $("#formNovoProduto").find('input').val('')
            $("#modal-produto").modal("hide")
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

  // Submit do Form EditProduto
  $("#formEditProduto").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setProduto.php",
      type: "POST",
      data: $("#formEditProduto").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data)
        if (data[0] == 'error') {
          swal({
            type: 'error',
            title: 'Oops...',
            text: data[1]
          })
        } else {
          swal({
            type: 'success',
            title: 'Yes...',
            text: data[1]
          }).then(function () {
            gerarDataTable()
            $("#formNovoProduto").find('input').val('')
            $("#modal-editProduto").modal("hide")
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

  // submit Form Categoria
  $("#formNovaCategoria").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCategoria.php",
      type: "POST",
      data: $("#formNovaCategoria").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data)
        if (data[0] == 'error') {
          swal({
            type: 'error',
            title: 'Oops...',
            text: data[1]
          })
        } else {
          swal({
            type: 'success',
            title: 'Yes...',
            text: data[1]
          }).then(function (e) {
            preencherCategorias(data[2])
            $("#descricaoCategoria").val('')
            $("#modal-categoria").modal("hide")
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

  // Submit do Form Estoque
  $("#formEstoque").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setAddEstoque.php",
      type: "POST",
      data: $("#formEstoque").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal({
            type: 'error',
            title: 'Oops...',
            text: data[1]
          })
        } else {
          swal({
            type: 'success',
            title: 'Yes...',
            text: data[1]
          }).then(function (result) {
            gerarDataTable()
            $("#formEstoque").find('input').val('')
            $("#modal-addEstoque").modal("hide")
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

})
