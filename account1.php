<?php
include("db.php");
include("nav.php");
?>
<?php
echo $_SESSION["email"];
$selqry="select email,uname,uid from member where email like '%".$_SESSION["email"]."%'";

$selres=mysqli_query($con,$selqry);

$selrow=mysqli_fetch_array($selres);

if(isset($_POST["btnUpdate"])=="Update")
{
	$uname=$_POST["txtUname"];
	$email=$_POST["txtEmail"];

	$updqry="update member set uname='$uname',email='$email' where uid=".$selrow[2];

	$updres=mysqli_query($con,$updqry) or die(mysqli_error($con));

	if($updres==1)
	{
		echo '<script>alert("Your profile is updated")</script>';
		header("Location:index.php");
	}
}	
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">

<form method="post">
<table class="insert">
	<tr>
		<td><label>Email :</label></td>
		<td><input type="text" name="txtEmail" value="<?php echo $selrow[0];?>"></td>
	</tr>
	<tr>
		<td><label>User Name :</label></td>
		<td><input type="text" name="txtUname" value="<?php echo $selrow[1];?>"></td>
	</tr>
	<tr>
		<td></td>
	  	<td>
			<input type="submit" name="btnUpdate" value="Update" class="btn" style="outline: none">
	  	</td> 
	</tr>
</table>
</form>