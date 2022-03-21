<?php  
	function resize_image($file, $folder, $new_width)
	{
		list($width, $height) = getimagesize($file);

		$img_ratio = $width / $height;

		$new_height = $new_width / $img_ratio;

		$new_file = imagecreatetruecolor($new_width, $new_height);

		$source = imagecreatefromjpeg($file);

		imagecopyresampled($new_file, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		imagejpeg($new_file, $folder.basename($file), 80);

		imagedestroy($new_file);
		imagedestroy($source);
	}

	function resize_png($file, $folder, $new_width)
	{
		list($width, $height) = getimagesize($file);

		$img_ratio = $width / $height;

		$new_height = $new_width / $img_ratio;

		$new_file = imagecreatetruecolor($new_width, $new_height);

		imagealphablending($new_file, false);
		imagesavealpha($new_file, true);

		imagecopyresampled($new_file, $file, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    	imagepng($new_file, $folder.basename($file), 0);
		
		imagedestroy($new_file);
		// imagedestroy($source);
	}
?>