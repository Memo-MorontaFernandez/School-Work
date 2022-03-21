<?php 
	session_start();
	if (isset($_SESSION['qwertyuiopasdfghjkl-Guillermo']))
	{
		echo "Logged in";
	} else {
		header("Location:login.php");
	}

	if (isset($_POST['register'])){
		$owner_name = $_POST['owner_name'];
		$phone = $_POST['phone'];
		$pet_name = $_POST['pet_name'];
		$pet_type = $_POST['pet_type'];

		if ($owner_name != "" && $phone != "" && $pet_name != "" && $pet_type != "") {
			
			saveRegistration($owner_name, $phone, $pet_name,$pet_type);
		}
		else 
		{
			$message = "Please enter all fields";
		}
	}

	function saveRegistration($name_of_owner, $phone_of_owner, $name_of_pet, $type_of_pet){

		$timedate = date("l, F d, Y @ g:i a");

		// echo $timedate;
		// step 1 - get old entries in the file already
		$file = fopen("registration.txt", "r");
		if ($file) {
			while (!feof($file)) {
				$buffer = fgets($file, 4096);
				$existing_text .= $buffer;
			}
			fclose($file);
		}

		// step 2 - get new stuff to write into the file
		$file = fopen("registration.txt", "w");

		$new_stuff = "<div class=\"registrant\">";

		$new_stuff .= "<h3>$name_of_owner</h3>";
		$new_stuff .= "<p>$phone_of_owner</p>";
		$new_stuff .= "<p>Name: $name_of_pet | Type: $type_of_pet</p>";
		$new_stuff .= "<p>$timedate</p>";

		$new_stuff .= "</div>";

		$all_stuff = $new_stuff . $existing_text;

		fwrite($file, $all_stuff);
		fclose($file);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
</head> 
<body>
	<header>
		<div>
			<h1>Pet Fun Run</h1>
			<p>Insert</p>
		</div>

		<ul>
			<li><a href="../index.php">Public</a></li>
			<li><a href="#">Insert</a></li>
		</ul>
	</header>

	<form action="" method="POST">
		<label for="owner_name">Owner Name</label>
		<input type="text" id="owner_name" name="owner_name" value="<?php echo "$owner_name"; ?>">

		<label for="phone">Phone</label>
		<input type="tel" id="phone" name="phone"
		value="<?php echo "$phone"; ?>">

		<label for="pet_name">Pet Name</label>
		<input type="text" id="pet_name" name="pet_name"
		value="<?php echo "$pet_name"; ?>">

		<label for="pet_type">Pet Type</label>
		<select name="pet_type" id="pet_type">
			<option value="">Select type of pet...</option>
			<option value="dog">Dog</option>
			<option value="cat">Cat</option>
			<option value="bird">Bird</option>
			<option value="rabbit">Rabbit</option>
			<option value="ferret">Ferret</option>
			<option value="other">Other</option>
		</select>

		<input type="submit" value="Register" name="register">
	</form>
	
	<div class="testing">
		<?php echo $message ?>
	</div> 

	<footer>
		<p>All content for academic purposes</p>
	</footer>
</body>
</html> 