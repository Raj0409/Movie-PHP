<?php

include("nav.php");
include("db.php");

$selqry="select mid,uid,rate,comment,Cur_date from review where uid=".$_GET["uid"]." and mid=".$_GET["mid"];

$selres=mysqli_query($con,$selqry);

$selrow=mysqli_fetch_array($selres);
// =====================================
$error="";
$comment=$rate="";
$flag=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	//Radio
	if(isset($_POST["rating"]))
	$rate=$_POST["rating"];
	if(empty($rate))
	{
		$error="Select Rate"."<br>";
		$flag=1;
	}

	//comment
	$comment=$_POST["comment"];
	if(empty($comment))
	{
		$error.="Invalid Comment!!";
		$flag=1;
	}

	// Getting member id 
	$qry="select * from member";

	$inres=mysqli_query($con,$qry);

	if(mysqli_num_rows($inres)>0)
	{
		$emailid=$userid="";
			while($row=mysqli_fetch_array($inres)) 
			{
				$userid=$row['uid'];
				$emailid=$row['email'];
				if($emailid==$_SESSION['email'])
				{
					break;
				}
			}
	}

	//update into review table
	if(isset($_POST["btnSubmit"]) && $flag==0)
	{
		$rate=$_POST["rating"];
		$comment=$_POST["comment"];
		$mid=$_GET['mid'];
		$curdate=date("yy-m-d");
		//echo "<script>alert($rate);</script>";
		// $query = "INSERT INTO review(mid,uid,rate,comment) VALUES ('$mid','$userid','$rate','$comment')";
		// $result = mysqli_query($con, $query);// or die(mysqli_error());

		// if($result==1)
		// {
		// 	echo "<script>alert('Done Well.........');</script>";
		// 	header("Location:movie.php?mid=$mid");
		// }
		// else
		// {
		// 	//echo "<script>alert('Not Done Well.........');</script>";
		// 	echo "<center><div id='errorspan'>You have alreay given your review to this movie.<br>So you can't give it again to same movie</div></center>";
		// }

		$updqry="update review set rate='$rate',comment='$comment',Cur_date='$curdate' where mid=".$_GET['mid']." and uid=".$_GET['uid'];

		$updres=mysqli_query($con,$updqry);

		if($updres==1)
		{
			header("Location:movie.php?mid=$mid");
		}
	}
}	

?>

<link rel="stylesheet" type="text/css" href="style.css">

<?php

if(isset($_SESSION['email']))
{
?>
<br>
<form method="post" enctype="multipart/form-data">

<center>
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
	<label class="lbl">
		<input type='radio' value="1" name="rating" class="radiobtn" <?php if(isset($comment) && $comment=="1") echo "checked"; ?> <?php if($selrow[2]=="1") echo "checked";?>>
			<img src="img/1.png" height="180px" width="120px" class="emoji">
	</label>
	<label class="lbl">
		<input type='radio' value="2" name="rating" class="radiobtn" <?php if(isset($comment) && $comment=="2") echo "checked"; ?> <?php if($selrow[2]=="2") echo "checked";?>>
			<img src="img/2.png" height="180px" width="120px" class="emoji">
	</label>
	<label class="lbl">
		<input type='radio' value="3" name="rating" class="radiobtn" <?php if(isset($comment) && $comment=="3") echo "checked"; ?> <?php if($selrow[2]=="3") echo "checked";?>>
			<img src="img/3.png" height="180px" width="120px" class="emoji">
	</label>
	<label class="lbl">
		<input type='radio' value="4" name="rating" class="radiobtn" <?php if(isset($comment) && $comment=="4") echo "checked"; ?> <?php if($selrow[2]=="4") echo "checked";?>>
			<img src="img/4.png" height="180px" width="120px" class="emoji">
	</label>
	<label class="lbl">
		<input type='radio' value="5" name="rating" class="radiobtn" <?php if(isset($comment) && $comment=="5") echo "checked"; ?> <?php if($selrow[2]=="5") echo "checked";?>>
			<img src="img/5.png" height="180px" width="120px" class="emoji">
	</label>
<br>
</center>
<center>
	<label id="feedback">Give your review: </label><br><br>
	<textarea rows="2" cols="50" id="area" name="comment"><?php echo $selrow[3];?></textarea>
<br><br>
	<input type="submit" name="btnSubmit" value="Update Review" class="btnSubmitclass">
</center>
</form>

<?php
}
else
{
	echo "<center><div id='errorspan'>If want to give review You first have to Log in..!!<br>You don't have the account you have to create your account first</div></center>";

	echo "<br>";

	echo "<center><a href='index.php' class='backlink'>Back</a></center>";
}
?>
