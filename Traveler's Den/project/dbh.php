<?php

$dbServerName = "localhost";
$dbUserName ="root";
$dbPassword = "";
$dbName = "travel";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

function updateDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "travel");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(mysqli_query($conn, $sql)) {
		echo "New records updated successfully";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function getExt($filename){
	//abc.jpg
	$a=explode(".",$filename);
	return $a[1];
}
function updateSQL($sql){
	$conn = mysqli_connect("localhost", "root", "","travel");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
}

function loadFromMySQL($sql){
	global $data;
	$conn = mysqli_connect("localhost", "root", "","travel");
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$data=array();
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		$data[]=$row;
	}
	//return $arr;
}


?>