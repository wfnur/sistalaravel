<?php
require('mamai.php');
@Session_start();
$asem=$_SESSION['username'];
class PDF extends PDF_MySQL_Table
{
	
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'World populations',0,1,'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

//Connect to database
require "config.php";

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table("SELECT * FROM `data_matkul` INNER JOIN data_pengajar ON data_matkul.kode_matkul=data_pengajar.kode_matkul where data_pengajar.kode_dosen='$asem'");
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('kode_matkul',30,'Kode Matkul','');
$pdf->AddCol('nama_matkul',60,'Nama Matkul');
$pdf->AddCol('sks',15,'SKS','R');
$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table("SELECT * FROM `data_matkul` INNER JOIN data_pengajar ON data_matkul.kode_matkul=data_pengajar.kode_matkul where data_pengajar.kode_dosen='$asem'",$prop);
$pdf->Output();
?>