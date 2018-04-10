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
$_SESSION["professor"] = "professor";
$_SESSION["id"] = "000-00-0001";
echo "Signed in as professor 000-00-0001.";

echo '</body>';

include 'footer.php';

header('Location: http://localhost/coursessite/professortable.php');
?>

</html>