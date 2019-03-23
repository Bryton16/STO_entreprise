<?php require_once("inc/function.php"); ?>
<?php
if (isset($_POST["send"])) {
    
    $name = htmlspecialchars($_POST["name"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!empty($name) AND !empty($prenom) AND !empty($email) AND !empty($subject) AND !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
 
              ini_set( 'display_errors', 1 );
           
              error_reporting( E_ALL );
           
              $from = $email;
           
              $to = "bernardmichel.sto@gmail.com";
           
              $subject = $subject;
           
              $message = "Nom: ".$name."\nPrenom: ".$prenom."\nEmail: ".$email."\n\n".$message."";
           
              $headers = "From:" . $from;
           
              mail($to,$subject,$message, $headers);
           
         

            $success = "Votre email a été envoyé avec succès. Nous vous répondront le plus rapidement.";

        }else{
          $error = "Veuillez saisir un format d'adresse email valide";
        }

    }else{
      $error = "Veuillez saisir tout les champs";
    }



}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact - <?php echo PageName(); ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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


<header class="co">

    <div class="contain">

      
    </div>
  </header>
  <div class="logo">
       <img src="assets/img/logo.png"  width="400">
   </div>
   <br>
      <div class="barre">
        

        <nav align="center" class="menu-nav">
          <br>
          <ul>
            <li class="btn">
              <a class="onglet" href="index.php">
                Accueil
              </a>
            </li>

            <li class="btn">
              <a class="onglet" href="gallerie.php">
                Galerie
              </a>
            </li>

            <li class="btn">
              <a class="onglet" href="machines.php">
                Machines d'occasions
              </a>
            </li>

            <li class="btn">
              <a class="onglet" href="contact.php">
                Contact
              </a>
            </li>
          </ul>
    </nav>
  </div>


  <br><br><br>
  <div align="center">
  <div id="color" class="carrerr"><h2 class="carrerr">Contact</h2>
</div>

<div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Contactez nous</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nom</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Votre nom" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Prénom</label>
              <div class="col-md-9">
                <input id="name" name="prenom" type="text" placeholder="Votre prénom" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Sujet</label>
              <div class="col-md-9">
                <input id="name" name="subject" type="text" placeholder="Sujet" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Votre adresse email</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Votre adresse email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Votre message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" name="send" class="btn btn-primary btn-lg">Envoyer</button>
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