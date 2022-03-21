<?php  
	if (isset($_POST['login-btn'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if ($email && $password) {
			$login_sql = "SELECT u_id, first_name, password, role FROM a1_finalProjectUsers WHERE user_name = '$email' OR email = '$email'";
			$login_result = $conn->query($login_sql);
			if ($login_result->num_rows > 0) {
				$row = $login_result->fetch_assoc();
				if (password_verify($password, $row['password'])) {
					// session_start();
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['user_id'] = $row['u_id'];
					$_SESSION['guillermobiglongrandomsessionvariablefora1'] = session_id();
					$_SESSION['time'] = time();
					$_SESSION['role'] = $row['role'];

					$update_sql = "UPDATE a1_finalProjectUsers SET date_last_login = NOW() WHERE u_id = " . $_SESSION['user_id'];
					if ($conn->query($update_sql)) {
						$message .= "<p>Successful login.</p>";
						$email = $password = "";
						// header('Location: index.php');
					}
					else
					{
						$message .= "<p>There was a problem. $conn->error</p>";
					}
				}
				else
				{
					$message .= "<p>Invalid username or password.</p>";
				}
			}
			else
			{
				$message .= "<p>Invalid username or password.</p>";
			}
		}
		else
		{
			$message .= "<p>Both fields are required.</p>";
		}
	}
?>