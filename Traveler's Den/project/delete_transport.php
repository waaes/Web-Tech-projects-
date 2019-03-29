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
		header('Refresh:0; ad_transport_view.php');
	}else{
		echo " :( ";
	}

}

if(isset($_GET['deleted1']))
{

	$sql="DELETE FROM transportation WHERE trans_id='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; ad_trans_book.php');
	}else{
		echo " :( ";
	}

} 

if(isset($_GET['confirmed']))
{
	//echo "Clicked";
	$conf="confirm";
	

	//if($_POST['textid']=="0")
	//{
		$sql="UPDATE transportation SET status='$conf' WHERE trans_id='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_transport_view.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['stall']))
{
	//echo "Clicked";
	$pend="pending";
	

		$sql="UPDATE transportation SET status='$pend' WHERE trans_id='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_transport_view.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['cancel']))
{
	//echo "Clicked";
	$canc="canceled";
	

		$sql="UPDATE transportation SET status='$canc' WHERE trans_id='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_transport_view.php');
		}else{
			echo " :( ";
		}
	

}
?>