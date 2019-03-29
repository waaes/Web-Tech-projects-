<?php
include('dbh.php');
//$error="";
if(isset($_GET['deleted']))
{

	$sql="DELETE FROM accommodation WHERE accid='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; traveler_accommodation_book.php');
	}else{
		echo " :( ";
	}

}

?>