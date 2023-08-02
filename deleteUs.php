<?php

include("db.php");

$delreview="delete from review where uid=".$_GET["uid"];
$delres=mysqli_query($con,$delreview);


$qry="delete from member where uid=".$_GET["uid"];

$res=mysqli_query($con,$qry);

if($res==1)
{
	header("Location:deleteUser.php");
}
mysqli_close($con);
?>