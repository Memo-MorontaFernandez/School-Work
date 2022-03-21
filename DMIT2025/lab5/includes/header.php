<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/styles.css">
</head>
<body class="<?php echo $body_class; ?>">
<header> 
		<h1>NAIT - Movie Database</h1>
		<nav>
			<ul>
				<li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
				<li><a href="<?php echo BASE_URL; ?>list.php">List Movies</a></li> 
				<li><a href="<?php echo BASE_URL; ?>search.php">Search Movies</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">
							Admin
						</button>
						<div class="dropdown-content">
							<a href="<?php echo BASE_URL; ?>admin/insert.php">Insert</a>
							<a href="<?php echo BASE_URL; ?>admin/edit.php">Edit</a>
							<a href="<?php echo BASE_URL; ?>admin/delete.php">Delete</a>
						</div>
					</div>
				</li>
				<?php if (isset($_SESSION['qwertyuiopasdfghjkl-Guillermo'])) { ?>
				<li><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></li>
				<?php } else { ?>
				<li><a href="<?php echo BASE_URL; ?>login.php">Login</a></li>
				<?php } ?>
			</ul>
		</nav>
	</header>
	<main>