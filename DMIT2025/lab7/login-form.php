<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
	  class="login-form form">

   	<h2>Login</h2>
   	
	<label for="email">Email or Username</label>
	<input type="text" id="email" name="email" value="<?php echo $email ?>">

	<label for="password">Password</label>
	<input type="text" id="password" name="password" value="<?php echo $password ?>">

	<input type="submit" name="login-btn" value="Login">
</form>