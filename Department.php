
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

      <h2>Department Information</h2>

      <form action="departmentsubmit.php" method="post">
<table>
  <tr><td>Professor ID:</td>
  <td><input type="text" name="myDId" class="myDId"></td></tr>
  <tr><td>Professor Name:</td>
  <td><input type="text" name="myDName" class="myDName"></td></tr>
</table>

<br>

<input type="submit" value="Submit">
<input type="reset">

<br><br><br><br>

    <a href="departmenttable.php">See Department</a>

</form>

    </main>

<?php
	include 'footer.php';
?>

</div>
</body>
</html>


