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
	//echo "Clicked";
	$tran_type=$_POST['t_type'];
	$tran_company=$_POST['t_company'];
	$numb_seats=$_POST['numb_s'];
	$dep_d=$_POST['dep_date'];
	$ret_d=$_POST['re_date'];
	$email_add=$_POST['mail_ad'];
	$cont_numb=$_POST['phone_numb'];

		$sql="UPDATE transportation SET trans_type='$tran_type' , trans_company='$tran_company' , seats='$numb_seats' , dept_date='$dep_d', ret_date='$ret_d' , mail='$email_add' , phnumb='$cont_numb' WHERE trans_id='{$_GET['id']}' ";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "Updated";
			header('Refresh:0; ad_trans_book.php');
		}else{
			echo " :( ";
		}

}

if(isset($_GET['edited']))
{
$sql="SELECT * FROM transportation where trans_id='{$_GET['id']}' ";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($query);
	$tr_type=$row->trans_type;
	$tr_company=$row->trans_company;
	$nseats=$row->seats;
	$dept=$row->dept_date;
	$ret=$row->ret_date;
	$mail_add=$row->mail;
	$contact=$row->phnumb;
}




?>



<html>
<head>
<title>Admin Transportation Modification</title>
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
    width: 17%;
    height: 750px; /* only for demonstration, should be removed */
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
    width: 83%;
    background-color: #f1f1f1;
    height: 750px; /* only for demonstration, should be removed */
}
table{
	width:1080px;
	border: 1px solid black;
	
}
td,th{
	text-align:left;
	
	font-size:17px;
	padding:14px;
	
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
<?php


$data=array();
//$data1=array();
loadFromMySQL("select * from transport_t");?>

<script>
xmlhttp = new XMLHttpRequest();
flag="";
function clearCombo(id){
	var list=document.getElementById(id);
	while (list.firstChild) {
		list.removeChild(list.firstChild);
	}
}
function loadJSONToCombo(id,jsn){
	var resp=JSON.parse(jsn);
	var combo = document.getElementById(id);
	for(i=0;i<resp.length;i++){
		var option = document.createElement("option");
		option.text = resp[i].trans_comp;
		option.value = resp[i].trans_comp;
		combo.add(option); 
	}
}

function loadCompany(v) {
	str=v.value;
	flag="loadCompany";
	clearCombo("companyList");
	//document.getElementById("spinner").style.visibility= "visible";
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {	
			loadJSONToCombo("companyList",xmlhttp.responseText);
			//document.getElementById("spinner").style.visibility= "hidden";
		}
	};
	var url="fetch.php";
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("flag="+flag+"&ttypeid="+str);
}



function validate(){

	tp=document.trans_fm.t_type.value;
	tc=document.trans_fm.t_company.value;
	ns=document.trans_fm.numb_s.value;
	dd=document.trans_fm.dep_date.value;
	rd=document.trans_fm.re_date.value;
	mail=document.trans_fm.mail_ad.value;
	pn=document.trans_fm.phone_numb.value;
	//v=document.forms[0].elements[1].value;
	//alert(v);
	
	
	document.getElementById("msg").innerHTML="";
	document.getElementById("msg1").innerHTML="";
	document.getElementById("msg2").innerHTML="";
	document.getElementById("msg3").innerHTML="";
	document.getElementById("msg4").innerHTML="";
	document.getElementById("msg5").innerHTML="";
	document.getElementById("msg6").innerHTML="";
	
	//function validateEmail(mail) {
    //var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //return re.test(mail);
    //}
	
	   if(tp == "" )
	{
	     document.getElementById("msg").style.color="red";
		 document.getElementById("msg").innerHTML="Missing1";
		 return false;
	   
	}

	 else if(tc == "")
	{
	     document.getElementById("msg1").style.color="red";
		document.getElementById("msg1").innerHTML="Missing2";
		return false;
	   
	}
	 else if(ns == "")
	{
	     document.getElementById("msg2").style.color="red";
		document.getElementById("msg2").innerHTML="Missing3";
		return false;
	   
	}
	else if(dd == "")
	{
	     document.getElementById("msg3").style.color="red";
		 document.getElementById("msg3").innerHTML="Missing4";
		 return false;
	   
	}
	else if(rd == "")
	{
	     document.getElementById("msg4").style.color="red";
		 document.getElementById("msg4").innerHTML="Missing4";
		 return false;
	   
	}

	else if(mail == "")
	{
	     document.getElementById("msg5").style.color="red";
		document.getElementById("msg5").innerHTML="Missing5";
		return false;
	   
	}
	else if(pn == "")
	{
	     document.getElementById("msg6").style.color="red";
		document.getElementById("msg6").innerHTML="Missing6";
		return false;
	   
	}
	
	else if(pn.length<11 && typeof pn != 'number')
	{
	    alert("invalid phone number ");
		return false;
	   
	}
      if(/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(mail))
	{
	    //alert("valid mail address");
		return true;
	   
	}
	else
	{
	     alert("invalid mail address");
		return false;
	   
	}
	
	
	
}
</script>
</head>
<body>


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
      <li><a  href="admin_pro.php" style="text-decoration:none">Dashboard</a></li>
      <li><a  href="index.php" target="_blank" style="text-decoration:none">Home</a></li>
      <li><a  href="admin_pro.php" target="_top" style="text-decoration:none">View Profile</a></li>
      
    </ul>
	<h3>Users</h3><hr>
    <ul id="ul2">

      <li><a href="show_users.php" style="text-decoration:none">Show all Members</a></li>
	    
    </ul>
	<h3>Events</h3><hr>
	<ul id="ul3">
		 <li><a href="#" style="text-decoration:none">Show all Events</a></li>
		 <li><a href="event_create.php" style="text-decoration:none">Create New Event</a></li>		 
	</ul>	 
	
<h3>Bookings</h3><hr>
  <div class="dropdown">
	<ul id="ul4">
<li>
	<button class="dropbtn">
    	<a href="" style="text-decoration:none">Accomodation Booking</a>
	</button>
    <div class="dropdown-content">
      <a href="ad_accommodation_view.php" target="_top">All Accommodation Bookings</a>
      <a href="acc_booking.html" target="_blank">Book An Accommodation</a>
	  <a href="ad_accom_book.php" target="_blank">My Booking</a>
    </div>
	</div>
</li>

<div class="dropdown">		
		<ul id="ul4">
		<li>	  
    <button class="dropbtn">
	    <a href="" style="text-decoration:none">Transportation Booking</a> 
    
    </button>
    <div class="dropdown-content">
      <a href="ad_transport_view.php" target="_top">All Transport Bookings</a>
      <a href="trans_booking.php" target="_blank">Book A Transport</a>
	  <a href="ad_trans_book.php" target="_blank">My Booking</a>
    </div>
  </div> </li>
		 	
	</ul>		
  </nav>
  
  <article>
  <form action="" method="post" name="trans_fm">
  <!--Admin edit transportation. -->
    <table style="visibility:visible">
			<tr>
				<th  style="text-align:center" style="color:red"><b>My Transportation Booking</b></th>
				
			</tr>
			<tr>
				<td>Transport type:<pre style="display:inline">		  </pre>
				    <select id="TypeList" name="t_type" style="width:500px; height=300px"  maxlength="100" onchange="loadCompany(this)" required><?php
                      foreach($data as $r){?>
	                  <option id="bus" value="<?php echo $r["ttypeid"];?>">
	                  <?php echo $r["type_name"];?>
	                  </option>	<?php
                        }?>
                    </select><span id="msg"></span>
			   </td>
				
			</tr>
			<tr>
				<td>Transport Company:<pre style="display:inline">	  </pre> 
				  <select id="companyList" style="width:500px; height=300px" name="t_company" maxlength="100" >
                  </select><span id="msg1"></span>
				</td>
			</tr>
			<tr>
				<td>Number Of Seats: <pre style="display:inline">	          </pre> 
			      <select id="numbsOfSeats" style="width:500px; height=300px" name="numb_s" maxlength="100" value="<?php echo $nseats; ?>" required>
				      <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
                  </select><span id="msg2"></span>
				</td>
			</tr>
			<tr>
				<td>Departure Date:<pre style="display:inline">		  </pre> <input style="width:385px" type="Date" name="dep_date" value="<?php echo $dept; ?>"required><span id="msg3"></span></td>
			</tr>
			<tr>
				<td>Return Date:<pre style="display:inline">		  </pre> <input style="width:385px" type="Date" name="re_date" value="<?php echo $ret; ?>"required><span id="msg4"></span></td>
			</tr>
			<tr>
				<td>Email Address:<pre style="display:inline">	          </pre> <input size="50" type="text" name="mail_ad" value="<?php echo $mail_add; ?>" required><span id="msg5"></span></td>
			</tr>
			<tr>
				<td>Contact No:<pre style="display:inline">		  </pre> <input size="50" type="text" name="phone_numb" value="<?php echo $contact; ?>" required><span id="msg6"></span></td>
			</tr>
			<tr>
			   <td>
			   
			     <input type="reset" value="Reset" name="ret" style="align:right"><pre style="display:inline">   </pre><input type="submit" onclick="return validate()" value="Save Change" name="btn" style="align:right">
			   </td>
			</tr>
	</table>
	</form>	
  </article>
</section>
</form>
</body>
</html>