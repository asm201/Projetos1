<?php

    ////Variáveis tabela Situação
    //$Vida_antes                = $_POST['Vida_antes'];
    //$Razão_Saida               = $_POST['Razão_Saida'];
    //$Txt_Situação_Pessoa       = $_POST['Txt_Situação_Pessoa'];
    //$Txt_Alguem_Pessoa         = $_POST['Txt_Alguem_Pessoa'];
    //$Txt_Viagem_Pessoa         = $_POST['Txt_Viagem_Pessoa'];
    //$Txt_Entrou_Pessoa         = $_POST['Txt_Entrou_Pessoa'];
    //$Txt_Retornar_Pessoa       = $_POST['Txt_Retornar_Pessoa'];
    //$Txt_Medo_Pessoa           = $_POST['Txt_Medo_Pessoa'];

    ////Variáveis tabela Medidas_Protetivas

    //$Instituição_Protetivas                 = $_POST['Instituição_Protetivas'];
    //$Endereço_Protetivas                    = $_POST['Endereço_Protetivas'];
    //$Responsável_Protetivas                 = $_POST['Responsável_Protetivas'];
    //$Vara_Protetivas                        = $_POST['Vara_Protetivas'];
    //$Responsavel_Protetivas                 = $_POST['Responsavel_Protetivas'];
    //$Documento_Protetivas                   = $_POST['Documento_Protetivas'];
    //$Text_Documento_Protetivas              = $_POST['Text_Documento_Protetivas'];
    //$Text_Copia_Documento_Protetivas        = $_POST['Text_Copia_Documento_Protetivas'];
    //$Numero_Documento_Protetivas            = $_POST['Numero_Documento_Protetivas'];
    //$Responsavel_Nascimento_Protetivas      = $_POST['Responsavel_Nascimento_Protetivas'];
    //$Gênero_Protetivas                      = $_POST['Gênero_Protetivas'];
    //$Responsavel_Nacionalidade_Protetivas   = $_POST['Responsavel_Nacionalidade_Protetivas'];
    //$Responsavel_Endereço_Protetivas        = $_POST['Responsavel_Endereço_Protetivas'];
    //$Responsavel_Parentesco_Protetivas      = $_POST['Responsavel_Parentesco_Protetivas'];
    //$Txt_Mental_Avaliação                   = $_POST['Txt_Mental_Avaliação'];
    //$Txt_Fisico_Avaliação                   = $_POST['Txt_Fisico_Avaliação'];
    //$Txt_Idade_Avaliação                    = $_POST['Txt_Idade_Avaliação'];
    //
    ////Variáveis tabela INTÉRPRETE
    //$Nome_Interprete           = $_POST['Nome_Interprete'];
    //$Documento_Interprete      = $_POST['Documento_Interprete'];
    //$Endereço_Interprete       = $_POST['Endereço_Interprete'];
    //$Telefone_Interprete       = $_POST['Telefone_Interprete'];
    //$email_Interprete           = $_POST['e-mail_Interprete']; //***Incluir na tabela contato
    
    /*** ADICIONAR TODAS OS OUTROS ELEMENTOS ***/

    


    //Se o botão de envio for pressionado

    if(isset($_POST['submit']))
    {

        include_once('config.php');
        //Defensor
        $Nome_Defensor      = $_POST['Nome_Defensor'];
        $Documento_defensor = $_POST['Documento_Defensor'];
        $Cargo_defensor     = $_POST['Cargo_Defensor'];
        $Endereço_defensor  = $_POST['Endereço_Defensor'];
        $Cidade_defensor    = $_POST['Cidade/UF_Defensor'];
        $Telefone_defensor  = $_POST['Telefone_Defensor'];
        $Email_defensor     = $_POST['e-mail_Defensor']; 
        //Variáveis tabela Criança
        $Nome_Pessoa            = $_POST['Nome_Pessoa'];
        $Nascimento_pessoa      = $_POST['Nascimento_Pessoa'];
        $Genero_pessoa          = $_POST['gênero_pessoa'];
        $Nacionalidade_pessoa   = $_POST['Nacionalidade_Pessoa'];
        $País_Cid_pessoa        = $_POST['País_Cid_Pessoa'];
        $Escolaridade_pessoa    = $_POST['Escolaridade_Pessoa'];
        $Endereço_antigo_pessoa = $_POST['Endereço_Antigo_Pessoa'];
        $Endereço_atual_pessoa  = $_POST['Endereço_Atual_Pessoa'];
        $Telefone_pessoa        = $_POST['Telefone_Pessoa'];
        $Email_pessoa           = $_POST['e-mail_Pessoa']; //***Incluir na tabela contato
        $Identidade_pessoa      = $_POST['Identidade_Pessoa'];
        $Passaporte_pessoa      = $_POST['Passaporte_Pessoa'];
        $Certidao_pessoa        = $_POST['certidão'];
        $Genero_pessoa          = $_POST['gênero_pessoa'];
        $Mae_pessoa             = $_POST['Mãe_Viva'];
        $Nome_mae_pessoa        = $_POST['Text_Mae_Viva'];
        $Pai_pessoa             = $_POST['Pai_Vivo'];
        $Nome_pai_pessoa        = $_POST['Text_Pai_Vivo'];

        //Entrada
        $Cidade_Saida_pessoa           = $_POST['Cidade_Saida_Pessoa'];
        $Data_Saida_pessoa             = $_POST['Data_Saida_Pessoa'];
        $Cidade_Chegada_pessoa         = $_POST['Cidade_Chegada_Pessoa'];
        $Meio_transporte_pessoa        = $_POST['Meio_Transporte'];
        $Transporte_Detalhado_Pessoa   = $_POST['Transporte_Detalhado_Pessoa'];
        $Data_Reconhecido_Pessoa       = $_POST['Data_Reconhecido_Pessoa'];
        $Data_Chegada_Pessoa           = $_POST['Data_Chegada_Pessoa'];
        $Pais_Reconhecido_Pessoa       = $_POST['Pais_Reconhecido_Pessoa'];

        ////Variáveis tabela Situação
    //$Vida_antes                = $_POST['Vida_antes'];
    //$Razão_Saida               = $_POST['Razão_Saida'];
    //$Txt_Situação_Pessoa       = $_POST['Txt_Situação_Pessoa'];
    //$Txt_Alguem_Pessoa         = $_POST['Txt_Alguem_Pessoa'];
    //$Txt_Viagem_Pessoa         = $_POST['Txt_Viagem_Pessoa'];
    //$Txt_Entrou_Pessoa         = $_POST['Txt_Entrou_Pessoa'];
    //$Txt_Retornar_Pessoa       = $_POST['Txt_Retornar_Pessoa'];
    //$Txt_Medo_Pessoa           = $_POST['Txt_Medo_Pessoa'];

    ////Variáveis tabela Medidas_Protetivas

    //$Instituição_Protetivas                 = $_POST['Instituição_Protetivas'];
    //$Endereço_Protetivas                    = $_POST['Endereço_Protetivas'];
    //$Responsável_Protetivas                 = $_POST['Responsável_Protetivas'];
    //$Vara_Protetivas                        = $_POST['Vara_Protetivas'];
    //$Responsavel_Protetivas                 = $_POST['Responsavel_Protetivas'];
    //$Documento_Protetivas                   = $_POST['Documento_Protetivas'];
    //$Text_Documento_Protetivas              = $_POST['Text_Documento_Protetivas'];
    //$Text_Copia_Documento_Protetivas        = $_POST['Text_Copia_Documento_Protetivas'];
    //$Numero_Documento_Protetivas            = $_POST['Numero_Documento_Protetivas'];
    //$Responsavel_Nascimento_Protetivas      = $_POST['Responsavel_Nascimento_Protetivas'];
    //$Gênero_Protetivas                      = $_POST['Gênero_Protetivas'];
    //$Responsavel_Nacionalidade_Protetivas   = $_POST['Responsavel_Nacionalidade_Protetivas'];
    //$Responsavel_Endereço_Protetivas        = $_POST['Responsavel_Endereço_Protetivas'];
    //$Responsavel_Parentesco_Protetivas      = $_POST['Responsavel_Parentesco_Protetivas'];
    //$Txt_Mental_Avaliação                   = $_POST['Txt_Mental_Avaliação'];
    //$Txt_Fisico_Avaliação                   = $_POST['Txt_Fisico_Avaliação'];
    //$Txt_Idade_Avaliação                    = $_POST['Txt_Idade_Avaliação'];
    //
    ////Variáveis tabela INTÉRPRETE
    //$Nome_Interprete           = $_POST['Nome_Interprete'];
    //$Documento_Interprete      = $_POST['Documento_Interprete'];
    //$Endereço_Interprete       = $_POST['Endereço_Interprete'];
    //$Telefone_Interprete       = $_POST['Telefone_Interprete'];
    //$email_Interprete           = $_POST['e-mail_Interprete']; //***Incluir na tabela contato
    
    /*** ADICIONAR TODAS OS OUTROS ELEMENTOS ***/


        //chamada do banco de dados


        $result = mysqli_query($conexao,"INSERT INTO Defensor(Nome_Def,Doc_Defensor,Cargo,Endereço_Def,Cidade_UF,Contato_Def,Telefone_Def) 
        VALUES ('$Nome_Defensor','$Documento_defensor','$Cargo_defensor','$Endereço_defensor','$Cidade_defensor','$Email_defensor','$Telefone_defensor')");

        
        

         //** Problema no foreign key - DAR UMA OLHADA **/


        $result = mysqli_query($conexao, "INSERT INTO entrada(Cidade_Saida,Data_Saida,Cidade_Chegada,Data_Chegada,Transporte,Transporte_Detalhe,Data_Reconhecido,Pais_Reconhecido) 
        VALUES ('$Cidade_Saida_pessoa','$Data_Saida_pessoa', '$Cidade_Chegada_pessoa','$Data_Chegada_Pessoa','$Meio_transporte_pessoa','$Transporte_Detalhado_Pessoa','$Data_Reconhecido_Pessoa','$Pais_Reconhecido_Pessoa')");
        //FUNÇÃO ACIMA FUNCIONANDO, trocar para as demais inserts
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
            top: 105%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 35%;
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
    </style>
</head>
<body>
    <div class="box">
        <form action="Formulario2.php" method="post">
            <fieldset>
                <legend><b>Fórmulário</b></legend>
                <br>
                <!----Defensor -->
                <h1> DADOS DO DEFENSOR PÚBLICO FEDERAL </h1>
                <div class="inputBox">
                    <input type="text" name="Nome_Defensor" id="Nome_Defensor" class="inputUser" required>
                    <label for="Nome_Defensor" class="labelInput">Nome completo do defensor:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Documento_Defensor" id="Documento_Defensor" class="inputUser" required>
                    <label for="Documento_Defensor" class="labelInput">Documento de Identificação:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Cargo_Defensor" id="Cargo_Defensor" class="inputUser" required>
                    <label for="Cargo_Defensor" class="labelInput">Cargo do Defensor:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Endereço_Defensor" id="Endereço_Defensor" class="inputUser" required>
                    <label for="Endereço_Defensor" class="labelInput">Endereço do Defensor:</label>
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
                    <label for="e-mail_Defensor" class="labelInput">Email:</label>
                </div>    
                <br>
                <!---- DADOS DA CRIANÇA OU ADOLESCENTE -->

                <h2> DADOS DA CRIANÇA OU ADOLESCENTE </h2>
                 
                <div class="inputBox">
                <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" required>
                    <label for="Nome_Pessoa" class="labelInput">Nome Completo:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <label for="Nascimento_Pessoa"><b>Data de Nascimento:</b></label>
                    <input type="date" name="Nascimento_Pessoa" id="Nascimento_Pessoa" class="inputUser"  required>
                </div>

                <div class="field radiobox">            
                <p>Genero:</p>
                <input type="radio" id="feminino" name="gênero_pessoa" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="gênero_pessoa" value="masculino" required>
                <label for="masculino">Masculino</label>
                </div>
                <br>

                <div class="inputBox">
                <input type="text" name="Nacionalidade_Pessoa" id="Nacionalidade_Pessoa" class="inputUser" required>
                    <label for="Nacionalidade_Pessoa" class="labelInput">Nacionalidade:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="País_Cid_Pessoa" id="País_Cid_Pessoa" class="inputUser" required>
                    <label for="País_Cid_Pessoa" class="labelInput">País e cidade de nascimento:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Escolaridade_Pessoa" id="Escolaridade_Pessoa" class="inputUser" required>
                    <label for="Escolaridade_Pessoa" class="labelInput">Escolaridade:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Endereço_Atual_Pessoa" id="Endereço_Atual_Pessoa" class="inputUser" required>
                    <label for="Endereço_Atual_Pessoa" class="labelInput">Endereço atual:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Telefone_Pessoa" id="Telefone_Pessoa" class="inputUser" required>
                    <label for="Telefone_Pessoa" class="labelInput">Telefone:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="e-mail_Pessoa" id="e-mail_Pessoa" class="inputUser" required>
                    <label for="e-mail_Pessoa" class="labelInput">E-mail:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" required>
                    <label for="Identidade_Pessoa" class="labelInput">Cédula de identidade:</label>
                </div>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Passaporte_Pessoa" id="Passaporte_Pessoa" class="inputUser" required>
                    <label for="Passaporte_Pessoa" class="labelInput">Passaporte:</label>
                </div>

                <div class="field radiobox">            
                <p>Possui certidão de nascimento?</p>
                <input type="radio" id="Certidão_SIM" name="certidão" value="SIM" required>
                <label for="Certidão_SIM">Sim</label>
                <input type="radio" id="Certidão_NÃO" name="certidão" value="NÃO" required>
                <label for="Certidão_NÂO">Não</label>
                <input type="radio" id="Certidão_COP" name="certidão" value="COP" required>
                <label for="Certidão_COP">Possui cópia</label>
                <input type="radio" id="Certidão_NAS" name="certidão" value="NAS" required>
                <label for="Certidão_NAS">Possui apenas a declaração de nascido vivo</label>
                </div>
                <br>

                <div class="field radiobox">            
                <p>Mãe Viva?</p>
                <input type="radio" id="Mãe_Viva_Sim" name="Mãe_Viva" value="SIM" required>
                <label for="Mãe_Viva_Sim">Sim</label>
                <input type="radio" id="Mãe_Viva_NÃO" name="Mãe_Viva" value="NÃO" required>
                <label for="Mãe_Viva_Não">Não</label>
                <input type="text"  name="Text_Mae_Viva" id="Mãe_Pessoa" class="inputUser" required placeholder="Digite o Nome da Mãe caso viva:"/>
                <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                <br><br>
                <input type="text"  name="Text_Residencia_Mae_Pessoa" id="Mãe_Pessoa" class="inputUser" required placeholder="Digite a Residência da Mãe:"/>
                <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                </div>

                <div class="field radiobox">            
                <p>Pai Vivo?</p>
                <input type="radio" id="Pai_Viva_Sim" name="Pai_Vivo" value="SIM" required>
                <label for="Pai_Viva_Sim">Sim</label>
                <input type="radio" id="Pai_Viva_NÃO" name="Pai_Vivo" value="NÃO" required>
                <label for="Pai_Viva_Não">Não</label>
                <input type="text"  name="Text_Pai_Viva" id="Mãe_Pessoa" class="inputUser" required placeholder="Digite o Nome do Pai caso vivo:"/>
                <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                <br><br>
                <input type="text"  name="Text_Residencia_Pai_Pessoa" id="Mãe_Pessoa"  class="inputUser" required placeholder="Digite a Residência do Pai:"/>
                <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                </div>
                <br>
                <!--- Circunstâncias de entrada no Brasil--->
                <h2> Circunstâncias de entrada no Brasil </h2>

                <div class="inputBox">
                    <input type="text" name="Cidade_Saida_Pessoa" id="Cidade_Saida_Pessoa" class="inputUser" required>
                    <label for="Cidade_Saida_Pessoa" class="labelInput">Cidade de saída:</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <label for="Data_Saida_Pessoa"><b>Data de Saida:</b></label>
                    <input type="date" name="Data_Saida_Pessoa" id="Data_Saida_Pessoa" class="inputUser"  required>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="Cidade_Chegada_Pessoa" id="Cidade_Chegada_Pessoa" class="inputUser" required>
                    <label for="Cidade_Chegada_Pessoa" class="labelInput">Cidade de chegada no Brasil:</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <label for="Data_Chegada_Pessoa"><b>Data de Chegada ao Brasil:</b></label>
                    <input type="date" name="Data_Chegada_Pessoa" id="Data_Chegada_Pessoa" class="inputUser" required>
                <br><br>

                <div class="field radiobox">
                    <label>Meio de transporte: </label>
                    <input type="radio" name="Meio_Transporte" id="Transporte_Aereo" value="Aereo"><label for="Aéreo">aéreo </label>
                    <input type="radio" name="Meio_Transporte" id="Transporte_Marítimo" value="Marítimo"><label for="Marítimo">marítimo </label>
                    <input type="radio" name="Meio_Transporte" id="Terrestre" value="Terrestre"><label for="Terrestre">Terrestre </label>
                    <br><br>
                    <label for="Transporte_Detalhado_Pessoa">Detalhes do Transporte:</label>
                    <input type="text" name="Transporte_Detalhado_Pessoa" id="Transporte_Detalhado_Pessoa"  class="inputUser" required>
                    <br><br>
                </div>

                <div class="inputBox">
                    <label for="Data_Reconhecido_Pessoa"><b>Data em que foi reconhecido:</b></label>
                    <input type="date" name="Data_Reconhecido_Pessoa" id="Data_Reconhecido_Pessoa" class="inputUser"  required>
                <br><br>

                <div class="inputBox">
                <input type="text" name="Pais_Reconhecido_Pessoa" id="Pais_Reconhecido_Pessoa" class="inputUser" required>
                    <label for="Pais_Reconhecido_Pessoa" class="labelInput">Pais Reconhecido:</label>
                </div>
                <!--- SITUAÇÃO DA CRIANÇA OU ADOLESCENTE--->
                <!--- Fazer exatamente igual as demais acima e tirar o comentario das declarações --->
                <!--- tudo a ser colocado é antes do imput --->




                



                







                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
