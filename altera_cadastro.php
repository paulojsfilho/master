<?php
include("topo.html");

session_start();
include("conexao.php");
$login = $_REQUEST['login'];
$consulta = ("select participantes.arquivoFoto,participantes.login, participantes.senha, participantes.nomeCompleto,participantes.email,participantes.descricao,participantes.cidade,cidades.idCidade, cidades.idEstado,cidades.nomeCidade from participantes inner join cidades on participantes.cidade = cidades.idCidade where participantes.login = '$login' order by participantes.login");
$query = mysqli_multi_query($connect, $consulta);
if ($resultado = mysqli_use_result($connect)) {
while ($dados1 = mysqli_fetch_array($resultado)) {
	$login = $dados1["login"];
	$nome = $dados1["nomeCompleto"];
	$foto = $dados1["arquivoFoto"];
	$email = $dados1["email"];
	$descricao = $dados1["descricao"];
	$cidade = $dados1["idCidade"];
	$nomecidade = $dados1["nomeCidade"];
	$estado = $dados1["idEstado"];
	$senha = $dados1["senha"];
	$confirmasenha = $dados1["senha"];
 }
}
else{
	  header("Location: perfil.php");
		}

?>
<form method="POST" action="valida_alteracao.php" enctype="multipart/form-data" >
<h2>Cadastre-se</h2>
<input type="hidden" name="MAX_FILE_SIZE" value="30000">
<label for="login">Login:</label><input type="text" value=<?php echo"$login"?> name="login" id="login" placeholder="Login" required="" class="form-control-cadastro">
<label>Senha:</label><input type="password" name="senha" value=<?php echo"$senha"?> id="senha" placeholder="Senha" required="" class="form-control-cadastro">
<label>Confirmação de Senha:</label><input type="password" name="confirma" value=<?php echo"$senha"?> id="confirma" placeholder="Confirme sua Senha" required="" class="form-control-cadastro">
<label>Nome:</label><input type="text" name="nome" id="nome" value=<?php echo"$nome"?> class="form-control-cadastro" placeholder="Nome Completo" required="">
<label>E-mail:</label><input type="text" name="email" id="email" value=<?php echo"$email"?> class="form-control-cadastro" placeholder="E-mail" required="">
<div><br />
<img src="<?php echo"./uploads/$login/$foto"?>" width="60px" height="60px"/><br />
<label>Foto</label><input type="file" name="filename" value="<?php echo"$foto"?> id="filename" >
</div>
   Escolha um estado: <select name="estado"  id="estado" onchange="buscar_cidades()">
   <option value=<?php echo"$estado"?>></option>
    <?php 

       $consulta = "select * from estados";
       $query = mysqli_multi_query($connect, $consulta);	
       if(!$query){
          echo mysqli_error($connect);
          die();
      }
		if ($resultado = mysqli_use_result($connect)) {
            while ($dados=mysqli_fetch_array($resultado)) {
				echo "<option ";
				if ($estado == $dados["idEstado"]) echo "selected ";
				echo "value=\"".$dados["idEstado"]."\">".$dados["sigaEstado"];
				echo "</option>\n";
			}
		}
      ?>
      </select>
      <br />
	        <div id="load_cidades">
        <label>Cidades:</label>
        <select name="cidade" id="cidade">
          <option value="<?php echo"$cidade"?>"><?php echo"$nomecidade"?></option>
        </select>
			</div>
			
<label>Descrição:</label><textarea class="form-control-cadastro"  name="descricao" id="descricao"> <?php echo"$descricao"?></textarea> 

<button  class="botao" type="submit" value="Alterar" id="alterar" name="alterar">Alterar</button>
<button  class="botao" type="submit" value="excluir" id="excluir" name="excluir">Excluir</button>
<a href="javascript:window.history.go(-1)"><button  class="botao" value="voltar" id="voltar" name="voltar">Voltar</button></a>

</form>
<?php
       include("rodape.html");
	   	  mysqli_close($connect);		
?>
