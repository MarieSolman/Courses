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
		
		echo '<main>';
		require_once 'login.php';
		function get_post($conn, $var)
		{
			return $conn->real_escape_string($_POST[$var]);
		}
		function deletestudent(){
			echo "test";
		}



		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);


			$courseId = $_GET['Cid'];
			$sql = 'Select Student.Sid, Student.Sname from Enrolled_In, Student where Enrolled_In.Cid = '.$courseId.' and Enrolled_In.Sid = Student.Sid';

			$query = mysqli_query($conn, $sql);

			if (!$query) {
				die ('SQL Error: ' . mysqli_error($conn));
			}

			echo '<table>
			<thead>
			<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<th> </th>
			</tr>
			</thead>
			<tbody>';

			while ($row = mysqli_fetch_array($query))
			{
				echo '<tr>
				<td>'.$row['Sid'].'</td>
				<td>'.$row['Sname'].'</td>
				<td><a href="updateGrades3.php?Sid=' .$row['Sid'].'&Cid='.$courseId.'">Update Grade</a></td>
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
</body>

<?php
include 'footer.php';
?>