<?php  
	$page_title = "Insert Movie";
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
		$movieGenre = $_POST['movieGenre'];
		extract($_POST);

		if ($movieName && $movieGenre && $movieTime && $movieRating && $movieRelease && $movieSynopsis && $movieCompany && $movieDirector && $movieWeb ) {
			$movieName = ucwords($movieName);
			$movieRating = strtoupper($movieRating);
			$movieSynopsis = ucfirst($movieSynopsis);
			$movieCompany = ucwords($movieCompany);

			$sql = "INSERT INTO `a1_movies` (movie_name, movie_genre, movie_runtime, movie_rating, movie_release, movie_language, movie_score, movie_synopsis, movie_company, movie_director, movie_website) VALUES ('$movieName', '$movieGenre', '$movieTime', '$movieRating', '$movieRelease', '$movieLanguage', '$movieScore', '$movieSynopsis', '$movieCompany', '$movieDirector', '$movieWeb')";

			if ($conn->query($sql)) {
				$message = "<p class='success'>Movie added successfully</p>";
				$movieName = $movieGenre = $movieTime = 
				$movieRating = $movieRelease = $movieScore =
				$movieSynopsis = $movieCompany = $movieDirector =
				$movieWeb = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem adding the movie: $conn->error</p>";
				$movieName = $movieGenre = $movieTime = 
				$movieRating = $movieRelease = $movieScore =
				$movieSynopsis = $movieCompany = $movieDirector =
				$movieWeb = "";
			}
		}
		else
		{
			$message = "<p class='error'>All fields are required.</p>";
		}
	}
?>

<?php include("../includes/header.php"); ?>
	<h2>Insert New Movie</h2>
	<?php echo $message; ?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="movieName">Movie Name</label>
		<input type="text" id="movieName" name="movieName" placeholder="Title" value="<?php echo $movieName; ?>">

		<label for="movieGenre">Movie Genre</label>
		<select name="movieGenre" id="movieGenre">
			<option value="">Genre...</option>
			<option value="sci-fi">Sci-Fi</option>
			<option value="drama">Drama</option>
			<option value="action">Action</option>
			<option value="comedy">Comedy</option>
			<option value="animation">Animation</option>
			<option value="romance">Romance</option>
		</select>

		<label for="movieTime">Movie Runtime</label>
		<input type="text" id="movieTime" name="movieTime" placeholder="0h 0min" value="<?php echo $movieTime; ?>">

		<label for="movieRating">Movie Rating</label>
		<input type="text" id="movieRating" name="movieRating" placeholder="G,PG,R etc." value="<?php echo $movieRating; ?>">

		<label for="movieRelease">Movie Release</label>
		<input type="text" id="movieRelease" name="movieRelease" placeholder="Release Year" value="<?php echo $movieRelease; ?>">

		<p>Movie Language</p>
		<label for="movieLanguage">English</label>
		<input type="radio" id="movieLanguage" name="movieLanguage" value="english" checked>
		<label for="movieLanguage">French</label>
		<input type="radio" id="movieLanguage" name="movieLanguage" value="french">
		<label for="movieLanguage">International</label>
		<input type="radio" id="movieLanguage" name="movieLanguage" value="international">
		<br>
		<label for="movieScore">Movie Score</label>
		<input type="number" id="movieScore" name="movieScore" step="10" min="0" max="100" placeholder="1 - 100">

		<label for="movieSynopsis">Movie Synopsis</label>
		<textarea name="movieSynopsis" id="movieSynopsis" cols="30" rows="10" placeholder="Description..." value=""><?php echo $movieSynopsis ?></textarea>

		<label for="movieCompany">Movie Company</label>
		<input type="text" id="movieCompany" name="movieCompany" placeholder="Production Company" value="<?php echo $movieCompany; ?>">

		<label for="movieDirector">Movie Director</label>
		<input type="text" id="movieDirector" name="movieDirector" placeholder="Director" value="<?php echo $movieDirector; ?>">

		<label for="movieWeb">Movie Website</label>
		<input type="url" id="movieWeb" name="movieWeb" placeholder="https://example.com" pattern="https://.*" size="30" value="<?php echo $movieWeb; ?>">

		<input type="submit" name="register" value="Add Movie">
	</form>
<?php include("../includes/footer.php"); ?>