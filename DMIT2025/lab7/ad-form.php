<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST"
	 enctype="multipart/form-data" class="ad-form form">

	 <?php if (!$id): ?>
	 	<h2>New Listing</h2>
	 <?php else: ?>
	 	<h2>Edit Listing</h2>
	 <?php endif ?>
	

	<label for="title">Title</label>
	<input type="text" id="title" name="title" value="<?php echo $post_title; ?>">

	<label for="ad">Ad</label>
	<textarea name="ad" id="ad"><?php echo $post_ad; ?></textarea>

	<label for="price">Price</label>
	<input type="number" min="0" step="0.01" name="price" id="price">

	<label for="image">Upload Image</label>
	<input type="file" name="image" id="image">

	<input type="submit" name="ad-btn" value="Submit">
</form>