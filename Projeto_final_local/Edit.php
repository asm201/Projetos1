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
                $Endereco_defensor  = $user_data['Endereco_Def'];
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
<link rel="stylesheet" type="text/css" Href="estilo.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<body>
<script src="js/script_Codigo.js"></script>
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
    <a href="Dados.php">Voltar</a>
    <div class="box_edit">
        <form action="saveEdit.php" id="saveEdit" method="post">
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
                    <input type="text" name="Documento_Defensor" id="Documento_Defensor" class="inputUser" maxlength="9" value="<?php echo $Documento_defensor ?>" required>
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
                    <input type="text" name="Cidade_UF_Defensor"id="Cidade_UF_Defensor" class="inputUser" value="<?php echo $Cidade_defensor ?>" required>
                    <label for="Cidade_UF_Defensor" class="labelInput"><label style="color:#FF0000">*</label>Cidade/UF do Defensor:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="tel" name="Telefone_Defensor" id="Telefone_Defensor" class="inputUser" maxlength="9" value="<?php echo $Telefone_defensor ?>" required>
                    <label for="Telefone_Defensor" class="labelInput">Telefone:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="e-mail_Defensor" id="e-mail_Defensor" class="inputUser" value="<?php echo $Email_defensor ?>" required>
                    <label for="e-mail_Defensor" class="labelInput">Email:</label>
                </div>    
                <br>
                    <input type="hidden" name="Senha_Defensor" id="Senha_Defensor" Value="<?php echo $Senha_Defensor ?>">
                    <input type="hidden" name="idDefensor" id="idDefensor" Value="<?php echo $idDefensor ?>">
                    <input type="submit" name="update" id="update">

                <br>

            </fieldset>


    </div>
    
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

    <script src="js/script_Update_Def.js"></script>
</body>
</html>