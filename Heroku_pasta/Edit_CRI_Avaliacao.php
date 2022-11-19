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

                <h2> AVALIAÇÃO PRELIMINAR DA CRIANcA OU ADOLESCENTE </h2>
                <script>
                        function myalert() {
                            alert("Atualização Salva com sucesso");
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
                <br>
                <div>
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>
        </form>

    </div>
</body>
</html>