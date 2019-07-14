<?php
include "action_connection.php";

if($_POST['nome'] != null && $_POST['user'] != null && $_POST['email'] != null && $_POST['pass'] != null && $_POST['senha2']!=null && $_POST['pass'] == $_POST['senha2']){
	
	
	
	$nome = htmlspecialchars($_POST['nome'],ENT_QUOTES);
	$user = htmlspecialchars($_POST['user'],ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	$pass = sha1($_POST['pass']);

	$checking=("SELECT * FROM users WHERE username = ?");

	$queryOne = $connection->prepare($checking);
	$queryOne->bindParam(1,$user);
	$queryOne -> execute();

	$stmt = $queryOne->fetch();

	if ($stmt[0] != null){

		$_SESSION['cadastro_falhou']=true;
		header('location:../index.php');

	} else {

		$sql = "INSERT INTO users(users, username, email, password) VALUES (:nome, :user, :email, :pass)";

		$query = $connection->prepare($sql);
 		$query->bindParam(':nome', $nome);
		$query->bindParam(':user', $user);
		$query->bindParam(':email', $email);
		$query->bindParam(':pass', $pass);


 		$stmt = $query->execute();
		$_SESSION['emailCadastro'] = $_POST['email'];
		$_SESSION['nomeCadastro'] = $_POST['nome'];


		$_SESSION['cadastro_sucesso'] = true;
		header('location: ../index.php');	
	}	

}else {
	$_SESSION['fail_campo']=true;
	header('location:../index.php');
}

?>