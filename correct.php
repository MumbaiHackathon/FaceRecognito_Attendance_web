<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION['userid'])){
		$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$date=htmlspecialchars($_GET["date"]);
		$lecture=htmlspecialchars($_GET["lectnum"]);
		//echo "Hello, ".$_SESSION['userid'];
		//echo "<br>";
		//echo "lecture date".$date;
		//echo "<br>";
		//echo "leture number".$lecture;
	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<style>
	button {
	padding: 19px 39px 18px 39px;
	color: #FFF;
	background-color: #4bc970;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	border-radius: 5px;
	width: 31%;
	margin:4px;
	border: 1px solid #3ac162;
	border-width: 1px 1px 3px;
	box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
	margin-bottom: 10px;
}
	area[shape="rect"]:hover {border:1px solid red; }
</style>
</head>
<body>
	<div style="max-width: 480px;margin:auto;display:block;">
			<h1>Hello,
			<?php 		
			$Query="select firstname from users where userid="."\"". $_SESSION['userid'] ."\"";
			$result = mysqli_query($Link, $Query);
			if(mysqli_num_rows($result) == 1)
			{
				$ResultRow = mysqli_fetch_row($result);

					echo $ResultRow[0];
			}
			?> 
		</h1>
		<h2>Please Mark Yourself</h2>
	</div>
	<div style="max-width:640px;margin:auto;display:block;">
	<img src="img.png" usemap="#planetmap">
	<map  name="planetmap">
	<area shape="rect"  coords="0,0,82,126" href="#" alt="Sun">
	</map> 
	<a href="#"><button type="button">Previous</button></a>
	<a href="#"><button type="button">Submit</button></a>
	<a href="#"><button type="button">Next</button></a>

	<div>
<?php
	}
	else
	{
		header("Location: index.php");
	}
?>
</body>
</html>