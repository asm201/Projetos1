<?php


if(isset($_POST['update'])){
        try{
        include_once('config.php');

            $idDefensor         = isset($_POST['idDefensor']) ? $_POST['idDefensor'] :  null;

            $Nome_Defensor      = isset($_POST['Nome_Defensor']) ? $_POST['Nome_Defensor'] :  null;
            $Documento_defensor = isset($_POST['Documento_Defensor']) ? $_POST['Documento_Defensor'] :  null;
            $Cargo_Defensor     = isset($_POST['txt_Cargo_Defensor']) ? $_POST['txt_Cargo_Defensor'] :  null;
            $Endereco_defensor  = isset($_POST['Endereco_Defensor']) ? $_POST['Endereco_Defensor'] :  null;
            $Cidade_defensor    = isset($_POST['Cidade_UF_Defensor']) ? $_POST['Cidade_UF_Defensor'] :  null;
            $Telefone_defensor  = isset($_POST['Telefone_Defensor']) ? $_POST['Telefone_Defensor'] :  null;
            $Email_defensor     = isset($_POST['e-mail_Defensor']) ? $_POST['e-mail_Defensor'] :  null;


            $requiredFields = [
                'ID faltando' => $idDefensor,
                'Nome Defensor não preenchido' => $Nome_Defensor,
                'Documento não preenchido' => $Documento_defensor,
                'Cargo não preenchido' => $Cargo_Defensor,
                'Endereco não preenchido' => $Endereco_defensor,
                'Cidade não preenchido' => $Cidade_defensor,
                'Telefone não preenchido' => $Telefone_defensor,
                'Email não preenchido' => $Email_defensor

            ];
    
            foreach ($requiredFields as $field => $fieldValue) {
                if (is_null($fieldValue) || $fieldValue == '') {
                    http_response_code(400);
                    header('Content-type: application/json');
                    echo json_encode(['field' => $field]);
                    return;
                }
            }



            $sqlUpdate = "UPDATE defensor SET 
            Nome_Def='$Nome_Defensor',
            Doc_Defensor='$Documento_defensor',
            Cargo='$Cargo_Defensor',
            Endereco_Def='$Endereco_defensor',
            Cidade_UF='$Cidade_defensor',
            Telefone_Def='$Telefone_defensor',
            Contato_Def='$Email_defensor' 

            WHERE idDefensor='$idDefensor'"; 
            var_dump($sqlUpdate);
        
            $result = $conexao->query($sqlUpdate);
            http_response_code(204);
        }catch(Exception $e){
            //var_dump($e);
            http_response_code(500);  
        }
        return;

    }
    // header('Location: Dados.php');

?>