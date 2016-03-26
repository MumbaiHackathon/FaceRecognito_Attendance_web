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
if(isset($_SESSION['userid']))
{
	$Link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<div class="table-wrapper">
<table class="table_attend">
  <tr>
    <th class="entry">Week</th>
	<?php
		$date = date_format(date_create("today"),"Y-m-d h:i:s");
		/*for ($x = 0; $x <= 7; $x++) {
			?><td class='entry'><?php
		$LectureQuery="select lecture_id from lectures where date="."\"". $date ."\"";
		$date = date_format(date_sub(date_create($date), date_interval_create_from_date_string("1 day")), "Y-m-d");
		echo $date;
		?></td><?php
		}
*/		?>
	<td class="entry">Lecture 1</td>
    <td class="entry">Lecture 2</td>
    <td class="entry">Lecture 3</td>
    <td class="entry">Lecture 4</td>
    <td class="entry">Lecture 5</td>
    <td class="entry">Lecture 6</td>
    <td class="entry">Lecture 7</td>
    <td class="entry">Lecture 8</td>

  </tr>
  <?php for($y=1 ; $y<=5 ; $y++ )
  {
	  ?>
  <tr>
    <td class="entry">
	<?php echo $date ?></td>
	<?php
	for ($x = 1; $x <= 8; $x++) {
			?><td class='entry'><?php
		//$LectureQuery="select status from attendance where dte="."\"". $date ."\"" ;
		$LectureQuery="select status from attendance where dte="."\"". $date ."\" and lecture_num="."\"". $x ."\"";
		$result = mysqli_query($Link, $LectureQuery);
		if(mysqli_num_rows($result) == 1)
		{
				$ResultRow = mysqli_fetch_row($result);
				echo $ResultRow[0];
		}
		else{
			echo"lel";
		}
	?></td><?php
		}
		$date = date_format(date_sub(date_create($date), date_interval_create_from_date_string("1 day")), "Y-m-d h:i:s");
  }
		?>
  </tr>
 </div>
			<a href="logout.php">Log Out</a>
<?php
}

else
{
?>
			<a href="signup.php">Sign up</a>
			<a href="login.php">Log In</a>
<?php
}
?>
	<body>
<html>