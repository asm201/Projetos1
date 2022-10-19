<?php

    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['e-mail_Defensor']) == true) and (!isset($_SESSION['Telefone_Def']) == true)){

        unset($_SESSION['e-mail_Defensor']);
        unset($_SESSION['Telefone_Def']);
        header('Location: Home.php');

    }$logado = $_SESSION['e-mail_Defensor'];

    $sql = "SELECT * FROM defensor ORDER BY id DESC";
    $result = $conexao->query($sql);

    print_r($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin="anonymous">

    <title>Dados Internos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }  

        .table-bg{
            background-color: rgba(0,0,0,0.3)
            border-radius: 15px 15px 0 0;
        }

        
    </style>
    </head>
    <body>
            <h1>Acessou o Sistema</h1>
            <div class= "m-5 text-white table-bg">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome_Def</th>
                        <th scope="col">Doc_Defensor</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Endereço_Def</th>
                        <th scope="col">Cidade_UF</th>
                        <th scope="col">Contato_Def</th>
                        <th scope="col">Telefone_Def</th>
                        <th scope="col">...</th>

                        </tr>
                    </thead> 
                    <tbody>

                        <?php
                            while($user_data = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>" .$user_data['Nome_Def']."</td>";
                                echo "<td>" .$user_data['Doc_Defensor']."</td>";
                                echo "<td>" .$user_data['Cargo']."</td>";
                                echo "<td>" .$user_data['Endereço_Def']."</td>";
                                echo "<td>" .$user_data['Cidade_UF']."</td>";
                                echo "<td>" .$user_data['Contato_Def']."</td>";
                                echo "<td>" .$user_data['Telefone_Def']."</td>";
                                echo "<td>acoes</td>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
    </body>
    </html> 