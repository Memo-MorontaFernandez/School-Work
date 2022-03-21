<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body class="<?php echo $body_class; ?>">
<header> 
		<div>
			<h1>NAIT - LAB 7</h1> 
				<nav>
					<ul>
						<li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
		
						<li><a href="<?php echo BASE_URL; ?>my-ads.php">My Ads</a></li>
		
						<?php if ($_SESSION['first_name']): ?>
						
							<div class="dropdown">
								<button class="dropbtn">
									Account
								</button>
								<div class="dropdown-content">
									<a href="<?php echo BASE_URL; ?>logout.php">Logout</a>
									<a href="<?php echo BASE_URL; ?>change-pass.php">Change Password</a>
								</div>
							</div>
						<?php else: ?>
							<li><a href="<?php echo BASE_URL; ?>register.php">Register</a></li>
						<?php endif ?>
						
					</ul>
				</nav>
			</div>
	</header>
	<main>