<?php
	session_start();
    $login = $_POST['login'];
    $entrar = $_POST['entrar'];
    $senha = ($_POST['senha']);
require("conexao.php");
        if (isset($entrar)) {
             $verifica = "SELECT * FROM participantes WHERE login = '$login' AND senha = '$senha'";
if ($result = mysqli_query ($connect,$verifica)) {
$row = mysqli_fetch_array ( $result );
mysqli_free_result ( $result );
}	
$loginarray = $row['login'];
$senhaarray = $row['senha'];		 
            if($loginarray == $login && $senhaarray ==$senha){
									mysqli_close($connect);

				 header("Location: perfil.php");
				 setcookie("login",$login); 
				 
	foreach($_POST as $chave=>$valor){  //captura todas as variáveis do formulário para o vetor de sessão
		$_SESSION[$chave] = $valor;
	}				 
	 $_SESSION["logged"]=true;
				 
            die();
            }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
                    die();
                }
               }

?>
