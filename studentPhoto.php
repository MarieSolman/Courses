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
 
$sql_student = 'SELECT Sid, Sname, Advisor 
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
        <h3>Portfolio of hard coded student 000-01-0001</h3>
        <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Advisor ID</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>';
         
$row = mysqli_fetch_assoc($query);
$row2 = mysqli_fetch_assoc($query2);

echo '<tr>
        <td>'.$row['Sid'].'</td>
        <td>'.$row['Sname'].'</td>
        <td>'.$row['Advisor'].'</td>
        <td><img src="'.$row2['Surl'].'" alt="Portfolio" height="42" width="42"> </td>
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
  <td><input type="text" name="photoUrl" class="photoUrl"></td></tr>
</table>
<br>
<input type="submit" value="Submit">';

include 'footer.php';
 
// Should we need to run this? read section VII
mysqli_free_result($query);
 
// Should we need to run this? read section VII
mysqli_close($conn);
?>
</body>
</main>
</html>