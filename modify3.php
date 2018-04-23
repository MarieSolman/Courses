<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Complete</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
<?php // sqltest.php

  include 'header.php';
  include 'nav.php';

  echo '<main>';
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['addstuId']))
  {
    $sid = get_post($conn, 'addstuId');
		$cid = get_post($conn, 'addcourseId');
    $query = "INSERT INTO Enrolled_In VALUES('$sid', '$cid',NULL,NULL)";

	$result = $conn->query($query);

  	if (!$result)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}
	else
	{
		echo "<main>";
		echo "<h1> Added. </h1><br>";
		echo "</main>";
	}
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

echo '</main>';
?>

</div>
</body>

<?php
include 'footer.php';
?>