<?php include ("includes/connect.php"); ?> 

<?php include ("includes/header.php"); ?>

<div>
	<h3>Photographic Technology - Course List</h3>
	<?php
		$list_sql = "SELECT course_code, course_name, c_id FROM a1_Courses WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<p class='course-list'>";
     				echo "$course_name ($course_code)";
     				echo "</p>";
     			echo "</li>";
     		}
     		echo "</ul>";
     	}
	?>
</div>

<?php include ("includes/footer.php"); ?>