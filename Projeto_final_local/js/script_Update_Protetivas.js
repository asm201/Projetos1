
$('#saveEdit_CRI_Protetivas').submit(function (e) {
    e.preventDefault();

    var idMedidas_Protetivas = $('#idMedidas_Protetivas').val();

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

    var ID_Documento_Respo = $('#id_Doc').val();


    var Vinculo_Protetivas = $("input[name='Vinculo_Protetivas']:checked").val();
    var Gênero_Protetivas = $("input[name='Gênero_Protetivas']:checked").val();
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

    const data = {

        update: '',

        idMedidas_Protetivas: idMedidas_Protetivas,

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
        id_Doc : ID_Documento_Respo



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