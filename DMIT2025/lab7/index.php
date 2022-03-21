<?php  
	$page_title = "Home";
	session_start();

	$view = $_GET['view'];
	$by_user = $_GET['by_user'];

	$limit = 4;
	$page = 1;
	$orderBy = "date_posted";
	$order = "DESC";
	$start_position = 0;
	$limit_string = " LIMIT $start_position, $limit ";

	require("includes/connect.php");

	include("login-post.php");

	include("session-time-check.php");

	include("messages.php");

	include("ad-post.php");

	if (isset($_GET)) {
		extract($_GET);
	}

	include("search-post.php");

	if ($id) {
		$get_sql = "SELECT title, ad FROM a1_forSale WHERE ad_id = $id AND u_id = ".$_SESSION['user_id'];
		$get_res = $conn->query($get_sql);
		if ($get_res->num_rows > 0) {
			$get_row = $get_res->fetch_assoc();
			$post_ad = $get_row['ad'];
			$post_title = $get_row['title'];
		}
		else
		{
			$message .= "<p>Unable to retrieve information.</p>";
		}
	}

	// count of records to paginate
	$count_sql = "SELECT COUNT(*) AS row_count FROM a1_forSale WHERE deleted_yn = 'N' AND itemsold_yn = 'N' $search_part ";
	$count_result = $conn->query($count_sql);
	if ($count_result->num_rows > 0) {
		$count_row = $count_result->fetch_assoc();
		$count_of_records = $count_row["row_count"];
	}

	if ($count_of_records > $limit) {
		$end = round($count_of_records % $limit, 0);

		$splits = round(($count_of_records - $end) / $limit, 0);

		$num_pages = $splits;

		if ($end != 0) {
			$num_pages++;
		}

		$start_position = ($page * $limit) - $limit;
		$limit_string = " LIMIT $start_position, $limit ";
	}
?>

<?php require("includes/header.php"); ?>

<div>
	<!-- Search Form -->
	<div>
		<?php include("search-form.php"); ?>
	</div>

	<?php  
	// Normal List View
		$list_sql = "SELECT ad_id, title, ad, date_posted, user_name, price, image_name, a1_users.u_id, itemsold_yn, deleted_yn FROM a1_forSale INNER JOIN a1_users ON a1_forSale.u_id = a1_users.u_id WHERE deleted_yn = 'N' AND itemsold_yn = 'N' $search_part ORDER BY $orderBy $order $limit_string ";

		$list_result = $conn->query($list_sql);

	// Individual View
		if ($view) {
			$list_sql = "SELECT ad_id, title, ad, date_posted, user_name, price, image_name, a1_users.u_id, itemsold_yn, deleted_yn FROM a1_forSale INNER JOIN a1_users ON a1_forSale.u_id = a1_users.u_id WHERE ad_id = $view AND deleted_yn = 'N' AND itemsold_yn = 'N' $search_part ORDER BY $orderBy $order $limit_string ";

			$list_result = $conn->query($list_sql);
		}

		if ($by_user) {
			$list_sql = "SELECT ad_id, title, ad, date_posted, a1_users.user_name, price, image_name, a1_users.u_id, itemsold_yn, deleted_yn FROM a1_forSale INNER JOIN a1_users ON a1_forSale.u_id = a1_users.u_id WHERE a1_users.user_name LIKE '$by_user' AND deleted_yn = 'N' AND itemsold_yn = 'N' $search_part ORDER BY $orderBy $order $limit_string ";

			$list_result = $conn->query($list_sql);
		}
	?>


	<?php if ($list_result->num_rows > 0 && $view): ?>
	<!-- Individual view -->
		<div class="">
			<?php while ($row = $list_result->fetch_assoc()): ?>
				<?php extract($row); ?>
				<?php  ?>
				<div>
					<h3><?php echo $title; ?></h3>
					<img src="<?php echo 'display/'.$image_name ?>">
					<p>Posted on <?php echo date("M d, Y g:i a", strtotime($date_posted)) ?> by <?php echo $user_name; ?></p>
					<p><?php echo '$'.$price ?></p>
					<p><?php echo $ad; ?></p>
					<a href="index.php?view=<?php echo $ad_id; ?>" class="view-details">View details</a>

					<a href="index.php?by_user=<?php echo $user_name; ?>"> <?php echo ucfirst($user_name); ?></a>

					<?php if ($_SESSION['user_id'] == $u_id):?>
						<a href="index.php?id=<?php echo $ad_id; ?>">Edit</a>

						<?php if ($itemsold_yn == 'N'): ?>
							<a href="mark-job-filled.php?id=<?php echo $ad_id; ?>">Sold</a>
						<?php endif ?>

						<?php if ($deleted_yn == 'N'): ?>
							<a href="mark-job-deleted.php?id=<?php echo $ad_id; ?>">Delete</a>
						<?php endif ?>
					<?php endif ?>
				</div>
			<?php endwhile ?>
		</div>
		
		<a href="index.php">Home</a>
	<!-- Posts By User -->
	<?php elseif ($list_result->num_rows > 0 && $by_user): ?>
		<div class="ads">
			<?php while ($row = $list_result->fetch_assoc()): ?>
				<?php extract($row); ?>
				<?php $ad = substr($ad, 0, 100).'...'; ?>
				<div>
					<h3><?php echo $title; ?></h3>
					<img src="<?php echo 'thumbnails/'.$image_name ?>">
					<p>Posted on <?php echo date("M d, Y g:i a", strtotime($date_posted)) ?> by <?php echo $user_name; ?></p>
					<p><?php echo '$'.$price ?></p>
					<p><?php echo $ad; ?></p>
					<a href="index.php?view=<?php echo $ad_id; ?>" class="view-details">View details</a>

					<a href="index.php?by_user=<?php echo $user_name; ?>"> <?php echo ucfirst($user_name); ?></a>

					<?php if ($_SESSION['user_id'] == $u_id):?>
						<a href="index.php?id=<?php echo $ad_id; ?>">Edit</a>

						<?php if ($itemsold_yn == 'N'): ?>
							<a href="mark-job-filled.php?id=<?php echo $ad_id; ?>">Sold</a>
						<?php endif ?>

						<?php if ($deleted_yn == 'N'): ?>
							<a href="mark-job-deleted.php?id=<?php echo $ad_id; ?>">Delete</a>
						<?php endif ?>
					<?php endif ?>
				</div>
			<?php endwhile ?>
		</div>

		<div><!-- Pagination goes here -->
			<a href="index.php">Home</a>
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
					<?php endif ?></div>
	<!-- Default -->
	<?php elseif ($list_result->num_rows > 0): ?>
		<div class="ads">
			<?php while ($row = $list_result->fetch_assoc()): ?>
				<?php extract($row); ?>
				<?php $ad = substr($ad, 0, 100).'...'; ?>
				<div>
					<h3><?php echo $title; ?></h3>
					<img src="<?php echo 'thumbnails/'.$image_name ?>">
					<p>Posted on <?php echo date("M d, Y g:i a", strtotime($date_posted)) ?> by <?php echo $user_name; ?></p>
					<p><?php echo '$'.$price ?></p>
					<p><?php echo $ad; ?></p>
					<a href="index.php?view=<?php echo $ad_id; ?>" class="view-details">View details</a>

					<a href="index.php?by_user=<?php echo $user_name; ?>"> <?php echo ucfirst($user_name); ?></a>

					<?php if ($_SESSION['user_id'] == $u_id):?>
						<a href="index.php?id=<?php echo $ad_id; ?>">Edit</a>

						<?php if ($itemsold_yn == 'N'): ?>
							<a href="mark-job-filled.php?id=<?php echo $ad_id; ?>">Sold</a>
						<?php endif ?>

						<?php if ($deleted_yn == 'N'): ?>
							<a href="mark-job-deleted.php?id=<?php echo $ad_id; ?>">Delete</a>
						<?php endif ?>
					<?php endif ?>
				</div>
			<?php endwhile ?>
		</div>

				<div><!-- Pagination goes here -->
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
				</div>
	
	<?php endif ?>
</div>

<div>
	<?php if ($message): ?>
		<div class="message">
			<?php echo $message; ?>
		</div>
	<?php endif ?> 

	<?php if ($_SESSION['user_id']): ?>
		<?php include("ad-form.php"); ?>
	<?php else: ?>
		<?php include("login-form.php"); ?>
	<?php endif ?>
</div>

<?php require("includes/footer.php"); ?>