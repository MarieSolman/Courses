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
				<td><a href="dropStudent.php?Sid=' .$row['Sid'].'&Cid='.$courseId.'">Drop</a></td>
				</tr>';
			}
			echo '</tbody>
			</table>';


			// Should we need to run this? read section VII
			mysqli_free_result($query);

			// Should we need to run this? read section VII
			mysqli_close($conn);
		?>

		<form action="modify3.php" method="post">
			<table>
				<tr><td>Add Student by ID:</td>
					<td><input type="text" name="addstuId" class="addstuId"></td></tr>
					<tr><td>Course: </td>
						<td><input type="text" name="addcourseId" class="addcourseId" value= <?php echo $courseId ?> ></td></tr>
					</table>
					<br>

					<input type="submit" value="Add">
					<input type="reset">

					<br><br><br><br>

				</form>


</main>
</body>

<?php
include 'footer.php';
?>