<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE
ob_start();
@Session_start();
$asem=$_SESSION['username'];
require('fpdf.php');
require"config.php";
class PDF_MySQL_Table extends FPDF
{



//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);
$pdf->AddCol(25, 6, '$asem');
$pdf->AddCol(50, 6, 'Nama Matakuliah');
$pdf->AddCol(15, 6, 'SKS');
$pdf->AddCol(30, 6, 'Prodi');
$pdf->AddCol(15, 6, 'semester');
$pdf->AddCol(25, 6, '$asem');



$row_height = 6;
$y_axis=25;
$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$ambildata=mysql_query("SELECT * FROM `data_matkul` INNER JOIN data_pengajar ON data_matkul.kode_matkul=data_pengajar.kode_matkul where data_pengajar.kode_dosen='$asem'");

  



while ($isi=mysql_fetch_array($ambildata)){
$kod_mk=$isi['kode_matkul'];
$nam_mk=$isi['nama_matkul'];
$sms=$isi['semester'];
$kelas=$isi['kelas'];
$sks=$isi['sks'];
$prodi=$isi['prodi'];
$query=mysql_query("select * from data_bobot where nip2='$asem' and kode_matkul='$kod_mk'");
$jumlah=mysql_num_rows($query);

       
$pdf->AddRow(50, 6,$kod_mk, 1, 0, 'L', 1);
$pdf->AddRow(100, 6,$nam_mk, 1, 0, 'L', 1);
$pdf->AddRow(15, 6,$sks, 1, 0, 'R', 1);
$pdf->AddRow(70, 6,$prodi, 1, 0, 'L', 1);
$pdf->AddRow(15, 6,$sms, 1, 0, 'R', 1);
$pdf->AddRow(25, 6,$kelas, 1, 0, 'R', 1);


}

//Send file
$pdf->Output();
}
ob_end_flush(); 
?>