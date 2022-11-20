<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    try{
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
            $Senha_Automatica   = $_POST['Senha_Defensor']; /*** senha automatica NOVO***/
    
            
            /*Defensor
            $result = mysqli_query($conexao,"INSERT INTO defensor(Nome_Def,Doc_Defensor,Cargo,Endereço_Def,Cidade_UF,Contato_Def,Telefone_Def,Senha_Defensor) 
            VALUES ('$Nome_Defensor','$Documento_defensor','$Cargo_Defensor','$Endereco_defensor','$Cidade_defensor','$Email_defensor','$Telefone_defensor','$Senha_Automatica')");*/
    
            $result = mysqli_query($conexao,"INSERT INTO defensor(Nome_Def,Doc_Defensor,Cargo,Endereco_Def,Cidade_UF,Contato_Def,Telefone_Def,Senha_Defensor) 
            VALUES ('$Nome_Defensor','$Documento_defensor','$Cargo_Defensor','$Endereco_defensor','$Cidade_defensor','$Email_defensor','$Telefone_defensor','$Senha_Automatica')");
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
            $result = mysqli_query($conexao, "INSERT INTO interprete(Doc_interprete,Nome,Endereco_Int,Contato_Int,Telefone_Int) 
            VALUES ('$Documento_Interprete','$Nome_Interprete','$Endereço_Interprete','$email_Interprete','$Telefone_Interprete')");
            //echo gettype($Telefone_Interprete);
    
            
        }   
    }catch(Exception $e){
        echo  '<script>alert("Erro ao executar o SQL");</script>';
    }
      
   


?>

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" Href="estilo.css">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link  rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin="anonymous">-->

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
                </ul>
            </div>
        </div>
    </nav>
</div>
        <div class="box_cad_def">
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
                                    <label for="Nome_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Nome completo do defensor:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Documento_Defensor" id="Documento_Defensor" class="inputUser" required>
                                    <label for="Documento_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Documento de Identificacão:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="txt_Cargo_Defensor" id="Cargo_Defensor" class="inputUser" required>
                                    <label for="Cargo_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Cargo do Defensor:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Endereco_Defensor" id="Endereco_Defensor" class="inputUser" required>
                                    <label for="Endereco_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Endereco do Defensor:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="Cidade/UF_Defensor"id="Cidade/UF_Defensor" class="inputUser" required>
                                    <label for="Cidade/UF_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Cidade/UF_Defensor:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="tel" name="Telefone_Defensor" id="Telefone_Defensor" class="inputUser" required>
                                    <label for="Telefone_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Telefone:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="e-mail_Defensor" id="e-mail_Defensor" class="inputUser" required>
                                    <label for="e-mail_Defensor" class="labelInput"><label style="color:#FF0000">*</label>E-mail:</label>
                                </div>   
                                <br><br> 
                                <div class="inputBox">
                                    <input type="password" name="Senha_Defensor" id="Senha_Defensor" class="inputUser" required>
                                    <label for="Senha_Defensor" class="labelInput">Senha:</label>
                                </div>
                                <br><br> 
                                <input type="submit" name="submit1" id="submit1">
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
                                    <label for="Nome_Interprete" class="labelInput"><label style="color:#FF0000">*</label>Nome Completo do Intérprete:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Documento_Interprete" id="Documento_Interprete" class="inputUser" required>
                                    <label for="Documento_Interprete" class="labelInput"><label style="color:#FF0000">*</label>Documento de Identificacão:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Endereço_Interprete" id="Endereço_Interprete" class="inputUser" required>
                                    <label for="Endereço_Interprete" class="labelInput"><label style="color:#FF0000">*</label>Endereço:</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="Telefone_Interprete" id="Endereco_Telefone_InterpreteDefensor" class="inputUser" required>
                                    <label for="Telefone_Interprete" class="labelInput"><label style="color:#FF0000">*</label>Telefone:</label>
                                </div>
                                <br><br>

                                <div class="inputBox">
                                    <input type="text" name="e-mail_Interprete"id="e-mail_Interprete" class="inputUser" required>
                                    <label for="e-mail_Interprete" class="labelInput"><label style="color:#FF0000">*</label>E-mail:</label>
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