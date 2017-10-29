<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/home.css"/>
	<link rel="stylesheet" href="highlight/styles/github.css">
	<script src="highlight/highlight.pack.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<title>Stacks</title>
	<style type="text/css">
        div.left{
			float:left;
		}
		div.left img{
			width: 300px;
			height: 500px;
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
    h2{
    	color: red;
    }
	
	#ee{
		color : white;
	}
	
    p{
    	font-size: 22px;
    	color: black;
    	font-weight: bold;

    }
	
	 #fs{
    color:blue;
    }
	
	#vk{
		width:150px;
		height:30px;
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

         <h1 class="fnt" style="color: C52D2F">Algorithm and Implementation</h1>
			<?php
				$hostname = "localhost";
				$dbname = "geeksofjava";
				$dbuser = "root";
				$password = "";
				$qid = strval($_GET['q_id']);
				$r = ''.$qid.'';
				echo is_string($qid)."<br>";
				$con = mysqli_connect($hostname,$dbuser,$password,$dbname);
				$q = 'select * from question where qid =' + $qid + ';';
				$res = mysqli_query($con,"select qid,ques_desc,code,algo,heading from question where qid = '$qid';") or die("Not possible");

				//echo mysqli_fetch_row($res);
					$row = mysqli_fetch_row($res);
					$des = fopen($row[3],"r");
					$title = fopen($row[4],"r");
					$code = fopen($row[2],"r");
					echo "<div class  = 'container'>";
					echo '<div class = "left"><h2><a href = "common.php?q_id='.$row[0].'">';

					while(!feof($title)){
						$line = fgets($title);
						echo $line."<br>";
					}
					echo '</a></h2>';
					//echo "<p>";
					echo  '<pre><code class = "text">';
					while(!feof($des)){
						$line = fgets($des);
						echo $line."<br>";
					}
					echo "</code></pre>";
					echo '<pre><code class = "java">';
					while(!feof($code)){
						$line = fgets($code);
						if(strpos($line,'<') !== false)
							$line = preg_replace("/</","&lt",$line);
						else if(strpos($line,">") !== false)
							$line = preg_replace("/>/","&gt",$line);
						echo $line;

					}
					echo '</code></pre>';
					fclose($des);
					fclose($title);

					echo "</div></div><hr>";



				?>

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
