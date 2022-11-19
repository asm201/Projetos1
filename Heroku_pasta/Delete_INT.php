<?php
    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Doc_Interprete']))
    {

        include_once('config.php');


        $Documento_Interprete = $_GET['Doc_Interprete'];

        $sqlSelect = "SELECT * FROM interprete WHERE Doc_Interprete=$Documento_Interprete";

        $result = $conexao->query($sqlSelect);
        
        //print_r($result);

        if($result->num_rows > 0){
            
            $sqlDelete = "UPDATE interprete SET Status_Int = 0 WHERE Doc_Interprete=$Documento_Interprete";
            $resultDelete = $conexao->query($sqlDelete);

        }
    }  
    header('Location: Dados_INT.php');    
   
?>