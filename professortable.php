<!DOCTYPE html>
<html lang="en">
<head>
	<title>WPI Course Selector</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
<?php // sqltest.php

  include 'header.php';
  include 'nav.php';

  require_once 'login.php';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn) {
    die ('Fail to connect to MySQL: ' . mysqli_connect_error());
}

echo '<main>';
echo '<h2>List of Professors</h2>';

echo "<div style='padding: 10px;'>
    <input type='text' id='myInput' style='width: 30%' onkeyup='myFunction()' placeholder='Search for professors'>
</div>";

$query = 'SELECT Pid, Pname, AffiliatedDept
        FROM professor';

$result = mysqli_query($conn, $query);
if (!$result) {
    echo 'Could not get data: ' . mysqli_error($conn);
}

echo "<table id='myTable'>
    <thead>
        <tr>
            <th onclick='sortTable(0)'>Professor ID</th>
            <th onclick='sortTable(1)'>Professor Name</th>
            <th onclick='sortTable(2)'>Department</th>
        </tr>
    </thead>
    <tbody id='myTBODY'>";

while ($row = mysqli_fetch_array($result)) {
	$sql3 = "SELECT Dname
						FROM Department Where Department.Did = '".$row['AffiliatedDept']."'";
	$query3 = mysqli_query($conn, $sql3);
	$Dname = mysqli_fetch_array($query3);
    echo '<tr>
        <td>' . $row['Pid'] . '</td>
        <td>' . $row['Pname'] . '</td>
        <td>' . $Dname['Dname'] . '</td>
        </tr>';
}

echo "
</tbody>
</table>
<script>
function myFunction() {
    let input, filter, tbody, tr, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    tbody = document.getElementById('myTBODY');
    tr = tbody.getElementsByTagName('tr');
    for(i = 0; i < tr.length; i++) {
        a = tr[i].getElementsByTagName('td')[1];
        if(a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = '';
        } else {
            tr[i].style.display = 'none';
        }
    }
}
function sortTable(n) {
  let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById('myTable');
  switching = true;
  dir = 'asc';
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName('TR');
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName('TD')[n];
      y = rows[i + 1].getElementsByTagName('TD')[n];
      if (dir == 'asc') {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == 'desc') {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == 'asc') {
        dir = 'desc';
        switching = true;
      }
    }
  }
}
</script>";

echo '<br><br>
<a href="professorPdf.php" target="_blank">Get PDF</a>

</main>

</body>';

include 'footer.php';

// Should we need to run this? read section VII
mysqli_free_result($result);

// Should we need to run this? read section VII
mysqli_close($conn);
