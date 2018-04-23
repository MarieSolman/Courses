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
$Sid = $_GET['Sid'];
// Add the entry

$query = "DELETE FROM Enrolled_In WHERE Cid='$Cid' AND Sid='$Sid'";

$result = $conn->query($query);

if (!$result)
	{
		echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
	}
	else
	{
		echo "<main>";
		echo "<h1> Course dropped: </h1><br>";
		echo "Course ID: " . $Cid ." ".$Sid. "<br>";
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
