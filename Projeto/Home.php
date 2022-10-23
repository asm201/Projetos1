<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
        }
        a:hover{
            background-color: dodgerblue;
        }
        
        .submit{
            background-color: Transparent;
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
        }
        .submit:hover{
            background-color: dodgerblue;
        }

        
    </style>
    </head>
    <body>
            <h1>Bem vindo</h1>
            <h1>O que deseja?</h1>
            <form action="testelogin.php" method="POST">
                <input type="text" name="e-mail_Defensor" placeholder="E-mail Defensor">
                <input type="password" name="Telefone_Def" placeholder="Senha"><br><br> <!-- trocar telefone_def por Senha_Def-->
                <input class="submit" type="submit" name="submit" value="Login">
            </form>
            <br>
            <a href="powerBI.php">Visão dos Dados Publicos</a>
            <br><br>
    </body>
    </html> 