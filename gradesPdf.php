<?php
require('fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData()
{
    require_once 'login.php';

    $conn = mysqli_connect($hn, $un, $pw, $db);
    if (!$conn) {
        die ('Fail to connect to MySQL: ' . mysqli_connect_error());   
    }

    $sql = 'SELECT Cname, Report
            FROM report NATURAL JOIN courses
	    WHERE SID="000-01-0002"';
         
    $query = mysqli_query($conn, $sql);

    return $query;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(60,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(60,6,$col,1);
        $this->Ln();
    }
}
}

$pdf = new PDF();
// Column headings
$header = array('Course', 'Grade');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>