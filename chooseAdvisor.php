<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Advisor</title>
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
  echo '<h2>Choose Advisor and Major</h2>';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);
	$studentId = '000-01-0001';
	$sql = "Select Student.Advisor, Student.Sname from Student where Student.Sid = '".$studentId."'";

	$query = mysqli_query($conn, $sql);

	if (!$query) {
		die ('SQL Error: ' . mysqli_error($conn));
	}

	echo '<table>
	<thead>
	<tr>
	<th>Student Name</th>
	<th>Advisor ID</th>
	<th>Advisor Name</th>
	<th>Major</th>
	<th>Minor</th>
	</tr>
	</thead>
	<tbody>';

	while ($row = mysqli_fetch_array($query))
	{
		$sql2 = 'SELECT Pname
			        FROM Professor Where Pid =\''.$row['Advisor'].'\'';
		$query2 = mysqli_query($conn, $sql2);
		$Pname = mysqli_fetch_array($query2);

		$sql3 = "SELECT Dname
			        FROM In_Program, Department Where Department.Did = In_Program.Did and Sid ='".$studentId."' and ProgramType = 'Major'";
		$query3 = mysqli_query($conn, $sql3);
		$Dname = mysqli_fetch_array($query3);

		$sql4 = "SELECT Dname
			        FROM In_Program, Department Where Department.Did = In_Program.Did and Sid ='".$studentId."' and ProgramType = 'Minor'";
		$query4 = mysqli_query($conn, $sql4);
		$Dnamem = mysqli_fetch_array($query4);

		echo '<tr>
		<td>'.$row['Sname'].'</td>
		<td>'.$row['Advisor'].'</td>
		<td>'.$Pname['Pname'].'</td>
		<td>'.$Dname['Dname'].'</td>
		<td>'.$Dnamem['Dname'].'</td>
		</tr>';
	}
	echo '</tbody>
	</table>';


?>

<form action="chooseAdvisor2.php" method="post">
	<table>
		<tr><td>Change Advisor ID:</td>
			<td><input type="text" name="advId" class="advId"></td>
			<td><input type="text" name="Sid" class="Sid" value = '000-01-0001' hidden='True'></td></tr>
				</table>
				<input type="submit" value="Submit">
				<input type="reset">

				<br><br>
</form>
<?php
echo '<table>
<thead>
<tr>
<th>Department Name</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>';


	$sql11 = 'Select * from Department';

	$query11 = mysqli_query($conn, $sql11);
	while ($row = mysqli_fetch_array($query11))
	{
		echo '<tr>
		<td>'.$row['Dname'].'</td>
		<td><a href="selectMajor.php?Sid=' .$studentId.'&Did='.$row['Did'].'">Select as Major</a></td>
		<td><a href="selectMinor.php?Sid=' .$studentId.'&Did='.$row['Did'].'">Select as Minor</a></td>
		</tr>';
	}
	echo '</tbody>
	</table>
</main>';

include 'footer.php';
?>

