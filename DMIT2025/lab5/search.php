<?php   
	$page_title = "Search Movies";
	$body_class = "search";
	include "includes/connect.php";

	if (isset($_POST['search-btn'])) {
		$search = trim($_POST['search']);
		$search = filter_var($search, FILTER_SANITIZE_STRING);

		if (strlen($search) < 3){
			$error = "<p class='error'>Please input more than three characters</p>";
		}
		else {
			$sql = "SELECT movie_id, movie_name, movie_synopsis FROM a1_movies WHERE deletedYN = 'N' AND (movie_name LIKE '%$search%' OR movie_genre LIKE '%$search%' OR movie_language LIKE '%$search%' OR movie_synopsis LIKE '%$search%' OR movie_company LIKE '%$search%' OR movie_director LIKE '%$search%')";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc())
				{
					extract($row);
					$movie_name = ucwords($movie_name);
					$movie_rating = strtoupper($movie_rating);
					$movie_synopsis = ucfirst($movie_synopsis);
					$movie_company = ucwords($movie_company);

					$output .= "<div>";
					$output .= "<h2><a href=\"movie.php?row_to_display=$movie_id\">$movie_name</a></h2>";
					$output .= "<p>$movie_synopsis</p>";
					$output .= "</div>";
				}
			}
			else {
				$error = "<p class='error'>No movies match your search.</p>";
			}
		}
	}
?>

<?php include ("includes/header.php"); ?>
<?php echo $error; ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	
	<label for="search">Search:</label>
	<input type="text" id="search" name="search"
	value="<?php echo $search; ?>">

	<input type="submit" name="search-btn" value="Search">
</form>
<?php echo $output; ?>
<?php include ("includes/footer.php"); ?>