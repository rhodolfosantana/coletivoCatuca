<?php 

	include'action_connection.php';

	$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
	$senha = $_POST['senha'];
	$private = sha1($senha);



	$consulta= $connection->prepare("SELECT id, username,password FROM users WHERE username=? AND password=? ");
	$consulta->bindParam(1,$login);
	$consulta->bindParam(2,$private);
	$consulta->execute();
	
	if ($consulta->rowCount() >= 1){
		$dados = $consulta->fetch();
		session_start();
		$_SESSION['id']  = $dados['id'];
		$_SESSION['user'] = $login; 
		header("Location: /index.php");

	} else {
		header("Location: /index.php?erro");

    }
?>