<?php

@Session_start();
$asem=$_SESSION['username'];
include 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$jumlah=0;
$jum=0;
$kod=$_GET['sms'];
$html =
  '<html><body>'.
		
    '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    ';
			
			require "config.php";
			$nim1=$_SESSION['username'];
			$ambildata7=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim1'");
			while ($isi1=mysql_fetch_array($ambildata7)){
				$name=$isi1['nama'];
				$kelas=$isi1['kelas'];

	  
		$html.=	'<h3 class="page-header"><img src="logo-polban.png" width="45" height="45">
                    Data Nilai Mahasiswa
                    </h3>
				<h3>Semester '.$kod.'</h3>'.



			

				'
					Nama:'.$name.'<br>NIM:'.$nim1.'</br><br>Kelas:'.$kelas.'</br>
						<table width="793" class="table table-bordered table-striped">

  
							<thead>
								<tr>
									<td style="width:20%" >Kode</td>
									<td style="width:30%" >Mata Kuliah</td>
									
									
									<td style="width:10%" >Index</td>
									<td style="width:10%" >SKS</td>
								</tr>';
			}
				
							
							
									
								$nim=$_SESSION['username'];
								$kod2=$_GET['sms'];	
								$ambildata3=mysql_query("SELECT * FROM `data_mhsw` where nim='$nim'");
									while ($isi2=mysql_fetch_array($ambildata3)){
									$prodi=$isi2['prodi'];
										
										$ambildata=mysql_query("SELECT data_nilai.kode_matkul2,data_matkul.nama_matkul,data_matkul.sks,data_nilai.harian,data_nilai.uts,data_nilai.uas,data_nilai.akhir,data_nilai.indeks,data_nilai.indeks2 FROM `data_matkul` INNER JOIN data_nilai ON data_matkul.kode_matkul=data_nilai.kode_matkul2 where (data_nilai.nim2='$nim' and data_matkul.prodi='$prodi') and data_matkul.semester='$kod2'")or die(mysql_error());

										while ($isi=mysql_fetch_array($ambildata)){
											$nama=$isi['nama_matkul'];
											$kod_mat=$isi['kode_matkul2'];
											$sks=$isi['sks'];
											$harian=$isi['harian'];
											$uts=$isi['uts'];
											$uas=$isi['uas'];
											$akhir=$isi['akhir'];
											$indeks=$isi['indeks'];
											$indeks2=$isi['indeks2'];



								$html.='</thead><tbody><tr>
									<td>'.$kod_mat.'</td>
									<td>'.$nama.'</td>
									
									<td>'.$indeks.'</td>
									<td>'.$sks.'</td></tr>';
  

 

$jumlah=$jumlah+$sks;
$jum=$jum+($indeks2*$sks);

  } 
  
  
	   }
  
  
$juju=$jum/$jumlah;
$fun=number_format($juju,2);
 $html.= '
</tbody></table>
<br>Jumlah SKS:<b> '.$jumlah.'</b></br>
<br>IP Semester:<b>'.$fun.'</b></br>';
 if ($kod2>=2){

	require'IPK_sms'.$kod2.'.php';
 
 $html.='<br>IPK:<b>'.$IPK.'<b></br>';}

  
			$html.='</body></html>';
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->setPaper('A4', 'Potrait');

$dompdf->render();
$dompdf->stream('laporan_nilai_semester'.$kod.'_'.$asem.'.pdf');
 
?>
