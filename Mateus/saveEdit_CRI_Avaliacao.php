<?php


if(isset($_POST['update'])){
    try{
        include_once('config.php');
        $idSituaçao                = isset($_POST['idSituacao']) ? $_POST['idSituacao'] : null;
        
        $Mental_Avaliacao          = isset($_POST['Txt_Mental_Avaliacão']) ? $_POST['Txt_Mental_Avaliacão'] : null;
        $Fisico_Avaliacao          = isset($_POST['Txt_Fisico_Avaliacão']) ? $_POST['Txt_Fisico_Avaliacão'] : null;
        $Idade_Avaliacao           = isset($_POST['Txt_Idade_Avaliacão']) ? $_POST['Txt_Idade_Avaliacão']: null;


        $requiredFields = [
            'ID faltando' => $idSituaçao,
            'Mental faltando' => $Mental_Avaliacao,
            'Fisico_Avaliacao faltando' => $Fisico_Avaliacao,
            'Idade_Avaliacao faltando' => $Idade_Avaliacao
        ];

        foreach ($requiredFields as $field => $fieldValue) {
            if (is_null($fieldValue) || $fieldValue == '') {
                http_response_code(400);
                header('Content-type: application/json');
                echo json_encode(['field' => $field]);
                return;
            }
        }
        
        $sqlUpdate =  "UPDATE situacao SET

        Saude_Mental='$Mental_Avaliacao',
        Saude_Fisica='$Fisico_Avaliacao',
        Idade_Mental='$Idade_Avaliacao'
        
        WHERE idSituacao=$idSituaçao";
        var_dump($sqlUpdate);
    
        $result = $conexao->query($sqlUpdate);
        http_response_code(204);
    }catch(Exception $e){
        http_response_code(500);  
    }
    return;

}
     //header('Location: Dados_CRI.php');

?>