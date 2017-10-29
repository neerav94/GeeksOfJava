<?php require('db.php');
	if(!loggedin()) {
		header("Location:index.html");
		exit();
	}?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/home.css"/>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<ul class="navbar">
		<li class="text">GeeksOfJava</li>
		<li class="dp"><a class="dp" href="home.php">Home</a></li>
		<li class="dropdown">
			<a class="dp" href="#">Data Structures</a>
			<div class="dropdown-content">
				<a href="Arrays.php">Array</a>
				<a href="Stacks.php">Stack</a>
				<a href="Queues.php">Queue</a>
				<a href="LinkedList.php">Linked List</a>
			</div>
		</li>
		<li class="dp"><a class="dp" href="project.php">Project</a></li>
		<li class="dp"><a class="dp" href="company.php">Companies</a></li>
		<li class="dropdown">
			<a class="dp" href="">Hello, <?php echo $_SESSION['username']; ?>!</a>
			<div class="dropdown-content">
				<a href="#">Dashboard</a>
				<a href="contactUs.php">Contribute</a>
				<a href="logout.php">Log Out</a>
			</div>
		</li>	
	</ul>
</body>
</html>