<?php

include("db.php");
include("navAdmin.php");

$errMovie=$errDir=$errWri=$errPro=$errLan=$errRun=$errGen=$errCast=$errDate=$errPic=$errTrailer="";
$Movie=$Dir=$Wri=$Pro=$Lan=$Run=$Gen=$Cast=$Date=$Pic="";
$flag=0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	//movie name
	$Movie=$_POST["txtmname"];
	if(empty($Movie))
	{
		$errMovie="Invalid Name of Movie!!";
		$flag=1;
	}

	//director name
	$Dir=$_POST["txtdir"];
	if(empty($Dir))
	{
		$errDir="Invalid Name of Director!!";
		$flag=1;
	}

	//writer name
	$Wri=$_POST["txtwri"];
	if(empty($Wri))
	{
		$errWri="Invalid Name of Writer!!";
		$flag=1;
	}

	//production company
	$Pro=$_POST["txtpro"];
	if(empty($Pro))
	{
		$errPro="Invalid Name of Production Company!!";
		$flag=1;
	}

	//Language Checkbox
	if(!isset($_POST["lan"]))
	{
		$errLan="Select Language of Movie!!";
		$flag=1;
	}

	//runtime
	$Run=$_POST["txtrun"];
	if(empty($Run))
	{
		$errRun="Invalid Runtime of Movie!!";
		$flag=1;
	}

	//genres Checkbox
	if(!isset($_POST["genres"]))
	{
		$errGen="Select Genres of Movie!!";
		$flag=1;
	}

	//cast
	$Cast=$_POST["txtcast"];
	if(empty($Cast))
	{
		$errCast="Invalid Name of Cast!!";
		$flag=1;
	}

	// //date
	// $date = $_POST['txtdate'];
	// if($date=="")
	// {
	// 	$errDate = "Select Release Date!!";
	// 	$flag=1;
	// }

	// //trailer
	// if(!isset($_POST['trailer']))
	// {
	// 	$errTrailer="Select Trailer of Movie!!";
	// 	$flag=1;
	// }

	// //movie poster
	// if(empty($_FILES['uplaod_file']['tmp_name']))
	// {
	// 	$errPic = "Select Image Of Movie!!";
	// 	$flag=1;
	// }


	if(isset($_POST["btnInsert"])=="Insert" && $flag==0)
	{
		$Movie=$_POST["txtmname"];
		$Dir=$_POST["txtdir"];
		$Wri=$_POST["txtwri"];
		$Pro=$_POST["txtpro"];
		$Lan=implode(',', $_POST['lan']);
		$Gen=implode(',', $_POST['genres']);
		$Run=$_POST["txtrun"];
		$Cast=$_POST["txtcast"];
		$Date=$_POST["txtdate"];
		$tid=$_POST["tCombo"];
		
		if(isset($_FILES['upload_file']))
		{
			$filetmp_path=$_FILES['upload_file']['tmp_name'];
			$dest_path="uploads/".$_FILES['upload_file']['name'];

			if(move_uploaded_file($filetmp_path, $dest_path))
			{
				echo "File uploaded successfully";
			}
			else
			{
				echo "Upload failed";
			}

			$query = "INSERT INTO movie(mid,name,director,writer,production,language,release_date,runtime,genres,cast,image,movieID) VALUES (NULL,'$Movie','$Dir','$Wri','$Pro','$Lan','$Date','$Run','$Gen','$Cast','$dest_path',$tid)";
			$result = mysqli_query($con, $query) ;

			if($result==1)
			{
				header("Location:adminMain.php");
				//echo "<script>alert('Done Well.........');</script>";
			}
			else
			{
				echo "<script>alert('Not Done Well.........');</script>";
				//header("Location:p1.php");
			}
		}
	}
}
?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<br>
<div class="insert">
<table class="insert">
<form method="post" enctype="multipart/form-data">

  		<tr>
  			<td><label>Movie Name : </label></td>
	  		<td><input type="text" name="txtmname"></td>
	  		<td><?php 
				if(strlen($errMovie)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errMovie;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Directors Name : </label></td>
	  		<td><input type="text" name="txtdir"></td>
	  		<td><?php 
				if(strlen($errDir)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errDir;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Writer Name : </label></td>
	  		<td><input type="text" name="txtwri"></td>
	  		<td><?php 
				if(strlen($errWri)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errWri;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Production Company : </label></td>
	  		<td><input type="text" name="txtpro"></td>
	  		<td><?php 
				if(strlen($errPro)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errPro;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Language : </label></td>
	  		<td class="checkbox">
	  			<input type="checkbox" name="lan[]" value="Spanish" <?php if(isset($_POST["lan"][0])) echo "checked"; ?>>Spanish
	  			<input type="checkbox" name="lan[]" value="English" <?php if(isset($_POST["lan"][1])) echo "checked"; ?>>English
	  			<input type="checkbox" name="lan[]" value="Hindi" <?php if(isset($_POST["lan"][2])) echo "checked"; ?>>Hindi
	  			<input type="checkbox" name="lan[]" value="Japanese" <?php if(isset($_POST["lan"][3])) echo "checked"; ?>>Japanese
	  			<input type="checkbox" name="lan[]" value="Marathi" <?php if(isset($_POST["lan"][4])) echo "checked"; ?>>Marathi
	  			<br>
	  			<input type="checkbox" name="lan[]" value="Telugu" <?php if(isset($_POST["lan"][5])) echo "checked"; ?>>Telugu
	  			<input type="checkbox" name="lan[]" value="Tamil" <?php if(isset($_POST["lan"][6])) echo "checked"; ?>>Tamil
	  			<input type="checkbox" name="lan[]" value="German" <?php if(isset($_POST["lan"][7])) echo "checked"; ?>>German
	  			<input type="checkbox" name="lan[]" value="Gujarati" <?php if(isset($_POST["lan"][8])) echo "checked"; ?>>Gujarati
	  			<input type="checkbox" name="lan[]" value="French" <?php if(isset($_POST["lan"][9])) echo "checked"; ?>>French
	  		</td>
			<td><?php 
				if(strlen($errLan)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errLan;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Runtime : </label></td>
	  		<td><input type="text" name="txtrun"></td>
	  		<td><?php 
				if(strlen($errRun)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errRun;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Genres : </label></td>
	  		<td class="checkbox">
	  			<input type="checkbox" name="genres[]" value="Action" <?php if(isset($_POST["genres"][0])) echo "checked"; ?>>Action
	  			<input type="checkbox" name="genres[]" value="Adventure" <?php if(isset($_POST["genres"][1])) echo "checked"; ?>>Adventure
	  			<input type="checkbox" name="genres[]" value="Anime" <?php if(isset($_POST["genres"][2])) echo "checked"; ?>>Anime
	  			<input type="checkbox" name="genres[]" value="Comedy" <?php if(isset($_POST["genres"][3])) echo "checked"; ?>>Comedy
	  			<input type="checkbox" name="genres[]" value="Crime" <?php if(isset($_POST["genres"][4])) echo "checked"; ?>>Crime
	  			<input type="checkbox" name="genres[]" value="Drama" <?php if(isset($_POST["genres"][5])) echo "checked"; ?>>Drama<br>
	  			<input type="checkbox" name="genres[]" value="Fantasy" <?php if(isset($_POST["genres"][6])) echo "checked"; ?>>Fantasy
	  			<input type="checkbox" name="genres[]" value="Horror" <?php if(isset($_POST["genres"][7])) echo "checked"; ?>>Horror
	  			<input type="checkbox" name="genres[]" value="Mystery" <?php if(isset($_POST["genres"][8])) echo "checked"; ?>>Mystery
	  			<input type="checkbox" name="genres[]" value="Romance" <?php if(isset($_POST["genres"][9])) echo "checked"; ?>>Romance
	  			<input type="checkbox" name="genres[]" value="Sci-Fi" <?php if(isset($_POST["genres"][10])) echo "checked"; ?>>Sci-Fi
	  		</td>
	   		<td><?php 
				if(strlen($errGen)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errGen;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Cast : </label></td>
	  		<td><input type="text" name="txtcast"></td>
	   		<td><?php 
				if(strlen($errCast)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errCast;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Release Date : </label></td>
	  		<td><input type="date" name="txtdate" class="date"/></td>
	   		<td><?php 
				if(strlen($errDate)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errDate;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td><label>Picture : </label></td>
	  		<td>
				  <input type="file" name="upload_file"/>
			</td>
	  		<td><?php 
				if(strlen($errPic)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errPic;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td>Trailer : </td>
			<td>
				<select name="tCombo" style="padding: 8px;border-radius: 50px;">
					<option selected="" disabled="">-- Select Movie Name --</option>
				<?php 
					$tqry="select movieID,movieName from trailer";
					$tres=mysqli_query($con,$tqry);

					while($trow=mysqli_fetch_array($tres))
					{
					?>
					<option value="<?php echo $trow['movieID'];?>">
						<?php echo $trow['movieName'];?>
					</option>	
					<?php	
					}
				?>		
				</select>
			</td>
			<td><?php 
				if(strlen($errTrailer)>4)
				{
				?>
				<div id="errorSpan">
					<?php echo $errTrailer;?>
				</div>
				<?php	
				}
				?>
			</td>
	  	</tr>
	  	<tr>
	  		<td></td>
	  		<td><input type="submit" name="btnInsert" value="Insert" class="btn">
				<!-- <input type="reset" name="btnReset" value="Reset" class="btn" style="float: right"> -->
	  		</td>  		
	  	</tr>
</form>
</table>
</div>
