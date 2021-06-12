<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'guide');

$email ="";
$password ="";
$role="";
$status=0;
$status1=1;

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
$status1=mysqli_real_escape_string($db,$status);
$result=mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password' AND status='$status' ")
or die("failed to query database".mysqli_error($db));
$row=mysqli_fetch_array($result);
if($row['status']==$status){
      if ($row['email']==$email && $row['password']==$password ) 
       {
         $_SESSION['role'] = $role=$row['role'];
        $_SESSION['id'] =$row['id'];
            if($role=="admin")
             {
	           header("location:/tour/admins/index.php");
	            exit;
                 }

if ($role=="client") 
{
	header("location:/tour/client/index.php");	
	exit;
}
if($role=="moderateur"){
	header("location:/tour/moderateurs/index.php");
	exit;
}}


 if(($row['email']!=$email || $row['password']!=$password ) ){
	?>
	<script language="JavaScript">
	alert("username, password ou Role que vous avez saisie est incorrect.Recommencer");
	window.location.replace("login.php");
	</script>
	<?php
	
	}
}
	else if($row['status']==$status1){
	?>
	<script language="JavaScript">

	alert("desectiver");
	window.location.replace("login.php");

	</script>
	<?php
	}
	
	?>
