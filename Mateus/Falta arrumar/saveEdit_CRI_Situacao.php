<?php


if(isset($_POST['update'])){
    try{
        include_once('config.php');
        $idSituacao                = isset($_POST['idSituacao'])  ? $_POST['idSituacao'] : null;
        
        $Vida_antes                = isset($_POST['Vida_antes'])  ? $_POST['Vida_antes'] : null;
        $Razão_Saida               = isset($_POST['Razão_Saida'])  ? $_POST['Razão_Saida'] : null;
        $Situacao_Pessoa           = isset($_POST['Situacao_Pessoa'])  ? $_POST['Situacao_Pessoa'] : null;
        //$Txt_Situacao_Pessoa     = isset($_POST['Saida_Forçada'])  ? $_POST['Saida_Forçada'] : null;
        $Alguem_Pessoa             = isset($_POST['Alguem_Pessoa'])  ? $_POST['Alguem_Pessoa'] : null;
        //$Txt_Alguem_Pessoa       = isset($_POST['Ajuda'])  ? $_POST['Ajuda'] : null;
        $Viagem_Pessoa             = isset($_POST['Viagem_Pessoa'])  ? $_POST['Viagem_Pessoa'] : null;
        //$Txt_Viagem_Pessoa         = isset($_POST['Acompanhado'])  ? $_POST['Acompanhado'] : null;
        $Entrou_Pessoa             = isset($_POST['Entrou_Pessoa'])  ? $_POST['Entrou_Pessoa'] : null;
        //$Txt_Entrou_Pessoa         = isset($_POST['Entrada_Sozinho'])  ? $_POST['Entrada_Sozinho'] : null;
        $Permancer_Pessoa          = isset($_POST['Permancer_Pessoa'])  ? $_POST['Permancer_Pessoa'] : null;
        $Retornar_Pessoa           = isset($_POST['Retornar_Pessoa'])  ? $_POST['Retornar_Pessoa'] : null;
        $Medo_Pessoa               = isset($_POST['Medo_Pessoa'])  ? $_POST['Medo_Pessoa'] : null;
        //$Txt_Retornar_Pessoa       = isset($_POST['Medo_Retorno'])  ? $_POST['Medo_Retorno'] : null;
        $Parentes_Origem_Pessoa    = isset($_POST['Parentes_Origem_Pessoa'])  ? $_POST['Parentes_Origem_Pessoa'] : null;
        $Parentes_Brasil_Pessoa    = isset($_POST['Parentes_Brasil_Pessoa'])  ? $_POST['Parentes_Brasil_Pessoa'] : null;
        $Proteção_Indicadores      = isset($_POST['Proteção_Indicadores'])  ? $_POST['Proteção_Indicadores'] : null;
        $Solicitação_Indicadores   = isset($_POST['Solicitação_Indicadores'])  ? $_POST['Solicitação_Indicadores'] : null;

        //var_dump($idSituacao);
        $requiredFields = [

            'ID não preenchido' => $idSituacao,
            'Vida Antes não preenchido' => $Vida_antes,
            'Razão Saida não preenchido' => $Razão_Saida,
            'Situação Pessoa não preenchido' => $Situacao_Pessoa,
            'Alguem não preenchido' => $Alguem_Pessoa,
            'Viagem não preenchido' => $Viagem_Pessoa,
            'Entrou não preenchido' => $Entrou_Pessoa,
            'Permanecer não preenchido' => $Permancer_Pessoa,
            'Retornar não preenchido' => $Retornar_Pessoa,
            'Medo de Retorno não preenchido' => $Medo_Pessoa,
            'Parentes Origem não preenchido' => $Parentes_Origem_Pessoa,
            'Parentes Brasil não preenchido' => $Parentes_Brasil_Pessoa,
            'Proteção Indicadores não preenchido' => $Proteção_Indicadores,
            'Solicitações não preenchido' => $Solicitação_Indicadores

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

            Vida_Antes='$Vida_antes',
            Razao_Saida='$Razão_Saida',
            Saida_Forcada='$Situacao_Pessoa',
            Ajuda='$Alguem_Pessoa',
            Acompanhado='$Viagem_Pessoa',
            Entrada_Sozinho='$Entrou_Pessoa',
            Permanencia='$Permancer_Pessoa',
            Medo_Retorno='$Medo_Pessoa',
            Retorno='$Retornar_Pessoa',
            Parente_Pais_Origem='$Parentes_Origem_Pessoa',
            Parente_Brasil='$Parentes_Brasil_Pessoa',
            Protecao_da_Crianca='$Proteção_Indicadores',
            Solicitacao_de_Indicadores='$Solicitação_Indicadores'
            
            WHERE idSituacao=$idSituacao";
            var_dump($sqlUpdate);
        
            $result = $conexao->query($sqlUpdate);
            http_response_code(200);
        }catch(Exception $e){
            http_response_code(500);  
        }
        return;

    }
     //header('Location: Dados_CRI.php');

?>