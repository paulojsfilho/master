<?php
	$arqImagem=$_GET["imgfile"];
	if(empty($arqImagem)){
?>
		<h1> Erro no script: arquivo não encontrado </h1>
<?php
	}
	else{
	   echo "<figure><img class=\"img-thumbnail\" src=\"$arqImagem\"></figure>";
	}
?> 