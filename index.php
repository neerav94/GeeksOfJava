<?php include("db.php");
if(!loggedin()) {
	header("Location: index.html");
	exit();
}
else {
	header("Location: home.php");
}
?>