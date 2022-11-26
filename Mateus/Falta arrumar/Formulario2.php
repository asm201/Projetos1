<?php

session_start();
error_reporting (0);
include_once('config.php');
//print_r($_SESSION);
if((!isset($_SESSION['e-mail_Defensor']) == true) and (!isset($_SESSION['Telefone_Def']) == true)){
    
    unset($_SESSION['e-mail_Defensor']);
    unset($_SESSION['Telefone_Def']);
    header('Location: Home.php');
    
}$logado = $_SESSION['e-mail_Defensor'];

$sql = "SELECT * FROM defensor ORDER BY idDefensor DESC";
$result = $conexao->query($sql);

//print_r($result);
//Se o botão de envio for pressionado
//error_reporting (0);
if(isset($_POST['submit']))
{
        try{

        $filename = $_FILES['arquivo']['name'];
        $size = $_FILES['arquivo']['size'];
        $novo_nome = md5(time()) . $extensao;
        $file = $_FILES['arquivo']['tmp_name'];
        $destination = 'uploads/';
        $extension = strtolower(substr($_FILES['arquivo']['name'], -4));

        include_once('config.php');

        ////////////////////    Variáveis tabela Crianca    ////////////////////
        $Nome_Pessoa                    = isset($_POST['Nome_Pessoa']) ? $_POST['Nome_Pessoa'] :  null;
        $Nascimento_pessoa              = isset($_POST['Nascimento_Pessoa']) ? $_POST['Nascimento_Pessoa'] :  null;
        $Genero_pessoa                  = isset($_POST['gênero_pessoa']) ? $_POST['gênero_pessoa'] :  null;
        $Nacionalidade_pessoa           = isset($_POST['Nacionalidade_Pessoa']) ? $_POST['Nacionalidade_Pessoa'] :  null;
        $País_Cid_pessoa                = isset($_POST['País_Cid_Pessoa']) ? $_POST['País_Cid_Pessoa'] :  null;
        $Escolaridade_pessoa            = isset($_POST['Escolaridade_Pessoa']) ? $_POST['Escolaridade_Pessoa'] :  null;
        $Endereco_Antigo_Pessoa         = isset($_POST['Endereco_Antigo_Pessoa']) ? $_POST['Endereco_Antigo_Pessoa'] :  null;
        $Endereco_atual_pessoa          = isset($_POST['Endereco_Atual_Pessoa']) ? $_POST['Endereco_Atual_Pessoa'] :  null;
        $Telefone_pessoa                = isset($_POST['Telefone_Pessoa']) ? $_POST['Telefone_Pessoa'] :  null;
        $Email_pessoa                   = isset($_POST['e-mail_Pessoa']) ? $_POST['e-mail_Pessoa'] :  null;
        $Identidade_pessoa              = isset($_POST['Identidade_Pessoa']) ? $_POST['Identidade_Pessoa'] :  null;
        $Passaporte_pessoa              = isset($_POST['Passaporte_Pessoa']) ? $_POST['Passaporte_Pessoa'] :  null;
        $Certidao_pessoa                = isset($_POST['certidão']) ? $_POST['certidão'] :  null;
        $Mae_pessoa                     = isset($_POST['Mãe_Viva']) ? $_POST['Mãe_Viva'] :  null;
        $Nome_mae_pessoa                = isset($_POST['Text_Mae_Viva']) ? $_POST['Text_Mae_Viva'] :  null;
        $Pai_pessoa                     = isset($_POST['Pai_Vivo']) ? $_POST['Pai_Vivo'] :  null;
        $Nome_pai                       = isset($_POST['Pai_Pessoa']) ? $_POST['Pai_Pessoa'] :  null;
        $Text_Residencia_Mae_Pessoa     = isset($_POST['Text_Residencia_Mae_Pessoa']) ? $_POST['Text_Residencia_Mae_Pessoa'] :  null;
        $Text_Residencia_Pai_Pessoa     = isset($_POST['Text_Residencia_Pai_Pessoa']) ? $_POST['Text_Residencia_Pai_Pessoa'] :  null;

        ////////////////////    Entrada ////////////////////
        $Cidade_Saida_pessoa           = isset($_POST['Cidade_Saida_Pessoa']) ? $_POST['Cidade_Saida_Pessoa'] : null;
        $Data_Saida_pessoa             = isset($_POST['Data_Saida_Pessoa']) ? $_POST['Data_Saida_Pessoa'] : null;
        $Cidade_Chegada_pessoa         = isset($_POST['Cidade_Chegada_Pessoa']) ? $_POST['Cidade_Chegada_Pessoa']:  null;
        $Meio_Transporte                = isset($_POST['Meio_Transporte']) ? $_POST['Meio_Transporte'] : null;
        $Transporte_Detalhado_Pessoa   = isset($_POST['Transporte_Detalhado_Pessoa']) ? $_POST['Transporte_Detalhado_Pessoa'] :  null;
        $Data_Reconhecido_Pessoa       = isset($_POST['Data_Reconhecido_Pessoa']) ?  $_POST['Data_Reconhecido_Pessoa'] :  null;
        $Data_Chegada_Pessoa           = isset($_POST['Data_Chegada_Pessoa']) ? $_POST['Data_Chegada_Pessoa'] :  null;
        $Pais_Reconhecido_Pessoa       = isset($_POST['Pais_Reconhecido_Pessoa']) ? $_POST['Pais_Reconhecido_Pessoa'] :  null;


        ////////////////////     Situacão   ////////////////////
        $Vida_antes                = isset($_POST['Vida_antes'])  ? $_POST['Vida_antes'] : null;
        $Razão_Saida               = isset($_POST['Razão_Saida'])  ? $_POST['Razão_Saida'] : null;
        $Situacao_Pessoa           = isset($_POST['Txt_Situacao_Pessoa'])  ? $_POST['Txt_Situacao_Pessoa'] : null;
        //$Txt_Situacao_Pessoa     = isset($_POST['Saida_Forçada'])  ? $_POST['Saida_Forçada'] : null;
        $Alguem_Pessoa             = isset($_POST['Txt_Alguem_Pessoa'])  ? $_POST['Txt_Alguem_Pessoa'] : null;
        //$Txt_Alguem_Pessoa       = isset($_POST['Ajuda'])  ? $_POST['Ajuda'] : null;
        $Viagem_Pessoa             = isset($_POST['Txt_Viagem_Pessoa'])  ? $_POST['Txt_Viagem_Pessoa'] : null;
        //$Txt_Viagem_Pessoa         = isset($_POST['Acompanhado'])  ? $_POST['Acompanhado'] : null;
        $Entrou_Pessoa             = isset($_POST['Txt_Entrou_Pessoa'])  ? $_POST['Txt_Entrou_Pessoa'] : null;
        //$Txt_Entrou_Pessoa         = isset($_POST['Entrada_Sozinho'])  ? $_POST['Entrada_Sozinho'] : null;
        $Permancer_Pessoa          = isset($_POST['Txt_Permancer_Pessoa'])  ? $_POST['Txt_Permancer_Pessoa'] : null;
        $Retornar_Pessoa           = isset($_POST['Txt_Retornar_Pessoa'])  ? $_POST['Txt_Retornar_Pessoa'] : null;
        $Medo_Pessoa               = isset($_POST['Txt_Medo_Pessoa'])  ? $_POST['Txt_Medo_Pessoa'] : null;
        //$Txt_Retornar_Pessoa       = isset($_POST['Medo_Retorno'])  ? $_POST['Medo_Retorno'] : null;
        $Parentes_Origem_Pessoa    = isset($_POST['Parentes_Origem_Pessoa'])  ? $_POST['Parentes_Origem_Pessoa'] : null;
        $Parentes_Brasil_Pessoa    = isset($_POST['Parentes_Brasil_Pessoa'])  ? $_POST['Parentes_Brasil_Pessoa'] : null;
        $Proteção_Indicadores      = isset($_POST['Proteção_Indicadores'])  ? $_POST['Proteção_Indicadores'] : null;
        $Solicitação_Indicadores   = isset($_POST['Solicitação_Indicadores'])  ? $_POST['Solicitação_Indicadores'] : null;
        $Txt_Protecao_Indicadores   = isset($_POST['Txt_Protecao_Indicadores'])  ? $_POST['Txt_Protecao_Indicadores'] : null;

        ////////////////////     Avaliação ////////////////////
        
        $Mental_Avaliacao          = isset($_POST['Txt_Mental_Avaliacão']) ? $_POST['Txt_Mental_Avaliacão'] : null;
        $Fisico_Avaliacao          = isset($_POST['Txt_Fisico_Avaliacão']) ? $_POST['Txt_Fisico_Avaliacão'] : null;
        $Idade_Avaliacao           = isset($_POST['Txt_Idade_Avaliacão']) ? $_POST['Txt_Idade_Avaliacão']: null;
        /*$Txt_Mental_Avaliacão      = $_POST['Txt_Mental_Avaliacão'];
        $Txt_Fisico_Avaliacão      = $_POST['Txt_Fisico_Avaliacão'];
        $Txt_Idade_Avaliacão       = $_POST['Txt_Idade_Avaliacão'];
        $Aux_Proteção_Indicadores  = $_POST['Txt_Proteção_Indicadores'];
        $Solicitação_Indicadores   = $_POST['Solicitação_Indicadores'];*/

        ////////////////////    Variáveis tabela Medidas_Protetivas ////////////////////

        $Encaminhada_Protetivas                 =isset($_POST['Encaminhada_Protetivas']) ? $_POST['Encaminhada_Protetivas'] :  null;

        $Instituicao_Protetivas                 = isset($_POST['Instituicão_Protetivas']) ? $_POST['Instituicão_Protetivas'] :  null;
        $Endereco_Inst_Protetivas               = isset($_POST['Endereco_Inst_Protetivas']) ? $_POST['Endereco_Inst_Protetivas'] :  null;
        $Vara_Protetivas                        = isset($_POST['Vara_Protetivas']) ? $_POST['Vara_Protetivas'] :  null;
        $Responsavel_Inst_Protetivas            = isset($_POST['Responsavel_Inst_Protetivas']) ? $_POST['Responsavel_Inst_Protetivas'] :  null;

        $Responsavel_Protetivas                 = isset($_POST['Responsavel_Protetivas']) ? $_POST['Responsavel_Protetivas'] :  null;
        $Documento_Protetivas                 = isset($_POST['Documento_Protetivas']) ? $_POST['Documento_Protetivas'] :  null;
        $Text_Outro_Documento_Protetivas        = isset($_POST['Text_Documento_Protetivas']) ? $_POST['Text_Documento_Protetivas'] :  null;
        $Text_Copia_Documento_Protetivas        = isset($_POST['Text_Copia_Documento_Protetivas']) ? $_POST['Text_Copia_Documento_Protetivas'] :  null;

        $Numero_Documento_Protetivas            = isset($_POST['Numero_Documento_Protetivas']) ? $_POST['Numero_Documento_Protetivas'] :  null;
                
        $Gênero_Protetivas                      = isset($_POST['Gênero_Protetivas']) ? $_POST['Gênero_Protetivas'] :  null;
        $Responsavel_Nascimento_Protetivas      = isset($_POST['Responsavel_Nascimento_Protetivas']) ? $_POST['Responsavel_Nascimento_Protetivas'] :  null;
        $Responsavel_Nacionalidade_Protetivas   = isset($_POST['Responsavel_Nacionalidade_Protetivas']) ? $_POST['Responsavel_Nacionalidade_Protetivas'] :  null;
        $Responsavel_Endereco_Protetivas        = isset($_POST['Responsavel_Endereco_Protetivas']) ? $_POST['Responsavel_Endereco_Protetivas'] :  null;
        $Responsavel_Parentesco_Protetivas      = isset($_POST['Responsavel_Parentesco_Protetivas']) ? $_POST['Responsavel_Parentesco_Protetivas'] :  null;
        $Vinculo_Protetivas                     = isset($_POST['Vinculo_Protetivas']) ? $_POST['Vinculo_Protetivas'] :  null;
                
        $Text_Copia_Documento_Protetivas = chop($Text_Copia_Documento_Protetivas, " Cópia");
       
    ////////////////////    Variáveis tabela Intérprete ////////////////////
        $Nome_Interprete           = isset($_POST['Nome_Interprete']) ? $_POST['Nome_Interprete'] :  null;
        $Documento_Interprete      = isset($_POST['Documento_Interprete']) ? $_POST['Documento_Interprete'] :  null;
        $Endereço_Interprete       = isset($_POST['Endereço_Interprete']) ? $_POST['Endereço_Interprete'] :  null;
        $Telefone_Interprete       = isset($_POST['Telefone_Interprete']) ? $_POST['Telefone_Interprete'] :  null;
        $email_Interprete          = isset($_POST['e-mail_Interprete']) ? $_POST['e-mail_Interprete'] :  null;


        $requiredFields = [
            ////////////////////    Variáveis tabela Criança    ////////////////////
            'Dados Criança - Nome Pessoa não preenchido' => $Nome_Pessoa,
            'Dados Criança - Data de Nascimento da criança não preenchido' => $Nascimento_pessoa,
            'Dados Criança - Genero da criança não preenchido' => $Genero_pessoa,
            'Dados Criança - Nacionalidade da criança não preenchido' => $Nacionalidade_pessoa,
            'Dados Criança - País da criança não preenchido' => $País_Cid_pessoa,
            'Dados Criança - Escolaridade da criança não preenchido' => $Escolaridade_pessoa,
            'Dados Criança - Endereco da criança não preenchido' => $Endereco_Antigo_Pessoa,
            'Dados Criança - Telefone da criança não preenchido' => $Telefone_pessoa,
            'Dados Criança - E-mail da criança não preenchido' => $Email_pessoa,
            'Dados Criança - Identidade da criança não preenchido' => $Identidade_pessoa,
            'Dados Criança - Passaporte da criança não preenchido' => $Passaporte_pessoa,
            'Dados Criança - Certidao da criança não preenchido' => $Certidao_pessoa,
            'Dados Criança - Mae da criança não preenchido' => $Mae_pessoa,
            'Dados Criança - Nome da Mãe não preenchido' => $Nome_mae_pessoa,
            'Dados Criança - Pai da criança não preenchido' => $Pai_pessoa,
            'Dados Criança - Nome do Pai da criança não preenchido' => $Nome_pai,
            'Dados Criança - Residencia da Mae da criança não preenchido' => $Text_Residencia_Mae_Pessoa,
            'Dados Criança - Residencia do Pai da criança não preenchido' => $Text_Residencia_Pai_Pessoa,
            ////////////////////    Entrada ////////////////////

            'Entrada - Cidade Saida não preenchido' => $Cidade_Saida_pessoa,
            'Entrada - Data de saida não preenchido' => $Data_Saida_pessoa,
            'Entrada - Cidade de chegada não preenchido' => $Cidade_Chegada_pessoa,
            'Entrada - Meio de Transporte não preenchido' => $Meio_Transporte,
            'Entrada - Detalhe do Transporte não preenchido' => $Transporte_Detalhado_Pessoa,
            'Entrada - Data reconhecido não preenchido' => $Data_Reconhecido_Pessoa,
            'Entrada - Data de chegada não preenchido' => $Data_Chegada_Pessoa,
            'Entrada - País reconhecido não preenchido' => $Pais_Reconhecido_Pesso,
            ////////////////////     Situacão   ////////////////////

            'Situacão - Vida Antes não preenchido' => $Vida_antes,
            'Situacão - Razão Saida não preenchido' => $Razão_Saida,
            'Situacão - Situação Pessoa não preenchido' => $Situacao_Pessoa,
            'Situacão - Alguem não preenchido' => $Alguem_Pessoa,
            'Situacão - Viagem não preenchido' => $Viagem_Pessoa,
            'Situacão - Entrou não preenchido' => $Entrou_Pessoa,
            'Situacão - Permanecer não preenchido' => $Permancer_Pessoa,
            'Situacão - Retornar não preenchido' => $Retornar_Pessoa,
            'Situacão - Medo de Retorno não preenchido' => $Medo_Pessoa,
            'Situacão - Parentes Origem não preenchido' => $Parentes_Origem_Pessoa,
            'Situacão - Parentes Brasil não preenchido' => $Parentes_Brasil_Pessoa,
            'Situacão - Proteção Indicadores não preenchido' => $Proteção_Indicadores,
            'Situacão - Solicitações não preenchido' => $Solicitação_Indicadores,
            'Situacão - Solicitações outros não preenchido' => $Txt_Protecao_Indicadores,
            ////////////////////     Avaliação ////////////////////

            'Avaliação - Mental faltando' => $Mental_Avaliacao,
            'Avaliação - Fisico_Avaliacao faltando' => $Fisico_Avaliacao,
            'Avaliação - Idade_Avaliacao faltando' => $Idade_Avaliacao,
            ////////////////////    Variáveis tabela Medidas_Protetivas ////////////////////

            'Medidas Protetivas - Instituição não preenchido' => $Instituicao_Protetivas,
            'Medidas Protetivas - Endereço da intituição não preenchido' => $Endereco_Inst_Protetivas,
            'Medidas Protetivas - Vara não preenchido' => $Vara_Protetivas,
            //'Responsavel não preenchido' => $Responsavel_Inst_Protetivas,
            'Medidas Protetivas - Responsavel não preenchido' => $Responsavel_Protetivas,
            'Medidas Protetivas - Gênero não preenchido' => $Gênero_Protetivas,
            'Medidas Protetivas - Responsavel Nacionalidade não preenchido' => $Responsavel_Nacionalidade_Protetivas,
            'Medidas Protetivas - Responsavel endereço não preenchido' => $Responsavel_Endereco_Protetivas,
            'Medidas Protetivas - Responsavel parentesco não preenchido' => $Responsavel_Parentesco_Protetivas,
            //'País reconhecido não preenchido' => $Text_Outro_Documento_Protetivas,
            //'País reconhecido não preenchido' => $Text_Copia_Documento_Protetivas,
            'Medidas Protetivas - Numero do documento não preenchido' => $Numero_Documento_Protetivas,
            'Medidas Protetivas - Data do responsavel não preenchido' => $Responsavel_Nascimento_Protetivas,
            'Medidas Protetivas - Vinculo não preenchido' => $Vinculo_Protetivas,
            ////////////////////    Variáveis tabela Intérprete ////////////////////
            'Documento não preenchido' => $Documento_Interprete

        ];
        foreach ($requiredFields as $field => $fieldValue) {
            if (is_null($fieldValue) || $fieldValue == '') {
                http_response_code(400);
                header('Content-type: application/json');
                echo json_encode(['field' => $field]);
                return;
            }
        }
        
    
    //Variavel de Status
        $Status = true;
        /*** ADICIONAR TODAS OS OUTROS ELEMENTOS ***/
/*

        try{
            $Decricao_Documento = $Documento_Protetivas;
            if($Documento_Protetivas == "DO"){
                $Decricao_Documento = $Text_Outro_Documento_Protetivas;
            }elseif ($Documento_Protetivas == "DCO") {
                $Decricao_Documento = $Text_Copia_Documento_Protetivas;
            }elseif($Documento_Protetivas == "NENHUM DOCUMENTO"){
                $Numero_Documento_Protetivas = "N/A";
            }   
            
            $result = mysqli_query($conexao, "INSERT INTO documentos(Descricao, Numero) 
            VALUES ('$Decricao_Documento','$Numero_Documento_Protetivas')");

        }catch(Exception $e){
            echo  '<script>alert("Erro cadastrar Documento");</script>';
        }
            
        try{
            //entrada - OK
            
            
            $result = mysqli_query($conexao, "INSERT INTO entrada(Cidade_Saida,Data_Saida,Cidade_Chegada,Data_Chegada,Transporte,Transporte_Detalhe,Data_Reconhecido,Pais_Reconhecido,Crianca) 
            VALUES ('$Cidade_Saida_pessoa','$Data_Saida_pessoa', '$Cidade_Chegada_pessoa','$Data_Chegada_Pessoa','$Meio_transporte_pessoa','$Transporte_Detalhado_Pessoa','$Data_Reconhecido_Pessoa','$Pais_Reconhecido_Pessoa','$Identidade_pessoa')");


        }catch(Exception $e){
            echo  '<script>alert("Erro ao Cadastrar");</script>';
        }
        try{
            //SITUAÇÃO DA CRIANcA OU ADOLESCENTE - okok

            if($Situacão_Pessoa == "Não"){
                $Txt_Situacão_Pessoa = "N/A";
            }
            if($Alguem_Pessoa == "Não") {
                $Txt_Alguem_Pessoa = "N/A";
            }
            if($Viagem_Pessoa == "Não"){
                $Txt_Viagem_Pessoa = "N/A";
            }
            if($Entrou_Pessoa == "Sim") {
                $Txt_Entrou_Pessoa = "N/A";
            }
            if($Retornar_Pessoa == "Sim"){
                $Txt_Retornar_Pessoa = "N/A";
            }
            if($Medo_Pessoa == "Não") {
                $Txt_Medo_Pessoa = "N/A";
            }
            if($Permancer_Pessoa == "Não") {
                $Txt_Permancer_Pessoa = "N/A";
            }

            if($Proteção_Indicadores == "ProteçãoO"){
                $txt_Proteção_Indicadores = $Aux_Proteção_Indicadores;
            }else{
                $txt_Proteção_Indicadores = "N/A";
            }

            if($Mental_Avaliacão == "Normal") {
                $Txt_Mental_Avaliacão = "N/A";
            }
            if($Fisico_Avaliacão == "Normal"){
                $Txt_Fisico_Avaliacão = "N/A";
            }
            if($Idade_Avaliacão == "Normal") {
                $Txt_Idade_Avaliacão = "N/A";
            }
            
            $result = mysqli_query($conexao, "INSERT INTO situacao(Vida_Antes,Razao_Saida,Saida_Forcada,Permanencia,Ajuda,Acompanhado,Entrada_Sozinho,Retorno,Medo_Retorno,Parente_Pais_Origem,Saude_Mental,Idade_Mental,Saude_Fisica,Parente_Brasil,Protecao_da_Crianca,Solicitacao_de_Indicadores,Crianca,Txt_Protecao_Indicadores) 
            VALUES ('$Vida_antes','$Razão_Saida','$Txt_Situacão_Pessoa','$Txt_Permancer_Pessoa','$Txt_Alguem_Pessoa ','$Txt_Viagem_Pessoa','$Txt_Entrou_Pessoa','$Txt_Retornar_Pessoa','$Txt_Medo_Pessoa','$Parentes_Origem_Pessoa','$Txt_Mental_Avaliacão','$Txt_Idade_Avaliacão','$Txt_Fisico_Avaliacão','$Parentes_Brasil_Pessoa','$Proteção_Indicadores','$Solicitação_Indicadores','$Identidade_pessoa','$txt_Proteção_Indicadores')");

        }catch(Exception $e){
            echo  '<script>alert("Erro ao Cadastrar Situação");</script>';
        }
        try{
            //Medidas Protetivas - OK
            $query = mysqli_query($conexao, "SELECT idDocumentos FROM documentos WHERE Numero = '$Numero_Documento_Protetivas'");

            while ($row = mysqli_fetch_assoc($query )) {            
            $Id_Documento = $row['idDocumentos'];
                settype($Id_Documento, "integer");
            }

            $result = mysqli_query($conexao, "INSERT INTO Medidas_Protetivas(Endereco_Inst,Nome_Inst,Nome_Respo_Inst,Nome_Respo,Documento_Respo,Genero,Endereco_Respo,Parentesco,Vinculo,Nacionalidade,Data_Nascimento,Vara,Crianca) 
            VALUES ('$Endereco_Inst_Protetivas','$Instituicão_Protetivas','$Responsavel_Inst_Protetivas','$Responsavel_Protetivas','$Id_Documento','$Gênero_Protetivas','$Responsavel_Endereco_Protetivas','$Responsavel_Parentesco_Protetivas','$Vinculo_Protetivas','$Responsavel_Nacionalidade_Protetivas','$Responsavel_Nascimento_Protetivas','$Vara_Protetivas','$Identidade_pessoa')");
           
        }catch(Exception $e){
            echo  '<script>alert("Erro ao Cadastrar Medidas Protetivas");</script>';
        }

        try{
            //DADOS DA CRIANÇA OU ADOLESCENTE
            
            if($Mae_pessoa == "NÃO"){
                $Nome_mae_pessoa = "N/A";
                $Text_Residencia_Mae_Pessoa = "N/A";
            }
            if($Pai_pessoa == "NÃO") {
            $Nome_pai_pessoa = "N/A";
            $Text_Residencia_Pai_Pessoa = "N/A";
            }

            $query = mysqli_query($conexao, "SELECT idEntrada FROM entrada WHERE Crianca = '$Identidade_pessoa'");

            while ($row = mysqli_fetch_assoc($query)) {            
                $Entrada = $row['idEntrada'];
                settype($Entrada, "integer");
            }
            $query = mysqli_query($conexao, "SELECT idMedidas_Protetivas FROM medidas_protetivas WHERE Crianca = '$Identidade_pessoa'");

            while ($row = mysqli_fetch_assoc($query)) {            
                $Medidas_Protetivas = $row['idMedidas_Protetivas'];
                settype($Medidas_Protetivas, "integer");
            }

            $query = mysqli_query($conexao, "SELECT idSituacao FROM situacao WHERE Crianca = '$Identidade_pessoa'");

            while ($row = mysqli_fetch_assoc($query)) {            
                $Situacao = $row['idSituacao'];
                settype($Situacao, "integer");
            }

            $query = mysqli_query($conexao, "SELECT Doc_Defensor FROM defensor WHERE Contato_Def = '$logado'");

            while ($row = mysqli_fetch_assoc($query)) {            
                $Defensor = $row['Doc_Defensor'];
            }

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

            $result = mysqli_query($conexao, "INSERT INTO crianca_adolecente(Documento,Nome,Data_de_Nascimento,Genero,Nacionalidade,Local_Nasc,Escolaridade,Endereco_origem,Endereco_atual,Telefone_crianca,Passaporte,Certidao_de_Nascimento,Data_de_Cadastro,Mae_viva,Pai_Vivo,Nome_mae,Nome_pai,Email_Crianca,Entrada,Medidas_Protetivas,Situacao,Defensor,Interprete,Residencia_mae,Residencia_pai,Status_Crianca, Imagem) 
            VALUES ('$Identidade_pessoa','$Nome_Pessoa','$Nascimento_pessoa','$Genero_pessoa','$Nacionalidade_pessoa','$País_Cid_pessoa','$Escolaridade_pessoa','$Endereco_Antigo_Pessoa','$Endereco_atual_pessoa','$Telefone_pessoa','$Passaporte_pessoa','$Certidao_pessoa',NOW(),'$Mae_pessoa','$Pai_pessoa','$Nome_mae_pessoa','$Nome_pai_pessoa','$Email_pessoa','$Entrada','$Medidas_Protetivas','$Situacao','$Defensor','$Documento_Interprete','$Text_Residencia_Mae_Pessoa','$Text_Residencia_Pai_Pessoa','$Status','$filename')");
*/
                http_response_code(204);
            }catch(Exception $e){
                http_response_code(500);  
            }
            return;

}  


?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" type="text/css" Href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    
    <title>Formulário</title>
</head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="style.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<body>
<script src="js/script_Codigo.js"></script>
<meta charset="UTF-8">
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
                </ul>
            </div>
        </div>
    </nav>
    </div>
   
    <div class="box">
        <form action="Formulario2.php" method="post" enctype="multipart/form-data" id="Formulario2">
            <fieldset>
                <legend><b>Fórmulário</b></legend>
                <br>
                <!---- DADOS DA CRIANcA OU ADOLESCENTE -->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_CRI');Sumir('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_FIM');Sumir('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_MEDIDAS')">
                <label>DADOS DA CRIANÇA OU ADOLESCENTE</label><br>
                <div name="APRESENTACAO_CRI" id="APRESENTACAO_CRI" style="display:none" class="inputUser">
                    
                    <div class="inputBox">
                        <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" required>
                        <label for="Nome_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nome Completo:</label>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <label for="Nascimento_Pessoa"><b><label style="color:#FF0000">*</label> Data de Nascimento:</b></label>
                        <input type="date" min='2004-01-01' max='2022-11-21' name="Nascimento_Pessoa" id="Nascimento_Pessoa" class="inputUser" required>
                    </div>
                    
                    <div class="field radiobox">            
                        <p><label style="color:#FF0000">*</label> Genero:</p>
                        <input type="radio" id="feminino" name="gênero_pessoa" value="feminino" >
                        <label for="feminino">Feminino</label>
                        <input type="radio" id="masculino" name="gênero_pessoa" value="masculino" >
                        <label for="masculino">Masculino</label>
                    </div>
                    <br>
                    
                    <div class="inputBox">
                        <input type="text" name="Nacionalidade_Pessoa" id="Nacionalidade_Pessoa" class="inputUser" required>
                            <label for="Nacionalidade_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nacionalidade:</label>
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="País_Cid_Pessoa" id="País_Cid_Pessoa" class="inputUser" required>
                            <label for="País_Cid_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> País e cidade de nascimento:</label>
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="Escolaridade_Pessoa" id="Escolaridade_Pessoa" class="inputUser" required>
                            <label for="Escolaridade_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Escolaridade:</label>
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="Endereco_Antigo_Pessoa" id="Endereco_Antigo_Pessoa" class="inputUser" required>
                            <label for="Endereco_Antigo_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Endereço no pais de origem:</label>
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="Endereco_Atual_Pessoa" id="Endereco_Atual_Pessoa" class="inputUser" required>
                            <label for="Endereco_Atual_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Endereco atual:</label>ossui cer
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="Telefone_Pessoa" id="Telefone_Pessoa" class="inputUser" maxlength="9" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            <label for="Telefone_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Telefone:</label>
                        </div>
                        <br><br>
                        
                        <div class="inputBox">
                        <input type="text" name="e-mail_Pessoa" id="e-mail_Pessoa" class="inputUser" required>
                        <label for="e-mail_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> E-mail:</label>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" maxlength="9" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        <label for="Identidade_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cédula de identidade:</label>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <input type="text" name="Passaporte_Pessoa" id="Passaporte_Pessoa" class="inputUser" maxlength="8" required>
                        <label for="Passaporte_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Passaporte:</label>
                    </div>
                    
                    <div class="field radiobox">            
                        <p><label style="color:#FF0000">*</label> Possui certidão de nascimento?</p>
                        <input type="radio" id="Certidão_SIM" name="certidão" value="SIM" >
                        <label for="Certidão_SIM">Sim</label>
                        <input type="radio" id="Certidão_NÃO" name="certidão" value="NÃO" >
                        <label for="Certidão_NÂO">Não</label>
                        <input type="radio" id="Certidão_COP" name="certidão" value="COP" >
                        <label for="Certidão_COP">Possui cópia</label>
                        <input type="radio" id="Certidão_NAS" name="certidão" value="NAS" >
                        <label for="Certidão_NAS">Possui apenas a declaracão de nascido vivo</label>
                    </div>
                    <br>
                    
                    <div class="field radiobox">            
                        <p><label style="color:#FF0000">*</label> Mãe Viva?</p>
                        <input type="radio" id="Mãe_Viva_Sim" name="Mãe_Viva" value="SIM" onclick="Preencher('Mãe_Pessoa');Preencher('Mãe_Pessoa_Endereco')" >
                        <label for="Mãe_Viva_Sim">Sim</label>
                        <input type="radio" id="Mãe_Viva_NÃO" name="Mãe_Viva" value="NÃO" onclick="Sumir('Mãe_Pessoa');Sumir('Mãe_Pessoa_Endereco')" >
                        <label for="Mãe_Viva_Não">Não</label>
                        <input type="text"  name="Text_Mae_Viva" id="Mãe_Pessoa" style="display:none"  class="inputUser"  placeholder="Digite o Nome da Mãe caso viva:"/>
                        <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                        <br><br>
                        <input type="text"  name="Text_Residencia_Mae_Pessoa" id="Mãe_Pessoa_Endereco" style="display:none"  class="inputUser"  placeholder="Digite a Residência da Mãe:"/>
                        <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    </div>
                    
                    <div class="field radiobox">            
                        <p><label style="color:#FF0000">*</label> Pai Vivo?</p>
                        <input type="radio" id="Pai_Viva_Sim" name="Pai_Vivo" value="SIM" onclick="Preencher('Pai_Pessoa');Preencher('Pai_Pessoa_Endereco')" >
                        <label for="Pai_Viva_Sim">Sim</label>
                        <input type="radio" id="Pai_Viva_NÃO" name="Pai_Vivo" value="NÃO" onclick="Sumir('Pai_Pessoa');Sumir('Pai_Pessoa_Endereco')" >
                        <label for="Pai_Viva_Não">Não</label>
                        <input type="text"  name="Text_Pai_Vivo" id="Pai_Pessoa" style="display:none" class="inputUser"  placeholder="Digite o Nome do Pai caso vivo:"/>
                        <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                        <br><br>
                        <input type="text"  name="Text_Residencia_Pai_Pessoa" id="Pai_Pessoa_Endereco" style="display:none"  class="inputUser"  placeholder="Digite a Residência do Pai:"/>
                        <!---Verificar se funfa qualquer coisa muda no Bd para que posssa ser null--->
                    </div>
                    <br>
                </div>
                <!--- Circunstâncias de entrada no Brasil--->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_FIM');Sumir('APRESENTACAO_CRI');Sumir('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_MEDIDAS')">
                <label>CIRCUSTÂNCIAS DE ENTRADA NO BRASIL</label><br>
                <div name="APRESENTACAO_ENTRADA" id="APRESENTACAO_ENTRADA" style="display:none" class="inputUser">
                
                    
                    <div class="inputBox">
                        <input type="text" name="Cidade_Saida_Pessoa" id="Cidade_Saida_Pessoa" class="inputUser" required>
                        <label for="Cidade_Saida_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cidade de saída:</label>
                    </div>
                    
                    <br><br>
                    <div class="inputBox">
                        <label for="Data_Saida_Pessoa"><b><label style="color:#FF0000">*</label> Data de Saida:</b></label>
                        <input type="date" name="Data_Saida_Pessoa" id="datePickerId"class="inputUser" required>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <input type="text" name="Cidade_Chegada_Pessoa" id="Cidade_Chegada_Pessoa" class="inputUser" required>
                        <label for="Cidade_Chegada_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Cidade de chegada no Brasil:</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <label for="Data_Chegada_Pessoa"><b><label style="color:#FF0000">*</label> Data de Chegada ao Brasil:</b></label>
                        <input type="date" max='2022-11-21' name="Data_Chegada_Pessoa" id="Data_Chegada_Pessoa" class="inputUser" required>
                    </div>
                    <br><br>

                    <div class="field radiobox">
                        <label><label style="color:#FF0000">*</label> Meio de transporte: </label>
                        <input type="radio" name="Meio_Transporte" id="Transporte_Aereo" value="Aéreo"><label for="Aéreo" required>Aéreo </label>
                        <input type="radio" name="Meio_Transporte" id="Transporte_Marítimo" value="Marítimo"><label for="Marítimo" required>Marítimo </label>
                        <input type="radio" name="Meio_Transporte" id="Terrestre" value="Terrestre"><label for="Terrestre" required>Terrestre </label>
                        <br><br>
                    </div>

                    <div class="inputBox">
                        <label for="Transporte_Detalhado_Pessoa"><label style="color:#FF0000">*</label> Detalhes do Transporte:</label>
                        <input type="text" name="Transporte_Detalhado_Pessoa" id="Transporte_Detalhado_Pessoa"  class="inputUser" required>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <label for="Data_Reconhecido_Pessoa"><b><label style="color:#FF0000">*</label> Data em que foi reconhecido:</b></label>
                        <input type="date" max='2022-11-21' name="Data_Reconhecido_Pessoa" id="Data_Reconhecido_Pessoa"class="inputUser" required>
                    <br><br>
                    </div>

                    <div class="inputBox">
                        
                    <input type="text" name="Pais_Reconhecido_Pessoa" id="Pais_Reconhecido_Pessoa" class="inputUser" required >
                        <label for="Pais_Reconhecido_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Pais Reconhecido:</label>
                    </div>
                    <br><br>
                </div>

                <!--- SITUAcÃO DA CRIANcA OU ADOLESCENTE--->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_CRI');Sumir('APRESENTACAO_FIM');Sumir('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_MEDIDAS')">
                <label>SITUAÇÃO DA CRIANÇA OU ADOLESCENTE</label><br>
                <div name="APRESENTACAO_SITUACAO" id="APRESENTACAO_SITUACAO" style="display:none" class="inputUser">

                    <div class="inputBox">
                        <textarea type="text" name="Vida_antes" id="Vida_antes" class="inputUser" required ></textarea>
                        <label for="Vida_antes" class="labelInput"><label style="color:#FF0000">*</label> Como era sua vida em seu país de origem, antes de você se separar de sua família ?</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <textarea type="text" name="Razão_Saida" id="Razão_Saida" class="inputUser" required ></textarea>
                        <label for="Razão_Saida" class="labelInput"><label style="color:#FF0000">*</label> Em que momento e por qual razão você deixou seu país e se separou de sua família?</label>
                    </div>
                    <br><br>
                    <div class="field radiobox">
                        <label>Alguma situacão forcou você a sair do seu país de origem?</label><br>
                        <input type="radio" name="Situacão_Pessoa" id="Situacão_Pessoa_Sim" value="Sim" onclick="Preencher('Txt_Situacão_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Situacão_Pessoa" id="Situacão_Pessoa_Nao" value="Não" onclick="Sumir('Txt_Situacão_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Situacão_Pessoa" id="Txt_Situacão_Pessoa" style="display:none" placeholder="Digite aqui a situação." class="inputUser" ></textarea>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label>Alguém o ajudou a chegar até o Brasil?</label><br>
                        <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Sim" value="Sim" onclick="Preencher('Txt_Alguem_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Nao" value="Não" onclick="Sumir('Txt_Alguem_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Alguem_Pessoa" id="Txt_Alguem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label>Você realizou a viagem acompanhado?</label><br>
                        <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Sim" value="Sim" onclick="Preencher('Txt_Viagem_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Nao" value="Não" onclick="Sumir('Txt_Viagem_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Viagem_Pessoa" id="Txt_Viagem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea>          
                    </div>
                    <br>

                    <div class="field radiobox">
                        <label>Você entrou no Brasil sozinho?</label><br>
                        <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Sim" value="Sim" onclick="Sumir('Txt_Entrou_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Nao" value="Não" onclick="Preencher('Txt_Entrou_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Entrou_Pessoa" id="Txt_Entrou_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea> 
                    </div>
                    <br>

                    <div class="field radiobox">
                        <label>Você tem intenção de peremanecer no Brasil?</label><br>
                        <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Sim" value="Sim" onclick="Sumir('Txt_Permancer_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Nao" value="Não" onclick="Preencher('Txt_Permancer_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Permancer_Pessoa" id="Txt_Permancer_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea> 
                    </div>
                    <br>

                    <div class="field radiobox">
                        <label>Você deseja retornar ao seu país?</label><br>
                        <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Sim" value="Sim" onclick="Sumir('Txt_Retornar_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Nao" value="Não" onclick="Preencher('Txt_Retornar_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Retornar_Pessoa" id="Txt_Retornar_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea>
                    </div>
                    <br>

                    <div class="field radiobox">
                        <label>Você tem medo de regressar ao seu país de origem?</label><br>
                        <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Sim" value="Sim" onclick="Preencher('Txt_Medo_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Nao" value="Não" onclick="Sumir('Txt_Medo_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Medo_Pessoa" id="Txt_Medo_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ></textarea>
                    </div>
                    <br>


                    <div class="field radiobox">
                        <label>Tem parentes (irmãos tios, primos e avós) no país de origem?</label><br>
                        <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Sim" value="Sim" ><label for="Sim">Sim </label>
                        <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Nao" value="Não" ><label for="Não">Não </label>
                    </div>
                    <br><br>

                    <div class="field radiobox">
                        <label>Tem parentes (irmãos tios, primos e avós) no Brasoç?</label><br>
                        <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Sim" value="Sim" ><label for="Sim">Sim </label>
                        <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Nao" value="Não" ><label for="Não">Não </label>
                    </div>
                    <br>
                    <div class="field radiobox">            
                    <p>Possíveis necessidades de proteção da criança ou adolescente:</p>
                        <input type="radio" name="Proteção_Indicadores" id="Convivencia_Proteção" value="ProteçãoC" onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Convivencia_Proteção" required>Retorno à convivência familiar, conforme parâmetros de proteção integral e atenção ao interesse superior da criança e do adolescente; </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Familiar_Proteção" value="ProteçãoF" onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Familiar_Proteção" required>Medida de proteção por reunião familiar </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Trafico_Proteção" value="ProteçãoT" onclick="Sumir('Txt_Proteção_Indicadores')"><label for="Trafico_Proteção" required>Proteção como vítima de tráfico de pessoas; </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Outro_Proteção" value="ProteçãoO" onclick="Preencher('Txt_Proteção_Indicadores')"><label for="Outro_Proteção" required>Outra medida de regularização migratória ou proteção como refugiado ou apátrida, conforme a legislação em vigor. Informe: </label><br><br>
                        <input type="text" name="Txt_Proteção_Indicadores" id="Txt_Proteção_Indicadores" style="display:none" placeholder="Digite aqui" class="inputUser"></input>
                    </div>
                    <br>
                    <div class="field radiobox">  
                        <label for="Solicitação_Indicadores">Solicitação de:</label><br>
                        <input type="radio" name="Solicitação_Indicadores" id="Temporaria_Indicadores" value="RESIDÊNCIA TEMPORÁRIA" ><label for="Temporaria_Indicadores" required>RESIDÊNCIA TEMPORÁRIA </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Refugiu_Indicadores" value="REFÚGIO"><label for="Refugiu_Indicadores" required>REFÚGIO </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Institucionalização_Indicadores" value="INSTITUCIONALIZAÇÃO" ><label for="Institucionalização_Indicadores" required>INSTITUCIONALIZAÇÃO </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Ingresso_temporario_Indicadores" value="INGRESSO TEMPORARIO" ><label for="Ingresso_temporario_Indicadores" required>INGRESSO TEMPORARIO </label>
                    </div>
                    <br><br>
                </div>
                <!--- MEDIDAS PROTETIVAS--->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_MEDIDAS');Sumir('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_CRI');Sumir('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_FIM')">
                <label>MEDIDAS PROTETIVAS</label><br>
                <div name="APRESENTACAO_MEDIDAS" id="APRESENTACAO_MEDIDAS" style="display:none" class="inputUser">

                    <div class="field radiobox">            
                        <p>Em caso de a crianca ou o adolescente já encaminhado para instituicão de acolhimento, favor informar:</p>
                        <input type="radio" id="Encaminhada_Protetivas_Sim" name="Encaminhada_Protetivas" onclick="Requerido('Encaminhamento_Protetiva')" value="SIM" >
                        <label for="Encaminhada_Protetivas_Sim">Sim</label>
                        <input type="radio" id="Encaminhada_Protetivas_Nao" name="Encaminhada_Protetivas" onclick="Limpar('Encaminhamento_Protetiva')" value="NÃO" >
                        <label for="Encaminhada_Protetivas_Nao">Não</label>
                    </div>
                    <br><br>
                    <div name="Encaminhamento_Protetiva" id="Encaminhamento_Protetiva" style="display:none" class="inputUser">
                        <div class="inputBox">
                            <input type="text" name="Instituicão_Protetivas" id="Instituicão_Protetivas" class="inputUser" required  >
                            <label for="Instituicão_Protetivas" class="labelInput">Instituicão de acolhimento:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="Endereco_Inst_Protetivas" id="Endereco_Inst_Protetivas" class="inputUser" required  >
                            <label for="Endereco_Inst_Protetivas" class="labelInput">Endereco:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="Responsavel_Inst_Protetivas" id="Responsavel_Inst_Protetivas" class="inputUser" required  >
                            <label for="Responsavel_Inst_Protetivas" class="labelInput">Responsável:</label>
                        </div>
                        <br><br>
                        <div class="inputBox">
                            <input type="text" name="Vara_Protetivas" id="Vara_Protetivas" class="inputUser" required  >
                            <label for="Vara_Protetivas" class="labelInput">Vara da Infância e da Juventude:</label>
                        </div>
                        <br>
                    </div>
                    <div class="field radiobox">       
                        <p>Em caso de a crianca ou o adolescente representado por responsável legal já designado(a) no Brasil, favor informar:</p>
                        <input type="radio" id="Representante_Protetiva_Sim" name="Representante_Protetiva" onclick="Requerido('Representante_Protetiva_OP')" value="SIM" >
                        <label for="Representante_Protetiva_Sim">Sim</label>
                        <input type="radio" id="Representante_Protetiva_Nao" name="Representante_Protetiva" onclick="Limpar('Representante_Protetiva_OP')" value="NÃO" >
                        <label for="Representante_Protetiva_Nao">Não</label>
                    </div>
                    <br><br>
                    <div name="Representante_Protetiva_OP" id="Representante_Protetiva_OP" style="display:none" class="inputUser">
                        <div class="inputBox">
                            <input type="text" name="Responsavel_Protetivas" id="Responsavel_Protetivas" class="inputUser" required  >
                            <label for="Responsavel_Protetivas" class="labelInput">Nome completo do responsável legal</label>
                        </div>
                        <br>

                        <div class="field radiobox">            
                            <p>Tipo de documento</p>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CERTIDÃO DE NASCIMENTO" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="CERTIDÃO DE NASCIMENTO" required>CERTIDÃO DE NASCIMENTO </label> <br>                   
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="CEDULA DE IDENTIDADE" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="CEDULA DE IDENTIDADE" required>CEDULA DE IDENTIDADE </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA DA CERTIDÃO DE NASCIMENTO" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="COPIA DA CERTIDÃO DE NASCIMENTO" required>COPIA DA CERTIDÃO DE NASCIMENTO </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="COPIA CÉDULA DE IDENTIDADE" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="COPIA CÉDULA DE IDENTIDADE" required>COPIA CÉDULA DE IDENTIDADE </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DECLARAÇÃO DE NASCIDO VIVO" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="DDDECLARAÇÃO DE NASCIDO VIVONV" required>DECLARAÇÃO DE NASCIDO VIVO </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" onclick="Preencher('Documento_Responsavel');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')" ><label for="PARECER SOCIAL DO MINISTERIO DA CIDADANIA" required>PARECER SOCIAL DO MINISTERIO DA CIDADANIA </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="NENHUM DOCUMENTO" onclick="Sumir('Documento_Responsavel');Limpar('Text_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas');Limpar('Numero_Documento_Protetivas')" ><label for="NENHUM DOCUMENTO " required>NENHUM DOCUMENTO </label><br>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DO" onclick="Preencher('Documento_Responsavel');Requerido('Text_Documento_Protetivas');Requerido('Numero_Documento_Protetivas');Limpar('Text_Copia_Documento_Protetivas')"><label for="DO">OUTRO. </label><br>
                            <input type="text" name="Text_Documento_Protetivas" id="Text_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser" ></input>
                            <input type="radio" name="Documento_Protetivas" id="Documento_Protetivas" value="DCO" onclick="Preencher('Documento_Responsavel');Requerido('Text_Copia_Documento_Protetivas');Requerido('Numero_Documento_Protetivas');Limpar('Text_Documento_Protetivas')"><label for="DCO">COPIA OUTRO </label><br>
                            <input type="text" name="Text_Copia_Documento_Protetivas" id="Text_Copia_Documento_Protetivas" style="display:none" placeholder="Digite aqui" class="inputUser"></input>
                        </div>
                        <br>
                        <div name="Documento_Responsavel" id="Documento_Responsavel" style="display:none" class="inputUser">
                            <div class="inputBox">
                                <input type="text" name="Numero_Documento_Protetivas" id="Numero_Documento_Protetivas" class="inputUser" required >
                                <label for="Numero_Documento_Protetivas" class="labelInput">Número do Documento:</label>
                            </div>
                        </div>
                        
                        <div class="field radiobox">            
                            <p>Genero:</p>
                            <input type="radio" id="feminino_Protetivas" name="Gênero_Protetivas" value="feminino " >
                            <label for="feminino">Feminino</label>
                            <input type="radio" id="masculino_Protetivas" name="Gênero_Protetivas" value="masculino " >
                            <label for="masculino2">Masculino</label>
                        </div>
                        <br>
                        
                        <div class="inputBox">
                            <label for="Responsavel_Nascimento_Protetivas">Data de Nascimento:</label>
                            <input type="date" max='2004-11-21' name="Responsavel_Nascimento_Protetivas" id="Responsavel_Nascimento_Protetivas" class="inputUser" required   >
                        </div>
                            <br><br>
                        
                        <div class="inputBox">
                            <input type="text" name="Responsavel_Nacionalidade_Protetivas" id="Responsavel_Nacionalidade_Protetivas" class="inputUser" required  >
                            <label for="Responsavel_Nacionalidade_Protetivas" class="labelInput">Nacionalidade:</label>
                        </div>
                        <br><br>

                        <div class="inputBox">
                            <input type="text" name="Responsavel_Endereco_Protetivas" id="Responsavel_Endereco_Protetivas" class="inputUser" required  >
                            <label for="Responsavel_Endereco_Protetivas" class="labelInput">Endereco:</label>
                        </div>
                        <br><br>

                        <div class="inputBox">
                            <input type="text" name="Responsavel_Parentesco_Protetivas" id="Responsavel_Parentesco_Protetivas" class="inputUser" required  >
                            <label for="Responsavel_Parentesco_Protetivas" class="labelInput">Parentesco:</label>
                        </div>
                        <br>
                        

                        <div class="field radiobox">            
                            <p>Constata o vínculo pelos observacão e documentacão apresentada?</p>
                            <input type="radio" id="Vinculo_Protetivas_Sim" name="Vinculo_Protetivas" value="SIM" >
                            <label for="Vinculo_Protetivas_Sim">Sim</label>
                            <input type="radio" id="Vinculo_Protetivas_Nao" name="Vinculo_Protetivas" value="NÃO" >
                            <label for="Vinculo_Protetivas_Nao">Não</label>
                        </div>
                    </div>
                </div>
                <!--- AVALIAcÃO PRELIMINAR DA CRIANcA OU ADOLESCENTE --->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_CRI');Sumir('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_FIM');Sumir('APRESENTACAO_MEDIDAS')">

                <label>SITUAcÃO DA CRIANcA OU ADOLESCENTE</label><br>
                <div name="APRESENTACAO_AVALIACAO" id="APRESENTACAO_AVALIACAO" style="display:none" class="inputUser">


                    <label>Avaliacão de saúde mental (conduta): indique se a crianca ou adolescente apresenta pensamento confuso 
                        (ex. respostas frequentemente incoerentes ou contraditórias)/evidencia perda de contato com a realidade 
                        (ex: seu comportamento parece estranho ou sem sentido/ conduta estranha evidente (ex: hiperatividade, impulsividade, comportamento hostil)/ou risco de 
                        causar danos a outros a si mesmo (a)</label><br><br>

                    <div class="field radiobox">
                        <label style="color:#FF0000">*</label> Avaliacão de saúde mental (conduta): indique se a crianca ou adolescente apresenta pensamento confuso
                            (ex. respostas frequentemente incoerentes ou contraditórias)/evidencia perda de contato com a realidade (ex:
                            seu comportamento parece estranho ou sem sentido/ conduta estranha evidente (ex: hiperatividade,
                            impulsividade, comportamento hostil)/ou risco de causar danos a outros a si mesmo (a)</label><br>
                        <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Normal" value="Normal" onclick="Sumir('Txt_Mental_Avaliacão')"><label for="Normal">Normal </label>
                        <input type="radio" name="Mental_Avaliacão" id="Mental_Avaliacão_Anormal" value="Anormal" onclick="Preencher('Txt_Mental_Avaliacão')"><label for="Anormal">Anormal </label>
                        <br><br>
                        <textarea type="text" name="Txt_Mental_Avaliacão" id="Txt_Mental_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label style="color:#FF0000">*</label> Avaliacão física preliminar: sinalize se a crianca ou adolescente apresenta sinais visíveis de trauma físico
                            ou deficiência física; queixa-se de dores ou doencas, quadro de deficiência motora, etc.</label><br>
                        <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Normal" value="Normal" onclick="Sumir('Txt_Fisico_Avaliacão')"><label for="Normal">Normal </label>
                        <input type="radio" name="Fisico_Avaliacão" id="Fisico_Avaliacão_Anormal" value="Anormal" onclick="Preencher('Txt_Fisico_Avaliacão')"><label for="Anormal">Anormal </label>
                        <br><br>
                        <textarea type="text" name="Txt_Fisico_Avaliacão" id="Txt_Fisico_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label style="color:#FF0000">*</label> Avaliacão de idade e maturidade (a avaliacão de idade só deve ser realizada quando houver significativas
                            dúvidas sobre a idade da crianca ou adolescente, tal como ausência de documentacão, e não deve levar em
                            consideracão apenas a aparência física, mas também a maturidade psicológica)</label><br>
                        <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Normal" value="Normal" onclick="Sumir('Txt_Idade_Avaliacão')"><label for="Normal">Normal </label>
                        <input type="radio" name="Idade_Avaliacão" id="Idade_Avaliacão_Anormal" value="Anormal" onclick="Preencher('Txt_Idade_Avaliacão')"><label for="Anormal">Anormal </label>
                        <br><br>
                        <textarea type="text" name="Txt_Idade_Avaliacão" id="Txt_Idade_Avaliacão" style="display:none" placeholder="Digite aqui" class="inputUser"></textarea>
                    </div>
                    <br>
                </div>

                <!--- IDENTIFICAÇÃO DO INTÉRPRETE  -->
                <input name="APRESENTACAO" id="APRESENTACAO" type="radio" onclick="Preencher('APRESENTACAO_FIM');Sumir('APRESENTACAO_ENTRADA');Sumir('APRESENTACAO_CRI');Sumir('APRESENTACAO_SITUACAO');Sumir('APRESENTACAO_AVALIACAO');Sumir('APRESENTACAO_MEDIDAS');Sumir('APRESENTACAO_ENTRADA')">
                <label>INTÉRPRETE</label><br>
                <div name="APRESENTACAO_FIM" id="APRESENTACAO_FIM" style="display:none" class="inputUser">
                    <div class="inputBox">
                        <input type="text" name="Documento_Interprete" id="Documento_Interprete" maxlength="9" class="inputUser" required>
                        <label for="Documento_Interprete" class="labelInput">Documento de Identificacão:</label>
                    </div>
                    <br><br>
                    <div>
                        <h2>Assinatura do Defensor:</h2><br>
                        <input name="arquivo" type="file" accept="image/*" />
                        <br><br>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit">
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

    <script src="js/script_Cadastro_CRI.js"></script>
</body>
</html>