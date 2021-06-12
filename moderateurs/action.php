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
	$id_mod = $_SESSION['id'];
	if(isset($_POST['add'])){
		$name=$_POST['name'];
		$description=$_POST['description'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$category=$_POST['category'];
		$ville=$_POST['ville'];
		$photo=$_FILES['image']['name'];
		$upload="uploads/".$photo;
		$query="INSERT INTO biens(name,description,latitude,longitude,category,ville,photo,id_mod)VALUES(?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssssss",$name,$description,$latitude,$longitude,$category,$ville,$upload,$id_mod);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'],$upload);

		header('location:index.php');
	}
	if(isset($_GET['delete'])){
		$id_biens=$_GET['delete'];

		$sql="SELECT photo FROM biens WHERE id_biens=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id_biens);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['photo'];
		unlink($imagepath);

		$query="DELETE FROM biens WHERE id_biens=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id_biens);
		$stmt->execute();

		header('location:index.php');
	}
	if(isset($_GET['edit'])){
		$id_biens=$_GET['edit'];

		$query="SELECT * FROM biens WHERE id_biens=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id_biens);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id_biens=$row['id_biens'];
		$name=$row['name'];
		$description=$row['description'];
		$latitude=$row['latitude'];
		$longitude=$row['longitude'];
		$category=$row['category'];
		$ville=$row['ville'];
		$photo=$row['photo'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id_biens=$_POST['id_biens'];
		$name=$_POST['name'];
		$description=$_POST['description'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$category=$_POST['category'];
		$ville=$_POST['ville'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE biens SET name=?,description=?,latitude=?,longitude=?,category=?,ville=?,photo=? WHERE id_biens=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssi",$name,$description,$latitude,$longitude,$category,$ville,$newimage,$id_biens);
		$stmt->execute();

	
		header('location:index.php');
	}

	if(isset($_GET['details'])){
		$id_biens=$_GET['details'];
		$query="SELECT * FROM biens WHERE id_biens=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id_biens);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id_biens'];
		$vname=$row['name'];
		$vdescription=$row['description'];
		$vville=$row['ville'];
	
		$vphoto=$row['photo'];
	}
?>