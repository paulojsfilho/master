 <?php
 include("topo.html");
 ?><br />
 
<form method="POST" action="login.php" >
<label for="login">Login:</label><input type="text" name="login" required="" placeholder="Login" class="form-control-login">
<label for="senha">Senha:</label><input type="password" name="senha" required="" placeholder="Senha"class="form-control-login">
<input type="submit" value="Entrar" name="entrar" class="botao-login">
<a href="cadastro.php">Ou cadastre-se</a>
</form>
<p>Seja Bem vindo ao nosso Yearbook. Para participar basta cadastrar-se clicando no link acima.  Já é cadastrado? Efetue o seu Login e divirta-se.</p>
 <?php
 include ("fotos_iniciais.php");
 include("rodape.html");
 ?>