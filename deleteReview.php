<?php

include("db.php");

$qry="delete from review where uid=".$_GET["uid"]." and mid=".$_GET["mid"];

$res=mysqli_query($con,$qry);

$mid=$_GET["mid"];
if($res==1)
{
	header("Location:movieAdmin.php?mid=$mid");
}

mysqli_close($con);
?>

