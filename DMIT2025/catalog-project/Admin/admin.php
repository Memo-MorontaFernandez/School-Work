<?php 
	session_start();
	if (isset($_SESSION['guillermobiglongrandomsessionvariablefora1']) && $_SESSION['role'] == "Admin")
	{
		echo "";
	} else {
		header("Location:../login.php");
	}
	$page_title = "Admin";
	include("../includes/connect.php"); 

?>

<?php include("../includes/header.php"); ?> 

<div>
	<div><a href="insert.php">Add Series</a></div>
	<div><a href="edit.php">Edit Series</a></div>
	<div><a href="delete.php">Delete Series</a></div>
</div>

<?php include("../includes/footer.php"); ?>