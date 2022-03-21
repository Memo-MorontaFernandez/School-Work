<?php 
	$page_title = "Delete";
	$body_class = ""; 
	include("../includes/connect.php");

	session_start();
	if (isset($_SESSION['guillermobiglongrandomsessionvariablefora1']) && $_SESSION['role'] == "Admin")
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
		$update_sql = "UPDATE a1_finalProject SET deletedYN = 'Y' WHERE media_id = $row_to_delete";
		if ($conn->query($update_sql)) {
			$message = "<p class='success'>The series was marked for deletion.</p>";
		}
		else
		{
			$message = "<p class='error'>Could not delete the series. $conn->error</p>";
		}
	}
?>

<?php  
	include("../includes/header.php");
?>

<div>
	<h2>Delete Series</h2>
	<?php
		echo $message;
	// Get list of courses
		$list_sql = "SELECT title, release_year, media_id FROM a1_finalProject WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<a href=\"delete.php?row_to_edit=$media_id\" class='confirmation'>";
     				echo "$title ($release_year)";
     				echo "</a>";
     			echo "</li>";
     		}
     		echo "</ul>";
     	}
	?>

	<div><a href="admin.php">Admin</a></div>
</div>

<?php  
	include("../includes/footer.php");
?>

<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Delete Series?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>