<html>
<head>
	<?php include('header.php')?>
	<link rel="stylesheet" href="css/linkedList.css"/>
	<link rel="stylesheet" href="css/containerLeft.css"/>
<title>Project</title>
</head>
<body>
	<h1 align="center">Internet of Things</h1>
	<ul>
	<?php
		$mail = $_SESSION["email"];
		$hostname = "localhost";
		$dbname = "geeksofjava";
		$dbuser = "root";
		$password = "";
		$domain = "iot";
		$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
		$cluster = mysqli_query($con,"select cluster_iot from users where email = '$mail';");
		$cluster_num = mysqli_fetch_row($cluster);
		$clusterNumber = $cluster_num[0];
		if($clusterNumber == 0) {
			$res = mysqli_query($con,"select pid, title, projectPath, views from project where projectId = 1;");

			while($row = mysqli_fetch_row($res)){
				echo '<li>';
				echo '<a href = "commonProject.php?p_id='.$row[0].'&m='.$mail.'&v='.$row[3].'&d='.$domain.'">'.$row[1].'<br></a>';
				echo '</li>';
			}
		}
		else {
			echo '<h3>';
			echo 'Recommended Projects';
			echo '</h3>';
			//echo $clusterNumber;
			$res = mysqli_query($con,"select pid, title, projectPath, views from project where projectId = 1 and cluster = '$clusterNumber';");

			while($row = mysqli_fetch_row($res)){
				echo '<li>';
				echo '<a href = "commonProject.php?p_id='.$row[0].'&m='.$mail.'&v='.$row[3].'&d='.$domain.'">'.$row[1].'<br></a>';
				echo '</li>';
			}
			echo '<br>';

			echo '<h3>';
			echo 'All Projects';
			echo '</h3>';
			$res = mysqli_query($con,"select pid, title, projectPath, views from project where projectId = 1;");

			while($row = mysqli_fetch_row($res)){
				echo '<li>';
				echo '<a href = "commonProject.php?p_id='.$row[0].'&m='.$mail.'&v='.$row[3].'&d='.$domain.'">'.$row[1].'<br></a>';
				echo '</li>';
			}

		}
		
	?>
	</ul>
</body>