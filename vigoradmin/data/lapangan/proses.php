<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	
	include"../../../appConfig/upFile.php";
	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="lapangan" AND $action=="simpanData"){
		 $addres_file = $_FILES['upPhoto']['tmp_name'];
		  $tipe_file   = $_FILES['upPhoto']['type'];
		  $filename    = $_FILES['upPhoto']['name'];
		  $enkrip	   = md5($filename);
		  $filenameenkrip = $enkrip.$filename;
		
	if(empty($addres_file)){
		$SQL="INSERT INTO tlapangan (noLapangan,harga,deskripsi) VALUES ('$_POST[txtNoLapangan]','$_POST[harga]','$_POST[txtDeskripsi]')";
	mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	}else{
		 if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				  echo"
				  <script language='javascript'>
				  window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				  window.location=('../../frame.php?load=lapangan')
				  </script>
				  ";
				  }else{
					  
		upLapangan($filenameenkrip);
		$SQL="INSERT INTO tlapangan (noLapangan,harga,deskripsi,gambarLapangan) VALUES ('$_POST[txtNoLapangan]','$_POST[harga]','$_POST[txtDeskripsi]','$filenameenkrip')";
	mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
    echo"
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
				  
				  }
		
		
		
		}
	
	
	}elseif($loadPage=="lapangan" AND $action=="hapusData"){
		
	$Query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT gambarLapangan FROM tlapangan WHERE kdLapangan ='$_GET[id]'");
	$remove= mysqli_fetch_array($Query);
	
	if($remove['gambarLapangan'] !=""){
		mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tlapangan WHERE kdLapangan=$_GET[id]")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
		unlink("../../../gambar/lapangan_img/height/$_GET[fimage]");
		unlink("../../../gambar/lapangan_img/medium/medium_$_GET[fimage]");
		unlink("../../../gambar/lapangan_img/small/small_$_GET[fimage]");
		}else{
		mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tlapangan WHERE kdLapangan=$_GET[id]")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
		}
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
		
		
		
	}elseif($loadPage=="lapangan" AND $action=="ubahData"){
		  $addres_file = $_FILES['upPhoto']['tmp_name'];
		  $tipe_file   = $_FILES['upPhoto']['type'];
		  $filename    = $_FILES['upPhoto']['name'];
		  $enkrip	   = md5($filename);
		  $filenameenkrip = $enkrip.$filename;
			if(empty($addres_file)){
	$SQL="UPDATE tlapangan SET noLapangan='$_POST[txtNoLapangan]',
	harga='$_POST[harga]',
							   deskripsi='$_POST[txtDeskripsi]'
							    
		  WHERE kdLapangan='$_POST[id]'";	
	mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	}else{
		
				 if($tipe_file !="image/jpg" AND $tipe_file != "image/jpeg"){
				  echo"
				  <script language='javascript'>
				  window.alert('Upload Gambar Gagal Pastikan File Bertipe JPEG');
				  window.location=('../../frame.php?load=lapangan&action=edit&id=$_POST[id]')
				  </script>
				  ";
				  }else{
				upLapangan($filenameenkrip);
					$SQL="UPDATE tlapangan SET noLapangan='$_POST[txtNoLapangan]',
					harga='$_POST[harga]',
							   deskripsi='$_POST[txtDeskripsi]',
							   gambarLapangan='$filenameenkrip'
							    
		  WHERE kdLapangan='$_POST[id]'";	
	mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
		 
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Diubah');
	window.location=('../../frame.php?load=lapangan')
	</script>
	";
	
	}
	}
	}	
	}else{
		
		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=lapangan')
		</script>
		
		";
		}
