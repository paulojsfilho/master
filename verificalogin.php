<?php
   if (isset($_COOKIE["login"])){
		$login=$_COOKIE["login"];
		$hora = date("H");
		if($hora>18 && $hora<=23) {
		echo "<p>Boa noite, $login. Seja Bem Vindo.</p>\n<br /> ";
		}else if($hora>=0 && $hora <=11){
			echo "<p>Bom dia, $login. Seja Bem Vindo.</p>\n<br />";
		}else if($hora>=12 && $hora <18){
			echo "<p>Boa tarde, $login Seja Bem Vindo.</p>\n<br />";
		}
   }
  ?>



