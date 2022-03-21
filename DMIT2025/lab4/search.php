<?php  
	$page_title = "Search Courses";
	$body_class = "search";
	include "includes/connect.php";

	if (isset($_POST['search-btn'])) {
		$search = trim($_POST['search']);
		$search = filter_var($search, FILTER_SANITIZE_STRING);

		if (strlen($search) < 3){
			$error = "<p class='error'>Please input more than three characters</p>";
		}
		else {
			$sql = "SELECT course_code, course_name, course_description FROM a1_Courses WHERE deletedYN ='N' AND (course_code LIKE '%$search%' OR course_name LIKE '%$search%' OR course_description LIKE '%$search%')";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc())
				{
					extract($row);
					$course_name = ucwords($course_name);
					$course_code = strtoupper($course_code);
					$course_description = ucfirst($course_description);

					$output .= "<div>";
					$output .= "<h2>$course_name - $course_code</h2>";
					$output .= "<p>$course_description</p>";
					$output .= "</div>";
				}
			}
			else {
				$error = "<p class='error'>No courses match your search.</p>";
			}
		}
	}
?>

<?php include ("includes/header.php"); ?>
<?php echo $error;
	echo $sql;
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	
	<label for="search">Search:</label>
	<input type="text" id="search" name="search"
	value="<?php echo $search; ?>">

	<input type="submit" name="search-btn" value="Search">
</form>
<?php echo $output; ?>
<?php include ("includes/footer.php"); ?>