<?php require_once("inc/function.php"); ?>
<?php require_once("inc/db.php"); ?>
<?php
$InPageTotal = 6;
$reqMachine = $odb->query("SELECT * FROM machines");
$pageTot = $reqMachine->rowCount();
$pageTotal = ceil($pageTot/$InPageTotal);
if (isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] > 0) {
	$_GET["page"] = intval($_GET["page"]);
	$pageCourante = $_GET["page"];

}else {
	$pageCourante = 1;
}
$depart = ($pageCourante-1)*$InPageTotal;


?>
<!DOCTYPE html>
<html>
<head>
	<title>Machines d'occasions - <?php echo PageName(); ?></title>
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
  <div id="color" class="carrerr"><h2 class="carrerr"> Machines d'occasions</h2>
</div>

<div id="dataModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="employee_detail">
      
    </div>
  </div>
</div>

<div class="container">

  <div class="row">

    <?php
    $reqprod = $odb->query("SELECT * FROM machines ORDER BY id DESC LIMIT ".$depart.",".$InPageTotal);

    $reqprodexi = $reqprod->rowCount();
    
          while ($p = $reqprod->fetch()) {  ?>

         <div class="col-lg-4 col-4 col-xs-12 col-sm-12">
          <img src="<?= $p["img"] ?>" width="300" class="ModalImage view_data" id="<?php echo $p["id"]; ?>" data-toggle="modal" data-target=".bd-example-modal-lg">
        </div>
       <?php }
    




    ?>
    
    

    
    





  </div>
  <br>
  <center><div align="center">
  	<nav aria-label="Page navigation example">
		  <ul class="pagination">
  <?php
	for ($i=1; $i<=$pageTotal ; $i++) { ?>
		
		    <li class="page-item"><center><a class="page-link" href="machines.php?page=<?= $i; ?>"><?= $i; ?></a></center></li>

		 
	<?php } 



	?>
	 </ul>
		</nav>
</div></center>
  <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>



</div>