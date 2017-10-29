<html>
<head>
	<?php include('header.php')?>
	<link rel="stylesheet" href="css/linkedList.css"/>
	<link rel="stylesheet" href="css/containerLeft.css"/>
	<script>
		function sendLike(qid, event)
	    {
			xhr = new XMLHttpRequest();
			xhr.open("GET","changeLike.php?q_id=" + qid,true);
			xhr.onreadystatechange = function() {
				if(xhr.readyState==4 && xhr.status==200) {
					event.target.parentElement.getElementsByTagName("span")[2].innerHTML = xhr.responseText;
				}
			}
			xhr.send();
	    }
		
		function sendUnlike(qid, event)
	    {
			xhr = new XMLHttpRequest();
			xhr.open("GET","changeUnlike.php?q_id=" + qid,true);
			xhr.onreadystatechange = function() {
				if(xhr.readyState==4 && xhr.status==200) {
					event.target.parentElement.getElementsByTagName("span")[3].innerHTML = xhr.responseText;
				}
			}
			xhr.send();
	    }
	</script>
	<title>Stack</title>
</head>
<body>
	<div class="containerLeft">
		<ul class="lower_greek">
			<li class="level"><a href="home.php">Home</a></li>
			<li class="level"><a href="Arrays.php">Array</a></li>
			<li class="level"><a href="Stacks.php">Stack</a></li>
			<li class="level"><a href="Queues.php">Queue</a></li>
			<li class="level"><a href="LinkedList.php">Linked List</a></li>
			<li class="level"><a href="project.php">Project</a></li>
		<ul>
	</div>
	<h2 class="mainHeading">Stack</h2>
	<?php
		$hostname = "localhost";
		$dbname = "geeksofjava";
		$dbuser = "root";
		$password = "";
		
		$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
		$res = mysqli_query($con,"select qid, ques_desc, heading, type, Views, likes, unlikes from question where domain_id = 3;");
		
		while($row = mysqli_fetch_row($res)){
			$des = fopen($row[1],"r");
			$title = fopen($row[2],"r");
	?>
			<div class="containerRight">
				<?php
					echo '<h2 class="subHeading"><a href = "common.php?q_id='.$row[0].'&v='.$row[4].'">';
					while(!feof($title)){
						$line = fgets($title);
						echo $line."<br>";
					}
					echo '</a></h2>';
				?>
			<p> <span class="design">Views: </span><?php echo $row[4]?>
				<span class="design"> Difficulty: </span><?php echo $row[3]?>
				<input type="image" id="like" src="./image/like.png" onclick="sendLike('<?php echo $row[0] ?>', event)"/>
				<span id="likesNumber"><?php echo $row[5]?></span>
				<input type="image" id="unlike" src="./image/unlike.png" onclick="sendUnlike('<?php echo $row[0] ?>', event)"/>
				<span id="unlikesNumber"><?php echo $row[6]?></span>
			</p>
			</div>
		<?php
		}
	?>
	<iframe id="helper" name="helper" width="100" height="100" style="display:none;"/>
</body>
</html>