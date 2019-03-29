<?php
session_start();

$c=0;
$warning=0;
$user=$_SESSION["username"];

$at=strpos($_POST["email"],"@");

$dot=strrpos($_POST["email"],".");

    if ($at==$dot)
	{	
		echo"Invalid Mail Address"."<br>"."<br>";
		$warning=1;
	}

   elseif ( $at<$dot )
	{	
		echo"Invalid Mail Address"."<br>"."<br>";
		$warning=1;
	}
   elseif ($at==0)
	{	
		echo"Invalid Mail Address"."<br>"."<br>";
		$warning=1;
	}
    if(!is_numeric($_POST["pnumb"]) && strlen($_POST["pnumb"]) < 11)
	{	
		echo"Invalid phone number "."<br>"."<br>";
		$warning=1;
	}
	

  
if($warning == 0)
{
	

	$sql = "INSERT INTO `transportation`(`trans_type`, `trans_company` , `seats` , `dept_date` , `ret_date` , `mail` , `phnumb` , `status` , `book_name` ) VALUES ('".$_POST["t_type"]."' , '".$_POST["t_company"]."' , '".$_POST["numb_s"]."' , '".$_POST["depart_date"]."','".$_POST["return_date"]."', '".$_POST["email"]."' , '".$_POST["pnumb"]."' , '"."pending"."' , '".$user."')";
	$conn = mysqli_connect("localhost", "root", "", "travel");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		echo "New Booking request has been placed successfully";
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

	
?>