<?php
session_start();
include 'config.php';
$id="";
$name="";
$description="";
$ville="";
$photo="";

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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">Easy Travel </a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active" style="font-size:20px"><a href="../index.php">Home</a></li>
                            </li>
                            <li style="font-size:25px"><a href="index.php">Hotel</a></li>
                            <li style="font-size:25px"><a href="restaurant.php">Restaurant</a></li>
                            <li style="font-size:25px"><a href="voiture.php">Voiture</a></li>
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                              <li style="font-size:25px"><a href="../tour/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout <span></span></a>
                      </ul> 
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div>
  <img src="images/cover-img-5.jpg" width="2000" height="640">
                           <div class='sidebar-wrap'>
                            <div class='side search-wrap animate-box' style='width:400px; margin-left:1200px;margin-top:0px'>
                                <h3 class='sidebar-heading'>Find your hotel</h3>
                                <form method='post' class='colorlib-form' >
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <div class='form-group'>
                                                <label for='date'>Wilaya:</label>
                                                <div class='form-field'>
                                                
                                                    <input type='text' name='valueTosearch' class='form-control date' placeholder='search wilaya'>
                                                </div>
                                            </div>
                                        </div>
                            
                                        


                                        <div class='col-md-12'>
                                            <input type='submit' name='search' id='search' value='Find Hotel' class='btn btn-primary btn-block'>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            		if(isset($_POST['search']))
                                {
                                    $valueTosearch = $_POST['valueTosearch'];
                                    // search in all table columns
                                    // using concat mysql function
                                    $query = "SELECT * FROM `biens` WHERE CONCAT(`name`, `ville`, `id_mod`) LIKE '%".$valueTosearch."%'";
                                    $results = filterTable($query);
                                    
                                }
                                 else {
                                    $query = "SELECT * FROM `biens`";
                                    $results = filterTable($query);
                                }
                                function filterTable($query)
                                {
                                 $db = mysqli_connect("localhost", "root", "", "guide");
                                 $filter_Result = mysqli_query($db, $query);
                                 return $filter_Result;
}
                             ?>
  </div>
</div>
                </div>
         
          <?php
       
        
        $sql="SELECT * FROM biens where category='hotel'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {

                    
                    echo "
                    

                    
                    <div class='container'>
                    <div class='row justify-content-center'>
                      <div class='col-md-6 mt-3 bg-info p-4 rounded'>
                      <div class='text-center'>
                    
                      <a href=view.php?id_biens=".$row['id_biens']."><img src='<?= $photo; ?>' width='300' class='img-thumbnail'></a>
                      
                               
                                 <p class='star'><span><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i>
                                 <i class='icon-star-full'></i><i class='icon-star-full'></i></span></p>
                                 <h1 class='text-light'>Name: ".$row['name']."</h6>
                                 <h2 class='place'>Wilaya: ".$row['ville']."</h2>
                                 <h3>description: ".$row['description']."</h3>
                             
  
              
                       </div>
                       </div> </div>
                            <a class='badge badge-success p-2' style='width:150px;height:30px;background-color:yellow;font-size:24px;margin-top:px;margin-left:425px' href=view.php?id_biens=".$row['id_biens'].">Cart Maps</a>
                            </div>
                            
                          
                                
                       
                    
                    
                         ";
                        
                    
                    
                }
               
         
                
                          
            }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        
        
        
        
        ?>
  </p>
       </div>
          
          
          
          
                </p>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>



