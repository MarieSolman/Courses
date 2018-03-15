
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

      <h2>Contact Information</h2>

      <form action="contactSubmit.php" method="post">
<table>
  <tr><td>First Name:</td>
  <td><input type="text" name="myFirstName" class="myFirstName"></td></tr>
  <tr><td>Last Name:</td>
  <td><input type="text" name="myLastName" class="myLastName"></td></tr>
  <tr><td>Address:</td>
  <td><input type="text" name="myAddress" class="myAddress"></td></tr>
  <tr><td>City:</td>
  <td><input type="text" name="myCity" class="myCity"></td></tr>
  <tr><td>State:</td>
  <td><input type="text" name="myState" class="myState"></td></tr>
  <tr><td>Zip Code:</td>
  <td><input type="text" name="myZip" class="myZip"></td></tr>
  <tr><td>Email:</td>
  <td><input type="email" name="myEmail" class="myEmail"></td></tr>
  <tr><td>Special requests:</td>
  <td><input type="text" name="myComment" class="myComment"></td></tr>
</table>

<br>

<input type="submit" value="Contact">
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


