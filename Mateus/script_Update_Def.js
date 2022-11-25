$('#saveEdit').submit(function (e) {

    e.preventDefault();

    var idDefensor                = $('#idDefensor').val();
    var Nome_Defensor = $('#Nome_Defensor').val();
    var Documento_defensor = $('#Documento_Defensor').val();
    var Cargo_Defensor = $('#Cargo_Defensor').val();
    var Endereco_defensor = $('#Endereco_Defensor').val();
    var Cidade_defensor = $('#Cidade_UF_Defensor').val();
    var Telefone_defensor = $('#Telefone_Defensor').val();
    var Email_defensor = $('#e-mail_Defensor').val();


    const data = {
            update: '',
            idDefensor: idDefensor,
            Nome_Defensor: Nome_Defensor,
            Documento_Defensor: Documento_defensor,
            txt_Cargo_Defensor: Cargo_Defensor,
            Endereco_Defensor: Endereco_defensor,
            Cidade_UF_Defensor: Cidade_defensor,
            Telefone_Defensor: Telefone_defensor,
            'e-mail_Defensor': Email_defensor,
    };
    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'saveEdit.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Dados do Defensor atualizado", "success").then(() => {
                location.href = "Dados.php";
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