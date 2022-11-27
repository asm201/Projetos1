<?php
      /* Heroku remote server */
     $dbhost = 'localhost';
     $dbUsername = 'root';
     $dbPassword = '1234';
     $dbName = 'mydb';
      //mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexao);
      //$re = mysql_query('SHOW VARIABLES LIKE "%character_set%";')or die(mysql_error());
      //while ($r = mysql_fetch_assoc($re)) {var_dump ($r); echo "<br />";} exit;
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