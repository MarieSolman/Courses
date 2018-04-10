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

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

echo "Logged Out";

echo '</body>';

include 'footer.php';


header('Location: http://localhost/coursessite/index.php');
?>

</html>