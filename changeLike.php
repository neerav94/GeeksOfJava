<?php require('db.php');
	if(!loggedin()) {
		header("Location:index.html");
		exit();
	}?>

<?php
	$id = $_GET["q_id"];
	
	$hostname = "localhost";
	$dbname = "geeksofjava";
	$dbuser = "root";
	$password = "";
	
	$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
	$display = mysqli_query($con,"select likes from question where qid = '".$id."';");
	$row = mysqli_fetch_row($display);
	$num = (int)$row[0];
	$num += 1;
	$res = mysqli_query($con, "UPDATE question SET likes='".$num."'WHERE qid='".$id."'");
	echo $num;
?>