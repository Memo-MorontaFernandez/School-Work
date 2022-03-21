<?php  

	include ("image-functions.php");
	$thumb_folder = "thumbnails/";
	$display_folder = "display/";
	$original_folder = "uploaded_files/";
	$id = $_GET['id'];

	if (isset($_POST['ad-btn'])) {
		
		$post_title = trim($_POST['title']);
		$post_title = filter_var($post_title, FILTER_SANITIZE_STRING);
		$post_ad = trim($_POST['ad']);
		$post_ad = filter_var($post_ad, FILTER_SANITIZE_STRING);
		$imageName = $_FILES['image']["name"];
		$imageType = $_FILES['image']["type"];
		$imageTmp = $_FILES['image']["tmp_name"];
		$imageError = $_FILES['image']["error"];
		$imageSize = $_FILES['image']["size"];
		$post_price = $_POST['price'];

		$imageValid = true;

		if ($imageSize > 1000000) {
			$message .= "<p>Uploaded image is too large. 1Mb limit.</p>";
			$imageValid = false;
		}

		if ($imageError > 0) {
			$message .= "<p>There was an error of type $imageError that occurred.</p>";
			$imageValid = false;
		}

		$allowed_file_types = array("image/jpeg", "image/pjepg", "image/webp", "image/png");

		if (!in_array($imageType, $allowed_file_types)) {
			$message .= "<p>Invalid file type. Valid types are jpeg, png, webp.</p>";
			$imageValid = false;
		}

		if ($post_ad && $post_title && $post_price && $imageName) {
			if ($imageValid == true) {
				$upload_file = $original_folder . $imageName;
				if (move_uploaded_file($imageTmp, $upload_file)) 
				{
					if ($imageType == 'image/jpeg') {
						resize_image($upload_file, $thumb_folder, 175);
						resize_image($upload_file, $display_folder, 1000);
					} else {
						resize_png($upload_file, $thumb_folder, 175);
						resize_png($upload_file, $display_folder, 1000);
					}
					

					if ($id) 
					{
						$sql = "UPDATE a1_forSale SET title = '$post_title', ad = '$post_ad', image_name = '$imageName', price = '$post_price' WHERE ad_id = $id";
					}
					else
					{
						$sql = "INSERT into a1_forSale (title, ad, image_name, price, u_id) VALUES ('$post_title', '$post_ad', '$imageName', '$post_price', '".$_SESSION['user_id']."')";
					}
				
					if ($conn->query($sql)) 
					{
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
					$message .= "<p>There was a problem uploading the image.</p>";
				}
			}
		}
		else
		{
			$message .= "<p>All fields are required.</p>";
			$message .= " ".$imageType;
		}
	}
?>