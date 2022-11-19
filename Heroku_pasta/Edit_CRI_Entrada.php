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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 75%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 55%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        .labelInputReadonly{
            /* top: -20px; */
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
<meta charset="UTF-8">
    <a href="Dados_CRI.php">Voltar</a>
    <div class="box">
        <form action="saveEdit_CRI.php" method="post">
            <fieldset>
                <legend><b>Criança - Editar</b></legend>
                <br>

                <h2> Circunstâncias de entrada no Brasil </h2>

                <div class="inputBox" >
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
                    <input type="date" name="Data_Saida_Pessoa" id="Data_Saida_Pessoa"class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Saida_pessoa)->format("Y-m-d")  ?>" required>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="Cidade_Chegada_Pessoa" id="Cidade_Chegada_Pessoa" class="inputUser" value="<?php echo $Cidade_Chegada_pessoa?>" required>
                    <label for="Cidade_Chegada_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cidade de chegada no Brasil:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <label for="Data_Chegada_Pessoa"><b><label style="color:#FF0000">*</label> Data de Chegada ao Brasil:</b></label>
                    <input type="date" name="Data_Chegada_Pessoa" id="Data_Chegada_Pessoa" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Chegada_Pessoa)->format("Y-m-d")  ?>" class="inputUser" required>
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
                    <input type="date" name="Data_Reconhecido_Pessoa" id="Data_Reconhecido_Pessoa"class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Data_Reconhecido_Pessoa)->format("Y-m-d")  ?>" required>
                <br><br><br>

                <div class="inputBox">
                <input type="text" name="Pais_Reconhecido_Pessoa" id="Pais_Reconhecido_Pessoa" class="inputUser" value="<?php echo $Pais_Reconhecido_Pessoa?>" required >
                    <label for="Pais_Reconhecido_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Pais Reconhecido:</label>
                </div>
                
                </div>
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>


    </div>
</body>
</html>
