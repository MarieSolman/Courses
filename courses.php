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
        FROM courses';
         
$query = mysqli_query($conn, $sql);
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
 
echo '<table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Add</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['cid'].'</td>
            <td>'.$row['Cname'].'</td>
            <td><a href="addClass.php?Cid=' . $row['cid'] .'">Add</a></td>
        </tr>';
}
echo '
    </tbody>
</table>
</body>';

include 'footer.php';
 
// Should we need to run this? read section VII
mysqli_free_result($query);
 
// Should we need to run this? read section VII
mysqli_close($conn);
