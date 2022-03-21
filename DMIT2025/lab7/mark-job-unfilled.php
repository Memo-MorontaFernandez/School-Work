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
				$sql = "SELECT u_id FROM a1_forSale WHERE ad_id = $id AND u_id = ".$_SESSION['user_id'];
				$res = $conn->query($sql);
				if ($res->num_rows > 0) {
					$update_sql = "UPDATE a1_forSale SET itemsold_yn = 'N' WHERE ad_id = $id";
					if ($conn->query($update_sql)) {
						header("Location: my-ads.php?m=admarkedunfilled");
					}
					else
					{
						$string = $conn->error;
						header("Location: my-ads.php?m=$string");
					}
				}
				else
				{
					header("Location: my-ads.php?m=notrightuser");
				}
			}
	}
?>