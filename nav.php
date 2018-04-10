<!doctype html>
<html>
<body>
<?php

session_start();

  echo '<nav>
    <ul>';

if (isset($_SESSION["professor"])) {
  echo '
      <li><a href="professortable.php">Professors</a></li>
      <li><a href="updateGrades.php">Update Grades</a></li>
      <li><a href="departmenttable.php">Departments</a></li>
      <li><a href="logOut.php">Log Out</a></li>
  ';
}

else if (isset($_SESSION["student"])) {
   echo '
      <li><a href="student.php">Student Signup</a></li>
      <li><a href="studenttable.php">Students</a></li>
      <li><a href="viewGrades.php">Grades</a></li>
      <li><a href="courses.php">Available Courses</a></li>
      <li><a href="enrolledIn.php">Enrolled Courses</a></li>
      <li><a href="coursesdisplay.php">Course Display</a></li>
      <li><a href="logOut.php">Log Out</a></li>
   ';
}
else {
   echo '
      <li><a href="professorSignIn.php">Sign In As Professor</a></li>
      <li><a href="studentSignIn.php">Sign In As Student</a></li>
   ';
}

	echo '</ul>
  </nav>';
  
?>
</body>
</html>