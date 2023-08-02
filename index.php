<?php
include("nav.php");
?>

<link rel="stylesheet" type="text/css" href="style.css">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
var cnt=0;
var dt=Array("mi.jpg","ff8.jpg","jl.jpg","avengers.jpg");
window.setInterval("show()",2000);
function show()
{
	document.getElementById("image").src="img/" + dt[cnt];
	cnt++;
	if(cnt==4)
	{
		cnt=0;
	}
}
	
</script>
<!-- ========================================================== -->

<body bgcolor="#333">
<!-- Navigation Bar -->
<!-- <ul class="ul-class">
  <li class="li-class"><a href="#home">Home</a></li>
  <li class="li-class"><a href="#movies">Movies</a></li>
  <li class="li-class"><a href="#contact">Contact</a></li>
  <li style="float:right"><a class="active" href="login.php">Log In</a></li>
</ul> 
 -->
<!-- Search bar -->
<?php

include("db.php");
	$term="";
	if(isset($_GET["txtpname"]))
	{
	$term=$_GET["txtpname"];
	}
	 $query=mysqli_query($con,"SELECT * FROM movie where name like '%".$term."%' order by name");
	 $json=array();

	while($data=mysqli_fetch_array($query))
	{
	    $json[]=$data["name"];
	}

	$j=json_encode($json);
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#searchMovie").autocomplete({
            source:<?php echo $j;?>,
            minLength:1
        });
    });
</script>

<form class="form-search" method="post" action="search.php">
	  	<input type="text" placeholder="Search for movies..." name="search" class="search" id="searchMovie" style="outline: none;">
	  	<button type="submit" id='click' name="btnSearch" style="outline: none;">Search</button>
</form>

<!-- Slideshow container -->
<!-- ==================== -->
<center>
<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="img/avengers.jpg" style="width:95%;height:400px;" id="image">
  </div>
</div>
</center>

<br><br>

<!-- ------ See All ------- -->
<!-- ====================== -->
<a href="seeall.php" id="sall"><img src="img/viewall.webp" height="80px" width="200px"></a>


<!-- thumbnail of movie -->
<center>

<?php

include("db.php");

$qry="select * from movie limit 4";

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

<?php
	while($row=mysqli_fetch_array($res))
	{
	?>	
		<?php echo "<a href='movie.php?mid=$row[0]'><img src='$row[10]' height='350px' width='250px' class='thumbnail zoom'/></a>&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
	<?php	
	}
	mysqli_close($con);
	?> 
</center>

</body>