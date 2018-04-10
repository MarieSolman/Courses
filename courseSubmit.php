<!DOCTYPE html>
<html lang="en">
<head>
	<title>Course Submission Complete-</title>
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

  
  if (isset($_POST['courseName']) &&
      isset($_POST['courseId']) && 
      isset($_POST['departmentId']))
  {
  	// Insert courses
    $courseId = get_post($conn, 'courseId');
	$courseName = get_post($conn, 'courseName');
	$courseDescription = get_post($conn, 'courseDescription');
	$assistantId = get_post($conn, 'assistantId');
	$timeOffer = get_post($conn, 'timeTable');
	$departmentId = get_post($conn, 'departmentId');
	
    $query = "INSERT INTO courses VALUES('$courses', 
    		'$courseName',
    		'$courseDescription',
    		'$assistantId',
    		'$timeOffer')";
    
	$result_course = $conn->query($query);

  	if (!$result_course)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}	
	else
	{
		echo "<main>";
		echo "<h1> Created new course: </h1><br>";
		echo "Course ID: " . $courseId . "<br>";
		echo "Course Name: " . $courseName . "<br>";
		echo "Advisor ID: " . '000-00-0001' . "<br><br><br>";
		echo "</main>";
	}

	// Insert offers
	$query = "INSERT INTO offers VALUES('$departmentId', 
    									 '$courseId')";
	$result_offers = $conn->query($query);

  	if (!$result_offers)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}	
	else
	{
		echo "<main>";
		echo "<br> Course ID:" . $courseId . "<br>";
		echo "<br> Department ID:" . $departmentId . "<br>";
		echo "Succeed";
		echo "</main>";
	}

	// Insert assistancy
	$query = "INSERT INTO assistancy VALUES('$assistantId',
											'$courseId')";
	$result_assistancy = $conn->query($query);

	if (!$result_assistancy)
	{
		echo "INSERT failed: $query<br>" .$conn->error . "<br><br>";
	}
	else
	{
		echo "<main>";
		echo "<br> Course ID:" . $courseId . "<br>";
		echo "<br> Assistant ID:" . $assistantId . "<br>";
		echo "Succeed";
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
