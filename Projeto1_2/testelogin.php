<?php
    session_start();
    
       // print_r($_REQUEST);
       // error_reporting (0);
    if(isset($_POST['submit']) && !empty($_POST['e-mail_Defensor']) && !empty($_POST['Telefone_Def']) ){ // acessa o sistema 

        include_once('config.php');

        $Email_defensor = $_POST['e-mail_Defensor'];
        $Telefone_Def = $_POST['Telefone_Def'];

     //   print_r('<br>');
     //   print_r('Email: ' . $Email_defensor);
     //   print_r('<br>');
     //   print_r('Senha: ' . $Telefone_Def); 

       $sql = "SELECT * FROM defensor WHERE  Contato_Def = '$Email_defensor' and Telefone_Def = '$Telefone_Def'";//<!-- trocar telefone_def por Senha_Def-->

       $result = $conexao->query($sql);
       
     // print_r('<br>');
     // print_r($result);
     // print_r('<br>');

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['e-mail_Defensor']);
            unset($_SESSION['Telefone_Def']);
            header('Location: Home.php');


            //print_r('Defensor não aceito');
        } else{

            $_SESSION['e-mail_Defensor'] = $Email_defensor;

            header('Location: login.php');

            //print_r('<br>');
            //print_r('Login e senha Correto');
        }

       
    } else{
        //header('Location: Home.php'); // retorna para a home
        echo  '<script>alert("Login ou senha incorreto");location.href="Home.php"</script>';
    
    }
?>