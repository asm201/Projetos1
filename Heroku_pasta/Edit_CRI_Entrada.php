<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT entrada.*, ca.Nome, ca.Documento FROM entrada
        LEFT JOIN crianca_adolecente ca
        on entrada.idEntrada = ca.Entrada WHERE ca.Documento=$Identidade_Pessoa";

        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){
                $idEntrada                     = $user_data['idEntrada'];
                $Nome_Pessoa                   = $user_data['Nome'];
                $Identidade_pessoa             = $user_data['Documento'];
                $Cidade_Saida_pessoa           = $user_data['Cidade_Saida'];
                $Data_Saida_pessoa             = $user_data['Data_saida'];
                $Cidade_Chegada_pessoa         = $user_data['Cidade_Chegada'];
                $Meio_transporte_pessoa        = $user_data['Transporte'];
                $Transporte_Detalhado_Pessoa   = $user_data['Transporte_Detalhe'];
                $Data_Reconhecido_Pessoa       = $user_data['Data_Reconhecido'];
                $Data_Chegada_Pessoa           = $user_data['Data_Chegada'];
                $Pais_Reconhecido_Pessoa       = $user_data['Pais_Reconhecido'];

            }
            //print_r($Identidade_Pessoa);
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
    </style>
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
                        <a class="nav-link" href="Dados_CRI.php">Voltar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<meta charset="UTF-8">
    <div class="box_CRI_ENTRADA">
        <form action="saveEdit_CRI_Entrada.php" method="post">
            <fieldset>
                <legend><b>Criança - Editar</b></legend>
                <script>
                        function myalert() {
                            alert("Atualizanado...");
                        }
                </script>
                <br>

                <h2> Circunstâncias de entrada no Brasil </h2>

                <div class="inputBox">
                    <label for="Nome_Pessoa" class="labelInputReadonly"><label style="color:#FF0000">*</label> Nome Completo:</label>
                    <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" value="<?php echo $Nome_Pessoa ?>" readonly>
                </div>
                <br><br>

                <div class="inputBox" style="margin-top: -23px;">
                    <label for="Identidade_Pessoa" class="labelInputReadonly"><label style="color:#FF0000">*</label> Cédula de identidade:</label>
                    <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" value="<?php echo $Identidade_Pessoa?>" readonly>
                </div>
                <br><br>


                <div class="inputBox">
                    <input type="text" name="Cidade_Saida_Pessoa" id="Cidade_Saida_Pessoa" class="inputUser" value="<?php echo $Cidade_Saida_pessoa?>" required>
                    <label for="Cidade_Saida_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cidade de saída:</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <label for="Data_Saida_Pessoa"><b><label style="color:#FF0000">*</label> Data de Saida:</b></label>
                    <input type="date" max='2022-11-21' name="Data_Saida_Pessoa" id="Data_Saida_Pessoa"class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Saida_pessoa)->format("Y-m-d")  ?>" required>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="Cidade_Chegada_Pessoa" id="Cidade_Chegada_Pessoa" class="inputUser" value="<?php echo $Cidade_Chegada_pessoa?>" required>
                    <label for="Cidade_Chegada_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cidade de chegada no Brasil:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <label for="Data_Chegada_Pessoa"><b><label style="color:#FF0000">*</label> Data de Chegada ao Brasil:</b></label>
                    <input type="date" max='2022-11-21' name="Data_Chegada_Pessoa" id="Data_Chegada_Pessoa" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Chegada_Pessoa)->format("Y-m-d")  ?>" class="inputUser" required>
                <br><br>
                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Meio de transporte: </label>
                    <input type="radio" name="Meio_Transporte" id="Transporte_Aereo" value="Aéreo" <?php echo $Meio_transporte_pessoa == "Aéreo" ?"checked":"" ?>>
                    <label for="Aéreo" required>Aéreo </label>
                    <input type="radio" name="Meio_Transporte" id="Transporte_Marítimo" value="Marítimo" <?php echo $Meio_transporte_pessoa == "Marítimo" ?"checked":"" ?>>
                    <label for="Marítimo" required>Marítimo </label>
                    <input type="radio" name="Meio_Transporte" id="Terrestre" value="Terrestre" <?php echo $Meio_transporte_pessoa == "Terrestre" ?"checked":"" ?>>
                    <label for="Terrestre" required>Terrestre </label>
                    <br><br>
                </div>

                <div class="inputBox">
                    <label for="Transporte_Detalhado_Pessoa"><label style="color:#FF0000">*</label> Detalhes do Transporte:</label>
                    <input type="text" name="Transporte_Detalhado_Pessoa" id="Transporte_Detalhado_Pessoa"  class="inputUser" value="<?php echo $Transporte_Detalhado_Pessoa?>" required>
                <br><br>

                <div class="inputBox">
                    <label for="Data_Reconhecido_Pessoa"><b><label style="color:#FF0000">*</label> Data em que foi reconhecido:</b></label>
                    <input type="date" max='2022-11-21' name="Data_Reconhecido_Pessoa" id="Data_Reconhecido_Pessoa"class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Reconhecido_Pessoa)->format("Y-m-d")  ?>" required>
                <br><br><br>

                <div class="inputBox">
                <input type="text" name="Pais_Reconhecido_Pessoa" id="Pais_Reconhecido_Pessoa" class="inputUser" value="<?php echo $Pais_Reconhecido_Pessoa?>" required >
                    <label for="Pais_Reconhecido_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Pais Reconhecido:</label>
                </div>   
                    <input type="hidden" name="idEntrada" Value="<?php echo $idEntrada ?>">
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>


    </div>
</body>
</html>