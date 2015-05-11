<?php
if(isset($_POST["alterar"])){
require("conexao.php");
$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$confirma = $_POST['confirma'];
$email = $_POST['email'];
$foto = $_FILES["filename"]["name"];
$descricao = $_POST['descricao'];
$cidade = $_POST['cidade'];

$logarray = $_POST['login'];
			  if ($senha =="" || $senha == null){
			  echo"<script language='javascript' type='text/javascript'>alert('O campo senha deve ser preenchido');window.location.href='perfil.php';</script>";
			  die();
        }
			  if ($confirma != $senha){
			  echo"<script language='javascript' type='text/javascript'>alert('As senhas não coincidem.');window.location.href='perfil.php';</script>";
			  die();
        }

     if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='perfil.php';</script>";
         }else{
				require("upload_file.php");
				if ($foto==''){				
                $query = "UPDATE participantes SET senha = '$senha',nomecompleto = '$nome',email = '$email', descricao = '$descricao', cidade = '$cidade' where login LIKE '$login'";
				}else{
                $query = "UPDATE participantes SET senha = '$senha',nomecompleto = '$nome',email = '$email', descricao = '$descricao', arquivoFoto = '$foto', cidade = '$cidade' where login LIKE '$login'";				
				}
                $altera = mysqli_query($connect, $query);
                if($altera){
                    echo"<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='index.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível efetuar alteração.  Tente mais tarde.');window.location.href='perfil.php'</script>";
                }
            }
}
			
if(isset($_POST["excluir"])){
session_start();
include("conexao.php");
$login = $_POST['login'];
$consulta = ("delete from participantes where login LIKE '$login'");
$query = mysqli_multi_query($connect, $consulta);
if ($resultado = mysqli_use_result($connect)) {
			  echo"<script language='javascript' type='text/javascript'>alert('Registro excluído com sucesso!');window.location.href='entrar.php';</script>";
			  die();
}else{
	   echo"<script language='javascript' type='text/javascript'>alert('Falha na exclusão!');window.location.href='index.php';</script>";
			  die();
		}
}			
if(isset($_POST["voltar"])){
		echo"<script language='javascript'> window.setTimeout('history.go(-2)', 10);</script>";
		}			
?>
