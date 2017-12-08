<?php
session_start();
require_once '_app/Config.inc.php';
require 'check.php';
      $PDO = db_connect();
      //Pega quantidade de funcionários e exibe na tela.
      $sql_count = "SELECT COUNT(*) AS total FROM tasks ORDER BY name ASC";
      // SQL para selecionar os registros
      $sql = "SELECT id, name, description, file FROM tasks ORDER BY name ASC";
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
  <?php require 'inc/nav.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tasks</li>
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
          <!--  <a class="card-footer text-white clearfix small z-1" href="#">
            </a>-->
          </div>
        </div>              
      </div>      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tasks cadastradas</div>
        <div class="card-body">
          <div class="table-responsive">

            <?php if ($total > 0): ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome da Task</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nome da Task</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                  <td><?php echo $user['id'] ?></td>
                  <td><?php echo $user['name'] ?></td>
                  <td><?php echo $user['description'] ?></td>
                  <td>
                    <a href="uploads/<?php echo $user['file']?>" target="_blank" class="btn btn-success"> File</a>  
                    <a class="btn btn-primary" href="edita-task.php?id=<?php echo $user['id'] ?>">Editar</a>
                    <a class="btn btn-danger" href="deleta-task.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover esta task?')">Remover</a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>

            <?php else: ?>
 
          <p>Nenhuma task registrada no momento, volte mais tarde, ou cadastre uma nova :)</p>
 
        <?php endif; ?>
          </div>
        </div>
        <div class="card-footer small text-muted">Hoje é  dia <?= date('d/m/y'); ?> e agora são <?= date('H\hi'); ?>.</div>
      </div>
    </div>
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