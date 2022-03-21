<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>

<?php
if(isset($_POST["submit"]))
{
	// echo "<pre>";
 // 	var_dump($_GET); 
 // 	echo "</pre>";

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
}
 	?>

<body>
	<form action="form-data.php" method="POST">
		
		<h2>Information</h2>
		<label for="owner">Pet owners name:</label>
		<input type="text" id="owner" name="owner" value="<?php echo $city; ?>">

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" value="<?php echo $city; ?>">

		<label for="city">City:</label>
		<input type="text" id="city" name="city" value="<?php echo $city; ?>">

		<label for="postal">Postal code:</label>
		<input type="text" id="postal" name="postal" value="<?php echo $city; ?>">

		<label for="home">Home phone:</label>
		<input type="text" id="home" name="home" value="<?php echo $city; ?>">

		<label for="work">Work phone:</label>
		<input type="text" id="work" name="work" value="<?php echo $city; ?>">

		<label for="cell">Cell phone:</label>
		<input type="text" id="cell" name="cell" value="<?php echo $city; ?>">

		<label for="email">Email address:</label>
		<input type="text" id="email" name="email" value="<?php echo $city; ?>">

		<label for="petname">Pets name:</label>
		<input type="text" id="petname" name="petname" value="<?php echo $city; ?>">

		<label for="petage">Pets age:</label>
		<input type="text" id="petage" name="petage" value="<?php echo $city; ?>">

		<label for="breed">Pets breed:</label>
		<input type="text" id="breed" name="breed" value="<?php echo $city; ?>">

		<label for="petsex">Pet sex:</label>
		<select name="petsex" id="petsex">
			<option value="">Please select an option</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>

		<label for="weight">Pets weight:</label>
		<input type="text" id="weight" name="weight" value="<?php echo $city; ?>">

		<label for="fixed">Spayed/Neutered</label>
		<select name="fixed" id="fixed">
			<option value="">Please select an option</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
		
		<hr>

		<h2>Employment Information</h2>
		<label for="employment">Are you employed?</label>
		<select name="employment" id="employment">
			<option value="">Please select an option</option>
			<option value="Employed">Employed</option>
			<option value="Unemployed">Unemployed</option>
		</select>

		<label for="occupation">Occupation:</label>
		<input type="text" id="occupation" name="occupation" value="<?php echo $city; ?>">

		<label for="employer">Name and address of employer?</label>
		<textarea id="employer" name="employer" rows="4" cols="50"></textarea>

		<label for="neetlength">If unemployed, length of unemployment:</label>
		<input type="text" id="neetlength" name="neetlength" value="<?php echo $city; ?>">

		<label for="formerEmployer">Name and address of former employer?</label>
		<textarea id="formerEmployer" name="formerEmployer" rows="4" cols="50"></textarea>
		
		<hr>

		<h2>Additional Information</h2>

		<label for="dependents">Number of human dependents:</label>
		<input type="text" id="dependents" name="dependents" value="<?php echo $city; ?>">

		<label for="dependentsAge">Age of Dependents:</label>
		<textarea id="dependentsAge" name="dependentsAge" rows="4" cols="50"></textarea>

		<label for="maritial">Maritial Status</label>
		<select name="maritial" id="maritial">
			<option value="">Please select an option</option>
			<option value="married">Married</option>
			<option value="single">Single</option>
		</select>

		<label for="income">Maritial Status</label>
		<select name="income" id="income">
			<option value="">Select an income level</option>
			<option value="$55,000 - $35,000">$55,000 to $35,000</option>
			<option value="$35,000 - $15,000">$34,000 - $15,000</option>
			<option value="$15,000 or less">$15,000 or less</option>
		</select>

		<label for="highIncome">If over $55,000:</label>
		<input type="text" name="highIncome" id="highIncome">

		<label for="otherFunds">Do you have access to other funds (savings, investments, friends, family, RRSP's, etc)?</label>
		<textarea id="otherFunds" name="otherFunds" rows="4" cols="50"></textarea>

		<label for="circumstances">Special circumstances in the past year that affect your ability to pay for your pet's cancer therapies:</label>
		<textarea id="circumstances" name="circumstances" rows="4" cols="50"></textarea>

		<label for="afford">How much can you afford (over and above travel costs) towards the treatment (both cancer and post cancer) of your pet? (This information must be included for your application to be considered complete):</label>
		<div>$ <input type="number" min="0" step="100" name="afford" id="afford" required> total</div>

		<label for="quote">What have you been quoted for your total treatment cost?</label>
		<div>$ <input type="number" min="0" step="100" name="quote" id="quote"></div>

		<label for="spent">How much have you already spent in the diagnosis and treatment of this cancer? Please attach receipts or veterinary summary of expenditures ONLY relevant to your pet's cancer:</label>
		<div>$ <input type="number" min="0" step="100" name="spent" id="spent"></div>

		<label for="initialPay">How did you pay for these initial expenses (ie: savings account, family, credit card, etc)?</label>
		<textarea id="initialPay" name="initialPay" rows="4" cols="50"></textarea>

		<label for="veterinarian">Who is your Veterinarian for routine care? By signing this you are agreeing that we will also be contacting them to complete forms for your application:</label>
		<input type="text" id="veterinarian" name="veterinarian" value="<?php echo $city; ?>">

		<label for="clinic">Clinic Name:</label>
		<input type="text" id="clinic" name="clinic" value="<?php echo $city; ?>">

		<label for="treatment">Cancer Treatment you are applying for : (eg. Chemotherapy, radiation, surgery):</label>
		<input type="text" id="treatment" name="treatment" value="<?php echo $city; ?>">

		<label for="essay">Please write a short essay to answer the question... "Why I want my pet to receive cancer treatment?":</label>
		<textarea id="essay" name="essay" rows="4" cols="50"></textarea>

		<label for="actss">How did you hear about ACTSS?</label>
		<textarea id="actss" name="actss" rows="4" cols="50"></textarea>

		<hr>

		<p>I, the undersigned, do hereby certify that the information provided by me on this form is true. I am hereby applying for sponsorship from the Animal Cancer Therapy Subsidization Society. I give permission for ACTSS to contact my veterinarian and employer if additional information is necessary. I agree to share a picture and a short story of my pet if my application is successful and understand that the picture and story will be displayed on the ACTSS website or ACTSS publicationsfor promotional purposes. Surnames will not be used. I also understand that I may be contacted with ACTSS related publications.</p>

		<p>In order to complete your application please submit the legal release documentand applicable receipts via fax (780) 466-4670 or scan and email to info@actssalberta.ca</p>

		<label for="signature">Name:</label>
		<input type="text" id="signature" name="signature" value="<?php echo $signature; ?>">
		<b>Dated: 09-25-2021</b>

		<input type="submit" value="SUBMIT" name="submit">
	</form>
</body>
</html>