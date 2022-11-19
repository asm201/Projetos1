<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $idSituação                = $_POST['idSituação'];
        $Nome_Pessoa               = $_POST['Nome_Pessoa'];
        $Identidade_pessoa         = $_POST['Identidade_Pessoa'];
        
        $Mental_Avaliacão          = $_POST['Mental_Avaliacão'];
        $Fisico_Avaliacão          = $_POST['Fisico_Avaliacão'];
        $Idade_Avaliacão           = $_POST['Idade_Avaliacão'];


        $sqlUpdate =  "UPDATE Situação SET

        Saude_Mental='$Mental_Avaliacão',
        Saude_Fisica='$Fisico_Avaliacão',
        Idade_Mental='$Idade_Avaliacão'
        
        WHERE idSituação=$idSituação";
        var_dump($sqlUpdate);
    
        $result = $conexao->query($sqlUpdate);
    }
     header('Location: Dados_CRI.php');

?>