<h2>Login</h2>
<div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
	  class="login-form form">
  	
		<div class="field_container">
			<input type="text" id="email" name="email" 
				   placeholder="user" value="<?php echo $email ?>">
		</div>

		<div class="field_container">
			<input type="text" id="password" name="password" 
				   placeholder="password" value="<?php echo $password ?>">
		</div>
		
		<div class="button">
			<input type="submit" name="login-btn" value="Login"
				   class="button_text">
		</div>
	</form>

	<a href="register.php">Register</a>
	<a href="change-pass.php">Change Password</a>
</div>