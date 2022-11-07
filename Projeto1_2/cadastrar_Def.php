<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);

    if(isset($_POST['submit1']))
    {

        include_once('config.php');
        //Defensor
        $Nome_Defensor      = $_POST['Nome_Defensor'];
        $Documento_defensor = $_POST['Documento_Defensor'];
        $Cargo_Defensor     = $_POST['txt_Cargo_Defensor'];
        $Endereco_defensor  = $_POST['Endereco_Defensor'];
        $Cidade_defensor    = $_POST['Cidade/UF_Defensor'];
        $Telefone_defensor  = $_POST['Telefone_Defensor'];
        $Email_defensor     = $_POST['e-mail_Defensor']; 
        //$Senha_Automatica   = $_POST['Senha_Defensor']; /*** senha automatica NOVO***/

        
        /*Defensor
        $result = mysqli_query($conexao,"INSERT INTO defensor(Nome_Def,Doc_Defensor,Cargo,Endereço_Def,Cidade_UF,Contato_Def,Telefone_Def,Senha_Defensor) 
        VALUES ('$Nome_Defensor','$Documento_defensor','$Cargo_Defensor','$Endereco_defensor','$Cidade_defensor','$Email_defensor','$Telefone_defensor','$Senha_Automatica')");*/

        $result = mysqli_query($conexao,"INSERT INTO defensor(Nome_Def,Doc_Defensor,Cargo,Endereço_Def,Cidade_UF,Contato_Def,Telefone_Def) 
        VALUES ('$Nome_Defensor','$Documento_defensor','$Cargo_Defensor','$Endereco_defensor','$Cidade_defensor','$Email_defensor','$Telefone_defensor')");
    }   
    if(isset($_POST['submit']))
    {

        include_once('config.php');

        //Interprete
        $Nome_Interprete            = $_POST['Nome_Interprete'];
        $Documento_Interprete       = $_POST['Documento_Interprete'];
        $Endereço_Interprete        = $_POST['Endereço_Interprete'];
        $email_Interprete           = $_POST['e-mail_Interprete'];
        $Telefone_Interprete        = $_POST['Telefone_Interprete'];

        //IDENTIFICAÇÃO DO INTÉRPRETE//
        settype($Telefone_Interprete, "integer");
        $result = mysqli_query($conexao, "INSERT INTO Intérprete(Doc_interprete,Nome,Endereço_Int,Contato_Int,Telefone_Int) 
        VALUES ('$Documento_Interprete','$Nome_Interprete','$Endereço_Interprete','$email_Interprete','$Telefone_Interprete')");
        //echo gettype($Telefone_Interprete);

        
    }         
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link  rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin="anonymous">-->

    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
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
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        .table-bg{
            background-color: rgba(0,0,0,0.3)
            border-radius: 15px 15px 0 0;
        }
    </style>
</head>
<body>
   <!-- <nav class="p-3 mb-2 bg-dark text-white">
        <nav class="p-3 mb-2 bg-info text-white">
            <div class="container-fluid">
                <img src="SIS-DPU.png" title>
                <img src="DPU.png" title>
                <a href="Sair.php">Finalizar Sessão</a>
            </div>
        </nav>
    </nav>-->
    
    <meta charset="UTF-8">
        <div class="box">
                <fieldset>
                    <legend><b>Fórmulário</b></legend>
                    <br>


                    <div class="field radiobox">            
                        <p>Deseja Cadastrar Quem?</p>
                        <input type="radio" name="Cadastrar_Funcionario" id="Cadastrar_Funcionario" onclick="Preencher('Form_Defensor');Sumir('Form_Interprete')" ><label for="ND">Novo Defensor.</label> <br>                   
                        <input type="radio" name="Cadastrar_Funcionario" id="Cadastrar_Funcionario" onclick="Preencher('Form_Interprete');Sumir('Form_Defensor')"><label for="NI">Novo Interprete. </label><br> 
                    </div>

                    <!----Defensor -->

                    <form action="cadastrar_Def.php" method="post">
                        <div class="Container" name="Form_Defensor" name="Form_Defensor" id="Form_Defensor" style="display:none" class="inputUser">
                                <h1> DADOS DO DEFENSOR PÚBLICO FEDERAL </h1>
                                <div class="inputBox">
                                    <input type="text" name="Nome_Defensor" id="Nome_Defensor" class="inputUser" required>
                                    <label for="Nome_Defensor" class="labelInput">Nome completo do defensor:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Documento_Defensor" id="Documento_Defensor" class="inputUser" required>
                                    <label for="Documento_Defensor" class="labelInput">Documento de Identificacão:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="txt_Cargo_Defensor" id="Cargo_Defensor" class="inputUser" required>
                                    <label for="Cargo_Defensor" class="labelInput">Cargo do Defensor:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Endereco_Defensor" id="Endereco_Defensor" class="inputUser" required>
                                    <label for="Endereco_Defensor" class="labelInput">Endereco do Defensor:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="Cidade/UF_Defensor"id="Cidade/UF_Defensor" class="inputUser" required>
                                    <label for="Cidade/UF_Defensor" class="labelInput">Cidade/UF_Defensor:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="tel" name="Telefone_Defensor" id="Telefone_Defensor" class="inputUser" required>
                                    <label for="Telefone_Defensor" class="labelInput">Telefone:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="e-mail_Defensor" id="e-mail_Defensor" class="inputUser" required>
                                    <label for="e-mail_Defensor" class="labelInput">E-mail:</label>
                                </div>   
                                <br><br> 
                                <!--<div class="inputBox">
                                    <input type="password" name="Senha_Defensor" id="Senha_Defensor" class="inputUser" required>
                                    <label for="Senha_Defensor" class="labelInput">Senha:</label>
                                </div>-->
                                <br><br> 
                                <input type="submit1" name="submit1" id="submit1">
                        </div>
                    </form>
                    <br>

                    <!--- IDENTIFICAÇÃO DO INTÉRPRETE --->
                    <!--- Fazer exatamente igual as demais acima e tirar o comentario das declaracões --->
                    <!--- tudo a ser colocado é antes do imput ---> 
                    <form action="cadastrar_Def.php" method="post">
                        <div class="Container" name="Form_Interprete" name="Form_Interprete" id="Form_Interprete" style="display:none" class="inputUser">
                                <h2> IDENTIFICAÇÃO DO INTÉRPRETE </h2>
                                <div class="inputBox">
                                    <input type="text" name="Nome_Interprete" id="Nome_Interprete" class="inputUser" required>
                                    <label for="Nome_Interprete" class="labelInput">Nome Completo do Intérprete:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Documento_Interprete" id="Documento_Interprete" class="inputUser" required>
                                    <label for="Documento_Interprete" class="labelInput">Documento de Identificacão:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Endereço_Interprete" id="Endereço_Interprete" class="inputUser" required>
                                    <label for="Endereço_Interprete" class="labelInput">Endereço:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Telefone_Interprete" id="Endereco_Telefone_InterpreteDefensor" class="inputUser" required>
                                    <label for="Telefone_Interprete" class="labelInput">Telefone:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="e-mail_Interprete"id="e-mail_Interprete" class="inputUser" required>
                                    <label for="e-mail_Interprete" class="labelInput">E-mail:</label>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" id="submit">
                        </div>
                    </form>

                </fieldset>

        </div>
        <script>
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
                document.getElementById("current_date").innerHTML = Date();

        </script>
    </meta>
    
</body>
</html>