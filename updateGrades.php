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

	echo '<h2>Update Grades</h2>';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);

		$sql = 'Select cid, Cname from Courses';

		$query = mysqli_query($conn, $sql);

		if (!$query) {
			die ('SQL Error: ' . mysqli_error($conn));
		}

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
			<td><a href="updateGrades2.php?Cid='.$row['cid'].'">Select</a></td>
			</tr>';
		}
		echo '</tbody>
		</table>';

		// Should we need to run this? read section VII
		mysqli_free_result($query);

		// Should we need to run this? read section VII
		mysqli_close($conn);
?>

</main>

<?php
include 'footer.php';
?>