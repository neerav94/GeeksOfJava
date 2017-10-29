<html>
<head>
	<?php include('header.php')?>
	<link rel="stylesheet" href="css/common.css"/>
	<link rel="stylesheet" href="css/home.css"/>
	<title>Company</title>
</head>
<body>
	<div class="container">
	<ul>
	<?php
		$hostname = "localhost";
		$dbname = "geeksofjava";
		$dbuser = "root";
		$password = "";
		
		$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
		$res = mysqli_query($con,"select cname, views from company;");
		
		while($row = mysqli_fetch_row($res)){
			//$des = fopen($row[1],"r");
			//$title = fopen($row[2],"r");
			echo '<li><a class="cname" href = "archive.php?name='.$row[0].'&v='.$row[1].'">';
			//while(!feof($title)){
			//	$line = fgets($title);
			//	echo $line;
			echo $row[0];
			echo '</a></li>';
		}	
		?>
	</ul>
	</div>
</body>
</html>