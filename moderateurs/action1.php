<?php
	session_start();
	include 'config.php';
	$update=false;
	$id_biens="";
	$name="";
	$description="";
	$latitude="";
	$longitude="";
	$category="";
	$ville="";
	$photo="";
    $id="";
    
    
	if(isset($_POST['add'])){
		$name=$_POST['name'];
		$description=$_POST['description'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$category=$_POST['category'];
		$ville=$_POST['ville'];
		
		$photo=$_FILES['image']['name'];
	
		$upload="uploads/".$photo;

		$query="INSERT INTO biens(name,description,latitude,longitude,category,ville,photo)VALUES(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssss",$name,$description,$latitude,$longitude,$category,$ville,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'],$upload);

		header('location:index.php');
	}

?>