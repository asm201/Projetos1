
$('#saveEdit_CRI_Medidas').submit(function (e) {
    e.preventDefault();

    var idSituacao = $('#idSituacao').val();
    var Vida_antes = $('#Vida_antes').val();
    var Razão_Saida = $('#Razão_Saida').val();

    var Situacao_Pessoa = $('#Txt_Situacao_Pessoa').val();

    var Alguem_Pessoa = $('#Txt_Alguem_Pessoa').val();
    var Viagem_Pessoa = $('#Txt_Viagem_Pessoa').val();
    var Entrou_Pessoa = $('#Txt_Entrou_Pessoa').val();
    var Medo_Pessoa = $('#Txt_Medo_Pessoa').val();

    var Permancer_Pessoa = $('#Permancer_Pessoa_Sim').val();
    var Retornar_Pessoa = $('#Retornar_Pessoa_Sim').val();
    var Parentes_Origem_Pessoa = $('#Parentes_Origem_Pessoa_Sim').val();
    var Parentes_Brasil_Pessoa = $('#Parentes_Brasil_Pessoa_Sim').val();
    var Proteção_Indicadores = $("input[name='Proteção_Indicadores']:checked").val();
    var Proteção_Indicadores_Txt = $('#Txt_Proteção_Indicadores').val();
    var Solicitação_Indicadores = $('#Temporaria_Indicadores').val();

    if (Proteção_Indicadores == "ProteçãoC") 
    {
        Proteção_Indicadores = Proteção_Indicadores;
    } else if (Proteção_Indicadores == "ProteçãoF") 
    {
        Proteção_Indicadores = Proteção_Indicadores;
    } else if (Proteção_Indicadores == "ProteçãoT") 
    {
        Proteção_Indicadores = Proteção_Indicadores;
    } else {
        Proteção_Indicadores = Proteção_Indicadores
    }

    const data = {

        update: '',

        idSituacao: idSituacao,
        Vida_antes: Vida_antes,
        Razão_Saida: Razão_Saida,
        Situacao_Pessoa: Situacao_Pessoa,
        Txt_Alguem_Pessoa: Alguem_Pessoa,
        Txt_Viagem_Pessoa: Viagem_Pessoa,
        Txt_Entrou_Pessoa: Entrou_Pessoa,
        Permancer_Pessoa: Permancer_Pessoa,
        Txt_Retornar_Pessoa: Retornar_Pessoa,
        Txt_Medo_Pessoa: Medo_Pessoa,
        Parentes_Brasil_Pessoa: Parentes_Brasil_Pessoa,
        Parentes_Origem_Pessoa: Parentes_Origem_Pessoa,
        Proteção_Indicadores: Proteção_Indicadores,
        Txt_Proteção_Indicadores: Proteção_Indicadores_Txt,
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
            Swal.fire("Confirmado", "Dados de Entrada atualizada", "success").then(() => {
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