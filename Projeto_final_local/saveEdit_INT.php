<?php


if(isset($_POST['update'])){
    try{
            include_once('config.php');

    $Nome_Interprete            = $_POST['Nome_Interprete'];
    $Documento_Interprete       = $_POST['Documento_Interprete'];
    $Endereço_Interprete        = $_POST['Endereço_Interprete'];
    $email_Interprete           = $_POST['e-mail_Interprete'];
    $Telefone_Interprete        = $_POST['Telefone_Interprete'];

    $requiredFields = [

        'Nome Interprete faltando' => $Nome_Interprete,
        'Documento não preenchido' => $Documento_Interprete,
        'Endereço do Interprete não preenchido' => $Endereço_Interprete,
        'Email não preenchido' => $email_Interprete,
        'Telefone não preenchido' => $Telefone_Interprete,
    ];


    foreach ($requiredFields as $field => $fieldValue) {
        if (is_null($fieldValue) || $fieldValue == '') {
            http_response_code(400);
            header('Content-type: application/json');
            echo json_encode(['field' => $field]);
            return;
        }
    }


        $sqlUpdate = "UPDATE interprete SET 

        Nome='$Nome_Interprete',
        Doc_Interprete='$Documento_Interprete',
        Endereco_Int='$Endereço_Interprete',
        Telefone_int='$Telefone_Interprete',
        Contato_Int='$email_Interprete' 
        
        WHERE Doc_Interprete='$Documento_Interprete'"; 
    
    
        var_dump($sqlUpdate);
            
        $result = $conexao->query($sqlUpdate);
        http_response_code(204);
    }catch(Exception $e){
        //var_dump($e);
        http_response_code(500);  
    }
    return;
    //header('Location: Dados_INT.php');
}
?>