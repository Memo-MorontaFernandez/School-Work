<?php 
	$page_title = "Login";
	$body_class = "login";
	include("/home/gmorontafernand1/public_html/dmit2025/lab4/admin/credentials.php");

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ( ($username == $valid_user) && ( password_verify($password, $encrypted_pass)) ) {
			session_start();
			$_SESSION['qwertyuiopasdfghjkl-Guillermo'] = session_id();
			$_SESSION['username'] = $username;
			header("Location: index.php");
		} else {
			$message = "<p class='error'>Invalid user or pass. Please try again!</p>";
		}
	} 
?>  

<?php 
	include("includes/connect.php");
	include("includes/header.php"); 
?>

<h2>Login to System</h2>

<?php echo $message; ?>

<form action="" method="POST">
	<label for="username">Username</label>
	<input type="text" id="username" name="username">

	<label for="password">Password</label>
	<input type="text" id="password" name="password">

	<input type="submit" value="Login" name="login">
</form>

<?php include("includes/footer.php"); ?>