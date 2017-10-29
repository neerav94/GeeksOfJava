<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');
if ($conn->connect_error){
 die("Database Connection Failed" . $conn->connect_error);
}
$select_db = mysqli_select_db($conn, 'geeksofjava');
if (!$select_db){
 die("Database Selection Failed" . mysql_error());
}
function loggedin() {
if(isset($_SESSION["username"]) || isset($_Cookie['username'])){
	$loggedin = TRUE;
	return $loggedin; 
}
}

?>