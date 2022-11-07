<?php
     $dbhost = 'localhost';
     $dbUsername = 'root';
     $dbPassword = '1234';
     $dbName = 'mydb';
     
     $conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbName);

   /*
     if ($conexao->connect_errno)
     {
     echo "Erro";
     }
     else
     {
      echo "Conexão efetuado com sucesso";
     }
   
     */

?>