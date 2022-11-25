
$('#saveEdit_CRI_Protetivas').submit(function (e) {
    e.preventDefault();

    var idMedidas_Protetivas = $('#idMedidas_Protetivas').val();

    var Instituicão_Protetivas = $('#Instituicão_Protetivas').val();
    var Endereco_Inst_Protetivas = $('#Endereco_Inst_Protetivas').val();
    var Responsavel_Inst_Protetivas = $('#Responsavel_Inst_Protetivas').val();
    var Vara_Protetivas = $('#Vara_Protetivas').val();

    var Responsavel_Protetivas = $('#Responsavel_Protetivas').val();

    var Documento_Protetivas_Txt = $('#Text_Documento_Protetivas').val();
    var Numero_Documento_Protetivas = $('#Numero_Documento_Protetivas').val();


    var Responsavel_Nascimento_Protetivas = $('#Responsavel_Nascimento_Protetivas').val();
    var Responsavel_Nacionalidade_Protetivas = $('#Responsavel_Nacionalidade_Protetivas').val();
    var Responsavel_Endereco_Protetivas = $('#Responsavel_Endereco_Protetivas').val();

    var Documento_Respo = $('#Documento_Respo').val();


    var Vinculo_Protetivas = $("input[name='Vinculo_Protetivas']:checked").val();
    var Gênero_Protetivas = $("input[name='Gênero_Protetivas']:checked").val();
    var Documento_Protetivas = $("input[name='Documento_Protetivas']:checked").val();
    var Responsavel_Parentesco_Protetivas = $('#Responsavel_Parentesco_Protetivas').val();

    

    const data = {

        update: '',

        idMedidas_Protetivas: idMedidas_Protetivas,
        Instituicão_Protetivas: Instituicão_Protetivas,

        Endereco_Inst_Protetivas: Endereco_Inst_Protetivas,
        Responsavel_Inst_Protetivas: Responsavel_Inst_Protetivas,
        Vara_Protetivas: Vara_Protetivas,
        Responsavel_Protetivas: Responsavel_Protetivas,
        Documento_Protetivas: Documento_Protetivas,
        Text_Documento_Protetivas: Documento_Protetivas_Txt,
        Numero_Documento_Protetivas: Numero_Documento_Protetivas,
        Gênero_Protetivas: Gênero_Protetivas,
        Responsavel_Nascimento_Protetivas: Responsavel_Nascimento_Protetivas,
        Responsavel_Nascimento_Protetivas: Responsavel_Nacionalidade_Protetivas,
        Responsavel_Endereco_Protetivas: Responsavel_Endereco_Protetivas,
        Responsavel_Parentesco_Protetivas: Responsavel_Parentesco_Protetivas,
        Vinculo_Protetivas: Vinculo_Protetivas,

        Documento_Protetivas : Documento_Protetivas,
        Documento_Respo : Documento_Respo



    };


    console.log(

        data

    );
    //return;

    $.ajax({
        url: 'saveEdit_CRI_Protetivas.php',
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