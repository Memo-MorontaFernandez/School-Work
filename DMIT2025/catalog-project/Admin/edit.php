<?php  
	session_start();
	$page_title = "Edit Series";
	include("../includes/connect.php");
	$body_class = "two-column edit";
	$row_to_edit = $_GET['row_to_edit'];

	session_start();
	if (isset($_SESSION['guillermobiglongrandomsessionvariablefora1']) && $_SESSION['role'] == "Admin")
	{
		echo "";
	} else {
		header("Location:../login.php");
	}

	if (isset($_POST['update'])) {
		extract($_POST);
		$seriesName = filter_var($seriesName, FILTER_SANITIZE_STRING);
		$seriesName = ucwords($seriesName);
		$seriesDirector = filter_var($seriesDirector, FILTER_SANITIZE_STRING);
		$seriesDirector = ucwords($seriesDirector);
		$seriesSynopsis = filter_var($seriesSynopsis, FILTER_SANITIZE_STRING);
		$seriesSynopsis = ucfirst($seriesSynopsis);
		$guillermoReview = filter_var($guillermoReview, FILTER_SANITIZE_STRING);
		$guillermoReview = ucfirst($guillermoReview);
		$streaming = filter_var($streaming, FILTER_SANITIZE_STRING);
		$streaming = ucfirst($streaming);
		$guillermoScore = filter_var($guillermoScore, FILTER_SANITIZE_STRING);
		$guillermoScore = ucfirst($guillermoScore);
		$seriesRelease = filter_var($seriesRelease, FILTER_SANITIZE_STRING);

		if ($seriesName && $seriesRelease && $seasons && $seriesDirector && $seriesGenre && $streaming && $guillermoScore && $seriesSynopsis && $guillermoReview)  {
			$update_sql = "UPDATE a1_finalProject SET title = '$seriesName', seasons = '$seasons', release_year = '$seriesRelease', director = '$seriesDirector', genre = '$seriesGenre', synopsis = '$seriesSynopsis', review_score = '$guillermoScore', review = '$guillermoReview', streaming_service = '$streaming' WHERE media_id = $row_to_edit";

			if ($conn->query($update_sql)) {
				$message = "<p class='success'>Series updated successfully</p>";
				$seriesName = $seriesRelease = $seasons = 
				$seriesDirector = $seriesGenre = $streaming =
				$guillermoScore = $seriesSynopsis = $seriesSynopsis = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem updating the series: $conn->error</p>";
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
	<h2>Edit Series</h2>
	<?php
		$list_sql = "SELECT title, release_year, media_id FROM a1_finalProject WHERE deletedYN = 'N'";
		$list_result = $conn->query($list_sql); 
     	
     	if ($list_result->num_rows > 0) {
     		echo "<ul>";
     		while($list_row = $list_result->fetch_assoc())
     		{
     			extract($list_row);
     			echo "<li>";
     				echo "<a href=\"edit.php?row_to_edit=$media_id\">";
     				echo "$title ($release_year)";
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
			$row_to_edit_sql = "SELECT title, seasons, release_year, director, genre, artwork, synopsis, review_score, review, streaming_service FROM a1_finalProject WHERE media_id = $row_to_edit";

			$row_to_edit_result = $conn->query($row_to_edit_sql);

			$row_to_edit_row = $row_to_edit_result->fetch_assoc();

			extract($row_to_edit_row);
		?>

<div class="flexbox">
	<h3>Insert New Series</h3>

	<a href="admin.php">Admin</a>
</div>

<div class="seriesForm">
	<?php echo $message; ?>
	<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data" method="POST" class="series">
		<label for="seriesName">Title:</label>
		<input type="text" id="seriesName" name="seriesName" placeholder="Title" value="<?php if($seriesName) echo $seriesName; else echo $title; ?>">

		<label for="seriesRelease">Release Year:</label>
		<input type="text" id="seriesRelease" name="seriesRelease" placeholder="Release Year" value="<?php if($seriesRelease) echo $seriesRelease; else echo $release_year; ?>">

		<label for="seasons">Seasons:</label>
		<input type="number" id="seasons" name="seasons" min="0" max="100" step="1" 
		value="<?php echo $seasons; ?>">

		<label for="seriesDirector">Series Director:</label>
		<input type="text" id="seriesDirector" name="seriesDirector" placeholder="Director(s)" value="<?php if($seriesDirector) echo $seriesDirector; else echo $director; ?>">

		<label for="seriesGenre">Genre:</label>
		<select name="seriesGenre" id="seriesGenre">
			<option value="<?php if($seriesGenre) echo $seriesGenre; else echo $genre; ?>"><?php echo ucfirst($genre) ?></option>
			<option value="action">Action</option>
			<option value="animation">Animation</option>
			<option value="comedy">Comedy</option>
			<option value="drama">Drama</option>
			<option value="fantasy">Fantasy</option>
			<option value="horror">Horror</option>
			<option value="romance">Romance</option>
			<option value="sci-fi">Sci-Fi</option>
		</select>

		<label for="streaming">Stream Platform:</label>
		<input type="text" id="streaming" name="streaming" placeholder="Platform" value="<?php if($streaming) echo $streaming; else echo $streaming_service; ?>">

		<label for="guillermoScore">Guillermo's Score:</label>
		<input type="text" id="guillermoScore" name="guillermoScore" placeholder="*/5" value="<?php if($guillermoScore) echo $guillermoScore; else echo $review_score; ?>">

		<label for="seriesSynopsis">Synopsis:</label>
		<textarea name="seriesSynopsis" id="seriesSynopsis" cols="30" rows="10" placeholder="Description..."><?php if($seriesSynopsis) echo trim($seriesSynopsis); else echo trim($synopsis); ?></textarea>

		<label for="guillermoReview">Review:</label>
		<textarea name="guillermoReview" id="guillermoReview" cols="30" rows="10" placeholder="Review..."><?php if($guillermoReview) echo trim($guillermoReview); else echo trim($review); ?></textarea>

		<input type="submit" name="update" value="Update">
	</form>
</div>
<?php endif ?>