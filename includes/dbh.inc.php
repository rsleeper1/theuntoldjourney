<?php


$host="aarir0vhjzy585.cy4puim5nf6e.us-west-2.rds.amazonaws.com";
$port=3306;
$socket="";
$user="rsleeper1";
$password="untoldData339!";
$dbname="questions";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$conn->close();
