
$('#saveEdit_CRI').submit(function (e) {

    e.preventDefault();

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
    var Nome_pai_pessoa = $('#Pai_Pessoa').val();
    var Text_Residencia_Pai_Pessoa = $('#Pai_Pessoa_Endereco').val();

    //var qualquer merda = id do campo no html

        

    const data = {

        update: '',

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
        Pai_Pessoa: Nome_pai_pessoa,
        Text_Residencia_Pai_Pessoa: Text_Residencia_Pai_Pessoa
        //mesmo nome $_POST do PHP : da variável do var

    };


    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'saveEdit_CRI.php',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function () {
            Swal.fire("Confirmado", "Dados da Criança atualizada", "success").then(() => {
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