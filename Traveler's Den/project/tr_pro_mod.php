<?php
session_start();
if(isset($_SESSION["flag"]) && $_SESSION["flag"]=="success"){
	
}
else{
	header("Location:login.php");
}
include('dbh.php');

if (!isset($_SESSION['username'])) {
            
        }else{
            $username = $_SESSION['username'];
            $userId = $_SESSION["memberIndex"];
			$type=$_SESSION["userType"];
        }

if(isset($_POST['btn']))
{
	$tmp=$_FILES['fileToUpload']['tmp_name'];
    $name=$_FILES['fileToUpload']['name'];
    //echo time();
    $ext=getExt($name);
    $target="uploads/".time().".".$ext;
		
	if($ext!="jpg"){
	echo "Invalid file type";
     }
else if(file_exists($target)){
	echo "File already exists";
     }
	else{
		
	//echo "Clicked";
	$fs_name=$_POST['fn'];
	$lt_name=$_POST['ln'];
	$us_name=$_POST['un'];
	$d_ofb=$_POST['date_ob'];
	$email_add=$_POST['ed'];
	$cont_numb=$_POST['pnumb'];
	$passw=$_POST['psw'];
	$cpassw=$_POST['cpsw'];
	
        $t= move_uploaded_file($tmp,$target);
		$sql="UPDATE users SET fsname='$fs_name' , ltname='$lt_name', uname='$us_name', dob='$d_ofb' , mail='$email_add' , phnumb='$cont_numb' , pro_photo='$target' , password='$passw' , cpassword='$cpassw' WHERE mindex='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; tprofile.php');
		}else{
			echo " :( ";
		}
	}

}

if(isset($_GET['edited']))
{
$sql="SELECT * FROM users where mindex='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($query);
	$f_name=$row->fsname;
	$l_name=$row->ltname;
	$u_name=$row->uname;
	$d_ob=$row->dob;
	$mail_add=$row->mail;
	$contact=$row->phnumb;
}




?>

<html>
<head>
<title>Traveler Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

#head{
  list-style-type: none;
  margin: 0;
  padding: 5px;
  overflow: hidden;
  background-color: #000000;
}

#a1,#a2,#a3,#a4,#a5,#a6,#a7,#a8 a{
  float: left;
}

#a1 a,#a2 a,#a3 a,#a4 a,#a5 a,#a6 a,#a7 a,#a8 a{
  display: block;
  color: white;
  text-align: right;
  padding: 20px;
  text-decoration: none;
}

#a1:hover ,#a2:hover ,#a3:hover ,#a4:hover ,#a5:hover ,#a6:hover ,#a7:hover ,#a8:hover{
  background-color: #111111;
}


/* Style the header 
header {
    width: 100%;
    height: 30px;
    background-color: #876;
    padding: 15px;
    text-align: left-top;
    font-size: 15px;
    color: white;
}*/

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 15%;
    height: 640px; /* only for demonstration, should be removed */
    background: #ccc;
    padding: 20px;
}

/* Style the list inside the menu */
ul1,ul2,ul3,ul4 {
	font-size: 13;
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 85%;
    background-color: #f1f1f1;
    height: 640px; /* only for demonstration, should be removed */
}
table{
	width:1100px;
	border: 1px solid black;
	padding:15px
}
td{
	text-align:left;
	font-size:17px;
	padding:15px
	
}
tr{
	
}
/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 15px;    
    border: none;
    outline: none;
    color: white;
    padding: 12px 14px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

 .dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 10px 11px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>
<body>

<form action="" enctype="multipart/form-data" method="post">
<header>
</header>
<ul id="head">
  <li id="a1"><a  href="index.php">Home</a></li>
  <li id="a2"><a  href="service.html">Services</a></li>
  <li id="a3"><a  href="contact.php">Contact</a></li>
  <li id="a4" ><a href="about.html">About</a></li>
  <li id="a4" ><a href="portfolio_events.php">Recent Events</a></li>
  <?php
                      if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="admin") 
						{
                    ?>
			<li id="a5" style="float:right;">
              <a href="logout.php">Logout</a>
            </li>
            <li id="a6" style="float:right;">
              <a href="admin_pro.php"><?php echo $username; ?></a>
            </li>
            <?php
                            
                    }
				else if (isset($_SESSION['username']) && isset($_SESSION["userType"]) && $_SESSION["userType"]=="member") 
						{
                    ?>
		    <li id="a7" style="float:right;">
              <a href="logout.php">Logout</a>
            </li>
            <li id="a8" style="float:right;">
              <a href="tprofile.php"><?php echo $username; ?></a>
            </li>
           
            <?php
                            
                    }
                            
                        else{
                    ?> 
            <li id="a9" style="float:right;">
              <a href="login.php">Login/Register</a>
            </li>
            <?php
                          
                        }
                    ?>   
</ul>


<section>
  <nav>
  <h3>Account</h3><hr>
    <ul id="ul1">
      <li><a  href="tprofile.php" style="text-decoration:none">Dashboard</a></li>
      <li><a  href="index.php" style="text-decoration:none">Home</a></li>
      <li><a  href="tprofile.php" target="_top" style="text-decoration:none">View Profile</a></li>
      
    </ul>
	<h3>Events</h3><hr>
	<ul id="ul2">
		 <li><a href="#" style="text-decoration:none">My Events</a></li>	
	</ul>	 
	
<h3>Bookings</h3><hr>
  <div class="dropdown">
	<ul id="ul3">
<li>
	<button class="dropbtn">
    	<a href="" style="text-decoration:none">Accomodation Booking</a>
	</button>
    <div class="dropdown-content">
      <a href="acc_booking.html" target="_blank">Book An Accommodation</a>
      <a href="traveler_accommodation_book.php" target="_top">My Bookings</a>
    </div>
	</div>
</li>

<div class="dropdown">		
		<ul id="ul4">
		<li>	  
    <button class="dropbtn">
	    <a href="" style="text-decoration:none">Transportations Booking</a> 
    
    </button>
    <div class="dropdown-content">
      <a href="trans_booking.php" target="_blank">Book A Transport</a>
      <a href="traveler_transport_book.php" target="_top">My Bookings</a>
    </div>
  </div> </li>
		 	
	</ul>		
  </nav>
  
  <article>
     <!--Admin edit profile. -->
    <table style="visibility:visible">
			<tr>
				<td  style="text-align:center; padding:20px" style="color:red"><b>Edit Profile</b></td>
				
			</tr>
			<tr>
				<td>First Name:<pre style="display:inline">		 </pre><input size="50" type="text" name="fn" value="<?php echo $f_name; ?>" ></td>		
			</tr>
			<tr>
				<td >Last Name:<pre style="display:inline">		</pre> <input size="50" type="text" name="ln" value="<?php echo $l_name; ?>" ></td>
			</tr>
			<tr>
				<td>User Name:<pre style="display:inline">		</pre> <input size="50" type="text" name="un" value="<?php echo $u_name; ?>" ></td>
			</tr>
			<tr>
				<td>Date of Birth:<pre style="display:inline">		</pre> <input size="50" type="date" name="date_ob" value="<?php echo $d_ob; ?>" ></td>
			</tr>
			<tr>
				<td>Email Address:<pre style="display:inline">		</pre> <input size="50" type="text" name="ed" value="<?php echo $mail_add; ?>" ></td>
			</tr>
			<tr>
				<td>Phone Number:<pre style="display:inline">           </pre> <input size="50" type="text" name="pnumb" value="<?php echo $contact; ?>" ></td>
			</tr>
			<tr>
				<td>Profile Picture:<pre style="display:inline">            </pre> <input size="50" type="file" name="fileToUpload" value=""></td>
			</tr>
			<tr>
				<td>Password:<pre style="display:inline">		</pre> <input size="50" type="password" name="psw" required></br></td>
			</tr>
			<tr>
				<td>ReEnter Password:<pre style="display:inline">        </pre> <input size="50" type="password" name="cpsw" required></br></td>
			</tr>
			<tr style="padding:20px">
			    <td style="padding:20px"><input type="reset" value="Reset" name="ret" style="align:right"><pre style="display:inline">   </pre><input type="submit" value="Submit" name="btn" style="align:right"></td>
			</tr>
	</table>
  </article>
</section>
</form>
</body>
</html>