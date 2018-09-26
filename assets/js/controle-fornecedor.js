function gerarDataTable(idTable) {
  $("#" + idTable).DataTable({
    destroy: true,
    ajax: "pages/api/getFornecedores.php",
    columns: [
      { "data": "contador" },
      { "data": "nome" },
      { "data": "cnpj" },
      { "data": "contato1" },
      { "data": "contato2" },
      { "data": "email" },
      { "data": "info_adicionais" },
      { "data": "acao" }
    ],
    "columnDefs": [
      { "className": "text-center", "targets": [0, 2, 3, 4, 5, 7] }
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


$(document).ready(function () {
  gerarDataTable("tabela-fornecedores")

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
      $(this).inputmask('(99) 9999-9999[9]')
    } else {
      $(this).inputmask('(99) 99999-999[9]')
    }
  })


  // Ao fechar modal Fornecedor
  $('#modal-fornecedor').on('hide.bs.modal', function (e) {
    $("#formNovoFornecedor").find('input').val('')
  })

  // Preencher modal Fornecedor
  $('#modal-fornecedor').on('shown.bs.modal', function (e) {
    var idFornecedor = $(e.relatedTarget).data('id')
    if (idFornecedor > 0) {
      $("#idFornecedor").val(idFornecedor)

      $.ajax({
        type: 'post',
        url: 'pages/api/getFornecedor.php',
        data: 'id=' + idFornecedor,
        dataType: 'json',
        success: function (data) {
          $("#nomeFornecedor").val(data["nome"])
          $("#cnpj").val(data["cnpj"])
          $("#email").val(data["email"])
          $("#contato1").val(data["contato1"])
          $("#contato2").val(data["contato2"])
          $("#inf_adicionais").val(data["inf_adicionais"])
        },
        error: function (err) {
          $("#formNovoFornecedor").find('input').val('')
        }
      })
    } else {
      $("#formNovoFornecedor").find('input').val('')
    }
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
          swal('Yes...', data[1], 'success').then((result) => { location.href = "./home.php?id=cadFornecedor" })
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