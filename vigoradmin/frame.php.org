<?php 
ob_start();
error_reporting(0);
session_start();
$waktu=time()+60;
$expired=2000;
if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	if($waktu < $_SESSION['timeout']){
		unset($_SESSION['timeout']);
		$_SESSION['timeout']=$waktu+$expired;
		}else{
			
		include"logout.php";
			
		}
include"../appConfig/conn.php";
include"../appConfig/region.php";
include"../appConfig/timeZone.php";
include"../appConfig/libb.php";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vigor Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">Vigor Admin</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
   <?php include"nav.php";?>
  </ul>
</div>



<div id="sidebar"><a href="?load=dashboard" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <?php include"sidebar.php"; ?>
  </ul>
</div>

<div id="content">
<?php include"content.php"; ?>
</div>

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Vigor Admin. Design By : <a href="#">Fhani Kurniawan</a> </div>
</div>
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 



</body>
</html>
<?php
}else{
	echo"
	<script type='text/javascript' language='javascript'>
	window.alert('Maaf Untuk Masuk ke Halaman ini Anda harus Login Terlebih Dahulu');
	window.location=('index.php');
	";
}
?>