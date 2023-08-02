<?php

include("nav.php");

?>

<link rel="stylesheet" type="text/css" href="style.css">

<?php

include("db.php");

$qry="select mid, name,director,writer,production,language,release_date,runtime,genres,cast,image,m.movieID,t.movieName,t.link from movie m,trailer t where t.movieID=m.movieID and mid=".$_GET["mid"];

$res=mysqli_query($con,$qry);
if(!$res)
{
	die("Invalid query".mysqli_error($con));
}

if(mysqli_num_rows($res)==0)
{
	echo "No rows Found";
}

$avgqry="select round(avg(rate),1)as avg,mid from review group by mid";
$avgres=mysqli_query($con,$avgqry);
$rateavg=0;
$mid=$_GET["mid"];
while ($avgrow=mysqli_fetch_array($avgres))
{
	if($mid==$avgrow['mid'])
	{
		$rateavg=$avgrow['avg'];
	}
}

?>
<br>
<?php
echo "<a href='index.php' class='backlink'>Back</a>";
	while($row=mysqli_fetch_array($res))
	{
		$mid=$row[0];
		$tlink=$row[13];
	?>	
		<br>
		<div class="container">
			<img src='<?php echo $row[10];?>' height='350px' width='250px' align='left' class="img1"/>
			<h1 id='h1'><?php echo $row[1];?></h1>
			<table class="data">
				<tr>
					<td class="tdclass">Directors Name : </td>
					<td><?php echo $row[2];?></td>
				</tr>
				<tr>
					<td class="tdclass">Writer Name : </td>
					<td><?php echo $row[3];?></td>
				</tr>
				<tr>
					<td class="tdclass">Production Company : </td>
					<td><?php echo $row[4];?></td>
				</tr>
				<tr>
					<td class="tdclass">Cast : </td>
					<td><?php echo $row[9];?></td>
				</tr>
				<tr>
					<td class="tdclass">Released Date : </td>
					<td><?php echo $row[6];?></td>
				</tr>
				<tr>
					<td class="tdclass">Languages : </td>
					<td><?php echo $row[5];?></td>
				</tr>
				<tr>
					<td class="tdclass">Genres : </td>
					<td><?php echo $row[8];?></td>
				</tr>
				<tr>
					<td class="tdclass">Duration : </td>
					<td><?php echo $row[7];?></td>
				</tr>
				<tr>
					<td><img src='img/s1.png' height='40px' width='40px' style="float: right;"></td>
					<td style="color:white;"><?php if($rateavg!=NULL)echo $rateavg."/5";?></td>
				</tr>
			</table>
		</div>
	<?php
	}
?>
<br>

<center>
<iframe src="<?php echo $tlink;?>" height='400px' width='1000px' frameborder='0' allowfullscreen style='border-radius: 10px'></iframe>
</center>

<h1 id='h1'>User Reviews</h1>
<form method="post" enctype="multipart/form-data">

<?php

$qry="select m.uname,r.Cur_date,r.rate,r.comment,r.uid from review r,member m where r.uid=m.uid and r.mid=".$_GET["mid"];
$qry1="select * from member";

$inres=mysqli_query($con,$qry1);
if(isset($_SESSION['email']))
{
	if(mysqli_num_rows($inres)>0)
	{
		$emailid=$userid="";
		while($row=mysqli_fetch_array($inres)) 
		{
			$username=$row['uname'];
			$emailid=$row['email'];
			if($emailid==$_SESSION['email'])
			{
				break;
			}
		}
	}
}
$res=mysqli_query($con,$qry);
if(!$res)
{
	die("Invalid query".mysqli_error());
}

if(mysqli_num_rows($res)==0)
{
	echo "No rows Found";
}

if(isset($_POST['Update'])=='Update')
{
	echo "<script>alert('Press')</script>";
}

while($row=mysqli_fetch_array($res))
{
	$uid=$row[4];
?>
<div class="maindiv">
	<div class="imgdiv">
		<img src="img/user.png" class="imgface" height="100px" width="100px"/>
	</div>

	<div class="contentdiv">
		<p class="userNameclass"><?php echo $row[0];?></p>
		<p class="dateclass"><?php echo $row[1];?></p>
		<?php 
			if($row[2]==1)
			{
				echo "<img src='img/s1.png' height='50px' width='40px'>";		
			}
			else if($row[2]==2)
			{
				echo "<img src='img/s2.png' height='50px' width='90px'>";	
			}
			else if($row[2]==3)
			{
				echo "<img src='img/s3.png' height='50px' width='130px'>";	
			}
			else if($row[2]==4)
			{
				echo "<img src='img/s4.png' height='50px' width='170px'>";	
			}
			else if($row[2]==5)
			{
				echo "<img src='img/s5.png' height='50px' width='200px'>";	
			}
		?>
		<p><?php echo $row[3];?></p>
		<?php 
		if(isset($_SESSION['email']))
		{	
			if($username==$row[0])
			{
				?>
				<a href="updateReview.php?mid=<?php echo $mid?>&uid=<?php echo $uid?>" class="btnSubmit">Update</a>
				<?php
			}
		}	
		?>
	</div>
</div>
<br>
<hr>
<?php	
}
?>

</form>
<?php

if(isset($_SESSION['email']))
{
	if($_SESSION['email']!='admin@gmail.com')
	{
		echo "<a href='review.php?mid=$mid' class='review'>Give your Review</a>";	
	} 
}	
?>

<?php
mysqli_close($con);
?>