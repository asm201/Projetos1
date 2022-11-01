<?php


    //Se o botão de envio for pressionado
    error_reporting (0);
    if(!empty($_GET['idDefensor']))
    {

        include_once('config.php');


        $idDefensor = $_GET['idDefensor'];

        $sqlSelect = "SELECT * FROM defensor WHERE idDefensor=$idDefensor";

        $result = $conexao->query($sqlSelect);
        //print_r($result);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $Nome_Defensor      = $user_data['Nome_Def'];
                $Documento_defensor = $user_data['Doc_Defensor'];
                $Cargo_Defensor     = $user_data['Cargo'];
                $Endereco_defensor  = $user_data['Endereço_Def'];
                $Cidade_defensor    = $user_data['Cidade_UF'];
                $Telefone_defensor  = $user_data['Telefone_Def'];
                $Email_defensor     = $user_data['Contato_Def']; 
            }
            //print_r($Nome_Defensor);
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
    <a href="Dados.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="post">
            <fieldset>
                <legend><b>Defensor - Editar</b></legend>
                <br>

                <!----Defensor -->
                <h1> DADOS DO DEFENSOR PÚBLICO FEDERAL </h1>
                <div class="inputBox">
                    <input type="text" name="Nome_Defensor" id="Nome_Defensor" class="inputUser" value="<?php echo $Nome_Defensor ?>" required>
                    <label for="Nome_Defensor" class="labelInput">Nome completo do defensor:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Documento_Defensor" id="Documento_Defensor" class="inputUser" value="<?php echo $Documento_defensor ?>" required>
                    <label for="Documento_Defensor" class="labelInput">Documento de Identificacão:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="txt_Cargo_Defensor" id="Cargo_Defensor" class="inputUser" value="<?php echo $Cargo_Defensor ?>" required>
                    <label for="Cargo_Defensor" class="labelInput">Cargo do Defensor:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Endereco_Defensor" id="Endereco_Defensor" class="inputUser" value="<?php echo $Endereco_defensor ?>" required>
                    <label for="Endereco_Defensor" class="labelInput">Endereco do Defensor:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="Cidade/UF_Defensor"id="Cidade/UF_Defensor" class="inputUser" value="<?php echo $Cidade_defensor ?>" required>
                    <label for="Cidade/UF_Defensor" class="labelInput">Cidade/UF_Defensor:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="tel" name="Telefone_Defensor" id="Telefone_Defensor" class="inputUser" value="<?php echo $Telefone_defensor ?>" required>
                    <label for="Telefone_Defensor" class="labelInput">Telefone:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="e-mail_Defensor" id="e-mail_Defensor" class="inputUser" value="<?php echo $Email_defensor ?>" required>
                    <label for="e-mail_Defensor" class="labelInput">Email:</label>
                </div>    
                    <input type="hidden" name="idDefensor" Value="<?php echo $idDefensor ?>">
                <br>
                    <input type="submit" name="update" id="update">
                </div>
                <br>

            </fieldset>


    </div>
</body>
</html>