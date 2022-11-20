<?php

    include_once('config.php');

    if(isset($_POST['update'])){

                $idMedidas_Protetivas                   = $_POST['idMedidas_Protetivas'];
                $Nome_Pessoa                            = $_POST['Nome'];
                $Identidade_pessoa                      = $_POST['Documento'];
                
                $Instituicao_Protetivas                 = $_POST['Instituicão_Protetivas'];
                $Endereco_Inst_Protetivas               = $_POST['Responsavel_Inst_Protetivas'];
                $Vara_Protetivas                        = $_POST['Vara_Protetivas'];
                $Responsavel_Inst_Protetivas            = $_POST['Responsavel_Protetivas'];
                $Responsavel_Protetivas                 = $_POST['Numero_Documento_Protetivas'];
                $Gênero_Protetivas                      = $_POST['Gênero_Protetivas'];
                $Responsavel_Nacionalidade_Protetivas   = $_POST['Responsavel_Nacionalidade_Protetivas'];
                $Responsavel_Endereco_Protetivas        = $_POST['Responsavel_Endereco_Protetivas'];
                $Responsavel_Parentesco_Protetivas      = $_POST['Responsavel_Parentesco_Protetivas'];
                //$Documento_Protetivas                   = $_POST['Documento_Respo'];
                //$Text_Outro_Documento_Protetivas        = $_POST['Text_Documento_Protetivas'];
                //$Text_Copia_Documento_Protetivas        = $_POST['Text_Copia_Documento_Protetivas'];
                $Numero_Documento_Protetivas            = $_POST['Numero_Documento_Protetivas'];
                $Responsavel_Nascimento_Protetivas      = $_POST['Responsavel_Nascimento_Protetivas'];
                $Vinculo_Protetivas                     = $_POST['Vinculo_Protetivas'];

        //var_dump($idMedidas_Protetivas);
        //$sqlUpdate =  "UPDATE criança_adolecente SET Documento='$Identidade_pessoa',
        try{
            $sqlUpdate =  "UPDATE medidas_protetivas SET

            Nome_Inst='$Instituicão_Protetivas',
            Endereco_Inst='$Endereco_Inst_Protetivas',
            Vara='$Vara_Protetivas',
            Nome_Respo_Inst='$Responsavel_Inst_Protetivas',
            Nome_Respo='$Responsavel_Protetivas',
            Genero='$Gênero_Protetivas',
            Nacionalidade='$Responsavel_Nacionalidade_Protetivas',
            Endereco_respo='$Responsavel_Endereco_Protetivas',
            Parentesco='$Responsavel_Parentesco_Protetivas',
            Data_Nascimento='$Responsavel_Nascimento_Protetivas',
            Vinculo='$Vinculo_Protetivas'
            
            WHERE idMedidas_Protetivas=$idMedidas_Protetivas";
            var_dump($sqlUpdate);
        
            $result = $conexao->query($sqlUpdate);
        }catch(Exception $e){
            echo  '<script>alert("Erro ao atualizar Meidas Protertivas");</script>';
            header('Location: Dados_CRI_Medidas.php');
        }
        


    }
     header('Location: Dados_CRI.php');

?>