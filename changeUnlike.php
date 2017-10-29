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
	$display = mysqli_query($con,"select unlikes from question where qid = '$id';");
	$row = mysqli_fetch_row($display);
	$num = (int)$row[0];
	$num += 1;
	$res = mysqli_query($con, "UPDATE question SET unlikes='$num' WHERE qid='$id'");
	//console.log($_session['username']);
	echo $num;
	//echo "parent.showUnlikes('$num');";
?>