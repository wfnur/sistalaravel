
<?php 
require 'composer.json';

require("html2pdf.php"); 
$jumlah=0;
$jum=0;
$kod=$_GET['sms'];
@Session_start();
$asem=$_SESSION['username'];
$html = '<html><body>'.
		
    '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    ';
			
			require "config.php";


	  
		$html.=	'<h3 class="page-header">
                    Data Nilai Mahasiswa
                    </h3>
				<h3>Semester '.$kod.'</h3>'.



			

				'
					
						<table width="793" class="table table-bordered table-striped">

  
							<thead>
								<tr>
									<td style="width:20%" rowspan="2">Kode</td>
									<td style="width:30%" rowspan="2">Mata Kuliah</td>
									<td style="width:10%" rowspan="2">Harian</td>
									<td style="width:10%" rowspan="2">UTS</td>
									<td style="width:10%" rowspan="2">UAS</td>
									<td style="width:10%" rowspan="2">Hasil Akhir</td>
									<td style="width:10%" rowspan="2">Index</td>
									<td style="width:10%" rowspan="2">SKS</td>
								</tr>
				
							</thead><tbody>';
							
									
								$nim=$_SESSION['username'];
								$kod2=$_GET['sms'];	
								$ambildata3=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim'");
									while ($isi2=mysql_fetch_array($ambildata3)){
									$prodi=$isi2['prodi'];
										
										$ambildata=mysql_query("SELECT * FROM `data_matkul` INNER JOIN data_nilai ON data_matkul.kode_matkul=data_nilai.kode_matkul2 where data_nilai.nim2='$nim' and data_matkul.semester='$kod2'")or die(mysql_error());

										while ($isi=mysql_fetch_array($ambildata)){
											$nama=$isi['nama_matkul'];
											$kod_mat=$isi['kode_matkul'];
											$sks=$isi['sks'];
											$harian=$isi['harian'];
											$uts=$isi['uts'];
											$uas=$isi['uas'];
											$akhir=$isi['akhir'];
											$indeks=$isi['indeks'];
											$indeks2=$isi['indeks2'];



								$html.='<tr>
									<td>'.$kod_mat.'</td>
									<td>'.$nama.'</td>
									<td>'.$harian.'</td>
									<td>'.$uts.'</td>
									<td>'.$uas.'</td>
									<td>'.$akhir.'</td>
									<td>'.$indeks.'</td>
									<td>'.$sks.'</td></tr>';
  

 

$jumlah=$jumlah+$sks;
$jum=$jum+($indeks2*$sks);

  } 
  
  
	   }
  
  
$juju=$jum/$jumlah;
$fun=number_format($juju,2);
 $html.= '</tbody></table>
Jumlah SKS: '.$jumlah.'
IP Semester:'.$fun.'

  
			</body></html>';


$pdf = new HTML2FPDF('P', 'mm', 'A4'); 
$pdf->AddPage(); 
$pdf->WriteHTML($buffer); 
$pdf->Output('my.pdf', 'F'); 
?>