
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />

<script type="text/javascript">
	function unhide(divID, otherDivId) {
		var item = document.getElementById(divID);
		if (item) {
            item.className=(item.className=='hidden')?'unhidden':'hidden';
        }
        document.getElementById(otherDivId).className = 'hidden';
    }

</script>
</head>

<body background="./image/6.jpg">
<?php
	require('db.php');
	if(loggedin()) {
		header("Location:home.php");
		exit();
	}
	//session_start();
	
	//Check if the user clicked on forget password link.
	elseif(isset($_POST['forgetSubmit'])) {
		//header("Location: registration.php");
		$email = $_POST['forgetEmail'];
		
		$email = stripslashes($email);
		$email = mysqli_real_escape_string($conn, $email);
		
		//Checking does user exist in the database or not
		$query = "SELECT * FROM `users` WHERE email='$email'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result); 
		if($rows==1){
			$val = $result->fetch_assoc();
			$name = $val['name'];
			$id = $val['id'];
			$activation = md5(uniqid(rand(),true)); //activation key generated but have a look again once.
			/*
			.
			.
			The mail code will come here.....
			.
			.
			.
			*/
		}
		else {
			?>
	 
<!--Forget password div-->	 
<div id="forget" class="hidden">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">Forgot your password</legend>
		<p style="color:white">Please enter your email.</p>
		<form action="" method="post" >
			<input type="text" name="forgetEmail" placeholder="Email" required />
			<input name="forgetSubmit" type="submit" value="Send me the link" />
		</form>
	</fieldset>
</div>

<!--Login form-->
<div class="unhidden" id="login">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">LogIn</legend>
		<div style="color:red">Email is not registered.</div>
		<form action="" method="post" name="login">
			<input type="text" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required /><br>
			<input type="checkbox" name="check" style="color:white">Keep me logged in</input>
			<a href="javascript:unhide('forget', 'login')" id="right" style="font-weight:bold;color:#009900">Forgot your password?</a><br>
			<input name="submit" type="submit" value="Login" />
		</form>
	<p style="color:black">Don't have an account? <a href='registration.php' style="font-weight:bold;color:#009900">Sign Up</a></p>
	</fieldset>
</div>
	 
<?php
		}
	}	
	
	
	// If form submitted, insert values into the database.
	elseif (isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$email = stripslashes($email);
		$email = mysqli_real_escape_string($conn, $email);
		
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($conn, $password);
		
		//Checking is user existing in the database or not
		$query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result); 
		if($rows==1){
			$val = $result->fetch_assoc();
			if(isset($_POST['check'])) {
				setcookie("username",$email,time()+86400*180);
				$_SESSION['username'] = $val['name'];
				$_SESSION['email'] = $val['email'];
				header("Location: home.php");
				exit();
			}
			else {
				$_SESSION['username'] = $val['name'];
				$_SESSION['email'] = $val['email'];
				header("Location: home.php"); // Redirect user to Home page
				exit();
			}			
		}
		else{
?>
	 
<!--Forget password div-->	 
<div id="forget" class="hidden">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">Forgot your password</legend>
		<p style="color:white">Please enter your email.</p>
		<form action="" method="post" >
			<input type="text" name="forgetEmail" placeholder="Email" required />
			<input name="forgetSubmit" type="submit" value="Send me the link" />
		</form>
	</fieldset>
</div>

<!--Login form-->
<div class="unhidden" id="login">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">LogIn</legend>
		<div style="color:red">Invalid email or password. Please try again.</div>
		<form action="" method="post" name="login">
			<input type="text" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required /><br>
			<input type="checkbox" name="check" style="color:white">Keep me logged in</input>
			<a href="javascript:unhide('forget', 'login')" id="right" style="font-weight:bold;color:#009900">Forgot your password?</a><br>
			<input name="submit" type="submit" value="Login" />
		</form>
	<p style="color:black">Don't have an account? <a href='registration.php' style="font-weight:bold;color:#009900">Sign Up</a></p>
	</fieldset>
</div>
	 
<?php
		}
	}
	else{
?>

<!--Forget password div -->
<div id="forget" class="hidden">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">Forget your password</legend>
		<p style="color:white">Please enter your email.</p>
		<form action="" method="post" >
			<input type="text" name="forgetEmail" placeholder="Email" required />
			<input name="forgetSubmit" type="submit" value="Send me the link" />
		</form>
	</fieldset>
</div>

<!-- Login Form -->
<div class="unhidden" id="login">
	<h1 align="center" style="color:white;font-size:40px">GeeksOfJava</h1>
	<fieldset>
		<legend style="color:white">LogIn</legend>
		<form action="" method="post" name="login">
			<input type="text" name="email" placeholder="Email" required />
			<input type="password" name="password" placeholder="Password" required /><br>
			<input type="checkbox" name="check">Keep me logged in</input>
			<a href="javascript:unhide('forget', 'login');" id="right" style="font-weight:bold;color:#009900">Forgot your password?</a><br>
			<input name="submit" type="submit" value="Login" />
		</form>
		<p style="color:black">Don't have an account? <a href='registration.php' style="font-weight:bold;color:#009900">Sign Up</a></p>
	</fieldset>
</div>

<?php } ?>
</body>
</html>