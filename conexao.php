<?php
 $connect = mysqli_connect("Database=paulojosedb;Data Source=br-cdbr-azure-south-a.cloudapp.net;User Id=b52f673b9e8d7a;Password=82b32b8c");
        if(mysqli_connect_errno()) {
          echo "<h1>Falha na conexão.  Entre em contato com o Administrador!</h1>";
           echo mysqli_connect_error();
          die();
     }

?>	   