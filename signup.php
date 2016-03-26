<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION["userid"]))
	{
		header("Location: index.php");
	}
	else
	{
		// Check if form is already submitted
		// also validate the form
		if(isset($_POST["form"]) && $_POST["form"] == "signup")
		{
			$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			// Check if email is unique
			$UniqueEmailQuery = "select count(*) from users where email = ".
			"\"" . htmlspecialchars($_POST["email"], ENT_QUOTES) . "\"";
			
			//echo "UniqueEmailQuery = ".$UniqueEmailQuery."<br>";
			if(mysqli_fetch_row(mysqli_query($Link,$UniqueEmailQuery))[0] == 0)
			{
				// Generate Username
				$GetAutoIncrementQuery = "select auto_increment from information_schema.tables where table_schema = \"alumni\" and table_name  = \"users\"";
				$Username = htmlspecialchars($_POST["firstname"], ENT_QUOTES) . "-".
				htmlspecialchars($_POST["lastname"], ENT_QUOTES) ."-" . 
				mysqli_fetch_row(mysqli_query($Link,$GetAutoIncrementQuery))[0];

				//echo "GetAutoIncrementQuery = ".$GetAutoIncrementQuery."<br>";
				//echo "Username = ".$Username."<br>";

				// Generate Salt
				$OpensslBytes = openssl_random_pseudo_bytes(SALT_BYTES);
				$HexSalt = bin2hex($OpensslBytes);
				//echo "OpensslBytes = ".$OpensslBytes."<br>";
				//echo "HexSalt = ".$HexSalt."<br>";

				// Generate Hash
				$PasswordHash = hash("sha512", $OpensslBytes . $_POST["password"]);
				//echo "PasswordHash = ".$PasswordHash."<br>";

				$RegistrationQuery = "insert into users(username, firstname, lastname, email, hexsalt, password) values(".
				"\"". htmlspecialchars($Username, ENT_QUOTES) ."\",".
				"\"". htmlspecialchars($_POST["firstname"], ENT_QUOTES) ."\",".
				"\"". htmlspecialchars($_POST["lastname"], ENT_QUOTES) ."\",".
				"\"". htmlspecialchars($_POST["email"], ENT_QUOTES) ."\",".
				"\"". $HexSalt ."\",".
				"\"". $PasswordHash ."\")";
				mysqli_query($Link,$RegistrationQuery);
				//echo "RegistrationQuery = ".$RegistrationQuery."<br>";
				header("Location: login.php?message=registrationsuccess");
			}
			else
			{
				header("Location: login.php?message=registrationfailed");
			}
		}
		else
		{
			// Registration not possible (Something is wrong) show registration page
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
	<body>
		<form name="signup" method="post">
		<h1>Sign Up</h1>
		<fieldset>
			<label>First Name</label>
			<input type="text" name="firstname">
			<br>
			<label>Last Name</label>
			<input type="text" name="lastname">
			<br>
			<label>Email</label>
			<input type="text" name="email">
			<br>
			<label>Password</label>
			<input type="password" name="password">
			<br>
			<label>Retype Password</label>
			<input type="password" name="repassword">
			<br>
			<input type="hidden" name="form" value="signup">
			<button type="submit" style=" width:100%;">Sign Up</button>
			<br>
			Already Registered? <a href="login.php"><b>Log In</b></a>
		</fieldset>
			
		</form>
	</body>
</html>
<?php
		}
	}
?>
