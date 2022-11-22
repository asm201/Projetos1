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
                
                $Nome_Pessoa               = $user_data['Nome'];
                $Identidade_pessoa         = $user_data['Documento'];
                $idSituacao                = $user_data['idSituacao'];
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
    <a href="Dados_CRI.php">Voltar</a>
    <div class="box_CRI_Avaliacao">
        <form action="saveEdit_CRI_Avaliacao.php" method="post">
            <fieldset>
                <legend><b>Avaliação - Editar</b></legend>
                <br>

                <h2> AVALIAÇÃO PRELIMINAR DA CRIANcA OU ADOLESCENTE </h2>
                <script>
                        function myalert() {
                            alert("Atualizanado...");
                        }
                        function Preencher(el) {
                                const elements = document.getElementById(el).querySelectorAll('input');
                                for (let i = 0; i < elements.length; i++) {
                                    const element = elements[i];
                                    if (element.required) {
                                        element.value = null;
                                    }
                                }

                                var display = document.getElementById(el).style.display;
                                if(display == "none")
                                    document.getElementById(el).style.display = 'block';
                            }
                            function Sumir(el){
                                const elements = document.getElementById(el).querySelectorAll('input');
                                for (let i = 0; i < elements.length; i++) {
                                    const element = elements[i];
                                    if (element.required) {
                                        element.value = "N/A";
                                    }
                                }

                                var display = document.getElementById(el).style.display;
                                if(display != "none")
                                    document.getElementById(el).style.display = 'none';
                            }	
                </script>
                
                <label>Avaliacão de saúde mental (conduta): indique se a crianca ou adolescente apresenta pensamento confuso 
                    (ex. respostas frequentemente incoerentes ou contraditórias)/evidencia perda de contato com a realidade 
                    (ex: seu comportamento parece estranho ou sem sentido/ conduta estranha evidente (ex: hiperatividade, impulsividade, comportamento hostil)/ou risco de 
                    causar danos a outros a si mesmo (a)</label><br><br>

                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Avaliacão de saúde mental (conduta): indique se a crianca ou adolescente apresenta pensamento confuso
                        (ex. respostas frequentemente incoerentes ou contraditórias)/evidencia perda de contato com a realidade (ex:
                        seu comportamento parece estranho ou sem sentido/ conduta estranha evidente (ex: hiperatividade,
                        impulsividade, comportamento hostil)/ou risco de causar danos a outros a si mesmo (a)</label><br>
                    <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Normal" value="Normal" <?php echo $Mental_Avaliacão == "Normal" ?"checked":"" ?> onclick="Sumir('Txt_Mental_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Anormal" value="Anormal" <?php echo $Mental_Avaliacão == "Anormal" ?"checked":"" ?> onclick="Preencher('Txt_Mental_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <textarea type="text" name="Txt_Mental_Avaliacão" id="Txt_Mental_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    <?php echo $Mental_Avaliacão == "Anormal" ?"<script>Preencher('Txt_Mental_Avaliacão')</script>":"" ?> 
                </div>
                <br>
                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Avaliacão física preliminar: sinalize se a crianca ou adolescente apresenta sinais visíveis de trauma físico
                        ou deficiência física; queixa-se de dores ou doencas, quadro de deficiência motora, etc.</label><br>
                    <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Normal"  value="Normal" <?php echo $Fisico_Avaliacão == "Normal" ?"checked":"" ?> onclick="Sumir('Txt_Fisico_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Anormal"  value="Anormal" <?php echo $Fisico_Avaliacão == "Anormal" ?"checked":"" ?> onclick="Preencher('Txt_Fisico_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <textarea type="text" name="Txt_Fisico_Avaliacão" id="Txt_Fisico_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    <?php echo $Fisico_Avaliacão == "Anormal" ?"<script>Preencher('Txt_Fisico_Avaliacão')</script>":"" ?> 
                </div>
                <br>
                <div class="field radiobox">
                    <label><label style="color:#FF0000">*</label> Avaliacão de idade e maturidade (a avaliacão de idade só deve ser realizada quando houver significativas
                        dúvidas sobre a idade da crianca ou adolescente, tal como ausência de documentacão, e não deve levar em
                        consideracão apenas a aparência física, mas também a maturidade psicológica)</label><br>
                    <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Normal" value="Normal" <?php echo $Idade_Avaliacão == "Normal" ?"checked":"" ?>  onclick="Sumir('Txt_Idade_Avaliacão')"><label for="Normal">Normal </label>
                    <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Anormal" value="Anormal" <?php echo $Idade_Avaliacão == "Anormal" ?"checked":"" ?> onclick="Preencher('Txt_Idade_Avaliacão')"><label for="Anormal">Anormal </label>
                    <br><br>
                    <textarea type="text" name="Txt_Idade_Avaliacão" id="Txt_Idade_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    <?php echo $Idade_Avaliacão == "Anormal" ?"<script>Preencher('Txt_Idade_Avaliacão')</script>":"" ?> 
                </div> 
                <input type="hidden" name="idSituacao" Value="<?php echo $idSituacao ?>">
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>
        </form>

    </div>
</body>
</html>