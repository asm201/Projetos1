<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT * FROM crianca_adolecente WHERE Documento=$Identidade_Pessoa";

        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $Nome_Pessoa                    = $user_data['Nome'];
                $Nascimento_pessoa              = $user_data['Data_de_Nascimento'];
                $Genero_pessoa                  = $user_data['Genero'];
                $Nacionalidade_Pessoa           = $user_data['Nacionalidade'];
                $País_Cid_pessoa                = $user_data['Local_Nasc'];
                $Escolaridade_pessoa            = $user_data['Escolaridade'];
                $Endereco_Antigo_Pessoa         = $user_data['Endereco_origem'];
                $Endereco_atual_pessoa          = $user_data['Endereco_atual'];
                $Telefone_pessoa                = $user_data['Telefone_crianca'];
                $Email_pessoa                   = $user_data['Email_Crianca'];
                $Identidade_pessoa              = $user_data['Documento'];
                $Passaporte_pessoa              = $user_data['Passaporte'];
                $Certidao_pessoa                = $user_data['Certidao_de_Nascimento'];
                $Mae_pessoa                     = $user_data['Mae_viva'];
                $Nome_mae_pessoa                = $user_data['Nome_mae'];
                $Pai_pessoa                     = $user_data['Pai_Vivo'];
                $Nome_pai_pessoa                = $user_data['Nome_pai'];
                $Text_Residencia_Mae_Pessoa     = $user_data['Residencia_mae'];
                $Text_Residencia_Pai_Pessoa     = $user_data['Residencia_pai'];
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

                <!----Defensor -->
                <h2> DADOS DA CRIANÇA OU ADOLESCENTE </h2>
                 
                <div class="inputBox">
                <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" value="<?php echo $Nome_Pessoa ?>" required>
                    <label for="Nome_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nome Completo:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <label for="Nascimento_Pessoa"><b><label style="color:#FF0000">*</label> Data de Nascimento:</b></label>
                    <input type="date" name="Nascimento_Pessoa" id="Nascimento_Pessoa" class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Nascimento_pessoa)->format("Y-m-d")  ?>" required>
                </div>

                <div class="field radiobox" >            
                <p><label style="color:#FF0000">*</label> Genero:</p>
                <input type="radio" id="feminino" name="gênero_pessoa" value="Feminino" <?php echo $Genero_pessoa == "Feminino" ?"checked":"" ?>>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="gênero_pessoa" value="Masculino" <?php echo $Genero_pessoa == "Masculino" ?"checked":"" ?>>
                <label for="masculino">Masculino</label>
                </div>
                <br>

                <div class="inputBox">
                <input type="text" name="Nacionalidade_Pessoa" id="Nacionalidade_Pessoa" class="inputUser" value="<?php echo $Nacionalidade_Pessoa ?>" required>
                    <label for="Nacionalidade_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nacionalidade:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="País_Cid_Pessoa" id="País_Cid_Pessoa" class="inputUser" value="<?php echo $País_Cid_pessoa ?>" required>
                    <label for="País_Cid_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> País e cidade de nascimento:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Escolaridade_Pessoa" id="Escolaridade_Pessoa" class="inputUser" value="<?php echo $Escolaridade_pessoa ?>" required>
                    <label for="Escolaridade_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Escolaridade:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Endereco_Antigo_Pessoa" id="Endereco_Antigo_Pessoa" class="inputUser" value="<?php echo $Endereco_Antigo_Pessoa  ?>" required>
                    <label for="Endereco_Antigo_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Endereço no pais de origem:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Endereco_Atual_Pessoa" id="Endereco_Atual_Pessoa" class="inputUser" value="<?php echo $Endereco_atual_pessoa ?>" required>
                    <label for="Endereco_Atual_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Endereco atual:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Telefone_Pessoa" id="Telefone_Pessoa" class="inputUser" value="<?php echo $Telefone_pessoa ?>" required>
                    <label for="Telefone_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Telefone:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="e-mail_Pessoa" id="e-mail_Pessoa" class="inputUser" value="<?php echo $Email_pessoa  ?>" required>
                    <label for="e-mail_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> E-mail:</label>
                </div>
                <br><br>

                <div class="inputBox" style="margin-top: -23px;">
                    <label for="Identidade_Pessoa" class="labelInputReadonly"><label style="color:#FF0000">*</label> Cédula de identidade:</label>
                    <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" value="<?php echo $Identidade_Pessoa?>" readonly>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Passaporte_Pessoa" id="Passaporte_Pessoa" class="inputUser" value="<?php echo $Passaporte_pessoa  ?>" required>
                    <label for="Passaporte_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Passaporte:</label>
                </div>

                <div class="field radiobox">            
                <p><label style="color:#FF0000">*</label> Possui certidão de nascimento?</p>
                <input type="radio" id="Certidão_SIM" name="certidão" value="SIM" <?php echo $Certidao_pessoa == "SIM" ?"checked":"" ?>>
                <label for="Certidão_SIM">Sim</label>
                <input type="radio" id="Certidão_NÃO" name="certidão" value="NÃO" <?php echo $Certidao_pessoa == "NÃO" ?"checked":"" ?>>
                <label for="Certidão_NÂO">Não</label>
                <input type="radio" id="Certidão_COP" name="certidão" value="COP" <?php echo $Certidao_pessoa == "COP" ?"checked":"" ?>>
                <label for="Certidão_COP">Possui cópia</label>
                <input type="radio" id="Certidão_NAS" name="certidão" value="NAS" <?php echo $Certidao_pessoa == "NAS" ?"checked":"" ?>>
                <label for="Certidão_NAS">Possui apenas a declaracão de nascido vivo</label>
                </div>
                <br>

                <!--<div class="inputBox">
                    <label for="data_cadastro"><b><label style="color:#FF0000">*</label> Data de Cadastro</b></label>
                    <input type="date" name="data_cadastro" id="Nascimento_Pessoa" class="inputUser" required >
                </div>-->

                <script>
                        function myalert() {
                            alert("Atualização Salva com sucesso");
                        }
                        function Preencher(el) {
                                var display = document.getElementById(el).style.display;
                                if(display == "none")
                                    document.getElementById(el).style.display = 'block';
                            }
                            function Sumir(el){
                                var display = document.getElementById(el).style.display;
                                if(display != "none")
                                    document.getElementById(el).style.display = 'none';
                            }	
                </script>

                <div class="field radiobox"> 
                    <p><label style="color:#FF0000">*</label> Mãe Viva?</p>
                    <input type="radio" id="Mãe_Viva_Sim" name="Mãe_Viva" value="SIM" <?php echo $Mae_pessoa == "SIM" ?"checked":"" ?> onclick="Preencher('Mãe_Pessoa');Preencher('Mãe_Pessoa_Endereco')" >
                    <label for="Mãe_Viva_Sim">Sim</label>
                    <input type="radio" id="Mãe_Viva_NÃO" name="Mãe_Viva" value="NÃO" <?php echo $Mae_pessoa == "NÃO" ?"checked":"" ?> onclick="Sumir('Mãe_Pessoa');Sumir('Mãe_Pessoa_Endereco')" >
                    <label for="Mãe_Viva_Não">Não</label>
                    <input type="text"  name="Text_Mae_Viva" id="Mãe_Pessoa" style="display:none"  class="inputUser" value="<?php echo $Nome_mae_pessoa ?>"  placeholder="Digite o Nome da Mãe caso viva:"/>
                    <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    <br><br>
                    <input type="text"  name="Text_Residencia_Mae_Pessoa" id="Mãe_Pessoa_Endereco" style="display:none"  class="inputUser" value="<?php echo $Text_Residencia_Mae_Pessoa ?>"  placeholder="Digite a Residência da Mãe:"/>
                    <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    <?php echo $Mae_pessoa == "SIM" ?"<script>Preencher('Mãe_Pessoa');Preencher('Mãe_Pessoa_Endereco')</script>":""  ?>
                </div>

                <div class="field radiobox">            
                    <p><label style="color:#FF0000">*</label> Pai Vivo?</p>
                    <input type="radio" id="Pai_Viva_Sim" name="Pai_Vivo" value="SIM" <?php echo $Pai_pessoa == "SIM" ?"checked":"" ?> onclick="Preencher('Pai_Pessoa');Preencher('Pai_Pessoa_Endereco')" >
                    <label for="Pai_Viva_Sim">Sim</label>
                    <input type="radio" id="Pai_Viva_NÃO" name="Pai_Vivo" value="NÃO" <?php echo $Pai_pessoa == "NÃO" ?"checked":"" ?> onclick="Sumir('Pai_Pessoa');Sumir('Pai_Pessoa_Endereco')" >
                    <label for="Pai_Viva_Não">Não</label>
                    <input type="text"  name="Text_Pai_Vivo" id="Pai_Pessoa" style="display:none" class="inputUser" value="<?php echo $Nome_pai_pessoa ?>"  placeholder="Digite o Nome do Pai caso vivo:"/>
                    <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    <br><br>
                    <input type="text"  name="Text_Residencia_Pai_Pessoa" id="Pai_Pessoa_Endereco" style="display:none"  class="inputUser" value="<?php echo $Text_Residencia_Pai_Pessoa ?>"  placeholder="Digite a Residência do Pai:"/>
                    <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    <?php echo $Pai_pessoa == "SIM" ?"<script>Preencher('Pai_Pessoa');Preencher('Pai_Pessoa_Endereco')</script>":""  ?>
                <div>
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>
                <!--- Circunstâncias de entrada no Brasil--->
                <br>

            </fieldset>


    </div>
</body>
</html>
