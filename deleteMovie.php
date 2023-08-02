<?php

include("db.php");

$selqry="select image from movie where mid=".$_GET["mid"];
$selres=mysqli_query($con,$selqry);
while($row=mysqli_fetch_array($selres)) 
{
	$urlpic=$row['image'];
}

$delreview="delete from review where mid=".$_GET["mid"];
$delres=mysqli_query($con,$delreview);


$qry="delete from movie where mid=".$_GET["mid"];

$res=mysqli_query($con,$qry);

if($res==1)
{
	unlink("./".$urlpic);
	header("Location:delete.php");
}

mysqli_close($con);
?>