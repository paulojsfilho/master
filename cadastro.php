<?php
include("topo.html");
?>
<form method="POST" action="validacadastro.php" enctype="multipart/form-data" >
<h2>Cadastre-se</h2>
<input type="hidden" name="MAX_FILE_SIZE" value="30000">
<label for="login">Login:</label><input type="text" name="login" id="login" placeholder="Login" required="" class="form-control-cadastro">
<label>Senha:</label><input type="password" name="senha" id="senha" placeholder="Senha" required="" class="form-control-cadastro">
<label>Confirmação de Senha:</label><input type="password" name="confirma" id="confirma" placeholder="Confirme sua Senha" required="" class="form-control-cadastro">
<label>Nome:</label><input type="text" name="nome" id="nome" class="form-control-cadastro" placeholder="Nome Completo" required="">
<label>E-mail:</label><input type="text" name="email" id="email" class="form-control-cadastro" placeholder="E-mail" required="">
<div>
<label>Foto</label><input type="file" name="filename" id="filename" required="">
</div>
   Escolha um estado: <select name="estado" id="estado" onchange="buscar_cidades()">
   <option value="-1">Selecione um estado</option>
    <?php 

       if (isset($_POST["estado"])) $estado = $_POST["estado"];
       else $estado=-1;
       echo $estado;
       include("conexao.php");
       $consulta = "select * from estados";
       $query = mysqli_multi_query($connect, $consulta);	
       if(!$query){
          echo "</select> \n <h1>ERRO NA CONSULTA!!!</h1>\n";
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
          <option value="">Selecione o estado</option>
        </select>
      </div>
			
<label>Descrição:</label><textarea class="form-control-cadastro" name="descricao" id="descricao"></textarea> 


<button  class="botao" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">Cadastrar</button>
<button  class="botao" type="reset" value="Limpar" id="limpar" name="limpar">Limpar</button>
</form>
<a href="javascript:window.history.go(-1)"><button  class="botao" id="voltar" name="voltar">Voltar</button></a>

<?php
       include("rodape.html");
?>