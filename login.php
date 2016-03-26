<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION["userid"]))
	{
		header("Location: index.php");
	}
	else
	{
		if(isset($_POST["form"]) && $_POST["form"] == "login")
		{
			$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			// Check credentials
			$CredentialQuery = "select userid, hexsalt, password from users where ( email = ".
			"\"" . htmlspecialchars($_POST["username"], ENT_QUOTES) . "\"".
			" or username = ".
			"\"" . htmlspecialchars($_POST["username"], ENT_QUOTES) . "\" )";
			//echo "CredentialQuery = ".$CredentialQuery."<br>";
			$CredentialResult = mysqli_query($Link,$CredentialQuery);
			
			if(mysqli_num_rows($CredentialResult) == 1)
			{
				$ResultRow = mysqli_fetch_row($CredentialResult);
				$PasswordHash = $ResultRow[2];
				$HexSalt = $ResultRow[1];
				
				//echo "PasswordHash = ".$PasswordHash."<br>";
				//echo "HexSalt = ".$HexSalt."<br>";
				if($PasswordHash == hash("sha512", hex2bin($HexSalt) . $_POST["password"]))
				{
					//echo "Calculated Hash = ". hash("sha512", hex2bin($HexSalt) . $_POST["password"])."<br>";
					$_SESSION["userid"] = $ResultRow[0];
					header("Location: index.php");
				}
				else
				{
					header("Location: login.php?message=authenticationfailed");
				}
			}
			else
			{
				header("Location: login.php?message=authenticationfailed");
			}
		}
		else
		{
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
	<body>
<?php
	if(isset($_GET["message"]))
	echo $_GET["message"];
?>
		<form name="login" method="post">
		<h1>Log In</h1>
			<label>Username or Email</label>
			<input type="text" name="username">
			<br>
			<label>Password</label>
			<input type="password" name="password">
			<br>
			<input type="hidden" name="form" value="login">
			<button type="submit" >Log in</button>
			<button><a href="signup.php">Sign Up</a></button>
			<br>
			<h4><a href="forgot.php">Forgot Password?</a></h4>
		</form>
	</body>
</html>
<?php
		}
	}
?>
