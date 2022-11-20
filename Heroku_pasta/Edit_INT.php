<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Doc_Interprete']))
    {

        include_once('config.php');


        $Documento_Interprete = $_GET['Doc_Interprete'];

        $sqlSelect = "SELECT * FROM interprete WHERE Doc_Interprete=$Documento_Interprete";

        $result = $conexao->query($sqlSelect);
        //print_r($result);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $Nome_Interprete        = $user_data['Nome'];
                $Documento_Interprete   = $user_data['Doc_Interprete'];
                $Endereço_Interprete    = $user_data['Endereco_Int'];
                $Telefone_Interprete    = $user_data['Telefone_int'];
                $email_Interprete       = $user_data['Contato_Int'];
            }
            //print_r($Nome_Interprete);
        } else{
            header('Location: Sistema.php');
        }


        
    }      
   


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" Href="estilo.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<body>
<div class="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <img src="DPU.png" class="logo">
            <img src="DPU.png" class="logo2">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="cadastrar_Def.php">Cadastrar Novo Defensor/Interprete        
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Formulario2.php">Cadastrar Criança</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Dados.php">Visão dados Defensores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Dados_INT.php">Visão dados interpretes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Dados_CRI.php">Visão dados Crianças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="powerBI.php">Visão dos Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sair.php">Finalizar Sessão</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Dados.php">Voltar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<meta charset="UTF-8">
    <div class="box_edit_int">
        <form action="saveEdit_INT.php" method="post">
            <fieldset>
                <legend><b>Intérprete - Editar</b></legend>
                <br>

                <!----INTÉRPRETE -->
                                <h2> IDENTIFICAÇÃO DO INTÉRPRETE </h2>
                                <div class="inputBox">
                                    <input type="text" name="Nome_Interprete" id="Nome_Interprete" class="inputUser" value="<?php echo $Nome_Interprete ?>" required>
                                    <label for="Nome_Interprete" class="labelInput">Nome Completo do Intérprete:</label>
                                </div>

                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Documento_Interprete" id="Documento_Interprete" class="inputUser" value="<?php echo $Documento_Interprete ?>" required>
                                    <label for="Documento_Interprete" class="labelInput">Documento de Identificacão:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Endereço_Interprete" id="Endereço_Interprete" class="inputUser" value="<?php echo $Endereço_Interprete ?>" required>
                                    <label for="Endereço_Interprete" class="labelInput">Endereço:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Telefone_Interprete" id="Telefone_Interprete" class="inputUser" value="<?php echo $Telefone_Interprete ?>" required>
                                    <label for="Telefone_Interprete" class="labelInput">Telefone:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="e-mail_Interprete"id="e-mail_Interprete" class="inputUser" value="<?php echo $email_Interprete ?>" required>
                                    <label for="e-mail_Interprete" class="labelInput">E-mail:</label>
                                </div>
                                <br>
                                    <input onclick="myalert()" type="submit" name="update" id="update">
                                </div>
                <br>

            </fieldset>

    </div>
</body>
</html>
<script>
        function myalert() {
            alert("Atualizanado...");
        }
    </script>