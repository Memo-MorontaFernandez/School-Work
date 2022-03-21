<?php  
	$page_title = "Edit Movies";
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

		if ($movieName && $movieGenre && $movieTime && $movieRating && $movieRelease && $movieLanguage && $movieScore && $movieSynopsis && $movieCompany && $movieDirector && $movieWeb ) {
			$update_sql = "UPDATE a1_movies SET movie_name = '$movieName', movie_genre = '$movieGenre', movie_runtime = '$movieTime', movie_rating = '$movieRating', movie_release = '$movieRelease', movie_language = '$movieLanguage', movie_score = '$movieScore', movie_synopsis = '$movieSynopsis', movie_company = '$movieCompany', movie_director = '$movieDirector', movie_website = '$movieWeb' WHERE movie_id = $row_to_edit";

			if ($conn->query($update_sql)) {
				$message = "<p class='success'>Movie updated successfully</p>";
				$movieName = $movieGenre = $movieTime = 
				$movieRating = $movieRelease = $movieScore =
				$movieSynopsis = $movieCompany = $movieDirector =
				$movieWeb = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem updating the movie: $conn->error</p>";
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
	<h2>Edit Movies</h2>
	<?php
		$list_sql = "SELECT movie_name, movie_release, movie_id FROM a1_movies WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<a href=\"edit.php?row_to_edit=$movie_id\">";
     				echo "$movie_name ($movie_release)";
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
			$row_to_edit_sql = "SELECT movie_name, movie_genre, movie_runtime, movie_rating, movie_release, movie_language, movie_score, movie_synopsis, movie_company, movie_director, movie_website FROM a1_movies WHERE movie_id = $row_to_edit";

			$row_to_edit_result = $conn->query($row_to_edit_sql);

			$row_to_edit_row = $row_to_edit_result->fetch_assoc();

			extract($row_to_edit_row);
		?>

		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST">
			<?php echo $message; ?>

		<label for="movieName">Movie Name</label>
		<input type="text" id="movieName" name="movieName" placeholder="Title" value="<?php if($movieName) echo $movieName; else echo $movie_name; ?>">

		<label for="movieGenre">Movie Genre</label>
		<select name="movieGenre" id="movieGenre">
			<option value="<?php if($movieGenre) echo $movieGenre; else echo $movie_genre; ?>"><?php echo ucfirst($movie_genre) ?></option>
			<option value="sci-fi">Sci-Fi</option>
			<option value="drama">Drama</option>
			<option value="action">Action</option>
			<option value="comedy">Comedy</option>
			<option value="animation">Animation</option>
			<option value="romance">Romance</option>
		</select>

		<label for="movieTime">Movie Runtime</label>
		<input type="text" id="movieTime" name="movieTime" placeholder="0h 0min" value="<?php if($movieTime) echo $movieTime; else echo $movie_runtime; ?>">

		<label for="movieRating">Movie Rating</label>
		<input type="text" id="movieRating" name="movieRating" placeholder="G,PG,R etc." value="<?php if($movieRating) echo $movieRating; else echo $movie_rating; ?>">

		<label for="movieRelease">Movie Release</label>
		<input type="text" id="movieRelease" name="movieRelease" placeholder="Release Year" value="<?php if($movieRelease) echo $movieRelease; else echo $movie_release; ?>">

		<p>Movie Language</p>
		English <input type="radio" name="movieLanguage" value="english" 
			<?php if($movie_language == 'english'): ?>
				checked
			<?php endif ?>> 
		<br>
		French <input type="radio" name="movieLanguage" value="french"
			<?php if($movie_language == 'french'): ?>
				checked
			<?php endif ?>> 
		<br>
		International <input type="radio" name="movieLanguage" value="international"
			<?php if($movie_language == 'international'): ?>
				checked
			<?php endif ?>> 
		<br>

		<label for="movieScore">Movie Score</label>
		<input type="number" id="movieScore" name="movieScore" step="10" min="0" max="100" placeholder="1 - 100"
		value="<?php if($movieScore) echo $movieScore; else echo $movie_score; ?>">

		<label for="movieSynopsis">Movie Synopsis</label>
		<textarea name="movieSynopsis" id="movieSynopsis" cols="30" rows="10" placeholder="Description..." value="<?php $movieSynopsis ?>"><?php if($movieSynopsis) echo $movieSynopsis; else echo $movie_synopsis; ?></textarea>

		<label for="movieCompany">Movie Company</label>
		<input type="text" id="movieCompany" name="movieCompany" placeholder="Production Company" value="<?php if($movieCompany) echo $movieCompany; else echo $movie_company; ?>">

		<label for="movieDirector">Movie Director</label>
		<input type="text" id="movieDirector" name="movieDirector" placeholder="Director" value="<?php if($movieDirector) echo $movieDirector; else echo $movie_director; ?>">

		<label for="movieWeb">Movie Website</label>
		<input type="url" id="movieWeb" name="movieWeb" placeholder="https://example.com" pattern="https://.*" size="30" value="<?php if($movieWeb) echo $movieWeb; else echo $movie_website; ?>">

			<input type="submit" name="save" value="Save Changes">
		</form>
	<?php endif ?>
</div>

<?php  
	include("../includes/footer.php");
?>