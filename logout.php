<?php
session_start();
session_destroy();
echo"
		<script language='javascript'>
		window.alert('Anda Berhasil Keluar Dari Sistem');
		window.location=('index.php')
		</script>
		";
?>