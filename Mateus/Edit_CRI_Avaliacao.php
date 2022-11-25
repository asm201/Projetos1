<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT Situacao.*, ca.Nome, ca.Documento FROM Situacao
        LEFT JOIN crianca_adolecente ca
        on Situacao.Crianca = ca.Documento WHERE ca.Documento='$Identidade_Pessoa'";


        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){
                
                $idSituacao                = $user_data['idSituacao'];
                $Nome_Pessoa               = $user_data['Nome'];
                $Identidade_pessoa         = $user_data['Documento'];

                $Mental_Avaliacão          = $user_data['Saude_Mental'];
                $Fisico_Avaliacão          = $user_data['Saude_Fisica'];
                $Idade_Avaliacão           = $user_data['Idade_Mental'];
                
                //print_r($Txt_Retornar_Pessoa);
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
    <div class="box_CRI_Avaliacao">
        <form action="saveEdit_CRI_Avaliacao.php" id="saveEdit_CRI_Avaliacao" method="post">
            <fieldset>
                <legend><b>Criança - Editar</b></legend>
                <br>

                <h2> AVALIAÇÃO PRELIMINAR DA CRIANcA OU ADOLESCENTE </h2>

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
                    <label><label style="color:#FF0000">*</label> Avaliacão de saúde mental (conduta): indique se a crianca ou adolescente apresenta pensamento confuso
                        (ex. respostas frequentemente incoerentes ou contraditórias)/evidencia perda de contato com a realidade (ex:
                        seu comportamento parece estranho ou sem sentido/ conduta estranha evidente (ex: hiperatividade,
                        impulsividade, comportamento hostil)/ou risco de causar danos a outros a si mesmo (a)</label><br>
                    <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Normal" value="Normal" <?php echo $Mental_Avaliacão == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Mental_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Anormal" value="Anormal" <?php echo $Mental_Avaliacão != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Mental_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <input type="text" name="Txt_Mental_Avaliacão" id="Txt_Mental_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser" value="<?php echo $Mental_Avaliacão ?>"required></input>
                    <?php echo $Mental_Avaliacão != "N/A" ?"<script>Preencher('Txt_Mental_Avaliacão')</script>":""  ?>
                </div>
                <br>
                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Avaliacão física preliminar: sinalize se a crianca ou adolescente apresenta sinais visíveis de trauma físico
                        ou deficiência física; queixa-se de dores ou doencas, quadro de deficiência motora, etc.</label><br>
                    <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Normal"  value="Normal" <?php echo $Fisico_Avaliacão == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Fisico_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Anormal"  value="Anormal" <?php echo $Fisico_Avaliacão != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Fisico_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <input type="text" name="Txt_Fisico_Avaliacão" id="Txt_Fisico_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser" value="<?php echo $Fisico_Avaliacão ?>" required></input>
                    <?php echo $Fisico_Avaliacão != "N/A" ?"<script>Preencher('Txt_Fisico_Avaliacão')</script>":""  ?>
                </div>
                <br>
                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Avaliacão de idade e maturidade (a avaliacão de idade só deve ser realizada quando houver significativas
                        dúvidas sobre a idade da crianca ou adolescente, tal como ausência de documentacão, e não deve levar em
                        consideracão apenas a aparência física, mas também a maturidade psicológica)</label><br>
                    <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Normal" value="Normal" <?php echo $Idade_Avaliacão == "N/A" ?"checked":"" ?>  onclick="Limpar('Txt_Idade_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Anormal" value="Anormal" <?php echo $Idade_Avaliacão != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Idade_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <input type="text" name="Txt_Idade_Avaliacão" id="Txt_Idade_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser" value="<?php echo $Idade_Avaliacão ?>" required></input>

                    <?php echo $Idade_Avaliacão != "N/A" ?"<script>Preencher('Txt_Idade_Avaliacão')</script>":""  ?>
                    
                    <?php// var_dump($Idade_Avaliacão);?>
                </div>
                        <input type="hidden" name="idSituacao" id="idSituacao" Value="<?php echo $idSituacao ?>"><br>
                        <input type="submit" name="update" id="update">
                </div>

            </fieldset>
        </form>

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

    <script src="js/script_Update_Avaliacao.js"></script>
</body>
</html>