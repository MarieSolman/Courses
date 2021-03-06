<!DOCTYPE html>
<html lang="en">
<head>
	<title>Courses</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
<?php // sqltest.php
  include 'header.php';
  include 'nav.php';
  require_once 'login.php';
  echo '<main>';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn) {
    die ('Fail to connect to MySQL: ' . mysqli_connect_error());
}

echo "<div style='padding: 10px;'>
    <input type='text' id='myInput' style='width: 30%' onkeyup='myFunction()' placeholder='Search for courses' title='Type in a course'>
</div>";

$sql = 'SELECT cid, Cname, Cdesc, Timetable, AssistSid
        FROM Courses';
$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table id=\'myTable\'>
        <thead>
            <tr>
                <th onclick=\'sortTable(0)\'>Course ID</th>
                <th onclick=\'sortTable(1)\'>Course Name</th>
                <th>Description</th>
								<th>Schedule</th>
								<th>TA</th>
            </tr>
        </thead>
        <tbody id=\'myTBODY\'>';
while ($row = mysqli_fetch_array($query))
{
$sql2 = 'SELECT Sname
	        FROM Student Where Sid =\''.$row['AssistSid'].'\'';
$query2 = mysqli_query($conn, $sql2);
$taName = mysqli_fetch_array($query2);
    echo '<tr>
            <td>'.$row['cid'].'</td>
            <td>'.$row['Cname'].'</td>
            <td>'.$row['Cdesc'].'</td>
						<td>'.$row['Timetable'].'</td>
						<td>'.$taName['Sname'].'</td>
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
</script>

</main>
</body>";

include 'footer.php';

// Should we need to run this? read section VII
mysqli_free_result($query);
// Should we need to run this? read section VII
mysqli_close($conn);