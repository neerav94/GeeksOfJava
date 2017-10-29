<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<h1 align="center" align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<title>SignUp</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body background="./image/6.jpg">
<?php
	require('db.php');
 
	// If form submitted, insert values into the database.
	if (isset($_POST['firstname'])){	 
		$firstname = $_POST['firstname'];	 
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		$firstname = stripslashes($firstname);
		$firstname = mysqli_real_escape_string($conn, $firstname);
 
		$email = stripslashes($email);
		$email = mysqli_real_escape_string($conn, $email);
 
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($conn, $password);
 
		$create_date = date("Y-m-d H:i:s");

		$query = "SELECT email FROM users where email='$email'";
		$result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $echo =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1) {?>
			<div class="form">
				<fieldset>                                             
					<legend style="color:white">SignUp</legend>
					<div style="color:red">Email already registered.</div>
					<form name="registration" action="" method="post">
						<input type="text" name="firstname" placeholder="Name" required />
						<input type="email" name="email" placeholder="Email" required />
						<input type="password" name="password" placeholder="Password" required />
						<input type="submit" name="submit" value="SignUp" />
					</form>
				</fieldset>
			</div>
        <?php 
		}
		
		
		elseif(!preg_match("#.*^(?=.{8,15})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {?>
			<div class="form">
				<fieldset>                                             
					<legend style="color:white">SignUp</legend>
					<div style="color:red">Your password must contain atleast one alphabet, one numeric digit and one special character</div>
					<form name="registration" action="" method="post">
						<input type="text" name="firstname" placeholder="Name" required />
						<input type="email" name="email" placeholder="Email" required />
						<input type="password" name="password" placeholder="Password" required />
						<input type="submit" name="submit" value="SignUp" />
					</form>
				</fieldset>
			</div>
        <?php 
		}
			
        else {
			$query = "INSERT into `users` (name, password, email, create_date) VALUES ('$firstname', '".md5($password)."', '$email', '$create_date')";
			$result = mysqli_query($conn, $query);
			if($result){
				$_SESSION['username'] = $firstname;
				$_SESSION['email'] = $email;
				header("Location: home.php"); }// Redirect user to login.php
				//echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
			}
	}
	else{
		?>
		<div class="form">
			<fieldset>
				<legend style="color:white">SignUp</legend>
				<form name="registration" action="" method="post">
					<input type="text" name="firstname" placeholder="Name" required />
					<input type="email" name="email" placeholder="Email" required />
					<input type="password" name="password" placeholder="Password" required />
					<input type="submit" name="submit" value="SignUp" />
				</form>
			</fieldset>
		</div>
	<?php } ?>
</body>
</html>