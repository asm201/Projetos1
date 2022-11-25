<?php

if(isset($_POST['update'])){
        try{
        include_once('config.php');

                $idMedidas_Protetivas                   = isset($_POST['idMedidas_Protetivas']) ? $_POST['idMedidas_Protetivas'] :  null;
                
                $Nome_Inst                              = isset($_POST['Instituicão_Protetivas']) ? $_POST['Instituicão_Protetivas'] :  null;
                $Endereco_Inst_Protetivas               = isset($_POST['Endereco_Inst_Protetivas']) ? $_POST['Endereco_Inst_Protetivas'] :  null;
                $Vara_Protetivas                        = isset($_POST['Vara_Protetivas']) ? $_POST['Vara_Protetivas'] :  null;
                $Responsavel_Inst_Protetivas            = isset($_POST['Responsavel_Inst_Protetivas']) ? $_POST['Responsavel_Inst_Protetivas'] :  null;

                $Responsavel_Protetivas                 = isset($_POST['Responsavel_Protetivas']) ? $_POST['Responsavel_Protetivas'] :  null;
                $Text_Outro_Documento_Protetivas        = isset($_POST['Text_Documento_Protetivas']) ? $_POST['Text_Documento_Protetivas'] :  null;
                $Text_Copia_Documento_Protetivas        = isset($_POST['Text_Copia_Documento_Protetivas']) ? $_POST['Text_Copia_Documento_Protetivas'] :  null;

                $Numero_Documento_Protetivas            = isset($_POST['Numero_Documento_Protetivas']) ? $_POST['Numero_Documento_Protetivas'] :  null;
                
                $Gênero_Protetivas                      = isset($_POST['Gênero_Protetivas']) ? $_POST['Gênero_Protetivas'] :  null;
                $Responsavel_Nascimento_Protetivas      = isset($_POST['Responsavel_Nascimento_Protetivas']) ? $_POST['Responsavel_Nascimento_Protetivas'] :  null;
                $Responsavel_Nacionalidade_Protetivas   = isset($_POST['Responsavel_Nacionalidade_Protetivas']) ? $_POST['Responsavel_Nacionalidade_Protetivas'] :  null;
                $Responsavel_Endereco_Protetivas        = isset($_POST['Responsavel_Endereco_Protetivas']) ? $_POST['Responsavel_Endereco_Protetivas'] :  null;
                $Responsavel_Parentesco_Protetivas      = isset($_POST['Responsavel_Parentesco_Protetivas']) ? $_POST['Responsavel_Parentesco_Protetivas'] :  null;
                $Vinculo_Protetivas                     = isset($_POST['Vinculo_Protetivas']) ? $_POST['Vinculo_Protetivas'] :  null;

                $Descricao                              = isset($_POST['Documento_Protetivas']) ? $_POST['Documento_Protetivas'] :  null;
                $Numero                                 = isset($_POST['Documento_Respo']) ? $_POST['Documento_Respo'] :  null;
                

        //var_dump($idMedidas_Protetivas);
        //$sqlUpdate =  "UPDATE criança_adolecente SET Documento='$Identidade_pessoa',

        $requiredFields = [
            'ID faltando' => $idMedidas_Protetivas,
            'Instituição não preenchido' => $Nome_Inst,
            'Endereço da intituição não preenchido' => $Endereco_Inst_Protetivas,
            'Vara não preenchido' => $Vara_Protetivas,
            //'Responsavel não preenchido' => $Responsavel_Inst_Protetivas,
            'Responsavel não preenchido' => $Responsavel_Protetivas,
            'Documento não preenchido' => $Descricao,
            'Numero não preenchido' => $Numero,
            'Responsavel Nacionalidade não preenchido' => $Responsavel_Nacionalidade_Protetivas,
            'Responsavel endereço não preenchido' => $Responsavel_Endereco_Protetivas,
            'Responsavel parentesco não preenchido' => $Responsavel_Parentesco_Protetivas,
            //'País reconhecido não preenchido' => $Text_Outro_Documento_Protetivas,
            //'País reconhecido não preenchido' => $Text_Copia_Documento_Protetivas,
            'Numero do documento não preenchido' => $Numero_Documento_Protetivas,
            'Data do responsavel não preenchido' => $Responsavel_Nascimento_Protetivas,
            'Vinculo não preenchido' => $Vinculo_Protetivas


        ];


        foreach ($requiredFields as $field => $fieldValue) {
            if (is_null($fieldValue) || $fieldValue == '') {
                http_response_code(400);
                header('Content-type: application/json');
                echo json_encode(['field' => $field]);
                return;
            }
        }


            $sqlUpdate =  "UPDATE medidas_protetivas SET

            Endereco_Inst='$Endereco_Inst_Protetivas',
            Nome_Inst='$Nome_Inst',
            Nome_Respo_Inst='$Responsavel_Inst_Protetivas',
            Nome_Respo='$Responsavel_Protetivas',
            Genero='$Gênero_Protetivas',
            Nacionalidade='$Responsavel_Nacionalidade_Protetivas',
            Endereco_respo='$Responsavel_Endereco_Protetivas',
            Parentesco='$Responsavel_Parentesco_Protetivas',
            Data_Nascimento='$Responsavel_Nascimento_Protetivas',
            Vara='$Vara_Protetivas',
            Vinculo='$Vinculo_Protetivas'
            
            WHERE idMedidas_Protetivas=$idMedidas_Protetivas";
            var_dump($sqlUpdate);
            $result = $conexao->query($sqlUpdate);

            $sqlUpdate =  "UPDATE documentos SET

            Descricao='$Descricao',
            Numero='$Numero'

            WHERE idMedidas_Protetivas=$idMedidas_Protetivas";

        
            $result = $conexao->query($sqlUpdate);
            http_response_code(204);
        }catch(Exception $e){
            //var_dump($e);
            http_response_code(500);  
        }
        return;
        


    }
    // header('Location: Dados_CRI.php');

?>