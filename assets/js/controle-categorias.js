$(document).ready(function () {
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
          swal('Yes...', data[1], 'success').then((result) => { location.href = "./home.php?id=cadCategoria" })
        }

      },
      error: function (erro, er) {
        swal('Oops...', "Houve um erro de conexão. Por favor, tente novamente!" + erro + "-" + er, 'error')
      }
    })
  })
})