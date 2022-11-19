<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $Nome_Pessoa                    = $_POST['Nome_Pessoa'];
        $Nascimento_pessoa              = $_POST['Nascimento_Pessoa'];
        $Genero_pessoa                  = $_POST['gênero_pessoa'];
        $Nacionalidade_pessoa           = $_POST['Nacionalidade_Pessoa'];
        $País_Cid_pessoa                = $_POST['País_Cid_Pessoa'];
        $Escolaridade_pessoa            = $_POST['Escolaridade_Pessoa'];
        $Endereco_Antigo_Pessoa         = $_POST['Endereco_Antigo_Pessoa'];
        $Endereco_atual_pessoa          = $_POST['Endereco_Atual_Pessoa'];
        $Telefone_pessoa                = $_POST['Telefone_Pessoa'];
        $Email_pessoa                   = $_POST['e-mail_Pessoa']; //***Incluir na tabela contato
        $Identidade_pessoa              = $_POST['Identidade_Pessoa'];
        $Passaporte_pessoa              = $_POST['Passaporte_Pessoa'];
        $Certidao_pessoa                = $_POST['certidão'];
        $Mae_pessoa                     = $_POST['Mãe_Viva'];
        $Nome_mae_pessoa                = $_POST['Text_Mae_Viva'];
        $Pai_pessoa                     = $_POST['Pai_Vivo'];
        $Nome_pai_pessoa                = $_POST['Text_Pai_Vivo'];
        $Text_Residencia_Mae_Pessoa     = $_POST['Text_Residencia_Mae_Pessoa'];
        $Text_Residencia_Pai_Pessoa     = $_POST['Text_Residencia_Pai_Pessoa'];


        $sqlUpdate =  "UPDATE crianca_adolecente SET Documento='$Identidade_pessoa',
        Nome='$Nome_Pessoa',
        Data_de_Nascimento='$Nascimento_pessoa',
        Genero='$Genero_pessoa',
        Nacionalidade='$Nacionalidade_pessoa',
        Local_Nasc='$País_Cid_pessoa',
        Escolaridade='$Escolaridade_pessoa',
        Endereco_origem='$Endereco_Antigo_Pessoa',
        Endereco_atual='$Endereco_atual_pessoa',
        Telefone_crianca='$Telefone_pessoa',
        Passaporte='$Passaporte_pessoa',
        Certidao_de_Nascimento='$Certidao_pessoa',
        Mae_viva='$Mae_pessoa',
        Pai_Vivo='$Pai_pessoa',
        Nome_mae='$Nome_mae_pessoa',
        Nome_pai='$Nome_pai_pessoa',
        Email_Crianca='$Email_pessoa',
        Residencia_mae='$Text_Residencia_Mae_Pessoa',
        Residencia_pai='$Text_Residencia_Pai_Pessoa'
        
        WHERE Documento='$Identidade_pessoa'"; 
        var_dump($sqlUpdate);
    

        $result = $conexao->query($sqlUpdate);
    }
     header('Location: Dados_CRI.php');

?>