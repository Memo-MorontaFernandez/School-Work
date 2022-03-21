<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<?php
 	$owner = $_POST["owner"];
 	$address = $_POST["address"];
 	$city = $_POST["city"];
 	$postal = $_POST["postal"];
 	$home = $_POST["home"];
 	$work = $_POST["work"];
 	$cell = $_POST["cell"];
 	$email = $_POST["email"];
 	$petname = $_POST["petname"];
 	$petage = $_POST["petage"];
 	$breed = $_POST["breed"];
 	$petsex = $_POST["petsex"];
 	$weight = $_POST["weight"];
 	$fixed = $_POST["fixed"];
 	$employment = $_POST["employment"];
 	$occupation = $_POST["occupation"];
 	$employer = $_POST["employer"];
 	$neetlength = $_POST["neetlength"];
 	$formerEmployer = $_POST["formerEmployer"];
 	$dependents = $_POST["dependents"];
 	$dependentsAge = $_POST["dependentsAge"];
 	$maritial = $_POST["maritial"];
 	if ($_POST["income"] == "") {
 		$income = $_POST["highIncome"];
 	} else{ $income = $_POST["income"]; }
 	$highIncome = $_POST["highIncome"];
 	$otherFunds = $_POST["otherFunds"];
 	$circumstances = $_POST["circumstances"];
 	$afford = $_POST["afford"];
 	$quote = $_POST["quote"];
 	$spent = $_POST["spent"];
 	$initialPay = $_POST["initialPay"];
 	$veterinarian = $_POST["veterinarian"];
 	$clinic = $_POST["clinic"];
 	$treatment = $_POST["treatment"];
 	$essay = $_POST["essay"];
 	$actss = $_POST["actss"];
 	$signature = $_POST["signature"];


	$output = "<table>";
	$output .= "<tr><th>Owner</th><td>$owner</td></tr>";
	$output .= "<tr><th>Address</th><td>$address</td></tr>";
	$output .= "<tr><th>City</th><td>$city</td></tr>";
	$output .= "<tr><th>Postal Code:</th><td>$postal</td></tr>";
	$output .= "<tr><th>Home Phone Number:</th><td>$home</td></tr>";
	$output .= "<tr><th>Work Phone Number:</th><td>$work</td></tr>";
	$output .= "<tr><th>Cell Phone Number:</th><td>$cell</td></tr>";
	$output .= "<tr><th>Email</th><td>$email</td></tr>";
	$output .= "<tr><th>Pet's name</th><td>$petname</td></tr>";
	$output .= "<tr><th>Pet's Age:</th><td>$petage</td></tr>";
	$output .= "<tr><th>Pet's Breed:</th><td>$breed</td></tr>";
	$output .= "<tr><th>Pet's Sex:</th><td>$petsex</td></tr>";
	$output .= "<tr><th>Pet's Weight:</th><td>$weight</td></tr>";
	$output .= "<tr><th>Spayed or Neutered:</th><td>$fixed</td></tr>";
	$output .= "<tr><th>Are you Employed?:</th><td>$employment</td></tr>";
	$output .= "<tr><th>Name and Address of Current Employer:</th><td>$employmer</td></tr>";
	$output .= "<tr><th>Occupation:</th><td>$occupation</td></tr>";
	$output .= "<tr><th>If Unemployed, Length of Unemployment:</th><td>$neetlength</td></tr>";
	$output .= "<tr><th>Name and Address of Former Employer:</th><td>$formerEmployer</td></tr>";
	$output .= "<tr><th>Number of Human Dependents:</th><td>$dependents</td></tr>";
	$output .= "<tr><th>Age of Human Dependents:</th><td>$dependentsAge</td></tr>";
	$output .= "<tr><th>Marital Status:</th><td>$maritial</td></tr>";
	$output .= "<tr><th>Total Net Annual Family Income:</th><td>$income</td></tr>";
	$output .= "<tr><th>Access to Other Funds:</th><td>$otherFunds</td></tr>";
	$output .= "<tr><th>Special Circumstances:</th><td>$circumstances</td></tr>";
	$output .= "<tr><th>How much can you afford (total)?:</th><td>$afford</td></tr>";
	$output .= "<tr><th>How much have you been quoted for your total treatment cost?:</th><td>$quote</td></tr>";
	$output .= "<tr><th>How much have you spent?:</th><td>$spent</td></tr>";
	$output .= "<tr><th>How did you pay for the initial expenses?:</th><td>$initialPay</td></tr>";
	$output .= "<tr><th>Your Vet's Name:</th><td>$veterinarian</td></tr>";
	$output .= "<tr><th>Clininc:</th><td>$clinic</td></tr>";
	$output .= "<tr><th>Cancer Treatment applying for:</th><td>$treatment</td></tr>";
	$output .= "<tr><th>Why do you want your pet to receive treatment?:</th><td>$essay</td></tr>";
	$output .= "<tr><th>How did you hear about ACTSS?:</th><td>$actss</td></tr>";
	$output .= "<tr><th>Name:</th><td>$signature</td></tr>";
 	?>
<body> 
	<div class="container">
		<h1>Subsidization - Review your information</h1> 
		<div class="output">
			<?php echo $output; ?>
		</div>
	</div>
</body>
</html>


