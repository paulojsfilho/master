<div class="perfil">
<?php
	   include("conexao.php");
       $consulta = "select * from participantes";
       $query = mysqli_multi_query($connect, $consulta);
       if(!$query){
          echo "\n <h1>Nenhum Participante encontrado!</h1>\n";
           echo mysqli_error($connect);
           die();
       }
		if ($resultado = mysqli_use_result($connect)) {
            while ($dados=mysqli_fetch_array($resultado)) {
				echo "<div>";
				echo "<a href=\"perfil_participantes.php?login2=".$dados["login"]."\">";
				echo " <div class=\"caixa\"><img class=\"imagem\" src=\"./uploads/".$dados["login"]."/".$dados["arquivoFoto"]."\" alt=\"".$dados["nomeCompleto"]."\"><br />" ;
				echo "<p class=\"texto\">".$dados["nomeCompleto"]."</p></div></a>";
				echo "</div>";
			}
		}
?>
</div>