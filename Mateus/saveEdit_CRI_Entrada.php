<?php


if(isset($_POST['update'])){
    try{
            include_once('config.php');

                $idEntrada                     = isset($_POST['idEntrada']) ? $_POST['idEntrada'] : null;

                $Cidade_Saida_pessoa           = isset($_POST['Cidade_Saida_Pessoa']) ? $_POST['Cidade_Saida_Pessoa'] : null;
                $Data_Saida_pessoa             = isset($_POST['Data_Saida_Pessoa']) ? $_POST['Data_Saida_Pessoa'] : null;
                $Cidade_Chegada_pessoa         = isset($_POST['Cidade_Chegada_Pessoa']) ? $_POST['Cidade_Chegada_Pessoa']:  null;
                $Meio_Transporte                = isset($_POST['Meio_Transporte']) ? $_POST['Meio_Transporte'] : null;
                $Transporte_Detalhado_Pessoa   = isset($_POST['Transporte_Detalhado_Pessoa']) ? $_POST['Transporte_Detalhado_Pessoa'] :  null;
                $Data_Reconhecido_Pessoa       = isset($_POST['Data_Reconhecido_Pessoa']) ?  $_POST['Data_Reconhecido_Pessoa'] :  null;
                $Data_Chegada_Pessoa           = isset($_POST['Data_Chegada_Pessoa']) ? $_POST['Data_Chegada_Pessoa'] :  null;
                $Pais_Reconhecido_Pessoa       = isset($_POST['Pais_Reconhecido_Pessoa']) ? $_POST['Pais_Reconhecido_Pessoa'] :  null;



                //var_dump($sqlUpdate);
///////////////////////////////////////////////////////////////
                $requiredFields = [
                    'ID faltando' => $idEntrada,
                    'Cidade Saida não preenchido' => $Cidade_Saida_pessoa,
                    'Data de saida não preenchido' => $Data_Saida_pessoa,
                    'Cidade de chegada não preenchido' => $Cidade_Chegada_pessoa,
                    'Meio de Transporte não preenchido' => $Meio_Transporte,
                    'Detalhe do Transporte não preenchido' => $Transporte_Detalhado_Pessoa,
                    'Data reconhecido não preenchido' => $Data_Reconhecido_Pessoa,
                    'Data de chegada não preenchido' => $Data_Chegada_Pessoa,
                    'País reconhecido não preenchido' => $Pais_Reconhecido_Pessoa

                ];
        
                foreach ($requiredFields as $field => $fieldValue) {
                    if (is_null($fieldValue) || $fieldValue == '') {
                        http_response_code(400);
                        header('Content-type: application/json');
                        echo json_encode(['field' => $field]);
                        return;
                    }
                }
                ///////////////////////////////////////////////////////////////
            $sqlUpdate =  "UPDATE entrada SET

            Cidade_Saida='$Cidade_Saida_pessoa',
            Data_saida='$Data_Saida_pessoa',
            Cidade_Chegada='$Cidade_Chegada_pessoa',
            Transporte='$Meio_Transporte',
            Transporte_Detalhe='$Transporte_Detalhado_Pessoa',
            Data_Reconhecido='$Data_Reconhecido_Pessoa',
            Data_Chegada='$Data_Chegada_Pessoa',
            Pais_Reconhecido='$Pais_Reconhecido_Pessoa'
            
            WHERE idEntrada=$idEntrada";
            var_dump($sqlUpdate);
        
            $result = $conexao->query($sqlUpdate);
            http_response_code(204);
        }catch(Exception $e){
            //var_dump($e);
            http_response_code(500);  
        }
        return;
    

    }
     //header('Location: Dados_CRI.php');

?>