<?php  
	if (isset($_GET['m'])) {
		$m = $_GET['m'];

		switch ($m) {
			case 'loggedout':
				$message = "<p>You have been logged out.</p>";
				break;
			case 'timedout':
				$message = "<p>You have been automatically logged out due to inactivity.</p>";
				break;
			case 'notloggedin':
				$message = "<p>Sorry, you are not logged in.</p>";
				break;
			case 'admarkedfilled':
				$message = "<p>Your job has been set as filled.</p>";
				break;
			case 'admarkedunfilled':
				$message = "<p>Your job has been set as unfilled.</p>";
				break;
			case 'notrightuser':
				$message = "<p>This ad is not related to the currently logged in account.</p>";
				break;
			case 'deleted':
				$message = "<p>Your job has been removed.</p>";
				break;
			default:
				$message = $m;
				break;
		}
	}
?>