<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Doc_Interprete']))
    {

        include_once('config.php');


        $Documento_Interprete = $_GET['Doc_Interprete'];

        $sqlSelect = "SELECT * FROM Intérprete WHERE Doc_Interprete=$Documento_Interprete";

        $result = $conexao->query($sqlSelect);
        //print_r($result);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $Nome_Interprete        = $user_data['Nome'];
                $Documento_Interprete   = $user_data['Doc_Interprete'];
                $Endereço_Interprete    = $user_data['Endereço_Int'];
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
            top: 50%;
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
    <a href="Dados_INT.php">Voltar</a>
    <div class="box">
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
            alert("Atualização Salva com sucesso");
        }
    </script>