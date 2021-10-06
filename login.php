<?php
include 'conectaBD.php';

$login = $_POST ["campoUsuario"];
$senha = $_POST ["campoSenha"];

$SQL = "SELECT * FROM usuario WHERE login = '$login' and senha = '$senha' ";
$result_id = @mysqli_query($link,$SQL) or die("Erro");  

$total = @mysqli_num_rows($result_id); 

if($total > 0 )
{
	$imprime = $result_id->fetch_array();
	session_start();

	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	
header('Location: pagina_principal.php');
}

else{ 
  header('Location: index.html');
}