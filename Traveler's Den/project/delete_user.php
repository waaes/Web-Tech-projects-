<?php
include('dbh.php');
//$error="";
if(isset($_GET['deleted']))
{

	$sql="DELETE FROM users WHERE mindex='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		echo "Deleted";
		header('Refresh:0; show_users.php');
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
		$sql="UPDATE users SET status='$conf' WHERE mindex='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; show_users.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['stall']))
{
	//echo "Clicked";
	$pend="pending";
	

		$sql="UPDATE users SET status='$pend' WHERE mindex='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; show_users.php');
		}else{
			echo " :( ";
		}
	

}
if(isset($_GET['cancel']))
{
	//echo "Clicked";
	$canc="canceled";
	

		$sql="UPDATE users SET status='$canc' WHERE mindex='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; show_users.php');
		}else{
			echo " :( ";
		}
	

}
?>