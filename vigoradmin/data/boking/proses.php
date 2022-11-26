<?php
session_start();
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	include"../../../appConfig/conn.php";	

	$loadPage= $_GET['load'];
	$action =$_GET['action'];
	
	if($loadPage=="boking" AND $action=="tambahItem"){
	
	$item=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tjadwal,tlapangan,tjam WHERE tjadwal.kdLapangan=tlapangan.kdLapangan 
						   AND tjadwal.kdJam=tjam.kdJam AND tjadwal.kdJadwal='$_GET[id]'");
	$_data=mysqli_fetch_array($item);
	
	$SQL=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE jamBokingTemp='$_data[jam]'");
	$ketemu=mysqli_num_rows($SQL);
	if($ketemu > 0){
		echo"
   <script language='javascript'>
	window.alert('Jam Sudah Diboking');
	window.location=('../../frame.php?load=boking&action=input')
	</script>
		";
	}else{
	$subtotal = $_data['harga'] *1;
		 
	$SQL="INSERT INTO tboking_temp (kdJadwal,nomorLapangan,tglBokingTemp,jamBokingTemp,hargaTemp,subTotalTemp,idSession) 
	VALUES ('$_data[kdJadwal]','$_data[noLapangan]','$_data[tglJadwal]','$_data[jam]','$_data[harga]','$subtotal','$_SESSION[username]')";
	mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
    echo"
   <script language='javascript'>
	window.alert('Jam Boking Berhasil Ditambah');
	window.location=('../../frame.php?load=boking&action=input')
	</script>
		";
	}
	}elseif($loadPage=="boking" AND $action=="hapusData"){
		
		mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tboking_temp WHERE kdbokingTemp=$_GET[id]")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
		
	echo"
	<script language='javascript'>
	window.alert('Data Berhasil Dihapus');
	window.location=('../../frame.php?load=boking&action=input')
	</script>
	";
		
		
		
	}elseif($loadPage=="boking" AND $action=="ubahStatus"){
		mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tboking SET statusBayar='$_POST[rbStatus]' WHERE kdBoking='$_POST[id]'");
	echo"
	<script language='javascript'>
	window.alert('Status Transaksi Berhasil Dirubah');
	window.location=('../../frame.php?load=boking')
	</script>
	";
		
	
	}elseif($loadPage=="boking" AND $action=="selesai-boking"){
	$cekkeranjang = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE idSession='$_SESSION[username]'"));
if ($cekkeranjang == 0){
	echo "<script>window.alert('Maaf Transaksi Tidak Dapat Di Proses !!!');
        window.location=('../../frame.php?load=boking&action=input')</script>";  
}else{
function isi_keranjang(){
	$isikeranjang = array();
	$sid = $_SESSION["username"];
	$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE idSession='$sid'");
	
	while ($r=mysqli_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}
$tahun=date("Y");
$tgl_skrg = date("Ymd");

$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT MAX(noInvoice) As nomorOrder FROM tboking");
							$kode=mysqli_fetch_array($query);
							$kodeJadi=$kode["nomorOrder"];
							$noOrder=(int)substr($kodeJadi,3,3);
							$noOrder++;
							$char = "INV";
							$newID = $char . sprintf("%03s", $noOrder);
$lunas="B";
$tot=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(subTotalTemp) AS totalBayar FROM tboking_temp WHERE idSession='$_SESSION[username]'");
$r=mysqli_fetch_array($tot);


mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tboking (noInvoice,tglInvoice,usernameBoking,an,alamat,email,kontak,totalBayar,statusBayar)
			 VALUES('$newID','$tgl_skrg','$_SESSION[username]',
			'$_POST[txtNmLengkap]','$_POST[txtAlamat]','$_POST[txtEmail]',
			 		'$_POST[txtKontak]','$r[totalBayar]','$lunas')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

  
$id_orders=((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

for ($i = 0; $i < $jml; $i++){
  mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO trincian_boking(kdBoking,noLapangan,kdJadwal,hargaBoking,jamBoking,tglBoking,subTotal) 
               VALUES('$id_orders','{$isikeranjang[$i]['nomorLapangan']}','{$isikeranjang[$i]['kdJadwal']}', '{$isikeranjang[$i]['hargaTemp']}','{$isikeranjang[$i]['jamBokingTemp']}','{$isikeranjang[$i]['tglBokingTemp']}',
'{$isikeranjang[$i]['subTotalTemp']}')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tjadwal SET statusBoking='B' WHERE kdJadwal='{$isikeranjang[$i]['kdJadwal']}'");

}

  mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tboking_temp
	  	         WHERE idSession = '$_SESSION[username]'");
 
	echo"
		<script language='javascript'>
		window.alert('Transaksi Berhasil Disimpan');
		window.location=('../../frame.php?load=boking')
		</script>
		
		";

	}			
	
	}
	}else{
		
		echo"
		<script language='javascript'>
		window.alert('Maaf Anda Tidak Dapat Melakukan Operasi CRUD');
		window.location=('../../frame.php?load=boking')
		</script>
		
		";
		}
?>