<?php
	session_start();
	include 'config.php';
	$update=false;
	$id_chose="";
	$type="";
	$nbr="";
	$description="";
	$photo="";
	$prix="";
	$id_bien ="";
	if(isset($_POST['add'])){
		$type=$_POST['type'];
		$nbr=$_POST['nbr'];
		$description=$_POST['description'];
		$prix=$_POST['prix'];
		$photo=$_POST['photo'];
		$photo=$_FILES['image']['name'];
		$upload="uploads/".$photo;
		$id_bien =$_POST['id_biens'];

		$query="INSERT INTO chose_a_res(type,nbr,description,prix,photo,id_biens)VALUES(?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssss",$type,$nbr,$description,$prix,$upload,$id_bien);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'],$upload);
		header("location:chose_a_reser.php?add=$id_bien");
	}
	if(isset($_GET['delete'])){
		$id_chose=$_GET['delete'];

		
		$query="DELETE FROM chose_a_res WHERE id_chose=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id_chose);
		$stmt->execute();

		header('location:chose_a_reser.php');
	}
	if(isset($_GET['edit'])){
		$id_chose=$_GET['edit'];

		$query="SELECT * FROM chose_a_res WHERE id_chose=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id_chose);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id_chose=$row['id_chose'];
		$type=$row['type'];
		$nbr=$row['nbr'];
		$desciption=$row['description'];
		$prix=$row['prix'];
		$photo=$row['photo'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id_chose=$_POST['id_chose'];
		$type=$_POST['type'];
		$nbr=$_POST['nbr'];
		$description=$_POST['description'];
		$prix=$_POST['prix'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE chose_a_res SET type=?,nbr=?,description=?,prix=?,photo=? WHERE id_chose=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssi",$type,$nbr,$description,$prix,$newimage,$id_chose);
		$stmt->execute();
		header('location:chose_a_reser.php');
	}
	
?>