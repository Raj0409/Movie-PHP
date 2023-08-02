<link rel="stylesheet" type="text/css" href="style.css">
<body bgcolor="#333">
    
<ul class="ul-class">
  <li class="li-class"><a href="index.php" >Home</a></li>
  <li class="li-class"><a href="seeall.php" >Movies</a></li>
  <li class="li-class"><a href="contact.php" >Contact Us</a></li>
  <li class="li-class"><a href="about.php" >About Us</a></li>
  <?php 
  session_start(); 
    if(isset($_SESSION['email'])){
      echo "<li style='float:right'><a class='active'>".$_SESSION['email']."</a></li>";
      echo "<li style='float:right'><a id='a1' href='logout.php'>"."Log Out"."</a></li>";
    }
    else
    {
      echo "<li style='float:right'><a href='login.php' class='active'>"."Log in"."</a></li>";
    }
  ?>
</ul>


<!-- 
  <?php
  	if(isset($_SESSION['email']))
	{
	?>
	<li style="float:right">
  	<a href="logout.php" id="a1">
  <?php	
		echo "Logout";
	}
  ?>
 -->

<!-- 


<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>  -->