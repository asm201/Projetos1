<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT Situação.*, ca.Nome, ca.Documento FROM Situação
        LEFT JOIN criança_adolecente ca
        on Situação.Criança = ca.Documento WHERE ca.Documento='$Identidade_Pessoa'";


        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){
                
                $Nome_Pessoa               = $user_data['Nome'];
                $Identidade_pessoa         = $user_data['Documento'];
                $Vida_antes                = $user_data['Vida_Antes'];
                $Razão_Saida               = $user_data['Razão_Saida'];
                $Situacão_Pessoa           = $user_data['Saida_Forçada'];
                //$Txt_Situacão_Pessoa       = $user_data['Saida_Forçada'];
                $Alguem_Pessoa             = $user_data['Ajuda'];
                //$Txt_Alguem_Pessoa         = $user_data['Ajuda'];
                $Viagem_Pessoa             = $user_data['Acompanhado'];
                //$Txt_Viagem_Pessoa         = $user_data['Acompanhado'];
                $Entrou_Pessoa             = $user_data['Entrada_Sozinho'];
                //$Txt_Entrou_Pessoa         = $user_data['Entrada_Sozinho'];
                $Permancer_Pessoa          = $user_data['Permanencia'];
                $Retornar_Pessoa           = $user_data['Retorno'];
                $Medo_Pessoa               = $user_data['Medo_Retorno'];
                //$Txt_Retornar_Pessoa       = $user_data['Medo_Retorno'];
                $Parentes_Origem_Pessoa    = $user_data['Parente_Pais_Origem'];
                $Parentes_Brasil_Pessoa    = $user_data['Parente_Brasil'];
                $Proteção_Indicadores      = $user_data['Proteção_da_Criança'];
                $Solicitação_Indicadores   = $user_data['Solicitação_de_Indicadores'];

                //$Txt_Medo_Pessoa           = $_POST['Txt_Medo_Pessoa'];
                
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

                <h2> SITUAÇÃO DA CRIANÇA OU ADOLESCENTE </h2>
                <div class="inputBox">
                <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" value="<?php echo $Nome_Pessoa ?>" required>
                    <label for="Nome_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nome Completo:</label>
                </div>
                <br><br>
                <div class="inputBox" style="margin-top: -23px;">
                    <label for="Identidade_Pessoa" class="labelInputReadonly"><label style="color:#FF0000">*</label> Cédula de identidade:</label>
                    <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" value="<?php echo $Identidade_Pessoa?>" readonly>
                </div>
                <br><br>

                <div class="inputBox">
                    <textarea type="text" name="Vida_antes" id="Vida_antes" class="inputUser" required ><?php echo $Vida_antes ?></textarea>
                    <label for="Vida_antes" class="labelInput"><label style="color:#FF0000">*</label> Como era sua vida em seu país de origem, antes de você se separar de sua família ?</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <textarea type="text" name="Razão_Saida" id="Razão_Saida" class="inputUser" required ><?php echo $Razão_Saida ?></textarea>
                    <label for="Razão_Saida" class="labelInput"><label style="color:#FF0000">*</label> Em que momento e por qual razão você deixou seu país e se separou de sua família?</label>
                </div>
                <br><br>
                <script type="text/javascript">
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
                    <input type="radio" id="Situacão_Pessoa_Sim" name="Situacão_Pessoa" value="SIM" <?php echo $Situacão_Pessoa != "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Situacão_Pessoa')" >
                    <label for="Mãe_Viva_Sim">Sim</label>
                    <input type="radio" id="Situacão_Pessoa_Nao" name="Situacão_Pessoa" value="NÃO" <?php echo $Situacão_Pessoa == "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Situacão_Pessoa')" >
                    <label for="Mãe_Viva_Não">Não</label>
                    <textarea type="text" name="Txt_Situacão_Pessoa" id="Txt_Situacão_Pessoa" style="display:none" placeholder="Digite aqui a situação." class="inputUser" ><?php echo $Situacão_Pessoa ?></textarea>
                    <?php echo $Situacão_Pessoa != "N/A" ?"<script>Preencher('Txt_Situacão_Pessoa')</script>":""  ?>
                </div>
                <br>
                <div class="field radiobox">
                    <label>Alguém o ajudou a chegar até o Brasil?</label><br>
                    <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Sim" value="Sim" <?php echo $Alguem_Pessoa != "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Alguem_Pessoa')"><label for="Sim">Sim </label>
                    <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Nao" value="Não" <?php echo $Alguem_Pessoa == "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Alguem_Pessoa')"><label for="Não">Não </label>
                    <br><br>
                    <textarea type="text" name="Txt_Alguem_Pessoa" id="Txt_Alguem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Alguem_Pessoa ?></textarea>
                    <?php echo $Alguem_Pessoa != "N/A" ?"<script>Preencher('Txt_Alguem_Pessoa')</script>":""  ?>
                </div>
                <br>
                <div class="field radiobox">
                    <label>Você realizou a viagem acompanhado?</label><br>
                    <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Sim" value="Sim" <?php echo $Viagem_Pessoa != "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Viagem_Pessoa')"><label for="Sim">Sim </label>
                    <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Nao" value="Não" <?php echo $Viagem_Pessoa == "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Viagem_Pessoa')"><label for="Não">Não </label>
                    <br><br>
                    <textarea type="text" name="Txt_Viagem_Pessoa" id="Txt_Viagem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Viagem_Pessoa ?></textarea>
                    <?php echo $Viagem_Pessoa != "N/A" ?"<script>Preencher('Txt_Viagem_Pessoa')</script>":"" ?>          
                </div>
                <br>

                <div class="field radiobox">
                    <label>Você entrou no Brasil sozinho?</label><br>
                    <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Sim" value="Sim" <?php echo $Entrou_Pessoa != "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Entrou_Pessoa')"><label for="Sim">Sim </label>
                    <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Nao" value="Não" <?php echo $Entrou_Pessoa == "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Entrou_Pessoa')"><label for="Não">Não </label>
                    <br><br>
                    <textarea type="text" name="Txt_Entrou_Pessoa" id="Txt_Entrou_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Entrou_Pessoa ?></textarea> 
                    <?php echo $Entrou_Pessoa != "N/A" ?"<script>Preencher('Txt_Entrou_Pessoa')</script>":"" ?>  
                </div>
                <br>

                <div class="field radiobox">
                    <label>Você tem intenção de peremanecer no Brasil?</label><br>
                    <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Sim" value="Sim" <?php echo $Permancer_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                    <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Nao" value="Não" <?php echo $Permancer_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                 </div>
                <br>

                <div class="field radiobox">
                    <label>Você deseja retornar ao seu país?</label><br>
                    <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Sim" value="Sim" <?php echo $Retornar_Pessoa == "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Retornar_Pessoa')"><label for="Sim">Sim </label>
                    <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Nao" value="Não" <?php echo $Retornar_Pessoa != "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Retornar_Pessoa')"><label for="Não">Não </label>
                    <br><br>
                    <textarea type="text" name="Txt_Retornar_Pessoa" id="Txt_Retornar_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Retornar_Pessoa ?></textarea>
                    <?php echo $Retornar_Pessoa != "N/A" ?"<script>Preencher('Txt_Retornar_Pessoa')</script>":"" ?>  
                </div>
                <br>

                <div class="field radiobox">
                    <label>Você tem medo de regressar ao seu país de origem?</label><br>
                    <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Sim" value="Sim" <?php echo $Medo_Pessoa != "N/A" ?"checked":"" ?> onclick="Preencher('Txt_Medo_Pessoa')"><label for="Sim">Sim </label>
                    <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Nao" value="Não" <?php echo $Medo_Pessoa == "N/A" ?"checked":"" ?> onclick="Sumir('Txt_Medo_Pessoa')"><label for="Não">Não </label>
                    <br><br>
                    <textarea type="text" name="Txt_Medo_Pessoa" id="Txt_Medo_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Medo_Pessoa ?></textarea>
                    <?php echo $Medo_Pessoa != "N/A" ?"<script>Preencher('Txt_Medo_Pessoa')</script>":"" ?>  
                </div>
                <br>


                <div class="field radiobox">
                    <label>Tem parentes (irmãos tios, primos e avós) no país de origem?</label><br>
                    <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Sim" value="Sim" <?php echo $Parentes_Origem_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                    <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Nao" value="Não" <?php echo $Parentes_Origem_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                </div>
                <br><br>
                <div class="field radiobox">
                    <label>Tem parentes (irmãos tios, primos e avós) no Brasoç?</label><br>
                    <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Sim" value="Sim" <?php echo $Parentes_Brasil_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                    <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Nao" value="Não" <?php echo $Parentes_Brasil_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                </div>

                <div class="field radiobox">            
                <p>Possíveis necessidades de proteção da criança ou adolescente:</p>
                    <input type="radio" name="Proteção_Indicadores" id="Convivencia_Proteção" value="ProteçãoC" <?php echo $Proteção_Indicadores == "ProteçãoC" ?"checked":"" ?> onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Convivencia_Proteção" required>Retorno à convivência familiar, conforme parâmetros de proteção integral e atenção ao interesse superior da criança e do adolescente; </label><br>
                    <input type="radio" name="Proteção_Indicadores" id="Familiar_Proteção" value="ProteçãoF" <?php echo $Proteção_Indicadores == "ProteçãoF" ?"checked":"" ?> onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Familiar_Proteção" required>Medida de proteção por reunião familiar </label><br>
                    <input type="radio" name="Proteção_Indicadores" id="Trafico_Proteção" value="ProteçãoT" <?php echo $Proteção_Indicadores == "ProteçãoT" ?"checked":"" ?> onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Trafico_Proteção" required>Proteção como vítima de tráfico de pessoas; </label><br>
                    <input type="radio" name="Proteção_Indicadores" id="Outro_Proteção" value="ProteçãoO" <?php echo $Proteção_Indicadores == "ProteçãoO" ?"checked":"" ?> onclick="Preencher('Txt_Proteção_Indicadores')"><label for="Outro_Proteção" required>Outra medida de regularização migratória ou proteção como refugiado ou apátrida, conforme a legislação em vigor. Informe: </label><br><br>
                    <input type="text" name="Txt_Proteção_Indicadores" id="Txt_Proteção_Indicadores" style="display:none"  placeholder="Digite aqui" class="inputUser"></input>
                    <?php echo $Proteção_Indicadores == "ProteçãoO" ?"<script>Preencher('Txt_Proteção_Indicadores')</script>":"" ?> 
                </div>
                <br>
                <div class="field radiobox">  
                    <label for="Solicitação_Indicadores">Solicitação de:</label><br>
                    <input type="radio" name="Solicitação_Indicadores" id="Temporaria_Indicadores" value="RESIDÊNCIA TEMPORÁRIA" <?php echo $Solicitação_Indicadores == "RESIDÊNCIA TEMPORÁRIA" ?"checked":"" ?>><label for="Temporaria_Indicadores"  required >RESIDÊNCIA TEMPORÁRIA </label>
                    <input type="radio" name="Solicitação_Indicadores" id="Refugiu_Indicadores" value="REFÚGIO" <?php echo $Solicitação_Indicadores == "REFÚGIO" ?"checked":"" ?>><label for="Refugiu_Indicadores"  required>REFÚGIO </label>
                    <input type="radio" name="Solicitação_Indicadores" id="Institucionalização_Indicadores" value="INSTITUCIONALIZAÇÃO" <?php echo $Solicitação_Indicadores == "INSTITUCIONALIZAÇÃO" ?"checked":"" ?> ><label for="Institucionalização_Indicadores"  required>INSTITUCIONALIZAÇÃO </label>
                    <input type="radio" name="Solicitação_Indicadores" id="Ingresso_temporario_Indicadores" value="INGRESSO TEMPORARIO" <?php echo $Solicitação_Indicadores == "INGRESSO TEMPORARIO" ?"checked":"" ?>><label for="Ingresso_temporario_Indicadores"  required>INGRESSO TEMPORARIO </label>
                </div>
                <br><br>
                <div>
                    <br>
                        <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>
        </form>

    </div>
</body>
</html>