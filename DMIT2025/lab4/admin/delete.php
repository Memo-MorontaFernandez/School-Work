<?php 
	$page_title = "Delete Courses";
	$body_class = ""; 
	include("../includes/connect.php");

	session_start();
	if (isset($_SESSION['qwertyuiopasdfghjkl-Guillermo']))
	{
		echo "";
	} else {
		header("Location:../login.php");
	}
?>

<?php  
	// Get variable to do update query
	$row_to_delete = $_GET['row_to_edit'];

	if ($row_to_delete && is_numeric($row_to_delete)) {
		$update_sql = "UPDATE a1_Courses SET deletedYN = 'Y' WHERE c_id = $row_to_delete";
		if ($conn->query($update_sql)) {
			$message = "<p class='success'>Record was deleted.</p>";
		}
		else
		{
			$message = "<p class='error'>Could not delete the course. $conn->error</p>";
		}
	}
?>

<?php  
	include("../includes/header.php");
?>

<div>
	<h2>Delete Courses</h2>
	<?php
		echo $message;
	// Get list of courses
		$list_sql = "SELECT course_code, course_name, c_id FROM a1_Courses WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<a href=\"delete.php?row_to_edit=$c_id\" class='confirmation'>";
     				echo "$course_name ($course_code)";
     				echo "</a>";
     			echo "</li>";
     		}
     		echo "</ul>";
     	}
	?>
</div>

<?php  
	include("../includes/footer.php");
?>

<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Delete Course?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>