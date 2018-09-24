<?php //header("Location:home.php"); exit; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal de Inscrições Concursos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/css/AdminLTE.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="./assets/css/bootstrap-datepicker.min.css">
  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" type="text/css" href="./assets/css/sweetalert2.min.css">
  <!-- My Style -->
  <link rel="stylesheet" href="assets/css/myStyle.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="wrapper">

<div class="login-box">
  <div class="login bg-clean">
    <div class="text-center pt-sm">
      <a target="_blank" href="#"><img src="<?php echo $path['imagens']; ?>logo.jpg" alt="Logo Instituição" height="90%" width="90%"></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body bg-clean">

      <form id="form_login" action="#" method="post" enctype="multipart/form-date" class="mb-md">
        <div class="form-group has-feedback">
          <input id="login" name="login" type="username" class="form-control" placeholder="email ou telefone">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="senha" name="senha" type="password" class="form-control" placeholder="senha">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <input type="hidden" name="nav" id="nav">
        <div class="row">
          <div class="col-sm-12 text-center">
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Acessar">Acessar</button>
          </div>
        </div>
      </form>

      <!-- <button class="btn-link" data-toggle="modal" data-target="#modal-esqueci-senha" id="esqueci-senha">Esqueceu sua senha?</button> -->
      
      <br>

    </div>
    <!-- /.login-box-body -->

  </div>

  <!-- <div class="text-center mt-md">
    <p>Não possui cadastro? <br>
    <a target="_blank" href="cadastro.html"><button type="button" class="btn btn-lg bg-blue-active"> Solicite acesso agora</button></a>
    </p>
  </div> -->

</div>
<!-- /.login-box -->

</div>


<!-- SUCESSO -->
<div  class="modal fade" id="modal-esqueci-senha">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-green">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Recuperação de senha</h3>
      </div>
      <form method="post" class="form-group" id="form-senha">
        <div class="modal-body">
          <div class="row text-center">
            <h4>Informe seu email ou CPF que lhe enviaremos um email com a senha.</h4><br>
            <div class="col-sm-8 col-sm-offset-2">
              <div class="form-group has-feedback">
                <input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF ou e-mail" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-default mr-md" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Enviar Senha</button>
        </div>
      </form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- jQuery 3 -->
<script src="./assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./assets/js/bootstrap.min.js"></script>            
<!-- Sweet Alert 2 -->
<script src="./assets/js/sweetalert2.all.min.js"></script>
<script src="./assets/js/login.js"></script>
</body>
</html>
