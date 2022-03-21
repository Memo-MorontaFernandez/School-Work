<?php  
	$page_title = "Insert Courses";
	$body_class = "insert";
	include ("../includes/connect.php");

	session_start();
	if (isset($_SESSION['qwertyuiopasdfghjkl-Guillermo']))
	{
		echo "";
	} else {
		header("Location:../login.php");
	}

	if (isset($_POST['register'])) {
		extract($_POST);

		if ($courseName && $courseCode && $description) {
			$course_name = ucwords($course_name);
			$course_code = strtoupper($course_code);
			$course_description = ucfirst($course_description);

			$sql = "INSERT INTO `a1_Courses` (course_name, course_code, course_description)VALUES ('$courseName', '$courseCode', '$description')";

			if ($conn->query($sql)) {
				$message = "<p class='success'>Record inserted successfully</p>";
				$courseName = $courseCode = $description = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem inserting records: $conn->error</p>";
				$courseName = $courseCode = $description = "";
			}
		}
		else
		{
			$message = "<p class='error'>All fields are required.</p>";
		}
	}
?>

<?php include("../includes/header.php"); ?>
	<h2>Insert Course</h2>
	<?php echo $message; ?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="courseName">Course Name</label>
		<input type="text" id="courseName" name="courseName" value="<?php echo $courseName; ?>">

		<label for="courseCode">Course Code</label>
		<input type="text" id="courseCode" name="courseCode" value="<?php echo $courseCode; ?>">

		<label for="description">Course Description</label>
		<input type="text" id="description" name="description" value="<?php echo $description; ?>">

		<input type="submit" name="register" value="Register Course">
	</form>
<?php include("../includes/footer.php"); ?>