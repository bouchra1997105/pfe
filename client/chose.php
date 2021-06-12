
<?php
	session_start();

$conn=$db=mysqli_connect("localhost","root","","guide");


$date_deb="";
$date_fin="";
$id_chose="";
if(isset($_POST['register'])){
		
    $date_deb=$_POST['date_deb'];
    $date_fin=$_POST['date_fin'];
    $query="INSERT INTO reservation(date_deb,date_fin)VALUES(?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ss",$date_deb,$date_fin);
    $stmt->execute();

    header('location:chose.php');
}
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
<div class="row mt-4">
<?php
$query= "select * from chose_a_res where id_chose=".$_GET['id_chose'];
$query_run=mysqli_query($conn,$query);
$result=mysqli_num_rows($query_run) > 0;
if($result){
    while($row=mysqli_fetch_array($query_run)){
    ?>
    <center>
    <?php
    if(isset($_POST['search'])){
        $date_deb=$_POST['date_deb'];
        $date_fin=$_POST['date_fin'];
        //$q="select * from reservation r INNER JOIN chose_a_res c ON c.id_chose = r.id_chose
       //where r.date_deb < $date_deb and r.date_fin > $date_fin ";
       $q="select * from reservation r INNER JOIN chose_a_res c ON 
       c.id_chose = r.id_chose 
       where c.id_chose =".$_GET['id_chose']."
       and not (r.date_deb < '".$date_deb."' and r.date_fin > '".$date_fin."')";
       echo $q;
        $query=mysqli_query($conn,$q);
       
        $count=mysqli_num_rows($query);
    }
    ?>

    <div class="col-md-3" style="margin-top:0px;margin-left:1200px">
                        <div class="sidebar-wrap">
                            <div class="side search-wrap animate-box">
                                <h3 class="sidebar-heading">Find your hotel</h3>
                                <form method="post" class="colorlib-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date">Check-in:</label>
                                                <div class="form-field">
                                                    <i class="icon icon-calendar2"></i>
                                                    <input type="date" id="date_deb" name="date_deb" class="form-control date" placeholder="Check-in date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date">Check-out:</label>
                                                <div class="form-field">
                                                    <i class="icon icon-calendar2"></i>
                                                    <input type="date" name="date_fin" id="date_fin" class="form-control date" placeholder="Check-out date">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <input type="submit" name="search" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            if($count=="0"){
                echo"not found";
                }else{
                    echo "la reservation est disponible";
                
            }
            ?>
       




    <div class="col-md-4">
    <div class="card">
    <a href=chose.php?id_chose=<?= $row['id_chose'];?>><img src="<?= $row['photo']; ?>" width="200px" height="200px"></a>
    <div class="card-body">
    <h4 class="card-title"><?php  echo $row['type']; ?></h4>
    <h4 class="card-title"><?php  echo $row['nbr']; ?></h4>
    <h4 class="card-title"><?php  echo $row['description']; ?></h4>
    <span class="place"><?php  echo $row['prix']; ?>  $</span>  <?php
    
   
}
}else{
echo"";
}  
?><br><br>

<form action="action_chose_res.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_reserv" value="<?= $id_reserv; ?>">

            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">date_debut</label>
              <input type="hidden" name="dchoseares" value="<?= $_GET['id_chose']; ?>" class="form-control" placeholder="Enter date_deb" required>
              <input type="date_deb" name="date_deb" value="<?= $date_deb; ?>" class="form-control" placeholder="Enter date_deb" required>
            </div>
            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">date_fin</label>
              <input type="date_fin" name="date_fin" value="<?= $date_fin; ?>" class="form-control" placeholder="Enter date_fin" required>
            </div>
            <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="register" value="register">
							Reserver
							</button>
						</div>
					</div>
                
    </br>
    </div>
    </div>
    </div>
    <div>

   


 </div></div>
