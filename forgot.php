<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION["userid"]))
	{
		header("Location: index.php");
	}
	else
	{
		if(isset($_POST["form"]) && $_POST["form"] == "forgot")
		{
			$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			// Find User ID 
			$FindUserQuery = "select userid from users where email = ".
			"\"" . htmlspecialchars($_POST["email"], ENT_QUOTES) . "\"";
			//echo "FindUserQuery = ".$FindUserQuery."<br>";
			$FindUserResult = mysqli_query($Link,$FindUserQuery);
			
			if(mysqli_num_rows($FindUserResult) == 1)
			{
				$UserID = mysqli_fetch_row($FindUserResult)[0];
				//echo "UserID = ".$UserID."<br>";
							
				/// Not sending mail for now. Just display Temporary address
				
				$Token = bin2hex(openssl_random_pseudo_bytes(32));
				//echo "Token = ".$Token."<br>";
				
				// Insert token in DB
				$ExpiryTime = date_format(date_add(date_create("now"), date_interval_create_from_date_string("+1 day")), "Y-m-d h:i:s");
				$InsertTokenQuery = "update users set resettoken = ".
					"\"". $Token ."\",".
					" resettokenexpiry = ".
					"\"". $ExpiryTime ."\"".
					" where userid = " . $UserID;
				//echo "InsertTokenQuery = ".$InsertTokenQuery."<br>";
				mysqli_query($Link,$InsertTokenQuery);
			}
?>
<!DOCTYPE html>
	<body>Mail Successfully Sent<body>
<html>
<?php
		}
		else
		{
?>
<!DOCTYPE html>
	<body>
		<form name="forgot" method="post">
			<label>Email</label>
			<input type="text" name="email">
			<input type="hidden" name="form" value="forgot">
			<input type="submit" value="Send Mail">
		</form>
	<body>
<html>
<?php
		}
}
?>
