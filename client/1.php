<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php
include('../navbar.php');?>
<form action="rech_biens.php" method="post">hhhhh

 
          Entrer name  <input type="text" name="nombien"  placeholder="Rechercher par nom de bien" >
          Entrer wilya  <input type="text" name="idw"  placeholder="Rechercher par wilaya" >
          Entrer modérateur  <select name="idmod" id="idmod">
		  <?php 
require 'config.php';
		 
            $query_run=mysqli_query($conn, "select * from users where role='moderateur' order by name");
$result=mysqli_num_rows($query_run) > 0;

  while($row=mysqli_fetch_array($query_run)){
		?>	
			<option id="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
         
		 <?php
		 
		 };
		 ?>

		  </select>
		    <input type="submit" name="Submit" value="Chercher les biens" />

        </form>
</body>
</html>
