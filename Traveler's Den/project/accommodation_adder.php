<?php
session_start();

$c=0;
$warning=0;
$user=$_SESSION["username"];

//echo $user;

$at=strpos($_POST["email"],"@");

$dot=strrpos($_POST["email"],".");

    if ($at==$dot)
	{	
		echo"Invalid Mail Address"."<br>"."<br>";
		$warning=1;
	}

   elseif ( $at>$dot )
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
	

	$sql = "INSERT INTO `accommodation`(`acc_type`, `room_spec`, `acc_company`, `check_in` , `check_out` , `mail` , `phnumb`, `status`, `book_name` ) VALUES ('".$_POST["a_type"]."','".$_POST["r_spec"]."', '".$_POST["a_comp"]."', '".$_POST["c_in"]."','".$_POST["c_out"]."', '".$_POST["email"]."' , '".$_POST["pnumb"]."' , '"."pending"."' , '".$user."')";
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