<?php
session_start();
//if(isset($_SESSION["flag"]) && $_SESSION["flag"]=="success"){
	
//}
//else{
	//header("Location:login.php");
//}
$user=$_SESSION["username"];
$index=$_SESSION["memberIndex"];

$file=fopen('events.txt','a') or die("fle open error");

//print_r($_REQUEST);
$c=0;
$warning=0;

    if(!is_numeric($_POST["t_cost"]))
	{	
		echo"Invalid amount "."<br>"."<br>";
		$warning=1;
	}
	  if(!is_numeric($_POST["a_cost"]))
	{	
		echo"Invalid amount "."<br>"."<br>";
		$warning=1;
	}
	 if(!is_numeric($_POST["f_cost"]))
	{	
		echo"Invalid amount "."<br>"."<br>";
		$warning=1;
	}
	 if(!is_numeric($_POST["m_cost"]))
	{	
		echo"Invalid amount "."<br>"."<br>";
		$warning=1;
	}
  if(!is_numeric($_POST["bnumb"])&&strlen($_POST["bnumb"]!=11))
	{	
		echo"Invalid bkash number "."<br>"."<br>";
		$warning=1;
	}

if($warning == 0)
{
	
	$sql = "INSERT INTO `event`(`destination`, `dep_date`, `ret_date`, `transport_cost` , `accommodation_cost` , `food_cost`, `mis_cost` , `total_cost`, `bkash_numb` , `atid` , `atname` ) VALUES ('".$_POST["place"]."','".$_POST["dept_date"]."', '".$_POST["re_date"]."', '".$_POST["t_cost"]."','".$_POST["a_cost"]."', '".$_POST["f_cost"]."' , '".$_POST["m_cost"]."' , '".$_POST["tot_cost"]."' , '".$_POST["bnumb"]."' , '"."$index"."' , '"."$user"."')";
	$conn = mysqli_connect("localhost", "root", "", "travel");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$query=mysqli_query($conn, $sql);
	
	
	if($query)
                {
                    //echo "<br>Added";
                    //mysql_close($conn);
                            $sql="SELECT * FROM event";
                            //$query=mysql_query($sql);
                            $query=mysqli_query($conn, $sql);
                            $row="";                           
                            if(mysqli_num_rows($query)>0)
                            {
                                //while($row=mysql_fetch_object($query))
                                while($row=mysqli_fetch_object($query))
                                {      
                                    $evID = $row->eventid;
                                }
                            }
	                    //------------UPLOAD MULTIPLE PHOTO-------------//
                    
                    //Creating Custom Path according to Username & advertiseID
                    $dir = "uploadAlbum\\Den_Admins\\";
                    $addPath = $dir . "$user\\" . "$evID";
                    $addDir = $dir . "$user\\"."$evID\\";
                    $picName = "$user"."$evID";
                    $tempName = "$user"."$evID";
                    
                    echo $addDir;
                    //Create PARTICULAR Directory if not Exist!
                    if (!file_exists("$addPath")) {
                        mkdir("$addPath", 0777, true);
                    }
                        //Check if Selected Photo is More than One! 
                        if(count($_FILES['upload']['name']) > 0){
                        //Loop through each file
                        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
                            
                          //Get the temp file path
                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                            //Make sure we have a filepath
                            if($tmpFilePath != ""){

                                //save the filename
                                $shortname = $_FILES['upload']['name'][$i];

                                //save the url and the file
                                $filePath = "$addDir".$_FILES['upload']['name'][$i];
                                // Verify file extension
                                $ext = pathinfo($filePath, PATHINFO_EXTENSION);

                                //Upload the file into the temp dir
                                if(move_uploaded_file($tmpFilePath, $filePath)) {

                                    $files[] = $shortname;
                                    rename("$filePath", "$addDir"."$picName"."$i"."."."$ext");
                                    
                                    //insert into db 
                                    //use $shortname for the filename
                                    //use $filePath for the relative url to the file

                                }
                              }
                        }
                    }
                    
                    $status = "Updated";

                    //show success message
                    echo "<h1>Uploaded:</h1>";    
                    if(is_array($files)){
						echo "Event Added Successfully";
						
                        echo "<ul>";
                        foreach($files as $file){
                            echo "<li>$file</li>";
                        }
                        echo "</ul>";
                    }
                    //header('Refresh:0; home.php');
                }else{
                    //echo "<br> Couldn't add! :( ";
                    $status = "ErrorUP";
                }
	
}

else{
	echo " something is worng";
}
?>