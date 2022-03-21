<?php  
	$page_title = "Edit Courses";
	include("../includes/connect.php");
	$body_class = "two-column edit";
	$row_to_edit = $_GET['row_to_edit'];

	session_start();
	if (isset($_SESSION['qwertyuiopasdfghjkl-Guillermo']))
	{
		echo "";
	} else {
		header("Location:../login.php");
	}

	if (isset($_POST['save'])) {
		extract($_POST);
		$name = ucwords($course_name);
		$code = strtoupper($course_code);
		$desc = ucfirst($course_description);

		if ($name && $code && $desc) {
			$update_sql = "UPDATE a1_Courses SET course_name = '$name', course_code = '$code', course_description = '$desc' WHERE c_id = $row_to_edit";

			if ($conn->query($update_sql)) {
				$message = "<p class='success'>Record updated successfully</p>";
				$course_name = $course_code = $course_description = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem updating records: $conn->error</p>";
			}
		}
		else
		{
			$message = "<p class='error'>All fields are required.</p>";
		}
	}
?>



<?php  
	include("../includes/header.php");
?>

<div>
	<h2>Edit Courses</h2>
	<?php
		$list_sql = "SELECT course_code, course_name, c_id FROM a1_Courses WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<a href=\"edit.php?row_to_edit=$c_id\">";
     				echo "$course_name ($course_code)";
     				echo "</a>";
     			echo "</li>";
     		}
     		echo "</ul>";
     	}
	?>
</div>

<div>
	<?php if ($row_to_edit): ?>
		<?php  
			$row_to_edit_sql = "SELECT course_code, course_description, course_name FROM a1_Courses WHERE c_id = $row_to_edit";

			$row_to_edit_result = $conn->query($row_to_edit_sql);

			$row_to_edit_row = $row_to_edit_result->fetch_assoc();

			extract($row_to_edit_row);
		?>
		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
			<?php echo $message; ?>
			<label for="course_name">Course Name</label>
			<input type="text" id="course_name" name="course_name" value="<?php if($name) echo $name; else echo $course_name; ?>">

			<label for="course_code">Course Code</label>
			<input type="text" id="course_code" name="course_code" value="<?php if($code) echo $code; else echo $course_code; ?>">

			<label for="course_description">Course Description</label>
			<input type="text" id="course_description" name="course_description" value="<?php if($desc) echo $desc; else echo $course_description; ?>">

			<input type="submit" name="save" value="Save Changes">
		</form>
	<?php endif ?>
</div>

<?php  
	include("../includes/footer.php");
?>