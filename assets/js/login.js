$("#form_login").submit(function (e) {
  e.preventDefault()

  $.ajax({
    url: "pages/api/getLogin.php",
    type: "POST",
    data: $("#form_login").serialize(),
    dataType: 'json',
    success: function (data) {
      console.log(data)
      if (data[0] == 'error') {
        // mostrar o erro

      } else {
        window.location.href = 'home.php';
      }

    },
    error: function (erro, er) {
      console.log(erro + err)
    }
  })
})
