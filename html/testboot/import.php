<form name="myForm" id="myForm" onSubmit="return validateForm()" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" id="filenilai" name="filenilai" />
    <input type="submit" name="submit" value="Import" /><br/>
    
</form>
<?php 
if (isset($_POST['submit'])) {
?>
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<div id="info"></div>
<?php
}
?>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filenilai', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
 
<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
require"config.php";
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filenilai']['name']) ;
    move_uploaded_file($_FILES['filenilai']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filenilai']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
   
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//        menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah 
//        jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
        $barisreal = $baris-1;
        $k = $i-1;
        
// menghitung persentase progress
        $percent = intval($k/$barisreal * 100)."%";
 
// mengupdate progress
        echo '<script language="javascript">
        document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
        document.getElementById("info").innerHTML="'.$k.' insert data ('.$percent.' selesai).";
        </script>';
 
//       membaca data (kolom ke-1 sd terakhir)
$ambildata=mysql_query("SELECT * FROM data_bobot where nip2='$nip' and kode_matkuls='$kod'");

  while ($isi=mysql_fetch_array($ambildata)){
$harian2=$isi['harian'];
$uts2=$isi['uts'];
$uas2=$isi['uas'];
      $nim           = $data->val($i, 1);
      $harian   = $data->val($i, 2);
      $uts  = $data->val($i, 3);
	  $uas = $data->val($i, 4);
$akhir=($harian*$harian2/100)+($uts*$uts2/100)+($uas*$uas2/100);
	if($akhir>=80){
		$indeks='A';
		$indeks2=4;
	}
	elseif ((75<=$akhir) and ($akhir>80)){
		$indeks='AB';
		$indeks2=3.5;
	}
	elseif ((70<=$akhir) and ($akhir>75)){
		$indeks='B';
		$indeks2=3;
	}
	elseif ((65<=$akhir) and ($akhir>70)){
		$indeks='BC';
		$indeks2=2.5;
	}
	elseif ((60<=$akhir) and ($akhir>65)){
		$indeks='C';
		$indeks2=2;
	}
	elseif ((55<=$akhir) and ($akhir>60)){
		$indeks='CD';
		$indeks2=1.5;
	}
	elseif ((40<$akhir) and ($akhir>55)){
		$indeks='D';
		$indeks2=1;
	}
	elseif ((0<=$akhir) and ($akhir<=40)){
		$indeks='E';
		$indeks2=0;
	}
 
//      setelah data dibaca, masukkan ke tabel pegawai sql
$pilih_data=mysql_query("select * from data_matkul where kode_matkul='$kod' and prodi='$pro'");
while ($isi=mysql_fetch_array($pilih_data)){;
$sms=$isi['semester'];
$nip2=$_SESSION['username'];
$kod2=$_GET['mk'];
if($uas<=100 or $uts<=100 or $harian<=100){	
	$simpan=mysql_query("insert into data_nilai values ('$nim','$sms','$harian','$uts','$uas','$akhir','$indeks','$indeks2','$nip2','$kod2')");
	if ($simpan)  { ?>
		<div class="alert alert-info">Nilai <?php echo $nim; ?> berhasil disimpan untuk kode matkul <?php echo $kod2?> dengan dosen NIP <?php echo $_SESSION['username']?></div>
	<?php } else { 
	 ?>
	
		<div class="alert alert-danger">Terjadi Kesalahan, Silahkan hubungi Admin <?php echo mysql_error() ?></div>
<?php	}
}
else{ ?>
	<div class="alert alert-danger">Nilai yang anda masukan tidak valid! silahkan coba <a href="javascript:history.go(-1)"> lagi </a></div>
 <?php 
}
}
      
      flush();
 
//      kita tambahkan sleep agar ada penundaan, sehingga progress terbaca bila file yg diimport sedikit
//      pada prakteknya sleep dihapus aja karena bikin lama hehe
      sleep(1);
 
    }
        

	}
	//    hapus file xls yang udah dibaca
    unlink($_FILES['filenilai']['name']);
}

?>
