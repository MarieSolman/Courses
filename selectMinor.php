<!DOCTYPE html>
<html lang="en">
<head>
	<title>Submission Complete</title>
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

// get id value

$Did = $_GET['Did'];
$Sid = $_GET['Sid'];
// Add the entry

$queryDel = "Delete FROM In_Program WHERE Sid='".$Sid."' and ProgramType='Minor'";
$queryAdd = "INSERT INTO In_Program (Sid, Did, ProgramType) VALUES('".$Sid."', '".$Did."', 'Minor')";
$result2 = $conn->query($queryDel);
$result = $conn->query($queryAdd);

if (!$result)
	{
		echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
	}
	else
	{
		echo "<main>";
		echo "<h1> Success. </h1><br>";
		echo "</main>";
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
