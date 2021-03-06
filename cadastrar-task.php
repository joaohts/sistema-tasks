<?php
session_start();
require '_app/Config.inc.php';
require 'check.php';

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
?>
<?php require 'inc/header.php'?>
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
        <li class="breadcrumb-item active">Cadastrar Task</li>
      </ol>
      <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $total ?> Tasks cadastrados</div>
            </div>
          <!--  <a class="card-footer text-white clearfix small z-1" href="#">
            </a>-->
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
                                    <form enctype="multipart/form-data" action="adiciona-task.php" method="post">
                                        <div class="form-group">
                                            
                                            <input class="form-control" placeholder="Qual o nome da sua task?" name="name" id="name" required="required">
                                        </div>

                                        <div class="form-group">
                                            
                                            <textarea class="form-control" placeholder="Digite uma descrição para sua nova task!" name="description" id="description" rows="3" required="required"></textarea>
                                        </div>

                              
                                        <div class="form-group">
                                            <label>Envie um arquivo para representar sua task!</label>
                                            <input type="file" name="file" id="file" required="required">
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