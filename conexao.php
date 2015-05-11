<?php
 $connect = mysqli_connect("mysql05.hstbr.net", "daw", "daw2014", "daw_yearbook");
       if(mysqli_connect_errno()) {
          echo "<h1>Falha na conexão.  Entre em contato com o Administrador!</h1>";
           echo mysqli_connect_error();
          die();
     }

?>	   