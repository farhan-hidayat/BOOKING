<?php
include "appConfig/conn.php";
include "appConfig/upFile.php";
$cariData = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tmember WHERE emailMember='$_POST[txtEmail]'");
$ketemu = mysqli_num_rows($cariData);
if ($ketemu > 0) {
	echo "
	<script language='javascript'>
		window.alert('Email : $_POST[txtEmail] Sudah Terdaftar !! Silahkan Hubungi Bagian Administrasi');
		window.location=('index.php')
		</script>
	";
} else {


	$pass = md5($_POST['txtPassMember']);

	mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tmember (usermember,passmember,nmLengkap,alamat,emailMember,kontak,aktif)
							VALUES ('$_POST[txtUsername]','$pass','$_POST[txtNmLengkap]','$_POST[txtAlamat]','$_POST[txtEmail]','$_POST[txtKontak]','Y')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	echo "
		<script language='javascript'>
		window.alert('Data Berhasil Disimpan');
		window.location=('index.php')
		</script>
		";
}
