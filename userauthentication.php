<!-- Conexão com o banco de dados -->
<?php
$host = "localhost";
$user = "root";
$passw = "";
$banco = "painel";
$conexao = mysql_connect($host, $user, $passw) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<!-- Fim da conexão -->
<html>
<meta charset="UTF-8">
<link href="include/style.css" type="text/css" rel="stylesheet" media="all" />
<head>
<title>Autenticando usuário</title>
<!-- Script de redirecionamento -->
<script type="text/javascript">
function loginsuccessfully() {
	setTimeout("window.location='painel.php'", 3000);
}

function loginfailed() {
	setTimeout("window.location='index.php'", 3000);
}
</script>
<!-- Fim do script -->
</head>
<body>
  <div class="background">
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['senha']=$_POST['senha'];
	echo '<center><div class="box"><font color="green"></p><p><p>Você foi autenticado com sucesso ! Aguarde um instante...</font></center>';
	echo "<script>loginsuccessfully()</script>";
} else {
	echo ' <center><div class="box"><font color="red"></p><p><p>Nome de usuário ou senha inválidos! Aguarde um instante para tentar novamente...</font></center>';
	echo "<script>loginfailed()</script>";
} 






?>
</body>
</html>