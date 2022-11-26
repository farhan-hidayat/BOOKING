<?php
include"appConfig/conn.php";
include"appConfig/upFile.php";
$cariData =mysql_query("SELECT * FROM tmember WHERE emailMember='$_POST[txtEmail]'");
$ketemu=mysql_num_rows($cariData);
if($ketemu > 0){
	echo"
	<script language='javascript'>
		window.alert('Email : $_POST[txtEmail] Sudah Terdaftar !! Silahkan Hubungi Bagian Administrasi');
		window.location=('index.php')
		</script>
	";
	
	
	}else{

		$tgl=date("Ymd");
		 $addres_file = $_FILES['upPhoto']['tmp_name'];
		  $tipe_file   = $_FILES['upPhoto']['type'];
		  $filename    = $_FILES['upPhoto']['name'];
		  $enkrip	   = md5($filename);
		  $filenameenkrip = $enkrip.$filename;
		  
		  $pass = md5($_POST['txtPassMember']);
		 
	  if(empty($addres_file)){	   
				mysql_query("INSERT INTO tmember (usermember,passmember,nmLengkap,alamat,emailMember,kontak,aktif)
							VALUES ('$_POST[txtUsername]','$pass','$_POST[txtNmLengkap]','$_POST[txtAlamat]','$_POST[txtEmail]','$_POST[txtKontak]','Y')")or die(mysql_error());
							echo"
		<script language='javascript'>
		window.alert('Data Berhasil Disimpan');
		window.location=('index.php')
		</script>
		";
	  }else{
		   if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				  echo"
				  <script language='javascript'>
				  window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				  window.location=('index.php')
				  </script>
				  ";
				  }else{
				$pass = md5($_POST['txtPassMember']);
				 upMemberLaman($filenameenkrip);	 
					mysql_query("INSERT INTO tmember (usermember,passmember,nmLengkap,alamat,emailMember,kontak,fotoMember,aktif)VALUES ('$_POST[txtUsername]','$pass','$_POST[txtNmLengkap]','$_POST[txtAlamat]',
'$_POST[txtEmail]','$_POST[txtKontak]','$filenameenkrip','Y')")or die(mysql_error());
		
	echo"
		<script language='javascript'>
		window.alert('Data Berhasil Disimpan');
		window.location=('index.php')
		</script>
		";
				  }
		  
		  
		  
		  }
		  }

?>