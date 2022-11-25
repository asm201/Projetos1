
$('#saveEdit_CRI_Situacao').submit(function (e) {
    e.preventDefault();

    var idSituacao = $('#idSituacao').val();
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

    const data = {

        update: '',

        Situacao_Pessoa:Situacao_Pessoa_Btn,
        Alguem_Pessoa:Alguem_Pessoa_Btn,
        Viagem_Pessoa:Viagem_Pessoa_Btn,
        Entrou_Pessoa:Entrou_Pessoa_Btn,
        Permancer_Pessoa:Permancer_Pessoa_Btn,
        Retornar_Pessoa:Retornar_Pessoa_Btn,
        Medo_Pessoa:Medo_Pessoa_Btn,

        idSituacao: idSituacao,
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
        Solicitação_Indicadores: Solicitação_Indicadores


    };


    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'saveEdit_CRI_Situacao.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Dados de Situação atualizada", "success").then(() => {
                location.href = "Dados_CRI.php";
            });
        },
        error: function (err) {
            switch (err.status) {
                case 400:
                    Swal.fire('Erro', err.responseJSON.field, 'error');
                    break;
                case 500:
                    Swal.fire("Falha", "Atualização não realizado", "error");
                    break;
            }
        }
    });

});