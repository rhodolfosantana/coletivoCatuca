<?php 
 	include'action_connection.php';
	$id = $_SESSION['id'];

 
 	if(isset($_POST['pub']) && isset($_FILES['imagem'])){
 		

 		$pub = htmlspecialchars($_POST['pub'], ENT_QUOTES);

 		$pub = $_POST['pub'];

		//Cadastrar imagem
		$img = $_FILES['imagem']; //arquivo enviado
		if(isset($img)){
			mkdir(__DIR__.'/../pictures/', 0777, true);//Cria a pasta pictures e se já existir não faz nada.
			$extensao  =  strtolower(substr($img['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../pictures/";//onde ele será salvo
			move_uploaded_file($img['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		$sql = "INSERT INTO public (pub, img, user_id) 
						VALUES(:pub, :img, :id)";
 		$addPub = $connection->prepare($sql);
 		$addPub->bindParam(':pub', $pub);
		$addPub->bindParam(':img', $novo_nome);
		$addPub->bindParam(':id', $id);
 		$stmt = $addPub->execute();

		header('Location: ../index.php');
	} else {

 		echo "<script>alert('erro')</script>";

 	}
	
  ?> 