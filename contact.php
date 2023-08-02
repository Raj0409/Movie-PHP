<?php 

include("nav.php");

?>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
	
	.form{
		width:340px;height:440px;
		background:#e6e6e6;
		border-radius:10px;
		margin:calc(40vh - 220px) auto;
		padding:20px 30px;
		font-family:'Montserrat',sans-serif;
		position:relative
	}

	h2{
		margin:10px 0;
		padding-bottom:10px;
		width:180px;
		color:#78788c;
		border-bottom:3px solid #78788c
	}

	input{
		width:100%;
		padding:10px;
		box-sizing:border-box;
		background:none;
		outline:none;
		resize:none;
		border:0;
		font-family:'Montserrat',sans-serif;
		transition:all .3s;
		border-bottom:2px solid #bebed2
	}
	input:focus{
		border-bottom:2px solid #78788c
	}

	p:before{
		content:attr(type);
		display:block;
		margin:28px 0 0;
		font-size:16px;
		color:#5a5a5a;
		font-weight: bolder;
	}

	button{
		float:right;
		padding:10px 16px;
		margin:8px 0 0;
		font-family:'Montserrat',sans-serif;
		border:2px solid #78788c;
		background:0;
		color:#5a5a6e;
		cursor:pointer;
		transition:all .3s;
		border-radius: 10px;
		outline: none;
	}

	button:hover{
		background:#78788c;
		color:#fff;
		outline: none;
	}
	
	.contact{
		/*content:'Hi';*/
		position:absolute;
		bottom:20px;
		right:-20px;
		background:#50505a;
		color:#fff;
		width:320px;
		padding:16px 4px 16px 0;
		border-radius:8px;
		font-size:15px;
		box-shadow:0px 20px 30px -5px #000
	}

	span{
		margin:0 5px 0 15px
	}
</style>

<?php
$msg="";
$idclass="";
if(isset($_GET["error"]))
{
	$msg="Please fill in the blanks!!";
	echo "<center><div id='errorSpan'>".$msg."</div></center>";
}

if(isset($_GET["success"]))
{
	$msg="Your Message Has been sent";
	echo "<center><div id='successSpan'>".$msg.'</div></center>';
}

?>

<form class="form" method="post" action="process.php">

  <h2>CONTACT US</h2>
  <p type="User Name:"><input name="Uname" placeholder="Write your name here.."></input></p>
  <p type="Email:"><input name="email" placeholder="Let us know how to contact you back.."></input></p>
  <p type="Message:"><input name="msg" placeholder="What would you like to tell us.."></input></p>
  <button name='btn-send-message'>Send Message</button>
  <div class="contact">
    <span></span>9898980000
    <span></span> contactus@gmail.com
  </div>
</form>

