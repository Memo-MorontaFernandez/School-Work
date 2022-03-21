<?php 
	include ("includes/connect.php"); 
	$page_title = "Display Movie";
	$row_to_display = $_GET['row_to_display'];
?>

<?php include ("includes/header.php"); ?>

<?php if ($row_to_display): ?>
		<?php  
			$row_to_display_sql = "SELECT movie_name, movie_genre, movie_runtime, movie_rating, movie_release, movie_language, movie_score, movie_synopsis, movie_company, movie_director, movie_website FROM a1_movies WHERE movie_id = $row_to_display";

			$row_to_display_result = $conn->query($row_to_display_sql);

			$row_to_display_row = $row_to_display_result->fetch_assoc();

			extract($row_to_display_row);
		?>

		<div>
			<h2><?php echo $movie_name ?></h2>
			<p>Genre - <?php echo ucfirst($movie_genre) ?></p>
			<p>Runtime - <?php echo $movie_runtime ?></p>
			<p>Rating - <?php echo $movie_rating ?></p>
			<p>Runtime - <?php echo $movie_release ?></p>
			<p>Language - <?php echo ucfirst($movie_language); ?></p>
			<p>Score - <?php echo $movie_score ?></p>
			<p><b>Synopsis</b> <br><?php echo $movie_synopsis ?></p>
			<p>Production - <?php echo $movie_company ?></p>
			<p>Director - <?php echo $movie_director ?></p>
			<p>Website - <a href="<?php echo $movie_website ?>" target="_blank"><?php echo $movie_website ?></a></p>
		</div>
<?php endif ?>

<?php include ("includes/footer.php"); ?>