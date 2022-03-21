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
	<div class="topnav">
	  <a href="<?php echo BASE_URL; ?>index.php">Memo Reviews</a>
	  <a href="<?php echo BASE_URL; ?>index.php">Home</a>
	  <a href="<?php echo BASE_URL; ?>my-ads.php">Series</a>
	  <div class="dropdown">
	    <button class="dropbtn">Account 
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="<?php echo BASE_URL; ?>">Comments</a>
		  <a href="<?php echo BASE_URL; ?>Admin/admin.php">Admin</a> 
		  <?php if ($_SESSION['user_id']): ?>
			<a href="<?php echo BASE_URL; ?>logout.php">Logout</a>
		  <?php else: ?>
			<a href="<?php echo BASE_URL; ?>login.php">Login</a>
		  <?php endif ?>
      </div>
	  <div class="search-container">
	    <form action="/action_page.php">
	      <input type="text" placeholder="Search.." name="search">
	      <button type="submit">Search</button>
	    </form>
	  </div>
	</div>
</header>
<main>