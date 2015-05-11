<?php
if(isset($_POST["voltar"])){
		echo"<script language='javascript'> window.setTimeout('history.go(-1)', 10);</script>";
		}	
require("conexao.php");
$login = $_POST['login'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$confirma = $_POST['confirma'];
$email = $_POST['email'];
$foto = $_FILES["filename"]["name"];
$descricao = $_POST['descricao'];
$cidade = $_POST['cidade'];
$query = "SELECT login FROM participantes WHERE login = '$login'";
if ($result = mysqli_query ($connect,$query)) {
$row = mysqli_fetch_array ( $result );
mysqli_free_result ( $result );
}
$logarray = $row['login'];
			  if ($senha =="" || $senha == null){
			  echo"<script language='javascript' type='text/javascript'>alert('O campo senha deve ser preenchido');window.location.href='cadastro.php';</script>";
			  die();
        }
			  if ($confirma != $senha){
			  echo"<script language='javascript' type='text/javascript'>alert('As senhas não coincidem.');window.location.href='cadastro.php';</script>";
			  die();
        }

     if($login == "" || $login == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.php';</script>";
         }else{
            if($logarray == $login){
                 echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
                die();
             }else
			{
				require("upload_file.php");
                $query = "INSERT INTO participantes (login,senha,nomecompleto,email,descricao,arquivoFoto,cidade) VALUES ('$login','$senha','$nome','$email','$descricao','$foto','$cidade' )";
                $insert = mysqli_query($connect, $query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso. Faça agora o seu Login!');window.location.href='entrar.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
                }
            }
        }
?>
