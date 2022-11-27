<?php

if(isset($_POST['update'])){
    try{
        include_once('config.php');

        $Nome_Pessoa                    = isset($_POST['Nome_Pessoa']) ? $_POST['Nome_Pessoa'] :  null;
        $Nascimento_pessoa              = isset($_POST['Nascimento_Pessoa']) ? $_POST['Nascimento_Pessoa'] :  null;
        $Genero_pessoa                  = isset($_POST['gênero_pessoa']) ? $_POST['gênero_pessoa'] :  null;
        $Nacionalidade_pessoa           = isset($_POST['Nacionalidade_Pessoa']) ? $_POST['Nacionalidade_Pessoa'] :  null;
        $País_Cid_pessoa                = isset($_POST['País_Cid_Pessoa']) ? $_POST['País_Cid_Pessoa'] :  null;
        $Escolaridade_pessoa            = isset($_POST['Escolaridade_Pessoa']) ? $_POST['Escolaridade_Pessoa'] :  null;
        $Endereco_Antigo_Pessoa         = isset($_POST['Endereco_Antigo_Pessoa']) ? $_POST['Endereco_Antigo_Pessoa'] :  null;
        $Endereco_atual_pessoa          = isset($_POST['Endereco_Atual_Pessoa']) ? $_POST['Endereco_Atual_Pessoa'] :  null;
        $Telefone_pessoa                = isset($_POST['Telefone_Pessoa']) ? $_POST['Telefone_Pessoa'] :  null;
        $Email_pessoa                   = isset($_POST['e-mail_Pessoa']) ? $_POST['e-mail_Pessoa'] :  null;
        $Identidade_pessoa              = isset($_POST['Identidade_Pessoa']) ? $_POST['Identidade_Pessoa'] :  null;
        $Passaporte_pessoa              = isset($_POST['Passaporte_Pessoa']) ? $_POST['Passaporte_Pessoa'] :  null;
        $Certidao_pessoa                = isset($_POST['certidão']) ? $_POST['certidão'] :  null;
        $Mae_pessoa                     = isset($_POST['Mãe_Viva']) ? $_POST['Mãe_Viva'] :  null;
        $Nome_mae_pessoa                = isset($_POST['Text_Mae_Viva']) ? $_POST['Text_Mae_Viva'] :  null;
        $Pai_pessoa                     = isset($_POST['Pai_Vivo']) ? $_POST['Pai_Vivo'] :  null;
        $Nome_pai                       = isset($_POST['Pai_Pessoa']) ? $_POST['Pai_Pessoa'] :  null;
        $Text_Residencia_Mae_Pessoa     = isset($_POST['Text_Residencia_Mae_Pessoa']) ? $_POST['Text_Residencia_Mae_Pessoa'] :  null;
        $Text_Residencia_Pai_Pessoa     = isset($_POST['Text_Residencia_Pai_Pessoa']) ? $_POST['Text_Residencia_Pai_Pessoa'] :  null;
        /*Qualquer Merda aqui*/                 // NOME Q TEM Q TA NO JS

        $requiredFields = [

            'Nome Pessoa não preenchido' => $Nome_Pessoa,
            'Data de Nascimento não preenchido' => $Nascimento_pessoa,
            'Genero não preenchido' => $Genero_pessoa,
            'Nacionalidade não preenchido' => $Nacionalidade_pessoa,
            'País não preenchido' => $País_Cid_pessoa,
            'Escolaridade não preenchido' => $Escolaridade_pessoa,
            'Endereco não preenchido' => $Endereco_Antigo_Pessoa,
            'Telefone não preenchido' => $Telefone_pessoa,
            'E-mail não preenchido' => $Email_pessoa,
            'Identidade não preenchido' => $Identidade_pessoa,
            'Passaporte não preenchido' => $Passaporte_pessoa,
            'Certidao não preenchido' => $Certidao_pessoa,
            'Mae não preenchido' => $Mae_pessoa,
            'Nome Mão não preenchido' => $Nome_mae_pessoa,
            'Pai não preenchido' => $Pai_pessoa,
            'Nome Pai não preenchido' => $Nome_pai,
            'Residencia Mae não preenchido' => $Text_Residencia_Mae_Pessoa,
            'Residencia Pai não preenchido' => $Text_Residencia_Pai_Pessoa
            //oq é mostrado no erro => variavel que está o erro


        ];

        foreach ($requiredFields as $field => $fieldValue) {
            if (is_null($fieldValue) || $fieldValue == '') {
                http_response_code(400);
                header('Content-type: application/json');
                echo json_encode(['field' => $field]);
                return;
            }
        }

            $sqlUpdate =  "UPDATE crianca_adolecente SET Documento='$Identidade_pessoa',

            Nome='$Nome_Pessoa',
            Data_de_Nascimento='$Nascimento_pessoa',
            Genero='$Genero_pessoa',
            Nacionalidade='$Nacionalidade_pessoa',
            Local_Nasc='$País_Cid_pessoa',
            Escolaridade='$Escolaridade_pessoa',
            Endereco_origem='$Endereco_Antigo_Pessoa',
            Endereco_atual='$Endereco_atual_pessoa',
            Telefone_crianca='$Telefone_pessoa',
            Passaporte='$Passaporte_pessoa',
            Certidao_de_Nascimento='$Certidao_pessoa',
            Email_Crianca='$Email_pessoa',

            Mae_viva='$Mae_pessoa',
            Nome_mae='$Nome_mae_pessoa',
            Residencia_mae='$Text_Residencia_Mae_Pessoa',

            Pai_Vivo='$Pai_pessoa',
            Nome_pai='$Nome_pai',
            Residencia_pai='$Text_Residencia_Pai_Pessoa'
            
            WHERE Documento='$Identidade_pessoa'"; 
            var_dump($sqlUpdate);
        
    
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