
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

      <h2>Add course</h2>
      <h3>Course for hard coded professor 000-00-0001</h3>
      <form action="courseSubmit.php" method="post">
<table>
  <tr><td>Course Name:</td>
  <td><input type="text" name="courseName" class="courseName"></td></tr>
  <tr><td>Course ID:</td>
  <td><input type="text" name="courseId" class="courseId"></td></tr>
  <tr><td>Course Description:</td>
  <td><input type="text" name="courseDescription" class="courseDescription"></td></tr>
  <tr><td>Assistant ID:</td>
  <td><input type="text" name="assistant" class="assistant"></td></tr>
  <tr><td>Time offered:</td>
  <td><input type="text" name="timeTable" class="timeTable"></td></tr>
  <tr><td>Department:</td>
  <td><input type="text" name="departmentId" class="departmentId"></td></tr>
</table>

<br>

<input type="submit" value="Submit">
<input type="reset" value="Reset">

</form>

    </main>

<?php
	include 'footer.php';
?>

</div>
</body>
</html>


