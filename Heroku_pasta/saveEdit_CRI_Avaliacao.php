<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $idSituação                = $_POST['idSituacao'];
        $Nome_Pessoa               = $_POST['Nome_Pessoa'];
        $Identidade_pessoa         = $_POST['Identidade_Pessoa'];
        
        $Mental_Avaliacão          = $_POST['Mental_Avaliacão'];
        $Fisico_Avaliacão          = $_POST['Fisico_Avaliacão'];
        $Idade_Avaliacão           = $_POST['Idade_Avaliacão'];

        try{
            $sqlUpdate =  "UPDATE situacao SET

            Saude_Mental='$Mental_Avaliacão',
            Saude_Fisica='$Fisico_Avaliacão',
            Idade_Mental='$Idade_Avaliacão'
            
            WHERE idSituacao=$idSituação";
            var_dump($sqlUpdate);
        
            $result = $conexao->query($sqlUpdate);
        }catch(Exception $e){
            echo  '<script>alert("Erro ao atualizar Avaliação");</script>';
            header('Location: Dados_CRI_Avaliacao.php');
        }

    }
     header('Location: Dados_CRI.php');

?>