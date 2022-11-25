$('#saveEdit_INT').submit(function (e) {

    e.preventDefault();

    var Nome_Interprete = $('#Nome_Interprete').val();
    var Documento_Interprete = $('#Documento_Interprete').val();
    var Endereço_Interprete = $('#Endereço_Interprete').val();
    var email_Interprete = $('#e-mail_Interprete').val();
    var Telefone_Interprete = $('#Telefone_Interprete').val();
    //var Telefone_defensor= $('#Telefone_Def').val();


    const data = {
        
        update: '',
        
        Nome_Interprete: Nome_Interprete,
        Documento_Interprete: Documento_Interprete,
        Endereço_Interprete: Endereço_Interprete,
        'e-mail_Interprete': email_Interprete,
        Telefone_Interprete: Telefone_Interprete,
    };
    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'saveEdit_INT.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Dados do Interprete atualizado", "success").then(() => {
                location.href = "Dados_INT.php";
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