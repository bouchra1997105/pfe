<?php
  include('config.php');
 $id=$_GET['id'];
$sql="update users set status='0' where id=$id and role='client'";
if(mysqli_query($conn,$sql)){
    header('location:/tour/admins/gerer_client.php');

}

?>