<?php

    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['e-mail_Defensor']) == true) and (!isset($_SESSION['Telefone_Def']) == true)){

        unset($_SESSION['e-mail_Defensor']);
        unset($_SESSION['Telefone_Def']);
        header('Location: Home.php');

    }$logado = $_SESSION['e-mail_Defensor'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
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
    </style>
</head>
<body>
        <br><br>
        <?php
            echo "<h1>Bem vindo <u>$logado</u></h1>"
        ?>
        <h1>O que deseja?</h1>
        <input type="text" placeholder="Nome">
        <input type="password" placeholder="Senha">
        <br><br>
        <a href="cadastrar_Def.php">Cadastrar Novo Defensor/Interprete</a>
        <a href="formulario2.php">Cadastrar Criança</a>
        <a href="Dados.php">Visão dados internos</a> 
        <a href="Power_Bi.php">Visão dos Dados</a>
        <a href="Sair.php">Finalizar Sessão</a>
        <br><br>
</body>
</html>
