<?php
if(isset($_COOKIE["login"])){ 
     include("./perfil.php"); 
     die();
   }else{
	include("./entrar.php"); 
   }
?>
