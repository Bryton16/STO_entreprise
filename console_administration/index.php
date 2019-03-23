<?php
session_start();
require '../inc/db.php';
?>
<?php

if (!isset($_SESSION["id"])) {
	header("location: ../index.php");
}


if (isset($_POST["send"])) {
	$name = htmlspecialchars($_POST["name"]);
	$img = htmlspecialchars($_POST["img"]);
	$description = htmlspecialchars($_POST["description"]);
	$price = htmlspecialchars($_POST["price"]);


	if (!empty($name) AND !empty($img) AND !empty($description) AND !empty($price)) {
		
		$insert = $odb->prepare("INSERT INTO machines (name, description, img, price) VALUES(?, ?, ?, ?)");
		$insert->execute([
			$name,
			$description,
			$img,
			$price
		]);
		$success = "Offre ajouté avec succès";

	}
	else {
		$error = "Veuillez saisir tout les champs";
	}
}





?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration STO</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-grid.min.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-reboot.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-reboot.min.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/lightbox.min.css">
  <script src="assets/js/lightbox-plus-jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div align="center">
		<img src="../assets/img/logo.png" width="400">
			<h1>Panel d'administration STO</h1>
			<h4>Bonjour <?php echo $_SESSION["prenom"]; ?>, Vous allez bien aujourd'hui?</h4>

			<div class="container">
				<br>
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Crée une offre de machine</legend>
            <br>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nom du produit</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Nom du produit" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">lien image</label>
              <div class="col-md-9">
                <input id="name" name="img" type="text" placeholder="lien image" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Prix</label>
              <div class="col-md-9">
                <input id="name" name="price" type="text" placeholder="prix" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Description du produit</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="description" placeholder="Decrire le produit ici" rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" name="send" class="btn btn-primary btn-lg">Créer</button>
              </div>
            </div>
          </fieldset>
          </form>
          <?php
          if (isset($error)) {
             echo "<font color=\"red\">".$error."</font>";
          }

          if (isset($success)) {
            echo "<font color=\"green\">".$success."</font>";
          }



          ?>
        </div>
      </div>
  </div>
</div>
	</div>
</body>
</html>