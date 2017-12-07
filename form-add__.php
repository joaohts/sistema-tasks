<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro de Usuário - ULTIMATE PHP</title>
    </head>
 
    <body>
 
        <h1>Sistema de Cadastro - ULTIMATE PHP</h1>
 
        <h2>Cadastro de Usuário</h2>
         
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="email" name="email" id="email" required="required">
 
            <br><br>
             
            Gênero:
            <br>
            <input type="radio" name="gender" id="gener_m" required="required" value="m">
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" required="required" id="gener_f" value="f">
            <label for="gener_f">Feminino </label>
             
            <br><br>
 
            <label for="birthdate">Data de Nascimento: </label>
            <br>
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>