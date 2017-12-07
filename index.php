<?php
session_start();
require '_app/Config.inc.php';

if (isLoggedIn()){
  header('Location: panel.php');
}
?>
<?php require 'inc/header.php' ?>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="">Email address</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Digite sua senha">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Lembrar Senha</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Entrar">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrar conta!</a>
          <a class="d-block small" href="forgot-password.html">Recuperar senha!</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="_cdn/jquery.min.js"></script>
  <script src="_cdn/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="_cdn/jquery.easing.min.js"></script>
</body>