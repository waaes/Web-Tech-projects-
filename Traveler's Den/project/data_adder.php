<?php
//$file=fopen('regdata.txt','a') or die("fle open error");

//print_r($_REQUEST);
$c=0;
$warning=0;


$at=strpos($_POST["email"],"@");

$dot=strrpos($_POST["email"],".");

if($_POST["psw"] == $_POST["cpsw"] )
{
     if (is_numeric($_POST["fname"]))
	{	
		echo"Invalid First Name"."<br>"."<br>";
		$warning=1;
	}
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
    if(!is_numeric($_POST["mobile"]) && strlen($_POST["mobile"]) < 11)
	{	
		echo"Invalid phone number "."<br>"."<br>";
		$warning=1;
	}
	

  
if($warning == 0)
{
	
	/*$c=fwrite($file,"\r\n");
	$c+=fwrite($file,$_POST["fname"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["lname"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["uname"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["dob"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["email"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["mobile"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["psw"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,$_POST["cpsw"]);
	$c+=fwrite($file," ");
	$c+=fwrite($file,"member");*/
	$sql = "INSERT INTO `users`(`fsname`, `ltname`, `uname`, `dob` , `mail` , `phnumb` , `password`, `cpassword` , `mtype` , `status` ) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."', '".$_POST["uname"]."', '".$_POST["dob"]."','".$_POST["email"]."', '".$_POST["mobile"]."' , '".$_POST["psw"]."' , '".$_POST["cpsw"]."' , '"."member"."' , '"."pending"."')";
	$conn = mysqli_connect("localhost", "root", "", "travel");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		echo "New records added successfully";
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

	
	//echo " Member data added to server";
}

else{
	echo " password and confirmpassword doesn't match";
}
?>