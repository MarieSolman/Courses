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

  if (isset($_POST['myStudentId']) &&
      isset($_POST['myStudentName']))
  {
    $myStudentId = get_post($conn, 'myStudentId');
	$myStudentName = get_post($conn, 'myStudentName');
	$myAdvisorId = get_post($conn, 'myAdvisorId');
	
    $query = "INSERT INTO student VALUES('$myStudentId', '$myStudentName',NULL)";
    
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
		echo "Student Name: " . $myStudentName . "<br>";
		echo "Advisor ID: " . $myAdvisorId . "<br><br><br>";
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
