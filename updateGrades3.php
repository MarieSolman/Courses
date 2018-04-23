
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

function get_post($conn, $var)
{
	return $conn->real_escape_string($_POST[$var]);
}

$Sid = $_GET['Sid'];
$Cid = $_GET['Cid'];


echo '<main>

      <h2>Update Grades</h2>

      <form action="gradeSubmit.php" method="post">
<table>
  <tr><td>Grade:</td>
  <td><input type="text" name="myGrade" class="myGrade"></td></tr>
  <input type="hidden" value='.$Sid.' name="mySid" />
  <input type="hidden" value='.$Cid.' name="myCid" />
</table>';

?>

<br>

<input type="submit" value="Submit">
<input type="reset">

</form>

</main>

<?php
	include 'footer.php';
?>

</div>
</body>
</html>


