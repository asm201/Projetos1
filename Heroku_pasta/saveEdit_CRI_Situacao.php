<?php

    include_once('config.php');

    if(isset($_POST['update'])){

        $idSituacao                = $_POST['idSituacao'];
        $Nome_Pessoa               = $_POST['Nome_Pessoa'];
        $Identidade_pessoa         = $_POST['Identidade_Pessoa'];
        
        $Vida_antes                = $_POST['Vida_antes'];
        $Razão_Saida               = $_POST['Razão_Saida'];
        $Situacão_Pessoa           = $_POST['Situacão_Pessoa'];
        //$Txt_Situacão_Pessoa       = $_POST['Saida_Forçada'];
        $Alguem_Pessoa             = $_POST['Alguem_Pessoa'];
        //$Txt_Alguem_Pessoa         = $_POST['Ajuda'];
        $Viagem_Pessoa             = $_POST['Viagem_Pessoa'];
        //$Txt_Viagem_Pessoa         = $_POST['Acompanhado'];
        $Entrou_Pessoa             = $_POST['Entrou_Pessoa'];
        //$Txt_Entrou_Pessoa         = $_POST['Entrada_Sozinho'];
        $Permancer_Pessoa          = $_POST['Permancer_Pessoa'];
        $Retornar_Pessoa           = $_POST['Retornar_Pessoa'];
        $Medo_Pessoa               = $_POST['Medo_Pessoa'];
        //$Txt_Retornar_Pessoa       = $_POST['Medo_Retorno'];
        $Parentes_Origem_Pessoa    = $_POST['Parentes_Origem_Pessoa'];
        $Parentes_Brasil_Pessoa    = $_POST['Parentes_Brasil_Pessoa'];
        $Proteção_Indicadores      = $_POST['Proteção_Indicadores'];
        $Solicitação_Indicadores   = $_POST['Solicitação_Indicadores'];

        //var_dump($idSituacao);
        //$sqlUpdate =  "UPDATE criança_adolecente SET Documento='$Identidade_pessoa',

        try{
            $sqlUpdate =  "UPDATE situacao SET

            Vida_Antes='$Vida_antes',
            Razao_Saida='$Razão_Saida',
            Saida_Forcada='$Situacão_Pessoa',
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
        }catch(Exception $e){
            echo  '<script>alert("Erro ao atualizar Situação");</script>';
            header('Location: Dados_CRI_Situacao.php');
        }


    }
     header('Location: Dados_CRI.php');

?>