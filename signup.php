<?php

include("db.php");

session_start();
$error="";
$name=$email=$pass=$cpass="";
$flag=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST["txtUname"];
	if(empty($name) || (!preg_match("/^[a-zA-Z]*$/",$name)))
	{
		$error="Invalid UserName!!"."<br>";
		$flag=1;
	}

	//email
	$email=$_POST["txtEmail"];
	if(empty($email) || (!filter_var($email,FILTER_VALIDATE_EMAIL)))
	{
		$error.="Invalid Email Id!!"."<br>";
		$flag=1;
	}

	//Password
	$pass=$_POST["txtPass"];
	if(empty($pass) || strlen($pass)<5)
	{
		$error.="Invalid Password. Your Password must be at least 5 letters!!"."<br>";	
		$flag=1;
	}

	//Confirm Password
	$cpass=$_POST["txtCPass"];
	if(empty($cpass) || (strcmp($pass, $cpass)!=0))
	{
		$error.="Your password shold be matches!!";
		$flag=1;
	}

	if(isset($_POST["btnSignUp"])=="Sign Up" && $flag==0)
	{
		$email=$_POST["txtEmail"];
		$uname=$_POST["txtUname"];
		$pwd=$_POST["txtPass"];

		$userqry = "SELECT * FROM member WHERE uname='$uname'";
  		$emailqry = "SELECT * FROM member WHERE email='$email'";
		
		$res_uname = mysqli_query($con, $userqry) or die(mysqli_error());
	  	$res_email = mysqli_query($con, $emailqry) or die(mysqli_error());

		if(mysqli_num_rows($res_email) > 0)
		{
		  	$error = "Sorry... Email ID already Exists!!!";
		}
		else if(mysqli_num_rows($res_uname) > 0) 
		{
		  	$error = "Sorry... Username already Exists!!!"; 	
		}
		else if($email=="admin@gmail.com" && $pwd=="admin")
		{
			$_SESSION['email'] = $row['email'];
			header("Location:adminMain.php");
		}
		else
		{
			$query = "INSERT INTO member(uid,email,uname,password) VALUES (NULL,'$email','$uname','$pwd')";
			$result = mysqli_query($con, $query) or die(mysqli_error());
	  	
			$_SESSION['email']=$_POST["txtEmail"];

			header("Location:index.php");
		}
	}
}
?>
<link rel="stylesheet" type="text/css" href="login.css">

<div class="sign1">

<a href="login.php"><img src="img/close.png" height="30px" width="30px" align="right"></a>

<center><h1><u>Sign Up</u></h1></center>
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
<form name="signup" enctype="multiple/form-data" method="post">

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : 
<center><br><input type="email" id="email" style="outline: none;" placeholder="Enter your email" class="signText" name="txtEmail" value="<?php if(isset($email)) echo $email;?>"/></center>  
<br>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UserName : 
  <center><br>
  	<input type="text" id="uname" style="outline: none;" placeholder="Enter your username" class="signText" name="txtUname" value="<?php if(isset($name)) echo $name;?>"/></center>
<br>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password : 
  <center><br>
  	<input type="password" id="password" style="outline: none;" placeholder="Enter your password" class="signText" name="txtPass" value="<?php if(isset($pass)) echo $pass;?>"/></center>
<br>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password : 
  <center><br>
  	<input type="password" id="cpassword" style="outline: none;" placeholder="Enter your password" class="signText" name="txtCPass" value="<?php if(isset($cpass)) echo $cpass;?>"/></center>
 <br>


<center>
<input type="submit" value="Sign Up" name="btnSignUp" class="btn" id="register" style="outline: none;" />
<!-- <input type="reset" value="Reset" name="btnReset" class="btn" style="outline: none;" /> -->
</center>

</form>

</div>

<?php

mysqli_close($con);

?>