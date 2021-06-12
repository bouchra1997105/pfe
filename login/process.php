<?php

$db = mysqli_connect('localhost', 'root', '', 'guide');

$email ="";
$password ="";
$role="";
$status=0;

$email =$_POST['email'];
$password = $_POST['password'];
//$role= $_POST['role'];

$email = stripcslashes($email);
$password=stripcslashes($password);
$role=stripcslashes($role);
$email=mysqli_real_escape_string($db,$email);
$password=mysqli_real_escape_string($db,$password);
$role=mysqli_real_escape_string($db,$role);
$status=mysqli_real_escape_string($db,$status);
$result=mysqli_query($db,"SELECT * ,count(*) a FROM users WHERE email='$email' AND password='$password' ")
or die("failed to query database".mysqli_error($db));
$row=mysqli_fetch_array($result);
if ($row['a']!=0) 
{
	if($row['status']==0){
	?>
	<script language="JavaScript">
	alert("le compte est desactive");
	window.location.replace("login.php");
	</script>
	<?php
	}else{session_start();
 $_SESSION['role'] = $role=$row['role'];
 $_SESSION['id'] =$row['id'];
 if($role=="admin")
 {
	header("location:/tour/admins/index.php");
	exit;
}

elseif ($role=="client") 
{
	header("location:/tour/client/index.php");	
	exit;
}
elseif($role=="moderateur"){
	header("location:/tour/moderateurs/index.php");
	exit;
}
}
}
else{
	?>
	<script language="JavaScript">
	alert("username, password ou Role que vous avez saisie est incorrect.Recommencer");
	window.location.replace("login.php");
	</script>
	<?php
	
	}
$result2=mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password' AND status='$status1' ")
or die("failed to query database".mysqli_error($db));
$row=mysqli_fetch_array($result);
	?>
