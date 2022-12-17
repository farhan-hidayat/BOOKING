<?php
session_start();
if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
	$p = $_GET['p'];
	$action = $_GET['action'];
	include "appConfig/conn.php";

	if ($p == "boking" and $action == "tambah-boking") {

		$validasi = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE idSession='$_SESSION[username]'");
		$ketemu = mysqli_num_rows($validasi);
		if ($ketemu > 0) {
			echo "
		<script language='javascript'>
	window.alert('Maaf, Anda Hanya Dapat Melakukan 1 Kali Boking Lapangan ');
	window.location=('frame.php?p=keranjang-boking')
	</script>
		
		";
		} else {

			$jadwal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tlapangan WHERE kdlapangan='$_POST[lapangan]'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			$_data = mysqli_fetch_array($jadwal);
			$subtotal = $_data['harga'] * 1;
			$SQL = "INSERT INTO tboking_temp (nomorLapangan,tglBokingTemp,
									jamBokingTemp,hargaTemp,subTotalTemp,idSession)
		VALUES('$_POST[lapangan]','$_POST[jadwal]','$_POST[jam]','$_data[harga]',
		'$subtotal','$_SESSION[username]')";
			mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

			$SQL2 = "INSERT INTO tjadwal (tglJadwal,kdLapangan,statusBoking,idSession)
		VALUES('$_POST[jadwal]','$_POST[lapangan]','B','$_SESSION[username]')";
			mysqli_query($GLOBALS["___mysqli_ston"], $SQL2) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

			echo "
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('frame.php?p=rincian-data-boking')
	</script>
	";
		}
	} elseif ($p == "boking" and $action == "hapusData") {
		mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tboking_temp WHERE idSession='$_SESSION[username]'");
		echo "
	<script language='javascript'>
	window.alert('Data Berhasil Disimpan');
	window.location=('index.php')
	</script>
	";
	} elseif ($p == "boking" and $action == "selesai-boking") {
		$cekkeranjang = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE idSession='$_SESSION[username]'"));
		if ($cekkeranjang == 0) {
			echo "<script>window.alert('Maaf Transaksi Tidak Dapat Di Proses !!!');
        window.location=('index.php')</script>";
		} else {
			function isi_keranjang()
			{
				$isikeranjang = array();
				$sid = $_SESSION["username"];
				$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking_temp WHERE idSession='$sid'");


				while ($r = mysqli_fetch_array($sql)) {
					$isikeranjang[] = $r;
				}
				return $isikeranjang;
			}
			$tahun = date("Y");
			$tgl_skrg = date("Ymd");

			$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT MAX(noInvoice) As nomorOrder FROM tboking");
			$kode = mysqli_fetch_array($query);
			$kodeJadi = $kode["nomorOrder"];
			$noOrder = (int)substr($kodeJadi, 4, 6);
			$noOrder++;
			$char = "INV-";
			$newID = $char . sprintf("%06s", $noOrder);
			$tot = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(subTotalTemp) AS total FROM tboking_temp WHERE idSession='$_SESSION[username]'");
			$t = mysqli_fetch_array($tot);

			mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO tboking(noInvoice,tglInvoice,usernameBoking,an,alamat,email,kontak,totalBayar,statusBayar)
			VALUES ('$newID','$tgl_skrg','$_SESSION[username]','$_POST[txtNmLengkap]',
					'$_POST[txtAlamat]','$_POST[txtEmail]','$_POST[txtKontak]','$t[total]','$_POST[bayar]')");

			$id_orders = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
			$isikeranjang = isi_keranjang();
			$jml          = count($isikeranjang);

			$id = $_SESSION["username"];
			$jadwal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tjadwal WHERE idSession='$id' ORDER BY kdJadwal desc") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			$_data = mysqli_fetch_array($jadwal);

			for ($i = 0; $i < $jml; $i++) {
				mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO trincian_boking(kdBoking,kdJadwal,noLapangan,tglBoking,jamBoking,hargaBoking,subTotal) 
               VALUES('$id_orders','$_data[kdJadwal]','{$isikeranjang[$i]['nomorLapangan']}', '{$isikeranjang[$i]['tglBokingTemp']}','{$isikeranjang[$i]['jamBokingTemp']}','{$isikeranjang[$i]['hargaTemp']}',
'{$isikeranjang[$i]['subTotalTemp']}')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

				mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE tjadwal SET statusBoking='B' WHERE kdJadwal='{$isikeranjang[$i]['kdJadwal']}'");
			}

			mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM tboking_temp
	  	         WHERE idSession = '$_SESSION[username]'");

			header('location:frame.php?p=rincian-transaksi');
		}
	}
} else {
	echo "
	<script language='javascript'>
	window.alert('Anda Tidak Dapat Melakukan Pembokingan Online,Silahkan Login Terlebih Dahulu');
	window.location=('?p=login')
	</script>
	";
}
