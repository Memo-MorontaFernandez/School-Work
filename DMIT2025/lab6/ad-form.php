<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST"
	  class="ad-form form">

	<h2>New Listing</h2>

	<label for="title">Title</label>
	<input type="text" id="title" name="title" value="<?php echo $post_title; ?>">

	<label for="ad">Ad</label>
	<textarea name="ad" id="ad"><?php echo $post_ad; ?></textarea>

	<input type="submit" name="ad-btn" value="Submit">
</form>