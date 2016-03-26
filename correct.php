<?php
	require_once("config.php");
	session_start();
	if(isset($_SESSION['userid'])){
		$date=htmlspecialchars($_GET["date"]);
		$lecture=htmlspecialchars($_GET["lectnum"]);
		echo "Hello, ".$_SESSION['userid'];
		echo "<br>";
		echo "lecture date".$date;
		echo "<br>";
		echo "leture number".$lecture;
	}
?>