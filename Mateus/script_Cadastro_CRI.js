
$('#Formulario2').submit(function (e) {
    e.preventDefault();

    //////////////////////         //Variáveis tabela Crianca   //////////////////////
    var Nome_Pessoa = $('#Nome_Pessoa').val();
    var Nascimento_pessoa = $('#Nascimento_Pessoa').val();

    var Nacionalidade_pessoa = $('#Nacionalidade_Pessoa').val();
    var País_Cid_pessoa = $('#País_Cid_Pessoa').val();
    var Escolaridade_pessoa = $('#Escolaridade_Pessoa').val();
    var Endereco_Antigo_Pessoa = $('#Endereco_Antigo_Pessoa').val();
    var Endereco_atual_pessoa = $('#Endereco_Atual_Pessoa').val();
    var Telefone_pessoa = $('#Telefone_Pessoa').val();
    var Email_pessoa = $('#e-mail_Pessoa').val();
    var Identidade_pessoa = $('#Identidade_Pessoa').val();
    var Passaporte_pessoa = $('#Passaporte_Pessoa').val();

    var Certidao_pessoa = $('#Certidão').val();
    var Nome_mae_pessoa = $('#Mãe_Pessoa').val();
    var Text_Residencia_Mae_Pessoa = $('#Mãe_Pessoa_Endereco').val();

    var Mae_pessoa = $("input[name='Mãe_Viva']:checked").val();
    var Certidao_pessoa = $("input[name='Certidao_pessoa']:checked").val();
    var Genero_pessoa = $("input[name='gênero_pessoa']:checked").val();

    var Pai_pessoa = $("input[name='Pai_Vivo']:checked").val();
    var Nome_pai = $('#Pai_Pessoa').val();
    var Text_Residencia_Pai_Pessoa = $('#Pai_Pessoa_Endereco').val();

    //////////////////////         //Entrada    //////////////////////
    //         var idEntrada                = $('#idEntrada').val();
    var Cidade_Saida_pessoa = $('#Cidade_Saida_Pessoa').val();
    var Data_Saida_pessoa = $('#Data_Saida_Pessoa').val();
    var Cidade_Chegada_pessoa = $('#Cidade_Chegada_Pessoa').val();
    var Data_Chegada_Pessoa = $('#Data_Chegada_Pessoa').val();

    var Meio_Transporte = $("input[name='Meio_Transporte']:checked").val();

    var Transporte_Detalhado_Pessoa = $('#Transporte_Detalhado_Pessoa').val();
    var Data_Reconhecido_Pessoa = $('#Data_Reconhecido_Pessoa').val();
    var Pais_Reconhecido_Pessoa = $('#Pais_Reconhecido_Pessoa').val();

    if(Meio_Transporte == "Aéreo")
     {
        Meio_Transporte = Meio_Transporte;
     }
     else if(Meio_Transporte == "Terrestre")
     {
        Meio_Transporte = Meio_Transporte;
     }else
     {
        Meio_Transporte = Meio_Transporte;
     }


    //////////////////////         //Variáveis tabela Situacão  //////////////////////
    //         var idSituacao = $('#idSituacao').val();
    var Vida_antes = $('#Vida_antes').val();
    var Razão_Saida = $('#Razão_Saida').val();

    var Situacao_Pessoa_Btn = $("input[name='Situacao_Pessoa']:checked").val();
    var Alguem_Pessoa_Btn = $("input[name='Alguem_Pessoa']:checked").val();
    var Viagem_Pessoa_Btn = $("input[name='Viagem_Pessoa']:checked").val();
    var Entrou_Pessoa_Btn = $("input[name='Entrou_Pessoa']:checked").val();
    var Permancer_Pessoa_Btn = $("input[name='Permancer_Pessoa']:checked").val();
    var Retornar_Pessoa_Btn = $("input[name='Retornar_Pessoa']:checked").val();
    var Medo_Pessoa_Btn = $("input[name='Medo_Pessoa']:checked").val();


    var Situacao_Pessoa = $('#Txt_Situacao_Pessoa').val();

    var Alguem_Pessoa = $('#Txt_Alguem_Pessoa').val();
    var Viagem_Pessoa = $('#Txt_Viagem_Pessoa').val();
    var Entrou_Pessoa = $('#Txt_Entrou_Pessoa').val();
    var Medo_Pessoa = $('#Txt_Medo_Pessoa').val();

    var Permancer_Pessoa = $('#Txt_Permancer_Pessoa').val();
    var Retornar_Pessoa = $('#Txt_Retornar_Pessoa').val();
    var Parentes_Origem_Pessoa = $("input[name='Parentes_Origem_Pessoa']:checked").val();
    var Parentes_Brasil_Pessoa = $("input[name='Parentes_Brasil_Pessoa']:checked").val();
    var Proteção_Indicadores = $("input[name='Proteção_Indicadores']:checked").val();
    var Proteção_Indicadores_Txt = $('#Txt_Protecao_Indicadores').val();
    var Solicitação_Indicadores = $("input[name='Solicitação_Indicadores']:checked").val();

    if(Situacao_Pessoa_Btn == "Não"){
        Situacao_Pessoa = "N/A";
    }
    if(Alguem_Pessoa_Btn == "Não") {
        Alguem_Pessoa = "N/A";
    }
    if(Viagem_Pessoa_Btn == "Não"){
        Viagem_Pessoa = "N/A";
    }
    if(Entrou_Pessoa_Btn == "Sim") {
        Entrou_Pessoa = "N/A";
    }
    if(Retornar_Pessoa_Btn == "Sim"){
        Retornar_Pessoa = "N/A";
    }
    if(Medo_Pessoa_Btn == "Não") {
        Medo_Pessoa = "N/A";
    }
    if(Permancer_Pessoa_Btn == "Sim") {
        Permancer_Pessoa = "N/A";
    }

    if (Proteção_Indicadores == "ProteçãoC") 
    {
        Proteção_Indicadores_Txt = "Retorno à convivência familiar, conforme parâmetros de proteção integral e atenção ao interesse superior da criança;";
    } else if (Proteção_Indicadores == "ProteçãoF") 
    {
        Proteção_Indicadores_Txt = "Medida de proteção por reunião familiar ";
    } else if (Proteção_Indicadores == "ProteçãoT") 
    {
        Proteção_Indicadores_Txt = "Proteção como vítima de tráfico de pessoas;";
    } else {
        Proteção_Indicadores_Txt = Proteção_Indicadores_Txt
    }

    //////////////////////         ////AVALIAÇÃO PRELIMINAR DA CRIANcA OU ADOLESCENTE       //////////////////////

    //         var idSituacao                = $('#idSituacao').val();

    var Mental_Avaliacão = $('#Txt_Mental_Avaliacão').val();
    var Fisico_Avaliacão = $('#Txt_Fisico_Avaliacão').val();
    var Idade_Avaliacão = $('#Txt_Idade_Avaliacão').val();

    //////////////////////         ////Variáveis tabela Medidas_Protetivas      //////////////////////

    //         var idMedidas_Protetivas = $('#idMedidas_Protetivas').val();
    //var ID_Documento_Respo = $('#id_Doc').val();
    var Encaminhada_Protetivas = $("input[name='Encaminhada_Protetivas']:checked").val();

    var Instituicão_Protetivas = $('#Instituicão_Protetivas').val();
    var Endereco_Inst_Protetivas = $('#Endereco_Inst_Protetivas').val();
    var Responsavel_Inst_Protetivas = $('#Responsavel_Inst_Protetivas').val();
    var Vara_Protetivas = $('#Vara_Protetivas').val();


    var Representante_Protetiva = $("input[name='Representante_Protetiva']:checked").val();


    var Responsavel_Protetivas = $('#Responsavel_Protetivas').val();


    var Nome_Documento = $('#Text_Documento_Protetivas').val();
    var Nome_Documento_copia = $('#Text_Copia_Documento_Protetivas').val();

    var Numero_Documento_Protetivas = $('#Numero_Documento_Protetivas').val();


    var Responsavel_Nascimento_Protetivas = $('#Responsavel_Nascimento_Protetivas').val();
    var Responsavel_Nacionalidade_Protetivas = $('#Responsavel_Nacionalidade_Protetivas').val();
    var Responsavel_Endereco_Protetivas = $('#Responsavel_Endereco_Protetivas').val();



    var Vinculo_Protetivas = $("input[name='Vinculo_Protetivas']:checked").val() ??"N/A";
    var Gênero_Protetivas = $("input[name='Gênero_Protetivas']:checked").val() ??"N/A";
    var Descricao = $("input[name='Documento_Protetivas']:checked").val();
    var Responsavel_Parentesco_Protetivas = $('#Responsavel_Parentesco_Protetivas').val();

    if(Representante_Protetiva == 'Não'){
        Responsavel_Nascimento_Protetivas = "0000-00-00";
        //Gênero_Protetivas = "";
        //Vinculo_Protetivas = "";
        Descricao = "NENHUM DOCUMENTO";
    }
    if(Descricao == "NENHUM DOCUMENTO"){
        Numero_Documento_Protetivas = "N/A";
    }

    //////////////////////     //Variáveis tabela Intérprete        //////////////////////

    //         /*var Nome_Interprete         = $('#Nome_Interprete').val();
    var Documento_Interprete = $('#Documento_Interprete').val();
    //         var Endereço_Interprete     = $('#Endereço_Interprete').val();
    //         var email_Interprete        = $('#e-mail_Interprete').val();
    //         var Telefone_Interprete     = $('#Telefone_Interprete').val();*/

    //     //var Telefone_defensor= $('#Telefone_Def').val();

    const data = {

        submit: '',

        ///////////////////     criança     ///////////////////
        Nome_Pessoa: Nome_Pessoa,
        Nascimento_Pessoa: Nascimento_pessoa,

        gênero_pessoa: Genero_pessoa,

        Nacionalidade_Pessoa: Nacionalidade_pessoa,
        País_Cid_Pessoa: País_Cid_pessoa,
        Escolaridade_Pessoa: Escolaridade_pessoa,
        Endereco_Antigo_Pessoa: Endereco_Antigo_Pessoa,
        Endereco_Atual_Pessoa: Endereco_atual_pessoa,
        Telefone_Pessoa: Telefone_pessoa,
        'e-mail_Pessoa': Email_pessoa,
        Identidade_Pessoa: Identidade_pessoa,
        Passaporte_Pessoa: Passaporte_pessoa,
        certidão: Certidao_pessoa,
        
        Mãe_Viva: Mae_pessoa,
        Text_Mae_Viva: Nome_mae_pessoa,
        Text_Residencia_Mae_Pessoa: Text_Residencia_Mae_Pessoa,
        
        Pai_Vivo: Pai_pessoa,
        Pai_Pessoa: Nome_pai,
        Text_Residencia_Pai_Pessoa: Text_Residencia_Pai_Pessoa,
        
        ///////////////////     entrada     ///////////////////

        //idEntrada: idEntrada,
        Cidade_Saida_Pessoa: Cidade_Saida_pessoa,
        Data_Saida_Pessoa: Data_Saida_pessoa,
        Cidade_Chegada_Pessoa: Cidade_Chegada_pessoa,
        Data_Chegada_Pessoa: Data_Chegada_Pessoa,
        Meio_Transporte: Meio_Transporte,
        Transporte_Detalhado_Pessoa: Transporte_Detalhado_Pessoa,
        Data_Reconhecido_Pessoa: Data_Reconhecido_Pessoa,
        Pais_Reconhecido_Pessoa: Pais_Reconhecido_Pessoa,

        ///////////////////     Situação     ///////////////////

        //idSituacao: idSituacao,
        Situacao_Pessoa:Situacao_Pessoa_Btn,
        Alguem_Pessoa:Alguem_Pessoa_Btn,
        Viagem_Pessoa:Viagem_Pessoa_Btn,
        Entrou_Pessoa:Entrou_Pessoa_Btn,
        Permancer_Pessoa:Permancer_Pessoa_Btn,
        Retornar_Pessoa:Retornar_Pessoa_Btn,
        Medo_Pessoa:Medo_Pessoa_Btn,

        Vida_antes: Vida_antes,
        Razão_Saida: Razão_Saida,
        Txt_Situacao_Pessoa: Situacao_Pessoa,
        Txt_Alguem_Pessoa: Alguem_Pessoa,
        Txt_Viagem_Pessoa: Viagem_Pessoa,
        Txt_Entrou_Pessoa: Entrou_Pessoa,
        Txt_Permancer_Pessoa: Permancer_Pessoa,
        Txt_Retornar_Pessoa: Retornar_Pessoa,
        Txt_Medo_Pessoa: Medo_Pessoa,
        Parentes_Brasil_Pessoa: Parentes_Brasil_Pessoa,
        Parentes_Origem_Pessoa: Parentes_Origem_Pessoa,
        Proteção_Indicadores: Proteção_Indicadores,
        Txt_Protecao_Indicadores: Proteção_Indicadores_Txt,
        Solicitação_Indicadores: Solicitação_Indicadores,

        ///////////////////     Medidas Protetivas    ///////////////////

        //idMedidas_Protetivas: idMedidas_Protetivas,
        //id_Doc : ID_Documento_Respo

        Encaminhada_Protetivas:Encaminhada_Protetivas,

        Instituicão_Protetivas: Instituicão_Protetivas,

        Endereco_Inst_Protetivas: Endereco_Inst_Protetivas,
        Responsavel_Inst_Protetivas: Responsavel_Inst_Protetivas,
        Vara_Protetivas: Vara_Protetivas,

        Representante_Protetiva: Representante_Protetiva,

        Responsavel_Protetivas: Responsavel_Protetivas,
        Text_Copia_Documento_Protetivas: Nome_Documento_copia,
        Text_Documento_Protetivas: Nome_Documento,
        Numero_Documento_Protetivas: Numero_Documento_Protetivas,
        Gênero_Protetivas: Gênero_Protetivas,
        Responsavel_Nascimento_Protetivas: Responsavel_Nascimento_Protetivas,
        Responsavel_Nacionalidade_Protetivas: Responsavel_Nacionalidade_Protetivas,
        Responsavel_Endereco_Protetivas: Responsavel_Endereco_Protetivas,
        Responsavel_Parentesco_Protetivas: Responsavel_Parentesco_Protetivas,
        Vinculo_Protetivas: Vinculo_Protetivas,

        Documento_Protetivas:Descricao,

        ///////////////////     Avaliação Preliminar    ///////////////////
        
        //idSituacao : idSituacao,
            Nome_Pessoa : Nome_Pessoa,
            Identidade_Pessoa : Identidade_pessoa,

           Txt_Mental_Avaliacão : Mental_Avaliacão,
           Txt_Fisico_Avaliacão : Fisico_Avaliacão,
           Txt_Idade_Avaliacão : Idade_Avaliacão,

           ///////////////////     Intérprete    ///////////////////

           Documento_Interprete: Documento_Interprete   
    };


    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'Formulario2.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {
            Swal.fire("Confirmado", "Cadastro de Criança Realizado com sucesso", "success").then(() => {
                location.href = "Dados_CRI.php";
            });
        },
        error: function (err) {
            switch (err.status) {
                case 400:
                    Swal.fire('Erro', err.responseJSON.field, 'error');
                    break;
                case 500:
                    Swal.fire("Falha", "Cadastro não realizado", "error");
                    break;
            }
        }
    });

});