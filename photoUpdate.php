<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Course Submission Complete-</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="style.css">

  </head>


  <body>

    <div id="wrapper">

      <?php

        include 'header.php';

        include 'nav.php';

        require_once 'login.php';

        $conn = new mysqli($hn, $un, $pw, $db);


        if ($conn->connect_error) {

          die($conn->connect_error);

        }


        if (isset($_POST['photoUrl'])) {

          // Update Surl

          $Sid = "000-01-0001";

          $Surl = get_post($conn, 'photoUrl');

          $query = "INSERT INTO photo VALUES('$Sid', '$Surl')
              ON DUPLICATE KEY UPDATE Surl = '$Surl'";
 
          $result_course = $conn->query($query);


          if (!$result_course) {

            echo "UPDATE failed: $query<br>" . $conn->error . "<br><br>";
          } else {
            echo "<main>";
            echo "<h1> Update portfolio successfully</h1><br>";
            echo "</main>";
          }
        }
        $conn->close();
        
        function get_post($conn, $var) {

          return $conn->real_escape_string($_POST[$var]);

        }


        include 'footer.php';

      ?>

    </div>
  </body>
</html>
