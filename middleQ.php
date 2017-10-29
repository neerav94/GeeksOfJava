<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/home.css"/>
	<title>Queues</title>
	<style type="text/css">
        div.left{
			float:left;
		}
		div.left img{
			width: 300px;
			height: 500px;
		}
		
		 #fs{
    color:blue;
    }
	
	#vk{
		width:150px;
		height:30px;
		}
		
		div.right{
			float:left;
			margin-left: 100px;
		}
        body
    {
        background-image: url(images/download.jpeg);
        background-size: cover;
        background-attachment: fixed;
        /*background-repeat: no-repeat;*/
        /*height: 100%;*/
        /*width: 100%;*/

    }
	
	#ee{
		color : white;
	}
	
    h2{
    	color: red;
    }
    p{
    	font-size: 22px;
    	color: black;
    	font-weight: bold;

    }
	button
	{
		background-color: #86b8c6;
		opacity : 0.5;
		border-radius: 12px;
		color: white;
		font-family: "Lucida Grande", Geneva, Verdana, Arial, Helvetica, sans-serif;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		font-color: white;
	}
	button:target{
		background-color: <?php if($_GET["level"] == 'e') echo "#EEEEEE"; else if($_GET["level"] == 'm') echo "#EEE444"; else echo "#E44E44";?>;
	}

       li.log img{
			width: 100px;
			height: 75px;
		}
    </style>

<title>GeeksOfJava</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
            </button>
			<a href="geeks_1.html" class="navbar-brand">GeeksOfJava</a>
		</div>
		 <div class="collapse navbar-collapse navbar-right">
		<ul class="nav navbar-nav">
		    <li>
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Data Structures <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="Arrays.php" class = "drop-downs">Arrays</a></li>
					<li><a href="Stacks.php" class = "drop-downs">Stacks</a></li>
					<li><a href="Queues.php" class = "drop-downs">Queues</a></li>
					<li><a href="Linked.php" class = "drop-downs">Linked Lists</a></li>
				</ul>
			</li>
			<li><a href="geeks_1.html">Algorithms</a></li>
			<li><a href="geeks_1.html">Articles</a></li>
			<li>
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Challenges<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/spoj.png"></a></li>
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/code-chef.jpe"></a></li>
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/earth.png"></a></li>
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/rank.jpe"></li></a></li>
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/top.jpe"></li></a></li>
					<li><a href="geeks_1.html" class = "drop-downs"><img id="vk" src="images/carrer.png"></li></a></li>
				</ul>
			</li>
			<li>
				<a href="" class = "dropdown-toggle" data-toggle = "dropdown">Interview Experience<span class="caret"></span></a>
			    <ul class = "dropdown-menu">
				    <li><a href = "" class = "drop-downs">2017</a></li>
			    </ul>
			</li>
			<li><a href="geeks_2.html">About Us</a></li>
			<li><a href="geeks_4.html">Contact Us</a></li>
			</ul>
		</div>
	</div>	
	</nav>	<!-- end of nav bar -->
	<!--<div class="content container"></div>-->
	<div class="content container"></div>

    <div class="content container"></div>

         <h1 class="fnt" style="color: C52D2F"><center>Queues</center></h1>
		 <div class="content container">
		<button id="e"><a href="middleQ.php?level='E'&domain_id=2"> Easy </a></button>
		<button id="m"><a href="middleQ.php?level='M'&domain_id=2"> Medium </a></button>
		<button id="d"><a href="middleQ.php?level='H'&domain_id=2"> Hard </a></button>
	</div>
	<div id="top10" class="container">
			<?php
				$hostname = "localhost";
				$dbname = "geeksofjava";
				$dbuser = "root";
				$password = "";
				$level = $_GET["level"];
				$dom = $_GET["domain_id"];
				$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
				$res = mysqli_query($con,"select qid,ques_desc,heading from question where domain_id = $dom && type = $level ;");


				while($row = mysqli_fetch_row($res)){
					$des = fopen($row[1],"r");
					$title = fopen($row[2],"r");
					echo "<div class  = 'container'>";
					echo '<div class = "left"><h2><a href = "common.php?q_id='.$row[0].'">';
					//x = 0;
					while(!feof($title)){
						$line = fgets($title);
						echo $line."<br>";
					}
					echo '</a></h2>';
					echo "<p id = 'ee'>";
					$w = 0;
					while(!feof($des)){
						$line = fgets($des);
						if(($w + strlen($line)) < 125){


							$w = $w + strlen($line);

							echo $line."<br>";
						}
						else {

							$lin = substr($line,0,45-$w);
							echo $lin."...<br>";
							break;

						}

					}
					fclose($des);
					fclose($title);

					echo "</p></div></div><hr>";

				}

			?>

	</div>


	<footer class="trademark">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					&copy;2016 GeeksOfJava.
				</div>
				
				<div class="col-sm-6">
					<ul class="pull-right">
						<li><a href="geeks_2.html">About us</a></li>
						<li><a href="geeks_1.html">Home</a></li>
						<li><img id="vk" src="images/pes.jpe"></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>	
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
