<?php
    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT * FROM crianca_adolecente WHERE Documento=$Identidade_Pessoa";

        $result = $conexao->query($sqlSelect);
        
        //print_r($result);

        if($result->num_rows > 0){
            
            $sqlDelete = "UPDATE crianca_adolecente SET Status_Crianca = 0 WHERE Documento=$Identidade_Pessoa";
            $resultDelete = $conexao->query($sqlDelete);

        }
    }  
    header('Location: Dados_CRI.php');    
   
?>