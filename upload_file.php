<?php

$permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  //strings de tipos e extensoes validas
$temp = explode(".", basename($_FILES["filename"]["name"]));
$extensao = end($temp);

if ((in_array($extensao, $permissoes))
&& (in_array($_FILES["filename"]["type"], $permissoes))
&& ($_FILES["filename"]["size"] < $_POST["MAX_FILE_SIZE"]))
  {
  if ($_FILES["filename"]["error"] > 0)
    {
    echo "<h1>Erro no envio, código: " . $_FILES["filename"]["error"] . "</h1>";
    }
  else
    {
	  $dirUploads = "uploads/";
      $nomeUsuario = $_POST["login"]."/";	  
	  
	  if(!file_exists ( $dirUploads ))
			mkdir($dirUploads, 0500);  
	  
	  $caminhoUpload = $dirUploads.$nomeUsuario;
	  if(!file_exists ( $caminhoUpload ))
			mkdir($caminhoUpload, 0700);  
			
	  $pathCompleto = $caminhoUpload.basename($_FILES["filename"]["name"]);
      if(move_uploaded_file($_FILES["filename"]["tmp_name"], $pathCompleto))
//		echo "<h1>Armazenado em: <a href=\"./imagem.php?imgfile=" . htmlspecialchars($pathCompleto)."\"> $pathCompleto </a></h1>";
echo"Arquivo enviado com Sucesso!" ;
      else
		echo "<h1>Problemas ao armazenar o arquivo. Tente novamente.<h1>";
    }
  }
else
  {
  echo "<h1><h1>";
  }
?> 