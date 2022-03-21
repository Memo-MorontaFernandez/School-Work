<?php  
	session_start();
	include("includes/connect.php");

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];

			if (!isset($_SESSION['guillermobiglongrandomsessionvariablefora1'])) {
					header("Location: index.php?m=notloggedin");
			}
			else
			{
				$sql = "SELECT u_id FROM a1_jobs WHERE ad_id = $id AND u_id = ".$_SESSION['user_id'];
				$res = $conn->query($sql);
				if ($res->num_rows > 0) {
					$update_sql = "UPDATE a1_jobs SET deleted_yn = 'Y' WHERE ad_id = $id";
					if ($conn->query($update_sql)) {
						header("Location: index.php?m=deleted");
					}
					else
					{
						$string = $conn->error;
						header("Location: index.php?m=$string");
					}
				}
				else
				{
					header("Location: index.php?m=notrightuser");
				}
			}
	}
?>