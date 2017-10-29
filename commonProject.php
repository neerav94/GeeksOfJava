<html>
<?php
	if (isset($_GET['p_id']))
    {
        $id = $_GET['p_id'];
		$view = $_GET['v'];
		$view = (int)$view;
		$view = $view+1;
		$mail = $_GET['m'];
		$domain = $_GET['d'];
		//echo $domain;
    }
		$hostname = "localhost";
		$dbname = "geeksofjava";
		$dbuser = "root";
		$password = "";
		
		$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
		$display = mysqli_query($con,"select title, projectPath, views, cluster from project where pid = '$id';");
		$res = mysqli_query($con, "UPDATE project SET views='$view' WHERE pid='$id'");
		$row = mysqli_fetch_row($display);
		$cluster_num = $row[3];
		if($domain=="ml") {
			$res = mysqli_query($con, "UPDATE users SET cluster_ml='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="app") {
			$res = mysqli_query($con, "UPDATE users SET cluster_app='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="cloud") {
			$res = mysqli_query($con, "UPDATE users SET cluster_cloud='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="computer") {
			$res = mysqli_query($con, "UPDATE users SET cluster_computer='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="image") {
			$res = mysqli_query($con, "UPDATE users SET cluster_image='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="big") {
			$res = mysqli_query($con, "UPDATE users SET cluster_big='$cluster_num' WHERE email='$mail'");
		}

		if($domain=="iot") {
			$res = mysqli_query($con, "UPDATE users SET cluster_iot='$cluster_num' WHERE email='$mail'");
		}
?>

<body>
</head>
<?php
	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename=".$row[1]);
	@readfile("$row[1]");
?>
</body>
</html>