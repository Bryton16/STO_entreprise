<?php
require('inc/db.php');
if (isset($_POST["employee_id"])) {
	$output = '';
	$reqid = $odb->prepare("SELECT * FROM machines WHERE id = ?");
	$reqid->execute([
		$_POST["employee_id"]
	]);

	while($r = $reqid->fetch()) {
		$output .= '
		  <br>
	      <h3>'.$r["name"].'</h3>
	      <br><br>
	      <img src="'.$r["img"].'" width="400">
	      <br>
	      <h3>Description du produits:</h3>
	      <div class="container">
	        <h5 class="TextDescription text-center">'.$r["description"].'
	        </h5>
	      </div>


	      <center><h1><span class="badge badge-primary">'.$r["price"].'€</span></h1></center>';

	}
    
    echo $output;

}


?>