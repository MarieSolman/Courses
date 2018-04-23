<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modify Student</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
<?php // sqltest.php

  include 'header.php';
  include 'nav.php';

  require_once 'login.php';

	echo '<main>';
	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);

		$sql = 'Select cid, Cname from Courses';

		$query = mysqli_query($conn, $sql);

		if (!$query) {
			die ('SQL Error: ' . mysqli_error($conn));
		}


		echo '<h2>Add/Drop students</h2>';

		echo '<table>
		<thead>
		<tr>
		<th>Course ID</th>
		<th>Course Name</th>
		<th> </th>
		</tr>
		</thead>
		<tbody>';

		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
			<td>'.$row['cid'].'</td>
			<td>'.$row['Cname'].'</td>
			<td><a href="modify2.php?Cid='.$row['cid'].'">Select</a></td>
			</tr>';
		}
		echo '</tbody>
		</table>';

		// Should we need to run this? read section VII
		mysqli_free_result($query);

		// Should we need to run this? read section VII
		mysqli_close($conn);
?>

<form action="modify2.php" method="post">
	<table>
		<tr><td>course ID:</td>
			<td><input type="text" name="courseId" class="courseId"></td></tr>
				</table>
				<br>

				<input type="submit" value="Submit">
				<input type="reset">

				<br><br><br><br>

			</form>
</main>

<?php
include 'footer.php';
?>