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
 
$sql = 'SELECT *
        FROM enrolled_in NATURAL JOIN courses
        WHERE Sid="000-01-0002"';
         
$query = mysqli_query($conn, $sql);
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<main>';
echo '<br>Enrolled courses for hardcoded student 000-01-0002<br><br>';
 
echo '<table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Drop</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['Cid'].'</td>
            <td>'.$row['Cname'].'</td>
            <td><a href="dropClass.php?Cid=' . $row['Cid'] . '">Drop</a></td>
        </tr>';
}
echo '
    </tbody>
</table>

<br><br>
<a href="enrolledCoursesPdf.php" target="_blank">Get PDF</a>

</main>
</body>';

include 'footer.php';
 
// Should we need to run this? read section VII
mysqli_free_result($query);
 
// Should we need to run this? read section VII
mysqli_close($conn);
