<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	include"../../../appConfig/upFile.php";
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="member" AND $action=="simpanData"){
	
	$pass=md5($_POST['txtPassword']);	
	$SQL="INSERT INTO tmember (usermember,passmember,nmLengkap,
								alamat,emailMember,kontak,aktif) 
		VALUES ('$_POST[txtUsername]','$pass','$_POST[txtNmLengkap]',
				'$_POST[txtAlamat]','$_POST[txtEmail]','$_POST[txtKontak]','$_POST[rbAktif]')";
	mysql_query($SQL) or die (mysql_error());
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=member')
	</script>
	";
	
	}elseif($loadPage=="member" AND $action=="hapusData"){
		
		mysql_query("DELETE FROM tmember WHERE kdMember=$_GET[id]")or die (mysql_error());
		
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=member')
	</script>
	";
		
		
		
	}elseif($loadPage=="member" AND $action=="ubahData"){
	
	if(isset($_POST['txtPassword'])){
		
		$pass1=md5($_POST['txtPassword']);
		$SQL1="UPDATE tmember SET usermember='$_POST[txtUsername]',
								  passmember='$pass1',
								  nmLengkap='$_POST[txtNmLengkap]',
								  emailMember='$_POST[txtEmail]',
								  kontak='$_POST[txtKontak]',
								  alamat='$_POST[txtAlamat]',
								  aktif='$_POST[rbAktif]'
			WHERE kdMember='$_POST[id]'";
	mysql_query($SQL1) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=member')
	</script>
	";
	
		
		}else{
			
		
		$SQL2="UPDATE tmember SET usermember='$_POST[txtUsername]',
								  nmLengkap='$_POST[txtNmLengkap]',
								  emailMember='$_POST[txtEmail]',
								  kontak='$_POST[txtKontak]',
								  alamat='$_POST[txtAlamat]',
								  aktif='$_POST[rbAktif]'
			WHERE kdMember='$_POST[id]'";
	mysql_query($SQL2) or die (mysql_error());
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=member')
	</script>
	";
			
			
			}	
		}	
	}else{
		
		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=member')
		</script>
		
		";
		}
?>