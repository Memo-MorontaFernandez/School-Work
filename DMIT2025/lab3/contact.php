<?php 
	$event = $_GET['event'];

	if (isset($_POST['submit'])) {
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$event = trim($_POST['event']);
		$message = trim($_POST['message']);
		$is_form_valid = TRUE;

		// Start of $name validation
		if ($name == "") {
			$error_name = "<p>Please enter your name.</p>";
			$is_form_valid = FALSE;
		} 
		else 
		{
			$name = filter_var($name, FILTER_SANITIZE_STRING);
			if ($name == FALSE) {
				$error_name .= "<p>Please enter a valid name.</p>";
				$is_form_valid = FALSE;
			}
			else
			{
				if (strpos($name, " ") == FALSE) {
					$error_name .= "<p>Please enter a first and last name.</p>";
					$is_form_valid = FALSE;
				}
			}
		} // End of $name validation

		// Start of $email validation
		if ($email == "") {
			$error_email .= "<p>Please enter an email address.</p>";
			$is_form_valid = FALSE;
		}
		else
		{
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if ($email == FALSE) {
				$error_email .= "<p>Please enter a valid email address.</p>";
				$is_form_valid = FALSE;
			} 
			else 
			{
				$email = filter_var($email, FILTER_VALIDATE_EMAIL);
				if ($email == FALSE) {
					$error_email .= "<p>Please enter a valid email format.</p>";
					$is_form_valid = FALSE;
				}
			else 
			{
				$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
				if (preg_match($pattern, $email) == FALSE) {
					$error_email .= "<p>{$email} is <b>NOT</b> a valid email address.</p>";
					$is_form_valid = FALSE;
					}
				}
			}
		} // End of $email validation

		// Start of $message validation
		if ($message == "") {
			$error_message .= "<p>Please enter your message.</p>";
			$is_form_valid = FALSE;
		}
		else
		{
			$message = filter_var($message, FILTER_SANITIZE_STRING);
			if ($message == FALSE) {
				$error_message .= "<p>There is a security problem with the formatting of this message. Please try again.</p>";
				$is_form_valid = FALSE;
			}
		} // End of $message validation

		$badStrings = array("Content-Type:",
		"MIME-Version:",
		"Content-Transfer-Encoding:",
		"bcc:",
		"cc:");
		foreach($_POST as $k => $v)
		{ 
			foreach($badStrings as $v2){
				if(strpos($v, $v2) !== false)
				{
					$is_form_valid = false;
					$error = "<p>Bad email injector.</p>";
				}
			}
		}

		$ip	= $_SERVER['REMOTE_ADDR'];

		/* Spammer List: ***********/
		$spams = array (
			"static.16.86.46.78.clients.your-server.de", 
			"87.101.244.8", 
			"144.229.34.5", 
			"89.248.168.70",
			"reserve.cableplus.com.cn",
			"94.102.60.182",
			"194.8.75.145",
			"194.8.75.50",
			"194.8.75.62",
			"194.170.32.252"
		); // array of evil spammers

		foreach ($spams as $site) 
		{// Redirect known spammers
			$pattern = "/$site/i";
			if (preg_match ($pattern, $ip)) 
			{
				$is_form_valid = false;
				$error = "<p>Bad spammer</p>"	;		   
			}
		}

		$refer = $_SERVER['HTTP_REFERER'];

		if ($refer != "http://gmorontafernand1.dmitstudent.ca/dmit2025/lab3/contact.php") {
			$is_form_valid = FALSE;
			$referError = "<p>This information did not come from our form, it will not be processed.</p>";
		}

		if ($is_form_valid == TRUE) {
			$to = "hitobitossb@gmail.com";
			$subject = "Lab-3 Submission";
			$content = "<p>Name: $name</p>";
			$content .= "<p>Event: $event</p>";
			$content .= "<p>Email: $email</p>";
			$content .= "<p>Message: $message</p>";

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Priority: 1\r\n";
			$headers .= "X-MSMail-Priority: Normal\r\n";
			$headers .= "X-Mailer: php\r\n";
			$headers .= "From: DMITstudent <info@dmitstudent.ca>\r\n";

			mail($to, $subject, $content, $headers);

			$name = $email = $message = "";

			$emailsent = "<p>sent mail</p>";

			header("Location:confirmation.html");
		}
	} // If $submit End

	if ($event == "") {
		header("Location:index.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header>
		<h1>Royal Alberta Museum Events</h1>
		<h2>Contact Us</h2>
	</header>
	<div class="errors">
		<?php 
			echo $error_name; 
			echo $error_email;
			echo $error_message;
			echo $error;
			echo $referError;
			echo $emailsent;
		?>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<label for="name">Your Name:</label>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>">

		<label for="event">Event:</label>
		<select name="event" id="event">
			<option value="">Select an event...</option>
			<option <?php if ($event == "WW1"): ?> selected="selected" <?php endif; ?> value="WW1">Remembering the First World War - May 27</option>
			<option <?php if ($event == "IAFH"): ?> selected="selected" <?php endif; ?> value="IAFH">I Am From Here - May 28</option>
			<option <?php if ($event == "VBTL"): ?> selected="selected" <?php endif; ?> value="VBTL">Vikings: Beyond the Legend - May 29</option>
			<option <?php if ($event == "LNAR"): ?> selected="selected" <?php endif; ?> value="LNAR">Late Nights at RAM- May 30</option>
		</select>

		<label for="email">Email:</label>
		<input type="text" id="email" name="email" value="<?php echo $email; ?>">

		<label for="message">Message:</label>
		<textarea name="message" id="message">
			<?php echo $message; ?>
		</textarea>

		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>