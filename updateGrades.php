
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
?>

  <main>

      <h2>Update Grades</h2>

      <p>Grades for hardcoded professor 000-00-0001, course 501, student 000-01-0002</p>

      <form action="gradeSubmit.php" method="post">
<table>
  <tr><td>Grade:</td>
  <td><input type="text" name="myGrade" class="myGrade"></td></tr>
</table>

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


