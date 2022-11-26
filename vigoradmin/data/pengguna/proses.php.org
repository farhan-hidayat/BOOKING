<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="pengguna" AND $action=="simpanData"){
	
	$pass=md5($_POST['txtPassword']);	
	$SQL="INSERT INTO tpengguna (username,password,nmPengguna,
								alamatPengguna,emailPengguna,kontak,aktif) 
		VALUES ('$_POST[txtUsername]','$pass','$_POST[txtNmLengkap]',
				'$_POST[txtAlamat]','$_POST[txtEmail]','$_POST[txtKontak]','$_POST[rbAktif]')";
	mysql_query($SQL) or die (mysql_error());
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=pengguna')
	</script>
	";
	
	}elseif($loadPage=="pengguna" AND $action=="hapusData"){
		
		mysql_query("DELETE FROM tpengguna WHERE kdPengguna=$_GET[id]")or die (mysql_error());
		
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=pengguna')
	</script>
	";
		
		
		
	}elseif($loadPage=="pengguna" AND $action=="ubahData"){
	
	if(isset($_POST['txtPassword'])){
		
		$pass1=md5($_POST['txtPassword']);
		$SQL1="UPDATE tpengguna SET username='$_POST[txtUsername]',
								  password='$pass1',
								  nmPengguna='$_POST[txtNmLengkap]',
								  emailPengguna='$_POST[txtEmail]',
								  kontak='$_POST[txtKontak]',
								  alamatPengguna='$_POST[txtAlamat]',
								  aktif='$_POST[rbAktif]'
			WHERE kdPengguna='$_POST[id]'";
	mysql_query($SQL1) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=pengguna')
	</script>
	";
	
		
		}else{
			
		
		$SQL2="UPDATE tpengguna SET userpengguna='$_POST[txtUsername]',
								  nmLengkap='$_POST[txtNmLengkap]',
								  emailpengguna='$_POST[txtEmail]',
								  kontak='$_POST[txtKontak]',
								  alamatPengguna='$_POST[txtAlamat]',
								  aktif='$_POST[rbAktif]'
			WHERE kdpengguna='$_POST[id]'";
	mysql_query($SQL2) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=pengguna')
	</script>
	";
			
			
			}	
		}	
	}else{
		
		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=pengguna')
		</script>
		
		";
		}
?>