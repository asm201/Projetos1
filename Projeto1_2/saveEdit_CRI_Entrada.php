<?php

    include_once('config.php');

    if(isset($_POST['update'])){

                $idEntrada                     = $_POST['idEntrada'];
                $Nome_Pessoa                   = $_POST['Nome_Pessoa'];
                $Identidade_pessoa             = $_POST['Identidade_Pessoa'];

                $Cidade_Saida_pessoa           = $_POST['Cidade_Saida_Pessoa'];
                $Data_Saida_pessoa             = $_POST['Data_Saida_Pessoa'];
                $Cidade_Chegada_pessoa         = $_POST['Cidade_Chegada_Pessoa'];
                $Meio_transporte_pessoa        = $_POST['Meio_Transporte'];
                $Transporte_Detalhado_Pessoa   = $_POST['Data_Reconhecido_Pessoa'];
                $Data_Reconhecido_Pessoa       = $_POST['Data_Reconhecido_Pessoa'];
                $Data_Chegada_Pessoa           = $_POST['Data_Chegada_Pessoa'];
                $Pais_Reconhecido_Pessoa       = $_POST['Pais_Reconhecido_Pessoa'];


        $sqlUpdate =  "UPDATE entrada SET

        Cidade_Saida='$Cidade_Saida_pessoa',
        Data_saida='$Data_Saida_pessoa',
        Cidade_Chegada='$Cidade_Chegada_pessoa',
        Transporte='$Meio_transporte_pessoa',
        Transporte_Detalhe='$Transporte_Detalhado_Pessoa',
        Data_Reconhecido='$Data_Reconhecido_Pessoa',
        Data_Chegada='$Data_Chegada_Pessoa',
        Pais_Reconhecido='$Pais_Reconhecido_Pessoa'
        
        WHERE idEntrada=$idEntrada";
        var_dump($sqlUpdate);
    
        $result = $conexao->query($sqlUpdate);
    }
     header('Location: Dados_CRI.php');

?>