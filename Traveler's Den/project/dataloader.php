<?php


function loadFromFile(){
	global $cred;
	$file=fopen("regdata.txt","r")or die("error");
	while($line=fgets($file)){
		$line=trim($line);
		$cr=explode(" ",$line);
		$cred[]=array("un"=>$cr[2],"pass"=>$cr[6],"memtype"=>$cr[8],"stat"=>$cr[9]);
	}
	fclose($file);
}
function loadFromXML(){
	global $cred;
	$xml=simplexml_load_file("xmlregdata.xml") or die("Error: Cannot create object");
	foreach($xml as $st){
		$dar=array();
		$dar["un"]=(string)$st->username;
		$dar["pass"]=(string)$st->pass;
		$dar["memtype"]=(string)$st->type;
		$dar["stat"]=(string)$st->status;
		$cred[]=$dar;
	}
	
function loadFromMySQL($sql){
	global $cred;	
	$conn = mysqli_connect("localhost", "root", "","travel");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$cred=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$ar=array();
		//$ar["fname"]=$row["fsname"];
		//$ar["lname"]=$row["ltname"];
		$ar["un"]=$row["uname"];
		//$ar["dob"]=$row["dob"];
		$ar["mail"]=$row["mail"];
		$ar["pnumb"]=$row["phnumb"];
		$ar["pass"]=$row["password"];
		//$ar["cpass"]=$row["cpassword"];
		$ar["memtype"]=$row["mtype"];
		$ar["stat"]=$row["status"];
		$ar["memindex"]=$row["mindex"];
		
		$cred[]=$ar;
	}
	//return $arr;
}	
	
}
?>