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
		header('Refresh:0; ad_accommodation_view.php');
	}else{
		echo " :( ";
	}

}

if(isset($_GET['deleted1']))
{

	$sql="DELETE FROM accommodation WHERE accid='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; ad_accom_book.php');
	}else{
		echo " :( ";
	}

}
if(isset($_GET['confirmed']))
{
	//echo "Clicked";
	$conf="confirm";
	
		$sql="UPDATE accommodation SET status='$conf' WHERE accid='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_accommodation_view.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['stall']))
{
	//echo "Clicked";
	$pend="pending";
	

		$sql="UPDATE accommodation SET status='$pend' WHERE accid='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_accommodation_view.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['cancel']))
{
	//echo "Clicked";
	$canc="canceled";
	

		$sql="UPDATE accommodation SET status='$canc' WHERE accid='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_accommodation_view.php');
		}else{
			echo " :( ";
		}
	

}
?>