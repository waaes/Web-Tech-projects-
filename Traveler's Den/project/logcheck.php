<?php
require("dataloader.php");
$cred=array();

loadFromFile();
loadFromXML();

loadFromMySQL("select * from users");


$uname=$_POST["username"];
$pass=$_POST["psw"];


$v=0;
$_SESSION["flag"]="";


session_start();
$_SESSION["username"]=$_POST["username"];


foreach($cred as $a){

if($uname == $a["un"] && $pass == $a["pass"] && $a["memtype"] == "admin" && $a["stat"] == "confirm")
{

	$v=1;
	$_SESSION["flag"]="success";
	$_SESSION["userType"]=$a["memtype"];
	
	$_SESSION["memberIndex"]=$a["memindex"];
	header("Location:admin_pro.php"); 
	
	
}
else if($uname == $a["un"] && $pass == $a["pass"] && $a["memtype"] == "member" && $a["stat"] == "confirm")
{
	$v=1;
	$_SESSION["flag"]="success";
	$_SESSION["userType"]=$a["memtype"];
	$_SESSION["memberIndex"]=$a["memindex"];
	$_SESSION["memberMail"]=$a["mail"];
	$_SESSION["memberContact"]=$a["pnumb"];
	header("Location:tprofile.php"); 
	
}

}
if($v==0)
{
	echo "Invalid Credentials";	
	
}
//echo "<pre>";print_r($cred);echo "</pre>";

?>

