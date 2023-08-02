<?php
include("nav.php");
include("db.php");
?>

<?php

if(isset($_POST['btnSearch']))
{
    $movie=$_POST['search'];

    $qry="select mid from movie where name like '%".$movie."%'";

    $res=mysqli_query($con,$qry);
    if(!$res)
    {
        die("Invalid query".mysqli_error($con));
    }

    if(mysqli_num_rows($res)==0)
    {
        echo "No rows Found";
    }

    $row=mysqli_fetch_array($res);

    $mid=$row[0];

    header("location:movie.php?mid=$mid");
}

?>