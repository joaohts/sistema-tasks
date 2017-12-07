<?php
try{
$conn = new PDO('mysql:host=localhost;dbname=intranet', 'root', '');
$select = $conn ->query("SELECT * FROM users ORDER BY id DESC");
$select->execute();
$rowCount = $select->rowCount();
print "{$rowCount} <br />";
if($select) {
        foreach($select as $row) {
        print "{$row['id']} | {$row['name']} |  {$row['email']} <br/>";
        }
        
}
$con_PDO = null;
}

catch (PDOException $error) {
print "Erro!: " . $error->getMessage() . "<br/>";
die();
}