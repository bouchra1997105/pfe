<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>
Liste des biens de la catégorie 
<?php
$nombien=$_POST['nombien'];
$ville=$_POST['idw'];
$idmod=$_POST['idmod'];
require 'config.php';


$rq="select * from biens where name='".$nombien."' or ville='".$ville."' or id_mod=".$idmod." order by name";
echo $rq;
$query_run=mysqli_query($conn, $rq);
//$count=mysqli_num_rows($query_run);
//echo $count." biens trouvés";


  while($row=mysqli_fetch_array($query_run)){
echo '<br />'.$row['name'].'<br />';
echo '<br /><img height="200" width="200"  src='.$row['photo']." /><br />";

};

?>
<img height="200" width="200" src="images/9.jpg" />
<body>
</body>
</html>
