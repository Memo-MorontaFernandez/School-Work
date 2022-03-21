<?php  
	session_start();
	$page_title = "Register";
	$register = $_GET['register'];
	require("includes/connect.php");
	include("includes/login.php");
?>

<?php include("includes/header.php"); ?>

<?php if ($message): ?>
	<div class="message">
		<?php echo $message; ?>
	</div>
<?php endif ?>

<?php include("includes/login-form.php"); ?>

<?php include("includes/footer.php"); ?>