<?php
$config["dataSource"]="mysql";
$config["dbName"]="travel";
$config["dbUser"]="root";
$config["dbPass"]="";
$config["dbHost"]="localhost";
function loadFromMySQL($sql){
	global $data;
	global $config;
	$conn = mysqli_connect($config["dbHost"], $config["dbUser"], $config["dbPass"],$config["dbName"]);
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$data=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$data[]=$row;
	}
}

function loadFromMySQL1($sql1){
	global $data1;
	global $config;
	$conn = mysqli_connect($config["dbHost"], $config["dbUser"], $config["dbPass"],$config["dbName"]);
	//echo $sql;
	$result = mysqli_query($conn, $sql1)or die(mysqli_error($conn));
	$data1=array();
	//print_r($result);
	while($row1 = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$data1[]=$row1;
	}
}
?>