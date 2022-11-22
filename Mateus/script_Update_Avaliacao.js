
$('#saveEdit_CRI_Avaliacao').submit(function(e){
    e.preventDefault();   

    var idSituacao                = $('#idSituacao').val();
    var Nome_Pessoa               = $('#Nome_Pessoa').val();
    var Identidade_pessoa         = $('#Identidade_Pessoa').val();
    
    var Mental_Avaliacão    = $('#Txt_Mental_Avaliacão').val();
    var Fisico_Avaliacão    = $('#Txt_Fisico_Avaliacão').val();
    var Idade_Avaliacão    = $('#Txt_Idade_Avaliacão').val();

    //var Mental_Avaliacão    = $("input[name='Txt_Mental_Avaliacão']").val();
    //var Fisico_Avaliacão    = $("input[name='Txt_Fisico_Avaliacão']").val();
    //var Idade_Avaliacão     = $("input[name='Txt_Idade_Avaliacão']").val();
    //var Txt_Idade_Avaliacão       = $('#Txt_Idade_Avaliacão').val();

    /*console.log(Mental_Avaliacão,
        Fisico_Avaliacão,
        Idade_Avaliacão
        );
    return;*/

   /* if(Mental_Avaliacão == "N/A")
    {
        Mental_Avaliacão = Mental_Avaliacão;
    }
    else
    {
        Mental_Avaliacão = Mental_Avaliacão;
    }

    if(Fisico_Avaliacão == "N/A")
    {
        Fisico_Avaliacão = Fisico_Avaliacão;
    }
    else
    {
        Fisico_Avaliacão = Fisico_Avaliacão;
    }

    if(Idade_Avaliacão == "N/A")
    {
        Idade_Avaliacão = Idade_Avaliacão;
    }
    else
    {
        Idade_Avaliacão = Idade_Avaliacão;
    }*/

    console.log(

        idSituacao,
        Nome_Pessoa,
        Identidade_pessoa,

        Mental_Avaliacão,
        Fisico_Avaliacão,
        Idade_Avaliacão
        );

    $.ajax({
        url:'saveEdit_CRI_Avaliacao.php',
        method: 'POST',
        data: { 

            update: '', 
            idSituacao : idSituacao,
            Nome_Pessoa : Nome_Pessoa,
            Identidade_Pessoa : Identidade_pessoa,

            // AVALIAÇÃO
           //Mental_Avaliacão : Mental_Avaliacão,
           Txt_Mental_Avaliacão : Mental_Avaliacão,
           //Fisico_Avaliacão : Fisico_Avaliacão,
           Txt_Fisico_Avaliacão : Fisico_Avaliacão,
           //Idade_Avaliacão : Idade_Avaliacão,
           Txt_Idade_Avaliacão : Idade_Avaliacão
        },
        dataType: 'json',
        success: function(){
            Swal.fire("Confirmado", "Atualização de avaliação atualizada", "success").then(() => {
                location.href="Dados_CRI.php";
            });
        },
        error: function(err) {
            switch (err.status) {
                case 400:
                    Swal.fire('Erro', err.responseJSON.field, 'error');
                    break;
                case 500:
                    Swal.fire("Falha", "Campos preenchidos incorretamente", "error");
                    break;
            }
        }
    });

});