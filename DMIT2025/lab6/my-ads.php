<?php  
	$page_title = "Home";
	$body_class = "myads";
	session_start();

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
		$get_sql = "SELECT title, ad FROM a1_jobs WHERE ad_id = $id AND u_id = ".$_SESSION['user_id'];
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
	$count_sql = "SELECT COUNT(*) AS row_count FROM a1_jobs WHERE deleted_yn = 'N' AND job_filled_yn = 'N' $search_part ";
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
	<!-- <div>
		<?php include("search-form.php"); ?>
	</div> -->

	<div>
		<h2>My Ads</h2>
	</div>
	<?php if ($_SESSION['user_id']): ?>

	<?php  
		$list_sql = "SELECT ad_id, title, ad, date_posted, user_name, a1_users.u_id, job_filled_yn, deleted_yn FROM a1_jobs INNER JOIN a1_users ON a1_jobs.u_id = a1_users.u_id WHERE a1_users.u_id = ".$_SESSION['user_id'];;

		$list_result = $conn->query($list_sql);
	?>

	<?php if ($list_result->num_rows > 0): ?>
		<div class="ads">
			<?php while ($row = $list_result->fetch_assoc()): ?>
				<?php extract($row); ?>
				<div>
					<h3><?php echo $title; ?></h3>
					<p>Posted on <?php echo date("M d, Y g:i a", strtotime($date_posted)) ?> by <?php echo $user_name; ?></p>
					<p><?php echo $ad; ?></p>

					<?php if ($_SESSION['user_id'] == $u_id):?>
						<a href="index.php?id=<?php echo $ad_id; ?>">Edit</a>

						<?php if ($job_filled_yn == 'N'): ?>
							<a href="mark-job-filled.php?id=<?php echo $ad_id; ?>">Filled</a>
						<?php else: ?>
							<a href="mark-job-unfilled.php?id=<?php echo $ad_id; ?>">Unfilled</a>
						<?php endif ?>

						<?php if ($deleted_yn == 'N'): ?>
							<a href="mark-job-deleted.php?id=<?php echo $ad_id; ?>">Delete</a>
						<?php endif ?>
					<?php endif ?>
				</div>
			<?php endwhile ?>
			<!-- Pagination goes here -->
			<!-- <?php if ($count_of_records > $limit) : ?>
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
			<?php endif ?> -->
		</div>
	<?php endif ?>
</div>
	<?php endif ?>

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