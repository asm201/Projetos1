
$('#login').submit(function(e){
    e.preventDefault();

    var Email_defensor = $('#Email_defensor').val();
    var Telefone_defensor= $('#Telefone_Def').val();

    console.log(Email_defensor,Telefone_defensor);
    $.ajax({
        url:'testelogin.php',
        method: 'POST',
        data: {submit: '', 'e-mail_Defensor': Email_defensor, Telefone_Def:Telefone_defensor},
        dataType: 'json',
        success: function(){
            Swal.fire("Logado", "Login Realizado com Sucesso", "success").then(() => {
                location.href="login.php";
            });
        },
        error: function(err) {
            switch (err.status) {
                case 400:
                    Swal.fire("Erro", "Campos não preenchidos", "error");
                    break;
                case 401:
                    Swal.fire("Cuidado", "Campos preenchidos incorretamente", "warning");
                    break;
            }
        }
    });

});