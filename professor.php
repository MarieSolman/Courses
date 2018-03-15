
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

      <h2>Professor Information</h2>

      <form action="professorsubmit.php" method="post">
<table>
  <tr><td>Professor ID:</td>
  <td><input type="text" name="myProfessorId" class="myProfessorId"></td></tr>
  <tr><td>Professor Name:</td>
  <td><input type="text" name="myProfessorName" class="myProfessorName"></td></tr>
  <tr><td>Affiliated Department:</td>
  <td><input type="text" name="myAffDept" class="myAffDept"></td></tr>
</table>

<br>

<input type="submit" value="Submit">
<input type="reset">

<br><br><br><br>

    <a href="professorstable.php">See Professors</a>

</form>

    </main>

<?php
	include 'footer.php';
?>

</div>
</body>
</html>


