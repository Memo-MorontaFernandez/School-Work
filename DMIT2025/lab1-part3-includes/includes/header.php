<?php 
	//echo "<pre>";
	//var_dump($_SERVER);
	//echo "</pre>";

	$current_page = basename($_SERVER['PHP_SELF']);

	switch ($current_page) {
		case 'index.php':
			$page_title = "Home";
			break;
		case 'ggstrive.php':
			$page_title = "GGStrive | Lab1 Part3";
			break;
		case 'meltyblood.php':
			$page_title = "MBTL | Lab1 Part3";
			break;
		case 'bloodborne.php':
			$page_title = "Bloodborne | Lab1 Part3";
			break;
		case 'majoras.php':
			$page_title = "Majoras Mask | Lab1 Part3";
			break;
		case 'sotc.php':
			$page_title = "Colossus | Lab1 Part3";
			break;
		case 'epic7.php':
			$page_title = "Epic 7 | Lab1 Part3";
			break;
		default:
			// code...
			break;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Includes - Lab1Part3</h1>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="ggstrive.php">Guilty Gear</a></li>
					<li><a href="meltyblood.php">Melty Blood</a></li>
					<li><a href="bloodborne.php">Bloodborne</a></li>
					<li><a href="majoras.php">Majoras Mask</a></li>
					<li><a href="sotc.php">SotC</a></li>
					<li><a href="epic7.php">Epic 7</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<main>
		<div class="container">
			<!-- END HEADER HERE -->