<!DOCTYPE html>
<html lang="en">
<head>
	<title>Submission Complete-</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>	
<body>

<div id="wrapper">
<?php // sqltest.php

  include 'header.php';
  include 'nav.php';

  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['myGrade']))
  {
    $myGrade = get_post($conn, 'myGrade');
    $myStudentId = '000-01-0002';
    $myCourseId = '501';
	
    $query = "INSERT INTO report VALUES('$myStudentId', '$myCourseId','$myGrade')
              ON DUPLICATE KEY UPDATE Report = '$myGrade'";
    
	$result = $conn->query($query);

  	if (!$result)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}	
	else
	{
		echo "<main>";
		echo "<h1> Thank you for your submission: </h1><br>";
		echo "Student ID: " . $myStudentId . "<br>";
		echo "Course ID: " . $myCourseId . "<br>";
		echo "Grade: " . $myGrade . "<br><br><br>";
		echo "</main>";
	}
  }
  
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

	include 'footer.php';
  
?>

</div>
</body>
