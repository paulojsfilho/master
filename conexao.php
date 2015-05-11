<?php
 $connect = mysqli_connect("br-cdbr-azure-south-a.cloudapp.net", "paulojosedb", "82b32b8c", "b52f673b9e8d7a");
       if(mysqli_connect_errno()) {
          echo "<h1>Falha na conexão.  Entre em contato com o Administrador!</h1>";
           echo mysqli_connect_error();
          die();
     }

?>	   