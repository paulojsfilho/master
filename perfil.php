<?php
include("topo.html");
if(isset($_COOKIE["login"])){
session_start();
echo"<div class=\"row\">";
include("conexao.php");
$login2 = $_COOKIE["login"];
$consulta = ("select participantes.arquivoFoto,participantes.login, participantes.nomeCompleto,participantes.email,participantes.descricao,participantes.cidade,cidades.idCidade,cidades.nomeCidade from participantes inner join cidades on participantes.cidade = cidades.idCidade where participantes.login = '$login2' order by participantes.login");
$query = mysqli_multi_query($connect, $consulta);
if ($resultado = mysqli_use_result($connect)) {
		while ($dados = mysqli_fetch_array($resultado)) {
		echo "<div class=\"col-sm-6 col-md-12\">";		
		echo "<div class=\"thumbnail\">";
		echo "<img data-src=\"holder.js/240x320\" src=\"./imagens/".$dados["arquivoFoto"]."\" alt=\"".$dados["nomeCompleto"]."\">";		
		echo "<div class=\"caption\">";
		echo "<h5> E-mail: ".$dados["email"]."<br />Nome: ".$dados["nomeCompleto"]."<br />Descrição: ".$dados["descricao"]."<br />Cidade: ".$dados["nomeCidade"]."</h5><br /></p><br />";
		echo "</div>";					
		echo "<a href=\"javascript:window.history.go(-1)\" class=\"btn btn-primary\" role=\"button\"><span class=\"glyphicon glyphicon-arrow-left\"></span> Voltar </a> ";
		echo "<a href=\"finalizar.php\" name=\"sair\" class=\"btn btn-primary\" role=\"button\">Sair <span class=\"glyphicon glyphicon-remove\"></span></a>";		
echo"</div>";
echo"</div>";


		
			
		
//		echo " <img class=\"imagem\" src=\"./uploads/".$dados["login"]."/".$dados["arquivoFoto"]."\" alt=\"".$dados["nomeCompleto"]."\"><br />" ;
		//echo "<p class=\"descricao\"> E-mail: ".$dados["email"]."<br />Nome: ".$dados["nomeCompleto"]."<br />Descrição: ".$dados["descricao"]."<br />Cidade: ".$dados["nomeCidade"]."<br /></p><br /><br />";

//echo"<div class=\"posicao\">";
//echo"<a href=\"altera_cadastro.php?login=".$dados["login"]."\"><button  class=\"botao\" value=\"alterar_cadastro\" id=\"alterar_cadastro\" name=\"alterar_cadastro\">Alterar</button></a>";		
//echo"<a href=\"javascript:window.history.go(-1)\"><button  class=\"botao\" value=\"voltar\" id=\"voltar\" name=\"voltar\">Voltar</button></a>";				
//echo"<a href=\"finalizar.php\"><button  class=\"botao\" value=\"sair\" id=\"sair\" name=\"sair\">Sair</button></a>";	
//echo"</div>";
 }
}
}else{
	  mysqli_close($connect);
	  header("Location: index.php");
		}
		?>
<?php
  include("pesquisa.php");
  include("thumb.php");
  include("rodape.html");
 ?>
