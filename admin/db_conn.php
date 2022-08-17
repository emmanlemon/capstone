<?php

//Para sa filezilla

$sname= "localhost"; //hostname
$uname= "root"; //username
$password= ""; //password
$db_name= "infoboard_sepnas";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$db = mysqli_connect("localhost", "root", "", "infoboard_sepnas"); 

if (!$conn) {
	echo "Connection failed!";
}