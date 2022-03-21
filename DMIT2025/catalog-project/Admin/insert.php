<?php  
	session_start();
	include ("../includes/connect.php");
	include ("image-functions.php");
	$page_title = "Add Series";
	$thumb_folder = "../thumbnails/";
	$display_folder = "../display/";
	$original_folder = "../images/";
	// $id = $_GET['id'];


	session_start();
	if (isset($_SESSION['guillermobiglongrandomsessionvariablefora1']) && $_SESSION['role'] == "Admin")
	{
		echo "";
	} else {
		header("Location:../login.php");
	}

	if (isset($_POST['register'])) {
		extract($_POST);
		$genre = $_POST['genre'];
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

		// Image Variables
		$imageName = $_FILES['image']["name"];
		$imageType = $_FILES['image']["type"];
		$imageTmp = $_FILES['image']["tmp_name"];
		$imageError = $_FILES['image']["error"];
		$imageSize = $_FILES['image']["size"];
		$imageValid = true;
		

		// Image Validation
		if ($imageSize > 2000000) {
			$message .= "<p>Uploaded image is too large. 1Mb limit.</p>";
			$imageValid = false;
		}

		if ($imageError > 0) {
			$message .= "<p>There was an error of type $imageError that occurred.</p>";
			$imageValid = false;
		}

		$allowed_file_types = array("image/jpeg", "image/pjepg", "image/png");

		if (!in_array($imageType, $allowed_file_types)) {
			$message .= "<p>Invalid file type. Valid types are jpeg, png, webp.</p>";
			$imageValid = false;
		}

		if ($seriesName && $seriesRelease && $seasons && $seriesDirector && $genre && $streaming && $guillermoScore && $imageName && $seriesSynopsis && $guillermoReview ) {

			// Image validation check and file moving
			if ($imageValid == true) {
				$upload_file = $original_folder . $imageName;
				if (move_uploaded_file($imageTmp, $upload_file)) {
					if ($imageType == 'image/jpeg') {
						resize_image($upload_file, $thumb_folder, 175);
						resize_image($upload_file, $display_folder, 1000);
					} else {
						resize_png($upload_file, $thumb_folder, 175);
						resize_png($upload_file, $display_folder, 1000);
					}
				}
			}

			$sql = "INSERT INTO `a1_finalProject` (artwork, director, genre, release_year, review, review_score, seasons, streaming_service, synopsis, title) VALUES ('$imageName', '$seriesDirector', '$genre', '$seriesRelease', '$guillermoReview', '$guillermoScore', '$seasons', '$streaming', '$seriesSynopsis', '$seriesName')";

			if ($conn->query($sql)) {
				$message = "<p class='success'>Series added successfully</p>";
				$seriesName = $seriesRelease = $seasons = 
				$seriesDirector = $genre = $streaming =
				$guillermoScore = $seriesSynopsis = $seriesSynopsis = "";
			} 
			else
			{
				$message = "<p class='error'>There was a problem adding the series: $conn->error</p>";
			}
		}
		else
		{
			$message = "<p class='error'>All fields are required.</p>";
		}
		// End of SQL Insert
	}
	// End of If POST
?>

<?php include("../includes/header.php"); ?>

<div class="flexbox">
	<h3>Insert New Series</h3>

	<a href="admin.php">Admin</a>
</div>

<?php echo $message; ?>

<div class="seriesForm">
	<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data" method="POST" class="series">
		<label for="seriesName">Title:</label>
		<input type="text" id="seriesName" name="seriesName" placeholder="Title" value="<?php echo $seriesName; ?>">

		<label for="seriesRelease">Release Year:</label>
		<input type="text" id="seriesRelease" name="seriesRelease" placeholder="Release Year" value="<?php echo $seriesRelease; ?>">

		<label for="seasons">Seasons:</label>
		<input type="number" id="seasons" name="seasons" min="0" max="100" step="1" 
		value="<?php echo $seasons; ?>">

		<label for="seriesDirector">Series Director:</label>
		<input type="text" id="seriesDirector" name="seriesDirector" placeholder="Director(s)" value="<?php echo $seriesDirector; ?>">

		<label for="genre">Genre:</label>
		<select name="genre" id="genre">
			<option value="">Genre...</option>
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
		<input type="text" id="streaming" name="streaming" placeholder="Platform" value="<?php echo $streaming; ?>">

		<label for="guillermoScore">Guillermo's Score:</label>
		<input type="text" id="guillermoScore" name="guillermoScore" placeholder="*/5" value="<?php echo $guillermoScore; ?>">

		<label for="image">Series Image:</label>
		<input type="file" name="image" id="image">

		<label for="seriesSynopsis">Synopsis:</label>
		<textarea name="seriesSynopsis" id="seriesSynopsis" cols="30" rows="10" placeholder="Description..." value=""><?php echo $seriesSynopsis; ?></textarea>

		<label for="guillermoReview">Review:</label>
		<textarea name="guillermoReview" id="guillermoReview" cols="30" rows="10" placeholder="Review...">
			
		</textarea>

		<input type="submit" name="register" value="Add">
	</form>
</div>
	

<?php include("../includes/footer.php"); ?>