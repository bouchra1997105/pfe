
<?php
//$nm=$_GET["nm"];?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tour Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

   

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    
</head>


<body> 

<?php
include('../navbar.php');?>

	 	<form action="rech_biens.php" name="forme1gg" method="post">
          Entrer name  <input type="text" name="nombien"  placeholder="Rechercher par nom de bien" >
          Entrer wilya  <input type="text" name="idw"  placeholder="Rechercher par wilaya" >
          Entrer modérateur  <select name="idmod">
		  <?php 
require 'config.php';
		 
            $query_run=mysqli_query($conn, "select * from users where role='moderateur' order by name");


  while($row=mysqli_fetch_array($query_run)){
		?>	
			<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
         
		 <?php
		 
		 };
		 ?>

		  </select>
		  <input type="submit"  value="Chercher les biens" type="button">
        </form>
		  


		
<div class="container py-5">

       

</br></br>
<div class="row mt-4">
<?php

$nm=$_POST['nm'];
$query_run=mysqli_query($conn,"select * from biens where name like('%$nm%')");
$result=mysqli_num_rows($query_run) > 0;
if($result){
  while($row=mysqli_fetch_array($query_run)){
    ?>
    <div class="col-md-4">
    <div class="card">
    <a href=view_chose.php?id_biens=<?= $row['id_biens'];?>><img src="<?= $row['photo']; ?>" width="200px" height="200px"></a>
    <div class="card-body">
    <h4 class="card-title"><?php  echo $row['name']; ?></h4>
    <h4 class="card-title"><?php  echo $row['description']; ?></h4>
    <span class="place">Alger,<?php  echo $row['ville']; ?></spane>
    </br>

     <a style="height:25px;font-size:14px" href="chose_a_reser.php?id_bien=<?= $row['id_biens']; ?>" class="badge badge-success p-2">show in Cart Maps</a>
              
    </div>
    </div>
    </div>

   
    <?php
   
  }
}else{
  echo"";
}
?>
 </div></div>
