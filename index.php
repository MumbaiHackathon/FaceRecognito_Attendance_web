<?php
	require_once("config.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
.table_attend	{
	border-collapse:collapse;
	border-spacing:0;
	border-color:#ccc;
	margin:0px auto;
	}
.table_attend td	{
	font-family:Arial, sans-serif;
	font-size:20px;
	padding:10px 5px;
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	word-break:normal;
	border-color:#ccc;
	color:#333;
	background-color:#fff;
	}
.table_attend th	{
	font-family:Arial, sans-serif;
	font-size:20px;
	font-weight:normal;
	padding:10px 5px;
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	word-break:normal;
	border-color:#ccc;
	color:#333;
	background-color:#f0f0f0;
	}
.table_attend .entry{
	vertical-align:top
	}

</style>

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
	<?php echo date_format(date_create($date), "Y-m-d") ?></td>
	<?php
	for ($x = 1; $x <= 8; $x++) {
			?><td class='entry'><a href="correct.php?date=<?php echo $date ?>&lectnum=<?php echo $x ?>"><?php
		//$LectureQuery="select status from attendance where dte="."\"". $date ."\"" ;
		$LectureQuery="select status from attendance where dte="."\"". $date ."\" and lecture_num="."\"". $x ."\" and userid="."\"". $_SESSION['userid'] ."\"";
		$result = mysqli_query($Link, $LectureQuery);
		if(mysqli_num_rows($result) == 1)
		{
				$ResultRow = mysqli_fetch_row($result);
				if($ResultRow[0]=="absent")
				{
					?><b><?php
					echo $ResultRow[0];
					?></b><?php
				}
				else{
					echo $ResultRow[0];
				}
		}
		else{
			echo"NA";
		}
	?></a></td><?php
		}
		$date = date_format(date_sub(date_create($date), date_interval_create_from_date_string("1 day")), "Y-m-d h:i:s");
  }
		?>
  </tr>
 </div>
 <div>
			<a href="logout.php"><button style="width:100%;" type="button">Log Out</button></a>
</div>
<?php
}

else
{
?>
<div style="max-width: 480px;margin:auto;display:block;">
			<h1>Welcome To Student Attendance</h1>
			<a href="signup.php"><button class="arrowbox" type="button">Sign up</button></a>
			<a href="login.php"><button type="button">Log In</button></a>
</div>
<?php
}
?>
	<body>
<html>