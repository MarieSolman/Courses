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
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['myDId']) &&
      isset($_POST['myDName']))
  {
    $myDId = get_post($conn, 'myDId');
	$myDName = get_post($conn, 'myDName');
	
    $query = "INSERT INTO department VALUES('$myDId', '$myDName')";
    
	$result = $conn->query($query);

  	if (!$result)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}	
	else
	{
		echo "<main>";
		echo "<h1> Thank you for your submission: </h1><br>";
		echo "Department ID: " . $myProfessorId . "<br>";
		echo "Department Name: " . $myProfessorName . "<br><br><br>";
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
