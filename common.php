<html>
<?php
	if (isset($_GET['q_id']))
    {
        $id = $_GET['q_id'];
		$view = $_GET['v'];
		$view = (int)$view;
		$view = $view+1;
    }
		$hostname = "localhost";
		$dbname = "geeksofjava";
		$dbuser = "root";
		$password = "";
		
		$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
		$display = mysqli_query($con,"select algo, code, heading from question where qid = '$id';");
		$res = mysqli_query($con, "UPDATE question SET Views='$view' WHERE qid='$id'");
		$row = mysqli_fetch_row($display);
		$title = fopen($row[2],"r");
?>
<head>
	<?php include('header.php')?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/common.css"/>
	<link rel="stylesheet" href="css/theme1.css"/>
	<title>
		<?php
		while(!feof($title)){
			$line = fgets($title);
			echo $line."<br>";
		}
		?>
	</title>
	<script src="highlighter/prettify.js"></script>
</head>
<body>
	<?php
		$des = fopen($row[0],"r");
		$code = fopen($row[1],"r");
	?>
	<div class="container">
	<?php
		while(!feof($des)){
			$line = fgets($des);
			echo $line."<br>";
		}
	?>
	</div>
	<div class="container">
	<pre class="prettyprint linenums:1"><code class = "java">
		<?php
			while(!feof($code)){
				$line = fgets($code);
				if(strpos($line,'<') !== false)
					$line = preg_replace("/</","&lt",$line);
				else if(strpos($line,">") !== false)
					$line = preg_replace("/>/","&gt",$line);
				echo $line;
			}
		?>
	</code></pre>
	</div>
	<?php
		fclose($code);
		fclose($des);
		fclose($title);
	?>
	<script>
		prettyPrint();
	</script>
</body>
</html>