<?php

try{
	$odb = new PDO("mysql:host=localhost;dbname=BDDNAME;charset=utf8", 'USERNAME', 'PASSWORD');
}
catch (Exception $e){
	die("Error: " . $e->getMessage());
}



?>