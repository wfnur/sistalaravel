<style>
			body{
				width:50%;
			}
			#frmFile {
				border-top:#F0F0F0 2px solid;background:#B0E0E6;padding:10px;
			}
			.demoInputBox{
				padding:10px; border:#F0F0F0 1px solid; border-radius:4px;background-color:#FFF;
			}
			#file_error{
				color: #0000CD;
			}
			#btnSubmit{
				background-color:#800080;border:0;padding:10px 40px; margin:15px 0px; color:#FFF;border:#4B0082 1px solid; border-radius:4px;
			}
		</style>
<?php
include "Assets/config/koneksi.php";
include "Assets/config/function.php";
$NIM="161331064";
//$kode = md5('dosen');
//echo $kode;

$tahun = date("Y");

$mhs = getMhs($conn,$NIM);
$nama = str_replace(" ","",$mhs['nama']);

$kelas = $mhs['kelas'];
$urut = $mhs['nourut'];
$angkatan = date("Y") - $mhs['angkatan'] ;

$namafile = "ProposalTA_".$angkatan.$kelas."_".$urut."_".$nama."_R0";
echo $namafile;
?>
<br>
<br>
<?php

$qcek= cekBerkas($conn,"pdf_TA",161331064);
$nums = mysqli_num_rows($qcek);
echo $nums
?>
<p></p>
<?php
$t_getPem1 = getPembimbing($conn,$NIM,"TA_1");
$kd_pem1 = $t_getPem1['kode_dosen'];
$nama_pem1 = $t_getPem1['nama'];
echo "$kd_pem1 $nama_pem1" ;
?>
<p></p>
<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal=date('M d, Y H:i:s');

echo "<br>";
$sql="SELECT * FROM deadline where kode_deadline='pra_PTA' ";
$q=mysqli_query($conn, $sql) or die(mysqli_error($conn));
$t=mysqli_fetch_array($q,MYSQLI_ASSOC);
$deadline = $t['tanggal'];

echo "Sekarang : $tanggal <br> Deadline : $deadline <br> ";
if ($tanggal > $deadline) {
  echo "belum kelewat";
} else {
  echo "udah kelewat";
}
?>
<br>
<br>


<?php
if (isset($_POST['submit_file'])) {
  $ukuran	= $_FILES['file']['size'];
  echo $ukuran ;
} else {
  # code...
}

?>
<form name="frmFile" id="frmFile" method="post" action=""  >
  <div>
    <input type="file" name="file" id="file" class="demoInputBox" onchange="return validate();" />
    <span id="file_error"></span>
  </div>
  <div>
    <input type="submit" id="btnSubmit" value="Upload"/>
  </div>
</form>

<?php

?>

<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
		<script>
		function validate() {
			$("#file_error").html("");
			$(".demoInputBox").css("border-color","#F0F0F0");
			var file_size = $('#file')[0].files[0].size;
			if(file_size > 2097152) {
				$("#file_error").html("Ukuran File Lebih Dari 2 MB !");
				$(".demoInputBox").css("border-color","#0000CD");
        $( "#btnSubmit" ).prop( "disabled", true );
				return false;
			}else{
        $( "#btnSubmit" ).prop( "disabled", false );
      } 
		return true;
		}
		</script>

    <script>
    function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
    </script>
