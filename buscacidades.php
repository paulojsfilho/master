<?php
include('conexao.php');
$estado = $_GET['estado'];
$sql = "SELECT * FROM cidades WHERE idEstado = $estado ORDER BY nomeCidade";
$res = mysqli_query($connect,$sql);
//$num = mysql_num_rows($res);
while ($dados=mysqli_fetch_array($res)) {
//for ($i = 0; $i < $num; $i++) {
  $dados = mysqli_fetch_array($res);
  $arrCidades[$dados['idCidade']] = utf8_encode($dados['nomeCidade']);
}
?>
<label>Cidades:</label>
<select name="cidade" id="cidade">
  <?php foreach($arrCidades as $value => $nome){
    echo "<option value='{$value}'>{$nome}</option>";
  }
?>
</select>