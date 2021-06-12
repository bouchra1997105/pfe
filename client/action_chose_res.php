<?php
	session_start();
	include 'config.php';

	
	//$id_biens="";
	$date_deb="";
	$date_fin="";
	$id_chose="";
	$id_client= $_SESSION['id'];
    $id_reserv=0;
	if(isset($_POST['register'])){
		
		$date_deb=$_POST['date_deb'];
		$date_fin=$_POST['date_fin'];
		$query="INSERT INTO reservation(date_deb,date_fin,id_client,id_biens,id_chose)VALUES(?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssss",$date_deb,$date_fin,$id_client,$id_biens,$id_chose);
		$stmt->execute();

		header('location:chose.php');
	}
	
?>