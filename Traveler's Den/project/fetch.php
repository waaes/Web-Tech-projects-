<?php
$data=array();
require("lib.php");
if(isset($_REQUEST["flag"]) && $_REQUEST["flag"]=="loadCompany"){
	$sql="select * from transport_comp where ttypeid='".$_REQUEST["ttypeid"]."'";
    
	//echo $sql;
	//loadFromText();
	loadFromMySQL($sql);
	echo json_encode($data);
	//print_r($data);
}
?>