<?php
include("db.php");
session_start();
$error="";
$email=$pass="";
$flag=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	//email
	$email=$_POST["txtEmail"];
	if(empty($email) || (!filter_var($email,FILTER_VALIDATE_EMAIL)))
	{
		$error.="Invalid Email Id!!"."<br>";
		$flag=1;
	}

	//Password
	$pass=$_POST["txtPwd"];
	if(empty($pass))
	{
		$error.="Invalid Password!!"."<br>";	
		$flag=1;
	}

	if(isset($_POST["btnLogin"]) && $flag==0)
	{
		$email=$_POST["txtEmail"];
		$pass=$_POST["txtPwd"];
		$query = "SELECT * FROM member WHERE email='$email' AND password='$pass'";
		$result = mysqli_query($con, $query) or die(mysqli_error($con));
		$num_row = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		if($num_row >= 1) 
		{
			if($row['email']=="admin@gmail.com" && $row['password']=="admin")
			{
				$_SESSION['email'] = $row['email'];
				header("Location:adminMain.php");
			}
			else
			{
			    $_SESSION['email'] = $row['email'];
		    
		    	header("Location:index.php");
			}
		} 
		else 
		{
		    $error.="Check your Email Id and Password Again!!";
		}
	}
}
?>

<style type="text/css">
.int{outline: none;}	
</style>

<link rel="stylesheet" type="text/css" href="login.css">

<div class="login">
	
<a href="index.php"><img src="img/close.png" height="30px" width="30px" align="right"></a>

<center><h1><u>Log In</u></h1></center>
<?php 
	if(strlen($error)>4)
	{
		?>
		<div id="errorSpan">
			<?php echo $error;?>
		</div>
	<?php	
	}
?>
<form name="log" enctype="multiple/form-data" method="post">

<div class="log">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : 
<center><br><input type="email" placeholder="Enter your email" class="int" name="txtEmail" value="<?php if(isset($email)) echo $email;?>"/></center>  
</div>
<br>

<div class="log">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password : 
  <center><br><input type="password" placeholder="Enter your password" class="int" name="txtPwd" value="<?php if(isset($pass)) echo $pass;?>"/></center>
</div>
<br>

<center>
<input type="submit" value="Login" name="btnLogin" class="button" style="outline: none;" />
<!-- <input type="reset" value="Reset" name="btnReset" class="button" style="outline: none;" /> -->
</center>

</form>

<hr>
<hr>

<u>
  <center>
Create a new Account...
  </center>
</u><br>

<center>
<a href="signup.php" class="signup">Sign Up</a>
</center>
<br>

<hr>
<!-- 
<center>
Copyright- &copy; 1995-2030
</center> -->

</div>

<?php

mysqli_close($con);

?>