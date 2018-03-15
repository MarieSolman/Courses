
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cage the Moment Photography</title>
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

      <h2>Student Information</h2>

      <form action="contactSubmit.php" method="post">
<table>
  <tr><td>Student ID:</td>
  <td><input type="text" name="myStudentId" class="myStudentId"></td></tr>
  <tr><td>Student Name:</td>
  <td><input type="text" name="myStudentName" class="myStudentName"></td></tr>
  <tr><td>Advisor ID:</td>
  <td><input type="text" name="myAdvisorId" class="myAdvisorId"></td></tr>
</table>

<br>

<input type="submit" value="Submit">
<input type="reset">

<br><br><br><br>

    <a href="clients.php">See clients</a>

</form>

    </main>

<?php
	include 'footer.php';
?>

</div>
</body>
</html>


