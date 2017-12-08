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
            <label for="">E-mail</label>
            <input class="form-control" id="email" name="email" type="email" required="required" placeholder="Digite seu e-mail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input class="form-control" id="password" required="required" name="password" type="password" placeholder="Digite sua senha">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Entrar">
        </form>
    </div>
    </div>
  </div>
</body>