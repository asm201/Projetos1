<?php
      /* Heroku remote server */
     //$dbhost = 'localhost';
     //$dbUsername = 'root';
     //$dbPassword = '1234';
     //$dbName = 'mydb';
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      $cleardb_server = $cleardb_url["host"];
      $cleardb_username = $cleardb_url["user"];
      $cleardb_password = $cleardb_url["pass"];
      $cleardb_db = substr($cleardb_url["path"],1);
      $active_group = 'default';
      $query_builder = TRUE;
      $conexao = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

      //mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexao);
      //$re = mysql_query('SHOW VARIABLES LIKE "%character_set%";')or die(mysql_error());
      //while ($r = mysql_fetch_assoc($re)) {var_dump ($r); echo "<br />";} exit;
     //$conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbName);

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