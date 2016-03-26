<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION["userid"]))
	{
		header("Location: index.php");
	}
	else
	{
		$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(isset($_GET["token"]))
		{
			// VerifyToken
			$ResetVerificationQuery = "select userid, resettokenexpiry from users where resettoken = ".
			"\"" . htmlspecialchars($_GET["token"], ENT_QUOTES) . "\"";

			//echo "ResetVerificationQuery = ".$ResetVerificationQuery."<br>";
			$ResetVerificationResult = mysqli_query($Link,$ResetVerificationQuery);
			
			if(mysqli_num_rows($ResetVerificationResult) == 1)
			{
				$ResultRow = mysqli_fetch_row($ResetVerificationResult);
				$UserID = $ResultRow[0];
				$ResetTokenExpiry = $ResultRow[1];
				
				//echo "UserID = ".$UserID."<br>";
				//echo "ResetTokenExpiry = ".$ResetTokenExpiry."<br>";
				$ResetTokenExpiryTime = date_create($ResetTokenExpiry);
				$CurrentTime = date_create("now");
				//echo "CurrentTime = " . date_format($CurrentTime, "Y-m-d h:i:s") . "<br>";
				//echo ($ResetTokenExpiryTime > $CurrentTime) . "<br>"; 
				if($ResetTokenExpiryTime > $CurrentTime)
				{
					if(isset($_POST["form"]) && $_POST["form"] == "reset")
					{				
						// Generate Salt
						$OpensslBytes = openssl_random_pseudo_bytes(SALT_BYTES);
						$HexSalt = bin2hex($OpensslBytes);
						//echo "OpensslBytes = ".$OpensslBytes."<br>";
						//echo "HexSalt = ".$HexSalt."<br>";

						// Generate Hash
						$PasswordHash = hash("sha512", $OpensslBytes . $_POST["password"]);
						//echo "PasswordHash = ".$PasswordHash."<br>";

						$ResetQuery = "update users set password = ".
						"\"". $PasswordHash ."\",".
						" hexsalt = ".
						"\"". $HexSalt ."\",".
						" resettoken = null,".
						" resettokenexpiry = null".
						" where userid = " . $UserID;
					
						//echo "ResetQuery = ".$ResetQuery."<br>";
						mysqli_query($Link,$ResetQuery);
						header("Location: login.php?message=passwordresetsuccess");
					}
					else
					{
?>
<!DOCTYPE html>
	<body>
		<form name="reset" method="post">
			<label>New Password</label>
			<input type="password" name="password">
			<br>
			<label>Retype New Password</label>
			<input type="password" name="repassword">
			<br>
			<input type="hidden" name="form" value="reset">
			<input type="submit" value="Reset Password">
		</form>
	<body>
<html>
<?php
					}
				}
				else
				{
						header("Location: login.php?message=resettokenexpired");
				}
			}
			else
			{
				header("Location: login.php?message=resettokeninvalid");
			}
		}
		else
		{
			header("Location: login.php?message=resettokenmissing");
		}
	}
?>
