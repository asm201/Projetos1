$('#cadastrar_Def').submit(function (e) {
    e.preventDefault();

    var Nome_Defensor = $('#Nome_Defensor').val();
    var Documento_defensor = $('#Documento_Defensor').val();
    var Cargo_Defensor = $('#Cargo_Defensor').val();
    var Endereco_defensor = $('#Endereco_Defensor').val();
    var Cidade_defensor = $('#Cidade_UF_Defensor').val();
    var Telefone_defensor = $('#Telefone_Defensor').val();
    var Email_defensor = $('#e-mail_Defensor').val();
    var Senha_Automatica = $('#Senha_Defensor').val();



    const data = {
            submit1: '',
            Nome_Defensor: Nome_Defensor,
            Documento_Defensor: Documento_defensor,
            txt_Cargo_Defensor: Cargo_Defensor,
            Endereco_Defensor: Endereco_defensor,
            Cidade_UF_Defensor: Cidade_defensor,
            Telefone_Defensor: Telefone_defensor,
            'e-mail_Defensor': Email_defensor,
            Senha_Defensor: Senha_Automatica
    };
    console.log(

        data

    );
    //return;           
    $.ajax({
        url: 'cadastrar_Def.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Cadastro Defensor Realizado com Sucesso", "success").then(() => {
                location.href = "login.php";
            });
        },
        error: function (err) {
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

$('#cadastrar_Int').submit(function (e) {
    e.preventDefault();

    var Nome_Interprete = $('#Nome_Interprete').val();
    var Documento_Interprete = $('#Documento_Interprete').val();
    var Endereço_Interprete = $('#Endereço_Interprete').val();
    var email_Interprete = $('#e-mail_Interprete').val();
    var Telefone_Interprete = $('#Telefone_Interprete').val();
    //var Telefone_defensor= $('#Telefone_Def').val();


    const data = {
        
        submit: '',
        
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
        url: 'cadastrar_Def.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Cadastro Interprete Realizado com Sucesso", "success").then(() => {
                location.href = "login.php";
            });
        },
        error: function (err) {
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

