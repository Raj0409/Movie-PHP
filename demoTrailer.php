<?php

include("db.php");

$sql="select link from trailer";

$res=mysqli_query($con,$sql);


while($row=mysqli_fetch_array($res))
{
	echo "<iframe src=$row[0] height='300px' width='600px' frameborder='0' allowfullscreen style='border-radius: 10px'></iframe><br><br>";
}
?>