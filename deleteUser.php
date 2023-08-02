<?php
include("db.php");
include("navAdmin.php")
?>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<?php

$selqry = "SELECT * FROM MEMBER";
$res = mysqli_query($con,$selqry);
?>
<center>
<table border="2" cellspacing="10px" cellpadding="10px" width="80%">
	
	<tr>
		<th>ID</th>
		<th>UserName</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>
	<?php
		while($row=mysqli_fetch_array($res))
		{
			if($row['uname']!="Admin")
			{
		?>
		<tr>
			<td><?php echo $row["uid"];?></td>
			<td><?php echo $row["uname"];?></td>
			<td><?php echo $row["email"];?></td>
			<td><a href="deleteUs.php?uid=<?php echo $row['uid'];?>" onclick="return confirm('Are you sure you want to delete?')">
			<img src="img/delete.png" height="25px" width="25px"></a></td>
		</tr>
		<?php
			}	
		}
		mysqli_close($con);
		?>
</table>

</center>

<style type="text/css">
	table{
		background: #bbbbbb;
		border-radius: 20px;
		margin-top: 30px;
		font-family: monospace;
		text-align: center;
		font-size: 15px;
	}
	td,th{
		border-radius: 15px;	
		background: #ffffff;
		border:2px solid black;
	}
	th{
		background:#808080 ;
		text-transform: uppercase;
	}
</style>