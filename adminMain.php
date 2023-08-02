<?php

include("navAdmin.php");

?>

<link rel="stylesheet" type="text/css" href="style.css">


<br>
<center>
<?php

include("db.php");

$qry="select * from movie";

$res=mysqli_query($con,$qry);
if(!$res)
{
	die("Invalid query".mysqli_error($con));
}

if(mysqli_num_rows($res)==0)
{
	echo "No rows Found";
}

$avgqry="select round(avg(rate),1)as avg from review group by mid";
$avgres=mysqli_query($con,$avgqry);
while ($avgrow=mysqli_fetch_array($avgres))
{
	$arr[]=$avgrow['avg'];
}
$count=0;
?>

<?php
	$count=0;
	while($row=mysqli_fetch_array($res))
	{
		$mid=$row[0];
		// echo "<div style='display:flex'>
		// 		<img src='$row[10]' height='350px' width='250px' class='thumbnail'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		// 		<div id='h1' style='font-size:30px'>$row[1]<br><br>
		// 		<img src='img/s1.png' height='40px' width='40px' style='float:left'>
		// 		<div style='display:flex;padding:4px'>$arr[$count]</div><br>
		// 		<a href='#' class='btnSubmit' style='float:left'>Edit Movie</a>
		// 		</div>
		// 		</div> &nbsp;&nbsp;&nbsp;&nbsp;";	

		echo "<div style='display:flex'>
				<img src='$row[10]' height='350px' width='250px' class='thumbnail'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div id='h1' style='font-size:30px'>$row[1]<br><br>";
		
		if($count<=count($arr)-1)
		{
		echo "<img src='img/s1.png' height='40px' width='40px' style='float:left'>
				<div style='display:flex;padding:4px'>$arr[$count]</div><br>";	
		}
		?>

			<a href='updateMovie.php?mid=<?php echo $mid;?>' class='btnSubmit' style='float:left'>Edit Movie</a>
			</div>
			</div> &nbsp;&nbsp;&nbsp;&nbsp;
		<?php		
		$count++;		
	}

?> 

</center>

<?php

mysqli_close($con);

?>