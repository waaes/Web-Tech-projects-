<?php
//include('dbconnect.php'); 
require_once('dbh.php');
$conn=mysqli_connect("localhost","root","","travel");
$delIdNo = $_GET['deleteid'];


	$sql="DELETE FROM event WHERE eventid='$delIdNo' ";
	//$query=mysql_query($sql);
	$query=mysqli_query($conn, $sql);
	if($query)
	{
		//echo "Deleted";
		header('Refresh:0; portfolio_events.php');
	}else{
		echo " :( ";
	}

//}
?>