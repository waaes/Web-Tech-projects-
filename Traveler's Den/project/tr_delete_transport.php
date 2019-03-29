<?php
include('dbh.php');
//$error="";
if(isset($_GET['deleted']))
{

	$sql="DELETE FROM transportation WHERE trans_id='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; traveler_transport_book.php');
	}else{
		echo " :( ";
	}

}

?>