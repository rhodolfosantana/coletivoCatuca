<?php
include 'view_navBar.php';
//if (!isset($_SESSION['user'])) {
//	header('location: ../index.php');
//	exit();
//}

?>
<style type="text/css">
body {

	margin-top: 25px;
}
  

.form{
    margin-top: 3em;
}


.cad{
    margin-top: 5em;
    margin-bottom: 7em;
}
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */


</style>
<div class="container cad">
	<h1 id="titulo_cadastro">Públicar  </h1>
    <div class="form">
	<form method="POST" action=../action/action_addPub.php class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="text">Fala tu!</label>
            <input type="text" class="form-control" name="pub">
        </div>

        <div class="form-group">
            <label for="file">Imagem:</label>
            <input type="file" class="form-control file" name="imagem">
        </div>
          <div class="form-group">    
    	     	<input type="submit" value="Cadastrar" class="btn btn-primary">
    	   </div>


	</form>
    </div>
</div>

