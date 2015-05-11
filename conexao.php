<?php
 $connect = mysqli_connect("br-cdbr-azure-south-a.cloudapp.net", "b52f673b9e8d7a", "82b32b8c", "paulojosedb");
       if(mysqli_connect_errno()) {
          echo "<h1>Falha na conexão.  Entre em contato com o Administrador!</h1>";
           echo mysqli_connect_error();
          die();
     }

?>	   