<?php

include("nav.php");

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
	die("Invalid query".mysqli_error());
}

if(mysqli_num_rows($res)==0)
{
	echo "No rows Found";
}
?>

<style type="text/css">
	
.sibling-fade { visibility: hidden; }
/* Prevents :hover from triggering in the gaps between items */

.sibling-fade > * { visibility: visible; }
/* Brings the child items back in, even though the parent is `hidden` */

.sibling-fade > * { transition: opacity 150ms linear 100ms, transform 150ms ease-in-out 100ms; }
/* Makes the fades smooth with a slight delay to prevent jumps as the mouse moves between items */

.sibling-fade:hover > * { opacity: 0.5; }
/* Fade out all items when the parent is hovered */

.sibling-fade > *:hover { opacity: 1; transition-delay: 0ms, 0ms; }
/* Fade in the currently hovered item */
</style>
<div class='sibling-fade'>
<?php
	while($row=mysqli_fetch_array($res))
	{
	?>	
		<?php echo "<a href='movie.php?mid=$row[0]'><img src='$row[10]' height='350px' width='250px' class='thumbnail' id='round'/></a>&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
	<?php	
	}
	mysqli_close($con);
	?> 	
</div>	
</center>