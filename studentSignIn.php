<!DOCTYPE html>
<html lang="en">
<head>
	<title>WPI Course Selector</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>	

<body>

<div id="wrapper">
<?php

  include 'header.php';
  include 'nav.php';

// Set session variables
$_SESSION["student"] = "student";
$_SESSION["id"] = "000-01-0002";
echo "Signed in as student 000-01-0002.";

echo '</body>';

include 'footer.php';


header('Location: http://localhost/coursessite/student.php');
?>

</html>