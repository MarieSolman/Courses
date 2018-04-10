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

if (isset($_GET['Cid']) && is_numeric($_GET['Cid']))

{

// get id value

$Cid = $_GET['Cid'];

// Add the entry

$query = "INSERT INTO enrolled_in VALUES('$tempSid', '$Cid', '2017', 'Fall')";

$result = $conn->query($query);

if (!$result)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}	
	else
	{
		echo "<main>";
		echo "<h1> Course Added: </h1><br>";
		echo "Course ID: " . $Cid . "<br><br><br>";
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