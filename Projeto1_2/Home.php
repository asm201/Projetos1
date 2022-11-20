<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" type="text/css" Href="estilo.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE | GN</title>
</head>
    <body>
    <div class="box_home">
                   <form action="testelogin.php" method="POST">
    <center> <h1>Bem vindo</h1></center>
    <center>      <h1>O que deseja?</h1></center>
 
            <center> <input type="text" name="e-mail_Defensor" placeholder="E-mail Defensor"></center><br>
            <center>  <input type="password" name="Telefone_Def" placeholder="Senha"><br><br> </center><!-- trocar telefone_def por Senha_Def-->
            <center>  <input class="submit" type="submit" name="submit" id="login"></center>
            </form>
            <br>
            <br>
            <center><a onclick="myalert()" id="dados_publicos" href="powerBI.php">Visão dos Dados Publicos</a></center>
            <br><br>
            
    </body>

</html> 

    <script>
        function myalert() {
            alert("Atenção você será encaminhado nesse momento para dados publicos");
        }
        
    </script>


