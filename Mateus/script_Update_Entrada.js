
$('#saveEdit_CRI_Entrada').submit(function (e) {
    e.preventDefault();


    var idEntrada                = $('#idEntrada').val();
    var Cidade_Saida_pessoa      = $('#Cidade_Saida_Pessoa').val();
    var Data_Saida_pessoa       = $('#Data_Saida_Pessoa').val();
    var Cidade_Chegada_pessoa   = $('#Cidade_Chegada_Pessoa').val();
    var Data_Chegada_Pessoa     = $('#Data_Chegada_Pessoa').val();

    var Meio_Transporte         = $("input[name='Meio_Transporte']:checked").val();

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

    const data={

        update: '',
        idEntrada: idEntrada,
        Cidade_Saida_Pessoa: Cidade_Saida_pessoa,
        Data_Saida_Pessoa: Data_Saida_pessoa,
        Cidade_Chegada_Pessoa: Cidade_Chegada_pessoa,
        Data_Chegada_Pessoa: Data_Chegada_Pessoa,
        Meio_Transporte: Meio_Transporte,
        Transporte_Detalhado_Pessoa: Transporte_Detalhado_Pessoa,
        Data_Reconhecido_Pessoa: Data_Reconhecido_Pessoa,
        Pais_Reconhecido_Pessoa: Pais_Reconhecido_Pessoa


    };


     console.log(

      data

        );
        // return;

    $.ajax({
        url: 'saveEdit_CRI_Entrada.php',
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