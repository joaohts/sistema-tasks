<?php
 
require_once '_app/Config.inc.php';

if(isset($_FILES['file']))
   {
      $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads

      move_uploaded_file($_FILES['file']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
      //armazena nome do arquivo salvo,para salvar no banco.
      $file = $new_name;

   } 
// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($description))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO tasks(name, description, file) VALUES(:name, :description, :file)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description); 
$stmt->bindParam(':file', $file);
 
if ($stmt->execute())
{
    header('Location: panel.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}