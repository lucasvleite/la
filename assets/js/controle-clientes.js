function gerarDataTable(idTable) {
  $("#" + idTable).DataTable({
    destroy: true,
    ajax: "pages/api/getClientes.php",
    columns: [
      { "data": "contador" },
      { "data": "nome" },
      { "data": "cpf" },
      { "data": "tel1" },
      { "data": "tel2" },
      { "data": "email" },
      // { "data": "endereco" },
      // { "data": "cep" },
      { "data": "acao" }
    ],
    "columnDefs": [
      { "className": "text-center", "targets": [0, 2, 3, 4, 5, 6] }
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
        $("#inf_adicionais").val(data["info_adicionais"])
      },
      error: function (err) {
        $("#formNovoCliente").find('input').val('')
      }
    })
  } else {
    $("#formNovoCliente").find('input').val('')
  }
})


$(document).ready(function () {
  gerarDataTable("tabela-clientes")


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

  // Submit form Novo Cliente
  $("#formNovoCliente").submit(function (e) {
    e.preventDefault()

    $.ajax({
      url: "pages/api/setCliente.php",
      type: "POST",
      data: $("#formNovoCliente").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data)
        if (data[0] == 'error') {
          swal(data[1],'', 'error')
        } else {
          swal(data[1],'', 'success').then((result) => { location.href = "./home.php?id=cadCliente" })
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