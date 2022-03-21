<?php  
	$page_title = "Home";
	require("includes/connect.php");
	session_start();


	if (isset($_POST['change-btn'])) {
		$email = trim($_POST['email']);
		$current = trim($_POST['current']);
		$newpass = trim($_POST['newpass']);
		$pattern = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

		if ($email && $current && $newpass) {
			
			// Password pattern/complexity
			if (!preg_match($pattern, $newpass)) {
				$message .= "<p>Password must be at least 6 characters long, contain one numer, one uppercase and one lowercase character.</p>";
			}
			else
			{
				$check_sql = "SELECT * FROM a1_finalProjectUsers WHERE email = '$email' OR user_name = '$email'";

				$check_details = $conn->query($check_sql);
				if ($check_details->num_rows > 0){
					$row = $check_details->fetch_assoc();

					if(password_verify($current, $row['password']) && $_POST["newpass"] == $_POST["confirm"] ) {
						$hash = password_hash($newpass, PASSWORD_DEFAULT);
						$update_pass_sql = "UPDATE a1_finalProjectUsers SET password = '$hash' WHERE email = '$email' OR user_name = '$email'";

						if ($conn->query($update_pass_sql)) {
							$message .= "<p>You have successfully changed password.</p>";
							$email = $oldpassword = $newpass = "";
						}
						else
						{
							$message .= "An issue has occurred. $conn->error</p>";
						}
					}
					else
					{
						$message .= "<p>Sorry, credentials of the account do not match.</p>";
					}
				}
				else
				{
					$message .= "<p>Sorry, credentials of the account do not match. </p>";
				}
			}
		}
		else
		{
			$message .= "<p>All fields are required.</p>";
		}
		
	}
?>

<?php include("includes/header.php"); ?>

<div><h2>Change Password</h2></div>

<?php if ($message): ?>
	<div class="message">
		<?php echo $message; ?>
	</div>
<?php endif ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
	  class="register-form form">
	<label for="email">Email or Username</label>
	<input type="text" id="email" name="email" value="<?php echo $email ?>">

	<label for="current">Current Password</label>
	<input type="text" id="current" name="current" value="<?php echo $current ?>">

	<label for="newpass">New Password</label>
	<input type="text" id="newpass" name="newpass" value="<?php echo $newpass ?>">

	<label for="confirm">Confirm Password</label>
	<input type="text" id="confirm" name="confirm" value="<?php echo $confirm ?>">

	<input type="submit" name="change-btn" value="Change">
</form>


<?php include("includes/footer.php"); ?>