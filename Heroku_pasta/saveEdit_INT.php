<?php

    include_once('config.php');

    if(isset($_POST['update'])){

    $Nome_Interprete            = $_POST['Nome_Interprete'];
    $Documento_Interprete       = $_POST['Documento_Interprete'];
    $Endereço_Interprete        = $_POST['Endereço_Interprete'];
    $email_Interprete           = $_POST['e-mail_Interprete'];
    $Telefone_Interprete        = $_POST['Telefone_Interprete'];

    try{
        $sqlUpdate = "UPDATE interprete SET Nome='$Nome_Interprete',Doc_Interprete='$Documento_Interprete',Endereco_Int='$Endereço_Interprete',Telefone_int='$Telefone_Interprete',Contato_Int='$email_Interprete' 
        WHERE Doc_Interprete='$Documento_Interprete'"; 
    
    
        $result = $conexao->query($sqlUpdate);
    }catch(Exception $e){
        echo  '<script>alert("Erro ao atualizar Intérprete");</script>';
        header('Location: Dados_INT.php');
    }

    }
    header('Location: Dados_INT.php');

?>