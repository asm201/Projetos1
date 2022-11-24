<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT medidas_protetivas.*, ca.Nome, ca.Documento FROM medidas_protetivas
        LEFT JOIN crianca_adolecente ca
        on medidas_protetivas.Crianca = ca.Documento WHERE ca.Documento=$Identidade_Pessoa";


        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $idMedidas_Protetivas                   = $user_data['idMedidas_Protetivas'];
                $Nome_Pessoa                            = $user_data['Nome'];
                $Identidade_pessoa                      = $user_data['Documento'];

                $Instituicão_Protetivas                 = $user_data['Nome_Inst'];
                $Endereco_Inst_Protetivas               = $user_data['Endereco_Inst'];
                $Vara_Protetivas                        = $user_data['Vara'];
                $Responsavel_Inst_Protetivas            = $user_data['Nome_Respo_Inst'];
                $Responsavel_Protetivas                 = $user_data['Nome_Respo'];
                $Gênero_Protetivas                      = $user_data['Genero'];
                $Responsavel_Nacionalidade_Protetivas   = $user_data['Nacionalidade'];
                $Responsavel_Endereco_Protetivas        = $user_data['Endereco_respo'];
                $Responsavel_Parentesco_Protetivas      = $user_data['Parentesco'];
                $Documento_Protetivas                   = $user_data['Documento_Respo'];
                //$Text_Outro_Documento_Protetivas        = $user_data['Text_Documento_Protetivas'];
                //$Text_Copia_Documento_Protetivas        = $user_data['Text_Copia_Documento_Protetivas'];
                $Numero_Documento_Protetivas            = $user_data['Documento_Respo'];
                $Responsavel_Nascimento_Protetivas      = $user_data['Data_Nascimento'];
                $Vinculo_Protetivas                     = $user_data['Vinculo'];

            }
            //print_r($Identidade_Pessoa);
        } else{
            header('Location: Sistema.php');
        }

        $sqlSelect = "SELECT * FROM documentos WHERE idDocumentos=$Documento_Protetivas";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){

                $Descrição       = $user_data['Descricao'];
                $Numero_doc        = $user_data['Numero'];

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
</head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="style.css">-->
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
    <a href="Dados_CRI.php">Voltar</a>
    <div class="box_CRI_Medidas">
        <form action="saveEdit_CRI_Protetivas.php" id="saveEdit_CRI_Protetivas" method="post">
            <fieldset>
                <legend><b>Criança - Editar</b></legend>
                <br>

                <h2> MEDIDAS PROTETIVAS </h2>
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

                <div class="field radiobox">            
                    <p>Em caso de a crianca ou o adolescente já encaminhado para instituicão de acolhimento, favor informar:</p>
                    <input type="radio" id="Encaminhada_Protetivas_Sim" name="Encaminhada_Protetivas" value="SIM" <?php echo $Instituicão_Protetivas != "N/A" ?"checked":"" ?>
                     onclick="Requerido('Instituicão_Protetivas_Box');Requerido('Endereco_Inst_Protetivas_Box');Requerido('Responsavel_Inst_Protetivas_Box');Requerido('Vara_Protetivas_Box')">
                    <label for="Encaminhada_Protetivas_Sim">Sim</label>
                    <input type="radio" id="Encaminhada_Protetivas_Nao" name="Encaminhada_Protetivas" value="NÃO" <?php echo $Instituicão_Protetivas == "N/A" ?"checked":"" ?>
                     onclick="Limpar('Instituicão_Protetivas_Box');Limpar('Endereco_Inst_Protetivas_Box');Limpar('Responsavel_Inst_Protetivas_Box');Limpar('Vara_Protetivas_Box')" >
                    <label for="Encaminhada_Protetivas_Nao">Não</label>
                </div>
                <br><br>
                
                <div class="inputBox" id="Instituicão_Protetivas_Box">
                    <input type="text" name="Instituicão_Protetivas" id="Instituicão_Protetivas" class="inputUser" value="<?php echo $Instituicão_Protetivas ?>"  required >
                    <label for="Instituicão_Protetivas"  class="labelInput">Instituicão de acolhimento:</label>
                    <br><br>
                </div>
                <div class="inputBox" id="Endereco_Inst_Protetivas_Box">
                    <input type="text" name="Endereco_Inst_Protetivas" id="Endereco_Inst_Protetivas" class="inputUser" value="<?php echo $Endereco_Inst_Protetivas ?>"  required  >
                    <label for="Endereco_Inst_Protetivas" class="labelInput">Endereco:</label>
                    <br><br>
                </div>
                <div class="inputBox" id="Responsavel_Inst_Protetivas_Box">
                    <input type="text" name="Responsavel_Inst_Protetivas" id="Responsavel_Inst_Protetivas" class="inputUser" value="<?php echo $Responsavel_Inst_Protetivas ?>" required  >
                    <label for="Responsavel_Inst_Protetivas" class="labelInput">Responsável:</label>
                    <br><br>
                </div>
                <div class="inputBox" id="Vara_Protetivas_Box">
                    <input type="text" name="Vara_Protetivas" id="Vara_Protetivas" class="inputUser" value="<?php echo $Vara_Protetivas ?>" required  >
                    <label for="Vara_Protetivas" class="labelInput">Vara da Infância e da Juventude:</label>
                    <br>
                </div>
                    <?php echo $Instituicão_Protetivas != "N/A" ?"
                    <script>
                    Preencher('Instituicão_Protetivas_Box'),
                    Preencher('Endereco_Inst_Protetivas_Box'),
                    Preencher('Responsavel_Inst_Protetivas_Box'),
                    Preencher('Vara_Protetivas_Box')
                    </script>":""  ?>
                    <br>

                <div class="field radiobox">            
                <p>Em caso de a crianca ou o adolescente representado por responsável legal já designado(a) no Brasil, favor informar:</p>
                <input type="radio" id="Representante_Protetiva_Sim" name="Representante_Protetiva" value="SIM" <?php echo $Responsavel_Protetivas != "N/A" ?"checked":"" ?> 
                onclick="Requerido('Responsavel_Protetivas_Box');Requerido('Documento_Protetivas_Box');Requerido('Numero_Documento_Protetivas_Box');Requerido('Gênero_Protetivas_Box');Requerido('Responsavel_Nascimento_Protetivas_Box');Requerido('Responsavel_Nacionalidade_Protetivas_Box');Requerido('Responsavel_Endereco_Protetivas_Box');Requerido('Responsavel_Parentesco_Protetivas_Box');Requerido('Vinculo_Protetivas_Box')">
                <label for="Representante_Protetiva_Sim">Sim</label>
                <input type="radio" id="Representante_Protetiva_Nao" name="Representante_Protetiva" value="NÃO" <?php echo $Responsavel_Protetivas == "N/A" ?"checked":"" ?>
                onclick="Limpar('Responsavel_Protetivas_Box');Limpar('Documento_Protetivas_Box');Limpar('Numero_Documento_Protetivas_Box');Limpar('Gênero_Protetivas_Box');Limpar('Responsavel_Nascimento_Protetivas_Box');Limpar('Responsavel_Nacionalidade_Protetivas_Box');Limpar('Responsavel_Endereco_Protetivas_Box');Limpar('Responsavel_Parentesco_Protetivas_Box');Limpar('Vinculo_Protetivas_Box')">
                <label for="Representante_Protetiva_Nao">Não</label>

                </div>
                <br><br>

                <div class="inputBox" id="Responsavel_Protetivas_Box">
                    <input type="text" name="Responsavel_Protetivas" id="Responsavel_Protetivas" class="inputUser" value="<?php echo $Responsavel_Protetivas ?>" required  >
                    <label for="Responsavel_Protetivas" class="labelInput">Nome completo do responsável legal</label>
                    <br>
                </div>

                <div class="field radiobox" id="Documento_Protetivas_Box">            
                <p>Responsavel em posse de qual documento? </p>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CERTIDÃO DE NASCIMENTO" onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="CERTIDÃO DE NASCIMENTO" required>CERTIDÃO DE NASCIMENTO </label> <br>                   
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CEDULA DE IDENTIDADE" <?php echo $Descrição == "CEDULA DE IDENTIDADE" ?"checked":"" ?> onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="CEDULA DE IDENTIDADE" required>CEDULA DE IDENTIDADE </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA DA CERTIDÃO DE NASCIMENTO" onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="COPIA DA CERTIDÃO DE NASCIMENTO" required>COPIA DA CERTIDÃO DE NASCIMENTO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA CÉDULA DE IDENTIDADE" onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="COPIA CÉDULA DE IDENTIDADE" required>COPIA CÉDULA DE IDENTIDADE </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DECLARAÇÃO DE NASCIDO VIVO" onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="DDDECLARAÇÃO DE NASCIDO VIVONV" required>DECLARAÇÃO DE NASCIDO VIVO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" onclick="Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" required>PARECER SOCIAL DO MINISTERIO DA CIDADANIA </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="NENHUM DOCUMENTO" onclick="Limpar('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="NENHUM DOCUMENTO " required>NENHUM DOCUMENTO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DO" onclick="Requerido('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')"><label for="DO">OUTRO. </label><br>
                    <input type="text" name="Text_Documento_Protetivas" id="Text_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser" ></input>
                    <?php echo $Documento_Protetivas =="DO" ?"<script>Preencher('Text_Documento_Protetivas')</script>":""  ?>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DCO" onclick="Requerido('Text_Copia_Documento_Protetivas');Sumir('Text_Documento_Protetivas')"><label for="DCO">COPIA OUTRO </label><br>
                    <?php echo $Documento_Protetivas == "DCO" ?"<script>Preencher('Text_Copia_Documento_Protetivas')</script>":""  ?>
                    <input type="text" name="Text_Copia_Documento_Protetivas" id="Text_Copia_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser" ></input>
                    <br><br>
                </div>

                <div class="inputBox" id="Numero_Documento_Protetivas_Box">
                    <input type="text" name="Numero_Documento_Protetivas" id="Numero_Documento_Protetivas" class="inputUser" value="<?php echo $Numero_doc ?>" required >
                    <label for="Numero_Documento_Protetivas" class="labelInput">Número do Documento:</label>
                </div>
                
                <div class="field radiobox" id="Gênero_Protetivas_Box">            
                    <p>Genero:</p>
                    <input type="radio" id="feminino_Protetivas" name="Gênero_Protetivas" value="feminino" <?php echo $Gênero_Protetivas == "feminino" ?"checked":"" ?>>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino_Protetivas" name="Gênero_Protetivas" value="masculino" <?php echo $Gênero_Protetivas == "masculino" ?"checked":"" ?>>
                    <label for="masculino">Masculino</label>
                    <br><br>
                </div>
                
                <div class="inputBox" id="Responsavel_Nascimento_Protetivas_Box">
                    <label for="Responsavel_Nascimento_Protetivas">Data de Nascimento:</label>
                    <input type="date" max='2004-11-21' name="Responsavel_Nascimento_Protetivas" id="Responsavel_Nascimento_Protetivas" class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Responsavel_Nascimento_Protetivas)->format("Y-m-d")  ?>" required   >
                    <br><br><br>
                </div>
                
                <div class="inputBox" id="Responsavel_Nacionalidade_Protetivas_Box">
                    <input type="text" name="Responsavel_Nacionalidade_Protetivas" id="Responsavel_Nacionalidade_Protetivas" class="inputUser" value="<?php echo $Responsavel_Nacionalidade_Protetivas ?>" required  >
                    <label for="Responsavel_Nacionalidade_Protetivas" class="labelInput">Nacionalidade:</label>
                    <br><br>
                </div>

                <div class="inputBox" id="Responsavel_Endereco_Protetivas_Box">
                    <input type="text" name="Responsavel_Endereco_Protetivas" id="Responsavel_Endereco_Protetivas" class="inputUser" value="<?php echo $Responsavel_Endereco_Protetivas ?>" required  >
                    <label for="Responsavel_Endereco_Protetivas" class="labelInput">Endereco:</label>
                    <br><br>
                </div>

                <div class="inputBox" id="Responsavel_Parentesco_Protetivas_Box">
                    <input type="text" name="Responsavel_Parentesco_Protetivas" id="Responsavel_Parentesco_Protetivas" class="inputUser" value="<?php echo $Responsavel_Parentesco_Protetivas ?>" required  >
                    <label for="Responsavel_Parentesco_Protetivas" class="labelInput">Parentesco:</label>
                    <br>
                </div>

                <div class="field radiobox" id="Vinculo_Protetivas_Box">            
                    <p>Constata o vínculo pelos observacão e documentacão apresentada?</p>
                    <input type="radio" id="Vinculo_Protetivas_Sim" name="Vinculo_Protetivas" value="SIM" <?php echo $Vinculo_Protetivas == "SIM" ?"checked":"" ?>>
                    <label for="Vinculo_Protetivas" required>Sim</label>
                    <input type="radio" id="Vinculo_Protetivas_Nao" name="Vinculo_Protetivas" value="NÃO" <?php echo $Vinculo_Protetivas == "NÃO" ?"checked":"" ?>>
                    <label for="Vinculo_Protetivas" required>Não</label>   
                </div>

                <?php echo $Responsavel_Protetivas != "N/A" ?"
                <script>Preencher('Responsavel_Protetivas_Box'),
                Preencher('Documento_Protetivas_Box'),
                Preencher('Numero_Documento_Protetivas_Box'),
                Preencher('Gênero_Protetivas_Box'),
                Preencher('Responsavel_Nascimento_Protetivas_Box'),
                Preencher('Responsavel_Nacionalidade_Protetivas_Box'),
                Preencher('Responsavel_Endereco_Protetivas_Box'),
                Preencher('Responsavel_Parentesco_Protetivas_Box'),
                Preencher('Vinculo_Protetivas_Box')</script>":""  ?>



                <br><br>
                <input type="hidden" name="idMedidas_Protetivas" id="idMedidas_Protetivas" Value="<?php echo $idMedidas_Protetivas ?>">
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

    <script src="js/script_Update_Protetivas.js"></script>
</body>
</html>