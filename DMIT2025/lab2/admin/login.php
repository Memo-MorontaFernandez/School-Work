<?php 
	include("/home/gmorontafernand1/public_html/dmit2025/lab2/admin/credentials.php");

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ( ($username == $valid_user) && ( password_verify($password, $encrypted_pass)) ) {
			session_start();
			$_SESSION['qwertyuiopasdfghjkl-Guillermo'] = session_id();
			$_SESSION['username'] = $username;
			header("Location: insert.php");
		} else {
			$message = "Invalid user or pass. Please try again!";
		}
	}
 
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
		<div>
			<h1>Pet Fun Run</h1>
			<p>Login</p>
		</div>

		<ul>
			<li><a href="">Public</a></li>
			<li><a href="">Insert</a></li>
		</ul>
	</header>

	<form action="" method="POST">
		<label for="username">Username</label>
		<input type="text" id="username" name="username">

		<label for="password">Password</label>
		<input type="text" id="password" name="password">

		<input type="submit" value="Login" name="login">
	</form>

	<div class="testing">
		<?php echo $message ?>
	</div> 

	<footer>
		<p>All content for academic purposes</p>
	</footer>
</body>
</html>