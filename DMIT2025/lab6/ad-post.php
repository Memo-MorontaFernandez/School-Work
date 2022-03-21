<?php  
	if (isset($_POST['ad-btn'])) {
		$post_title = trim($_POST['title']);
		$post_ad = trim($_POST['ad']);

		// Add Validation
		if ($post_ad && $post_title) {
			
			if ($id) {
				$sql = "UPDATE a1_jobs SET title = '$post_title', ad = '$post_ad' WHERE ad_id = $id";
			}
			else
			{
				$sql = "INSERT into a1_jobs (title, ad, u_id) VALUES ('$post_title', '$post_ad', '".$_SESSION['user_id']."')";
			}
			
			if ($conn->query($sql)) {
				$message .= "<p>Successful post</p>";
				$post_ad = $post_title = "";
			}
			else
			{
				$message .= "<p>Post was unsuccessful. $conn->error</p>";
			}
		}
		else
		{
			$message .= "<p>All fields are required.</p>";
		}
	}
?>