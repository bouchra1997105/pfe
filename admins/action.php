<?php
	session_start();
	include 'config.php';

	$update=false;
	$id="";
	$name="";
	$email="";
	$phone="";
	$address="";
	$role="";
	$password="";
	$photo="";

	if(isset($_POST['add'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$role=$_POST['role'];
		$password=$_POST['password'];
		$photo=$_FILES['image']['name'];
	
		$upload="uploads/".$photo;

		$query="INSERT INTO users(name,email,phone,address,role,password,photo)VALUES(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssss",$name,$email,$phone,$address,$role,$password,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'],$upload);

		header('location:index.php');
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT photo FROM users WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['photo'];
		unlink($imagepath);

		$query="DELETE FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:index.php');
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$name=$row['name'];
		$email=$row['email'];
		$phone=$row['phone'];
		$address=$row['address'];
		$role=$row['role'];
		$password=$row['password'];
		$photo=$row['photo'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$role=$_POST['role'];
		$password=$_POST['password'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE users SET name=?,email=?,phone=?,address=?,role=?,password=?,photo=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssi",$name,$email,$phone,$address,$role,$password,$newimage,$id);
		$stmt->execute();

	
		header('location:index.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vname=$row['name'];
		$vemail=$row['email'];
		$vphone=$row['phone'];
		$vaddress=$row['address'];
		$vphoto=$row['photo'];
	}
?>