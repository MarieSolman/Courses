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

  if (isset($_POST['advId']))
  {
    $advId = get_post($conn, 'advId');
		$sid = get_post($conn, 'Sid');
    $query = "UPDATE Student Set Advisor='".$advId."' where Sid = '".$sid."'";

	$result = $conn->query($query);

  	if (!$result)
	{
		echo "INSERT failed: $query<br>" . $conn->error . "<br><br>";
	}
	else
	{
		echo "<main>";
		echo "<h1> Updated. </h1><br>";
		echo "</main>";
	}
  }

  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
	
	echo '</main>';
	include 'footer.php';

?>

</div>
</body>
