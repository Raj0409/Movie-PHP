<?php

include("db.php");
include("nav.php");

?>

<center>
<h1 id="h1">Movie Review Website</h1>
</center>

<p style="color: white;font-family: Lucida Sans;text-shadow: 2px 2px 3px skyblue">
The Online Movie Review System provides reviews and ratings to any movie and suggest movie to the user. This system generates a common review related to a movie.Here analysis of comments given by various users will be done and a common review will be generated. This generated review will be a simple English statement and will help user to take a correct decision while selecting any movie.
</p>

<p style="color: white;font-family: Lucida Sans;text-shadow: 2px 2px 3px magenta">
There are 3 tables use in this website.<br><br>

	1.Member : uid (primary key),email,uname,password <br><br>
	2.Movie : mid (primary key),name,director,writer,production,language,release_date,runtime,genres,cast,image,movieID (foreign key from trailer table movieID)<br><br>
	3.Review : mid (composite primary key and foreign key from movie mid),uid (composite primary key and foreign key from movie member),rate,comment<br><br>
	4.Trailer : movieID (primary key),movieName,link
</p>

