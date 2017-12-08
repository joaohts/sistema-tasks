<?php 
session_start();
require '_app/Config.inc.php';

$PDO = db_connect();
      //Pega quantidade de funcionários e exibe na tela.
      $sql_count = "SELECT COUNT(*) AS total FROM tasks ORDER BY name ASC";
      // SQL para selecionar os registros
      $sql = "SELECT id, name, description FROM tasks ORDER BY name ASC";
      // conta o total de registros
      $stmt_count = $PDO->prepare($sql_count);
      $stmt_count->execute();
      $total = $stmt_count->fetchColumn();
      // seleciona os registros
      $stmt = $PDO->prepare($sql);
      $stmt->execute();

//require 'check.php'; 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, description FROM tasks WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
require 'inc/header.php';
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php require 'inc/nav.php' ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="panel.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Editar Task</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $total ?> Tasks cadastrados</div>
            </div>
        </div>
        </div>
        </div>
          <div id="page-wrapper">
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Para você ficar sempre produtivo, e alcançar seus <br> objetivos,  cadastre todas as suas tasks abaixo!
                        </div>
                             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="adiciona-funcionario.php" method="post">
                                        <div class="form-group">
                                            
                                            <input class="form-control" value="<?php echo $user['name'] ?>" placeholder="Digite seu nome" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input class="form-control" name="email" value="<?php echo $user['description'] ?>" id="email" placeholder="Digite seu e-mail">
                                        </div>
                                       
                                        <input type="submit" class="btn btn-primary"></input>
                                    </form>
                                </div>
                            
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php require 'inc/footer.php' ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="_cdn/jquery.js"></script>
    <script src="_cdn/bootstrap.bundle.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="_cdn/jquery.easing.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="_cdn/Chart.js"></script>
    <script src="_cdn/jquery.dataTables.js"></script>
    <script src="_cdn/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="_cdn/sb-admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="_cdn/sb-admin-datatables.js"></script>
    <script src="_cdn/sb-admin-charts.js"></script>
  </div>
</body>
  
</html>