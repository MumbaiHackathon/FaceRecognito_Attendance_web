<?php
	require_once("config.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<style type="text/css">
.table_attend  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
.table_attend td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.table_attend th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.table_attend .entry{vertical-align:top}
@media screen and (max-width: 767px) {.table_attend {width: auto !important;}.table_attend col {width: auto !important;}.table-wrapper {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>

	<body>

<?php
if(!isset($_SESSION['userid']))
{
	$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$date = date_format(date_create("now"),"Y-m-d");
		//$date = date_format(date_sub(date_create("now"), date_interval_create_from_date_string("1 day")), "Y-m-d");
		$LectureQuery= mysqli_query($Link,"select lecture_id from lectures where date="."\"". $date ."\"");
?>
	
			<a href="logout.php">Log Out</a>
<?php
}

else
{
?>
			<a href="login.php">Log In</a>
<?php
}
?>
	<body>
<html>