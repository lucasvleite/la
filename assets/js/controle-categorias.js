function gerarDataTable(idTable) {
  $("#" + idTable).DataTable({
    destroy: true,
    ajax: "pages/api/getCategorias.php",
    columns: [
      { "data": "contador" },
      { "data": "id" },
      { "data": "descricao" },
      { "data": "acao" }
    ],
    "columnDefs": [
      { "className": "text-center", "targets": [0, 1, 3] }
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


// Preencher modal editCategoria
$('#modal-editCategoria').on('shown.bs.modal', function (e) {
  var idCategoria = $(e.relatedTarget).data('id')
  if (idCategoria > 0) {
    $("#idCategoria").val(idCategoria)

    $.ajax({
      type: 'post',
      url: 'pages/api/getCategoria.php',
      data: 'id=' + idCategoria,
      dataType: 'json',
      success: function (data) {
        $("#descricaoCategoriaE").val(data["descricao"])
        $("#idCategoria").val(data["id"])
      },
      error: function (err) {
        $("#formEditCategoria").find('input').val('')
      }
    })
  } else {
    $("#formEditCategoria").find('input').val('')
  }
})


$(document).ready(function () {
  gerarDataTable("tabela-categorias")


  $("#formEditCategoria").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCategoria.php",
      type: "POST",
      data: $("#formEditCategoria").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal(data[1],'', 'error')
        } else {
          swal(data[1],'', 'success').then((result) => { location.href = "./home.php?id=cadCategoria" })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })


  $("#formNovaCategoria").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCategoria.php",
      type: "POST",
      data: $("#formNovaCategoria").serialize(),
      dataType: 'json',
      success: function (data) {
        if (data[0] == 'error') {
          swal(data[1],'', 'error')
        } else {
          swal(data[1],'', 'success').then((result) => { location.href = "./home.php?id=cadCategoria" })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })
})
