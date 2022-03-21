<?php 
	session_start();
	$page_title = "Home";

	include("includes/connect.php"); 
	include("includes/login.php");

	if (isset($_GET)) {
		extract($_GET);
	}
?>

<?php include("includes/header.php"); ?>

<?php
	$list_sql = "SELECT title, release_year, artwork, media_id FROM a1_finalProject WHERE deletedYN = 'N'";
	$list_result = $conn->query($list_sql); 

	if ($view) {
		$list_sql = "SELECT title, release_year, artwork, media_id, director, genre, review, review_score, seasons, streaming_service, synopsis FROM a1_finalProject WHERE deletedYN = 'N' AND media_id = $view ";

		$list_result = $conn->query($list_sql);
	}
?>
		<?php if ($list_result->num_rows > 0 && $view): ?>
     		<div class="individual">
     			<?php while ($list_row = $list_result->fetch_assoc()): ?>
     			<?php extract($list_row); ?>
 					<div>
 						<h3><?php echo $title; ?></h3>
 						<img src="<?php echo 'display/'.$artwork ?>">
 						<p><?php echo $synopsis ?></p>
 						<a href="index.php">Home</a>
 					</div>
 					<br> <!-- add real styling soon -->
     			<?php endwhile ?>
     		</div>
 			<?php elseif ($list_result->num_rows > 0): ?>
 	     		<div class="list">
 	     			<?php while ($list_row = $list_result->fetch_assoc()): ?>
 	     			<?php extract($list_row); ?>
 	 					<div class="container">
 						    <div class="imageContainer">
 						    	<img src="<?php echo 'thumbnails/'.$artwork ?>" alt="series image" class="image">
 						    </div>
 						    <div class="middle">
 						    	<div class="textBg">
 						    		<a href="index.php?view=<?php echo $media_id; ?>" class="text" >
 						    		<?php echo $title . " " . $release_year ?></a>
 						    	</div>
 						    </div>
 						</div>
 	     			<?php endwhile ?>
 	     		</div>
 	     	<?php endif ?>

     	<!-- <div>
			<?php if ($count_of_records > $limit) : ?>
				<ul class="pagination">
					<li>Pages</li>
					<?php  
						$next_page = $page + 1;
						$previous_page = $page - 1;
						$anchor_string = THIS_PAGE."?search=$search&orderBy=$orderBy&order=$order&limit=$limit&page=";
					?>

					<?php if ($page > 1): ?>
						<li><a href="<?php echo $anchor_string.$previous_page; ?>"><< Prev</a></li>
					<?php endif ?>

					<?php for ($i=1; $i <= $num_pages ; $i++): ?>
						<?php if ($i != $page): ?>
							<li><a href="<?php echo $anchor_string.$i; ?>"><?php echo $i; ?></a></li>
						<?php else: ?>
							<li><?php echo $i; ?></li>
						<?php endif ?>
					<?php endfor ?>

					<?php if ($page < $num_pages): ?>
						<li><a href="<?php echo $anchor_string.$next_page; ?>">Next >></a></li>
					<?php endif ?>
				</ul>
			<?php endif ?>
		</div> -->
	
<?php include("includes/footer.php"); ?>