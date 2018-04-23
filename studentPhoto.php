<!DOCTYPE html>

<html lang="en">

<head>

	<title>WPI Course Selector</title>

	<meta charset="utf-8">

	<link rel="stylesheet" href="style.css">
</head>

<body>

<div id="wrapper">

<?php // sqltest.php


  include 'header.php';

  include 'nav.php';


  require_once 'login.php';


$conn = mysqli_connect($hn, $un, $pw, $db);

if (!$conn) {

    die ('Fail to connect to MySQL: ' . mysqli_connect_error());

}


$sql_student = 'SELECT Sname, Advisor

        FROM student

        WHERE Sid = "000-01-0001"';
$sql_photo = 'SELECT Surl

              FROM photo

              WHERE Sid = "000-01-0001"';


$query = mysqli_query($conn, $sql_student);

$query2 = mysqli_query($conn, $sql_photo);


if (!$query) {

    die ('SQL Error: ' . mysqli_error($conn));

}


echo '<main>

	<h2>Student Picture</h2>
        <table>

        <thead>
            <tr>

                <th>Student Name</th>

                <th>Advisor Name</th>

                <th>Photo</th>

            </tr>

        </thead>

        <tbody>';


$row = mysqli_fetch_assoc($query);

$row2 = mysqli_fetch_assoc($query2);

$sql3 = 'SELECT Pname

	 FROM Professor Where Pid =\''.$row['Advisor'].'\'';


$query3 = mysqli_query($conn, $sql3);

$Pname = mysqli_fetch_array($query3);


echo '<tr>

        <td>'.$row['Sname'].'</td>
	<td>'.$Pname['Pname'].'</td>

        <td><img src="'.$row2['Surl'].'" alt="Portfolio" height="42" width="42">
 </td>

    </tr>';

echo '

    </tbody>

</table>

<br>
<br>
<br>

<form action="photoUpdate.php" method="post">

<table>

  <tr><td>Update photo with URL:</td>

  <td><input type="text" name="photoUrl" class="photoUrl">
</td></tr>
</table>


<br>

<input type="submit" value="Submit">';



echo '</main>';

include 'footer.php';

?>
</body>
</html>
