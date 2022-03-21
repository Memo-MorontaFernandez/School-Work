<?php  
	$page_title = "Home";
	require("includes/connect.php");

	if (isset($_POST['register-btn'])) {
		$first_name = trim($_POST['first_name']);
		$last_name = trim($_POST['last_name']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$pattern = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

		$pass_go = true;		

		// Other validation in here - email, strip html, min lengths, complexity for passwords
		if (!$first_name || !$last_name || !$username || !$email || !$password) {
			$pass_go = false;
			$message .= "<p>All fields are required.</p>";
		}

		// Sanitize strings
		$first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
		$last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
		$username = filter_var($username, FILTER_SANITIZE_STRING);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$password =	filter_var($password, FILTER_SANITIZE_STRING);

		// Check if email/username is in use
		if ($username || $email) {
			$check_sql = "SELECT u_id FROM a1_users 
						  WHERE email = '$email' OR user_name = '$username'";

			$check_res = $conn->query($check_sql);
			if ($check_res->num_rows > 0){
				$message .= "<p>Sorry, that username or email is already in use, please try another.</p>";
				$pass_go = false;
			}
		}

		// Check space in username
		if (strpos($username, ' ') !== false) {
			$pass_go = false;
			$message .= "<p>Spaces (empty characters) are not allowed in usernames.</p>";
		}

		// Password pattern/complexity
		if (!preg_match($pattern, $password)) {
			$pass_go = false;
			$message .= "<p>Password be at least 6 characters long, contain one numer, one uppercase and one lowercase character.</p>";
		}

		// validate email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$pass_go = false;
			$message .= "<p>The email you entered is not valid.</p>";
		}

		if ($pass_go == true) {
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$insert_sql = "INSERT INTO a1_users (first_name, last_name, email, user_name, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$hash')";

			if ($conn->query($insert_sql)) {
				$message .= "<p>You have successfully registered.</p>";
				$first_name = $last_name = $username = $email =
				$password = "";
			}
			else
			{
				$message .= "An issue has occurred. $conn->error</p>";
			}
		}
	}
?>

<?php include("includes/header.php"); ?>

<?php if ($message): ?>
	<div class="message">
		<?php echo $message; ?>
	</div>
<?php endif ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
	  class="register-form form">
	<h2>Register Account</h2>

	<label for="first_name">First Name</label>
	<input type="text" id="first_name" name="first_name" value="<?php echo $first_name ?>">

	<label for="last_name">Last Name</label>
	<input type="text" id="last_name" name="last_name" value="<?php echo $last_name ?>">				

	<label for="username">User Name</label>
	<input type="text" id="username" name="username" value="<?php echo $username ?>">

	<label for="email">Email</label>
	<input type="text" id="email" name="email" value="<?php echo $email ?>">

	<label for="password">Password</label>
	<input type="text" id="password" name="password" value="<?php echo $password ?>">

	<input type="submit" name="register-btn" value="Register">
</form>


<?php include("includes/footer.php"); ?>