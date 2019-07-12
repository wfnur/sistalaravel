$(document).ready(function(){
	$error = $('<center><h2 class = "text-danger">NIM tersebut tidak terdaftar <h2></center>');
	$error1 = $('<center><h2 class = "text-danger">Silahkan Isi terlebih dahulu<h2></center>');
	$('#login').click(function(){
		$error.remove();
		$error1.remove();
		$student = $('#student').val();
		if($student == ""){
			$error1.appendTo('#error');
		}else{	
			$.post('check_absensi.php', {student: $student},
				function(show){
					if(show == 'Success'){
						$.ajax({
							type: 'POST',
							url: 'login_absensi.php',
							data: {
								student: $student
							},
							success: function(result){
								$result = $('<h2 class = "text-warning">Mahasiswa tidak hadir:</h2>' + result).appendTo('#result');
								$('#student').val('');
								setTimeout(function(){
									$result.remove();
								}, 10000);
							}
						});
					}else{
						$('#student').val('');
						$error.appendTo('#error');
					}
				}
			)
		}	
	});
});