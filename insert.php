<?php
	$hostname = "localhost";
	$dbname = "geeksofjava";
	$dbuser = "root";
	$password = "";
	$i = 1;
  $conn = mysqli_connect($hostname,$dbuser,$password,$dbname);
  $file = fopen("C:\wamp\www\geeksofjava\project\ML\\title.txt","r");
	while(! feof($file)) {
		$Title =  fgets($file);
		$var = "ml".$i;
    	$var1 = "C:\wamp\www\geeksofjava\project\ML\\".$i.".pdf";
      $var1 = mysqli_real_escape_string($conn, $var1);
   		$query = "INSERT into `project` (projectId, pid, title, projectPath, views) VALUES ('7', '$var', '$Title', '$var1','0')";
   		$result = mysqli_query($conn, $query);
   		$i = $i+1;
    }
    echo "done";
    fclose($file);
?>