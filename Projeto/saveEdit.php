<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $idDefensor         = $_POST['idDefensor'];
        $Nome_Defensor      = $_POST['Nome_Defensor'];
        $Documento_defensor = $_POST['Documento_Defensor'];
        $Cargo_Defensor     = $_POST['txt_Cargo_Defensor'];
        $Endereco_defensor  = $_POST['Endereco_Defensor'];
        $Cidade_defensor    = $_POST['Cidade/UF_Defensor'];
        $Telefone_defensor  = $_POST['Telefone_Defensor'];
        $Email_defensor     = $_POST['e-mail_Defensor']; 

        $sqlUpdate = "UPDATE defensor SET Nome_Def='$Nome_Defensor',Doc_Defensor='$Documento_defensor',Cargo='$Cargo_Defensor',Endereço_Def='$Endereco_defensor',Cidade_UF='$Cidade_defensor',Telefone_Def='$Telefone_defensor',Contato_Def='$Email_defensor' 
        WHERE idDefensor='$idDefensor'"; 
    

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: Dados.php');

?>