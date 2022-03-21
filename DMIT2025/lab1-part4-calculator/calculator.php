<?php 

if (isset($_GET['calculate'])){
	// echo "<pre>"; 
	// var_dump($_GET);
	// echo "</pre>"; 

	$num1 = $_GET["num1"];
	$operator = $_GET["operator"];
	$num2 = $_GET["num2"];

	echo "$num1 $operator $num2";

	switch ($operator) {
		case '+':
			$result = $num1 + $num2;
			break;
		case '-':
			$result = $num1 - $num2;
			break;
		case '*':
			$result = $num1 * $num2;
			break;
		case '/':
			$result = $num1 / $num2;
			break;
		default:
			// code...
			break;
	}
}	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="" method="GET">
		<label for="num1">Number 1</label>
		<input type="number" id="num1" name="num1" value="<?php echo($num1); ?>">

		<label for="operator">Operator</label>
		<select name="operator" id="operator">
			<option value="+">+</option>
			<option value="-">-</option>
			<option value="*">*</option>
			<option value="/">/</option>
		</select>
 
		<label for="num2">Number 2</label>
		<input type="number" id="num2" name="num2" value="<?php echo($num2); ?>">

		<input type="submit" value="Calculate" name="calculate">
	</form>
	<?php echo $result; ?>
</body>
</html>