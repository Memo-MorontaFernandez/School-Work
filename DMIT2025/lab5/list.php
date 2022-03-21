<?php include ("includes/connect.php"); ?> 

<?php include ("includes/header.php"); ?>

<div>
	<h3>Movie Database - Movie List</h3>
	<?php
		$list_sql = "SELECT movie_name, movie_release, movie_id FROM a1_movies WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 

     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<p class='course-list'><a href=\"movie.php?row_to_display=$movie_id\">";
     				echo "$movie_name ($movie_release)";
     				echo "</a></p>";
     			echo "</li>";
     		}
     		echo "</ul>";
     	}
	?>
</div>

<?php include ("includes/footer.php"); ?>