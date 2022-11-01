<?php
    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['idDefensor']))
    {

        include_once('config.php');


        $idDefensor = $_GET['idDefensor'];

        $sqlSelect = "SELECT * FROM defensor WHERE idDefensor=$idDefensor";

        $result = $conexao->query($sqlSelect);
        
        //print_r($result);

        if($result->num_rows > 0){
            
            $sqlDelete = "UPDATE defensor SET Status_Def = 0 WHERE idDefensor=$idDefensor";
            $resultDelete = $conexao->query($sqlDelete);

        }
    }  
    header('Location: Dados.php');    
   
?>