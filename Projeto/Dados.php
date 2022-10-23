<?php

    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['e-mail_Defensor']) == true) and (!isset($_SESSION['Telefone_Def']) == true)){

        unset($_SESSION['e-mail_Defensor']);
        unset($_SESSION['Telefone_Def']);
        header('Location: Home.php');

    }$logado = $_SESSION['e-mail_Defensor'];

    $sql = "SELECT * FROM defensor ORDER BY idDefensor DESC";
    $result = $conexao->query($sql);

    //print_r($result);

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
            <nav class="p-3 mb-2 bg-dark text-white">
                <nav class="p-3 mb-2 bg-info text-white">
                    <div class="container-fluid">
                    <img src="SIS-DPU.png" title>
                    <img src="DPU.png" title>
                    <a href="Sair.php">Finalizar Sessão</a>
                    </div>
                </nav>
            </nav>
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
                        <th scope="col">Editar</th>

                        </tr>
                    </thead> 
                    <tbody>

                        <?php
                            while($user_data = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>" .$user_data['idDefensor']."</td>";
                                echo "<td>" .$user_data['Nome_Def']."</td>";
                                echo "<td>" .$user_data['Doc_Defensor']."</td>";
                                echo "<td>" .$user_data['Cargo']."</td>";
                                echo "<td>" .$user_data['Endereço_Def']."</td>";
                                echo "<td>" .$user_data['Cidade_UF']."</td>";
                                echo "<td>" .$user_data['Contato_Def']."</td>";
                                echo "<td>" .$user_data['Telefone_Def']."</td>";
                                echo "<td>
                                    <a class='btn btn-sm btn btn-primary' href='Edit.php?idDefensor=$user_data[idDefensor]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>
                                    <a class='btn btn-sm btn btn-danger' href='Delete.php?idDefensor=$user_data[idDefensor]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                        </svg>
                                    </a>

                                </td>";
                                echo "</tr>";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
    </body>
    </html> 