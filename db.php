<?php
$con=mysqli_connect("localhost","root","");

//used to select a database.
//1. connection link
//2. name of the databse that you want to connect
$db=mysqli_select_db($con,"website");
if(!$con)
{
	//used to print msg and exit from the curret php form
	die("connection fail".mysqli_error());
}

if(!$db)
{
	die("Db not connected".mysqli_error());	
}
?>