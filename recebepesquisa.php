<?php
include("topo.html");
$_existepesquisa=0;
if(isset($_POST["pesquisa"])){
session_start();
include("conexao.php");
$texto_pesquisa = $_REQUEST["pesquisa"];
$consulta = ("select participantes.arquivoFoto,participantes.login, participantes.nomeCompleto,participantes.email,participantes.descricao,participantes.cidade,cidades.idCidade,cidades.nomeCidade from participantes inner join cidades on participantes.cidade = cidades.idCidade where participantes.nomeCompleto LIKE '%".$texto_pesquisa."%' ");
$query = mysqli_multi_query($connect, $consulta);

if ($resultado = mysqli_use_result($connect)) {
		while ($dados = mysqli_fetch_array($resultado)) {
		echo " <img class=\"imagem\" src=\"./uploads/".$dados["login"]."/".$dados["arquivoFoto"]."\" alt=\"".$dados["nomeCompleto"]."\"><br />" ;
		echo "<p class=\"descricao\"> E-mail: ".$dados["email"]."<br />Nome: ".$dados["nomeCompleto"]."<br />Descrição: ".$dados["descricao"]."<br />Cidade: ".$dados["nomeCidade"]."<br /></p>";
echo"<div class=\"posicao\">";
echo"<a href=\"javascript:window.history.go(-1)\"><button  class=\"botao\" value=\"voltar\" id=\"voltar\" name=\"voltar\">Voltar</button></a>";				
echo"<a href=\"finalizar.php\"><button  class=\"botao\" value=\"sair\" id=\"sair\" name=\"sair\">Sair</button></a>";	
echo"</div>";
		$_existepesquisa = 1;
 }
}

 if ($_existepesquisa == NULL || $_existepesquisa == "" ) {
	   echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro foi localizado!');window.location.href='index.php';</script>";
	   echo"<script language='javascript'> window.setTimeout('history.go(-1)', 3000);</script>";
 }
}else{
	  header("Location: index.php");
	 }
		?>
<?php
  include("rodape.html");
 ?>
