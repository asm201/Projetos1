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
                //$Documento_Protetivas                   = $user_data['Documento_Respo'];
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
            top: 100%;
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

                <h2> MEDIDAS PROTETIVAS </h2>
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

                <div class="field radiobox">            
                    <p>Em caso de a crianca ou o adolescente já encaminhado para instituicão de acolhimento, favor informar:</p>
                    <input type="radio" id="Encaminhada_Protetivas_Sim" name="Encaminhada_Protetivas" value="SIM" <?php echo $Instituicão_Protetivas != "N/A" ?"checked":"" ?> onclick="Preencher('Instituicão_Protetivas_Box');Preencher('Endereco_Inst_Protetivas_Box');Preencher('Responsavel_Inst_Protetivas_Box');Preencher('Vara_Protetivas_Box')">
                    <label for="Encaminhada_Protetivas_Sim">Sim</label>
                    <input type="radio" id="Encaminhada_Protetivas_Nao" name="Encaminhada_Protetivas" value="NÃO" <?php echo $Instituicão_Protetivas == "N/A" ?"checked":"" ?> onclick="Sumir('Instituicão_Protetivas_Box');Sumir('Endereco_Inst_Protetivas_Box');Sumir('Responsavel_Inst_Protetivas_Box');Sumir('Vara_Protetivas_Box')" >
                    <label for="Encaminhada_Protetivas_Nao">Não</label>
                    <?php echo $Instituicão_Protetivas != "N/A" ?"<script>Preencher('Instituicão_Protetivas');Preencher('Endereco_Inst_Protetivas'),Preencher('Responsavel_Inst_Protetivas'),Preencher('Vara_Protetivas')</script>":""  ?>
                    <br>
                </div>
                <br><br>

                <div class="inputBox" id="Instituicão_Protetivas_Box">
                    <input type="text" name="Instituicão_Protetivas" id="Instituicão_Protetivas" class="inputUser" value="<?php echo $Instituicão_Protetivas ?>" required  >
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

                <div class="field radiobox">            
                <p>Em caso de a crianca ou o adolescente representado por responsável legal já designado(a) no Brasil, favor informar:</p>
                <input type="radio" id="Representante_Protetiva_Sim" name="Representante_Protetiva" value="SIM" <?php echo $Responsavel_Protetivas != "N/A" ?"checked":"" ?> 
                onclick="Preencher('Responsavel_Protetivas_Box');Preencher('Documento_Protetivas_Box');Preencher('Numero_Documento_Protetivas_Box');Preencher('Gênero_Protetivas_Box');Preencher('Responsavel_Nascimento_Protetivas_Box');Preencher('Responsavel_Nacionalidade_Protetivas_Box');Preencher('Responsavel_Endereco_Protetivas_Box');Preencher('Responsavel_Parentesco_Protetivas_Box');Preencher('Vinculo_Protetivas_Box')">
                <label for="Representante_Protetiva_Sim">Sim</label>
                <input type="radio" id="Representante_Protetiva_Nao" name="Representante_Protetiva" value="NÃO" <?php echo $Responsavel_Protetivas == "N/A" ?"checked":"" ?>
                onclick="Sumir('Responsavel_Protetivas_Box');Sumir('Documento_Protetivas_Box');Sumir('Numero_Documento_Protetivas_Box');Sumir('Gênero_Protetivas_Box');Sumir('Responsavel_Nascimento_Protetivas_Box');Sumir('Responsavel_Nacionalidade_Protetivas_Box');Sumir('Responsavel_Endereco_Protetivas_Box');Sumir('Responsavel_Parentesco_Protetivas_Box');Sumir('Vinculo_Protetivas_Box')">
                <label for="Representante_Protetiva_Nao">Não</label>
                <?php echo $Responsavel_Protetivas != "N/A" ?"<script>Preencher('Responsavel_Protetivas_Box');Preencher('Documento_Protetivas_Box'),Preencher('Numero_Documento_Protetivas_Box'),Preencher('Gênero_Protetivas_Box'),Preencher('Responsavel_Nascimento_Protetivas_Box'),Preencher('Responsavel_Nacionalidade_Protetivas_Box'),Preencher('Responsavel_Endereco_Protetivas_Box'),Preencher('Responsavel_Parentesco_Protetivas_Box'),Preencher('Vinculo_Protetivas_Box')</script>":""  ?>
                </div>
                <br><br>

                <div class="inputBox" id="Responsavel_Protetivas_Box">
                    <input type="text" name="Responsavel_Protetivas" id="Responsavel_Protetivas" class="inputUser" value="<?php echo $Responsavel_Protetivas ?>" required  >
                    <label for="Responsavel_Protetivas" class="labelInput">Nome completo do responsável legal</label>
                    <br>
                </div>

                <div class="field radiobox" id="Documento_Protetivas_Box">            
                <p>Possui certidão de nascimento?</p>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CERTIDÃO DE NASCIMENTO" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="CERTIDÃO DE NASCIMENTO" required>CERTIDÃO DE NASCIMENTO </label> <br>                   
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CEDULA DE IDENTIDADE" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="CEDULA DE IDENTIDADE" required>CEDULA DE IDENTIDADE </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA DA CERTIDÃO DE NASCIMENTO" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="COPIA DA CERTIDÃO DE NASCIMENTO" required>COPIA DA CERTIDÃO DE NASCIMENTO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA CÉDULA DE IDENTIDADE" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="COPIA CÉDULA DE IDENTIDADE" required>COPIA CÉDULA DE IDENTIDADE </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DECLARAÇÃO DE NASCIDO VIVO" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="DDDECLARAÇÃO DE NASCIDO VIVONV" required>DECLARAÇÃO DE NASCIDO VIVO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" required>PARECER SOCIAL DO MINISTERIO DA CIDADANIA </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="NENHUM DOCUMENTO" onclick="Sumir('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')" ><label for="NENHUM DOCUMENTO " required>NENHUM DOCUMENTO </label><br>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DO" onclick="Preencher('Text_Documento_Protetivas');Sumir('Text_Copia_Documento_Protetivas')"><label for="DO">OUTRO. </label><br>
                    <input type="text" name="Text_Documento_Protetivas" id="Text_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser" required></input>
                    <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DCO" onclick="Preencher('Text_Copia_Documento_Protetivas');Sumir('Text_Documento_Protetivas')"><label for="DCO">COPIA OUTRO </label><br>
                    <input type="text" name="Text_Copia_Documento_Protetivas" id="Text_Copia_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser" required></input>
                    <br><br>
                </div>

                <div class="inputBox" id="Numero_Documento_Protetivas_Box">
                    <input type="text" name="Numero_Documento_Protetivas" id="Numero_Documento_Protetivas" class="inputUser" value="<?php echo $Numero_Documento_Protetivas ?>" required >
                    <label for="Numero_Documento_Protetivas" class="labelInput">Número do Documento:</label>
                </div>
                
                <div class="field radiobox" id="Gênero_Protetivas_Box">            
                    <p>Genero:</p>
                    <input type="radio" id="feminino_Protetivas" name="Gênero_Protetivas" value="feminino" <?php echo $Gênero_Protetivas == "feminino" ?"checked":"" ?>>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino_Protetivas" name="Gênero_Protetivas" value="masculino" <?php echo $Gênero_Protetivas == "masculino" ?"checked":"" ?>>
                    <label for="masculino2">Masculino</label>
                    <br><br>
                </div>
                
                <div class="inputBox" id="Responsavel_Nascimento_Protetivas_Box">
                    <label for="Responsavel_Nascimento_Protetivas">Data de Nascimento:</label>
                    <input type="date" name="Responsavel_Nascimento_Protetivas" id="Responsavel_Nascimento_Protetivas" class="inputUser" value="<?php echo  DateTime::createFromFormat("Y-m-d H:i:s", $Responsavel_Nascimento_Protetivas)->format("Y-m-d")  ?>" required   >
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
                    <input type="radio" id="Vinculo_Protetivas_Sim" name="Vinculo_Protetivas" value="SIM" <?php echo $Vinculo_Protetivas == "SIM" ?"checked":"" ?>required>
                    <label for="Vinculo_Protetivas_Sim">Sim</label>
                    <input type="radio" id="Vinculo_Protetivas_Nao" name="Vinculo_Protetivas" value="NÃO" <?php echo $Vinculo_Protetivas == "NÃO" ?"checked":"" ?>required>
                    <label for="Vinculo_Protetivas_Nao">Não</label>
                    <br><br>
                </div>
                
                <div>
                    <br>
                    <input onclick="myalert()" type="submit" name="update" id="update">
                </div>

            </fieldset>


    </div>
</body>
</html>
