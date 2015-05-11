<div class="row">
<div class="col-md-12">
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

			echo "<div class=\"col-sm-6 col-md-3\">";
			echo "<div class=\"thumbnail\">";
			echo "<img data-src=\"holder.js/240x320\" src=\"./imagens/".$dados["arquivoFoto"]."\" alt=\"".$dados["nomeCompleto"]."\">";
			echo "<div class=\"caption\">";
			echo "<h5>" .$dados["nomeCompleto"]."</h5>";
			echo "</div>";			
			echo "<p><a href=\"perfil_participantes.php?login2=".$dados["login"]."\" class=\"btn btn-primary\" role=\"button\">Visualizar Perfil <span class=\"glyphicon glyphicon-ok\"></span></a></p>";
			echo "</div>";
			echo "</div>";	
			}
		}
?>

</div>
</div>


