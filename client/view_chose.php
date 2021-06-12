
<?php
$id_biens= (isset($_GET['id_bien']) && !empty($_GET['id_bien'])) ? $_GET['id_bien'] : "";

?>
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
    

<body> 

<?php
include('../navbar.php');?>
       

</br></br>
<div class="row mt-4">
<?php
require 'config.php';
 session_start();
$query= "select * from chose_a_res where id_biens=".$_GET['id_biens'];
$query_run=mysqli_query($conn,$query);
$result=mysqli_num_rows($query_run) > 0;
if($result){
    while($row=mysqli_fetch_array($query_run)){
    ?>
    <center>
    <div class="col-md-4">
    <div class="card">
    <a href=chose.php?id_chose=<?= $row['id_chose'];?>><img src="<?= $row['photo']; ?>" width="200px" height="200px"></a>
    <div class="card-body">
    <h4 class="card-title"><?php  echo $row['type']; ?></h4>
    <h4 class="card-title"><?php  echo $row['nbr']; ?></h4>
    <h4 class="card-title"><?php  echo $row['description']; ?></h4>
    <span class="place"><?php  echo $row['prix']; ?>  $</span>
    </br>
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
