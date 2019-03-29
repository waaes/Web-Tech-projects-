<?php
include('dbh.php'); //DB connection & events DB Table creation!
        $conn=mysqli_connect("localhost","root","","travel");

        
        session_start();

        
        //Store User Informaton if Logged in!
        if (!isset($_SESSION['username'])) {
            
        }else{
            $username = $_SESSION['username'];
            $userId = $_SESSION["memberIndex"];
			$type=$_SESSION["userType"];
			$tourDest= $_SESSION["eventDestination"];
			$memberMAdd= $_SESSION["memberMail"];
	        $memberCont= $_SESSION["memberContact"];
			$eveid = $_SESSION["eventId"];
        }
		
  

	

	$sql = "INSERT INTO `tours`(`eventid`, `tourdest`, `t_user_name`, `t_mail_add` , `t_contact` , `mindex` ) VALUES ('"."$eveid"."','"."$tourDest"."', '"."$username"."', '"."$memberMAdd"."','"."$memberCont"."' , '"."$userId"."')";
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		echo "You Have Been Enrolled With The Event successfully";
		
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	
?>