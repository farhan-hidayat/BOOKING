<?php
include "../appConfig/conn.php";
function antiinjection($data){
  $filter_sql = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

// $username 	= antiinjection($_POST['txtUsername']);
// // $pass     	= antiinjection(md5($_POST['txtPassword']));
// $pass     	= antiinjection($_POST['txtPassword']);
// $email		= antiinjection($_POST['txtUsername']);

$username 	= $_POST['txtUsername'];
// $pass     	= antiinjection(md5($_POST['txtPassword']));
$pass     	= md5($_POST['txtPassword']);
// $email		= antiinjection($_POST['txtUsername']);

$waktu = time()+25200;
$expired=60;

// $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tpengguna WHERE username='$username' 
// 				OR emailPengguna='$email' AND password='$pass' AND aktif='Y'");

$query=mysqli_query($GLOBALS["___mysqli_ston"], 
  "SELECT * FROM tpengguna WHERE username='$username' AND password='$pass'");
$in=mysqli_num_rows($query);
$r=mysqli_fetch_array($query);

if ($in > 0){
  session_start();
  
  $_SESSION['kdPengguna']   	  = $r['kdPengguna'];
  $_SESSION['username']    		  = $r['username'];
  $_SESSION['password']      	  = $r['password'];
  $_SESSION['nmLengkap']  		  = $r['nmLengkap'];
  $_SESSION['avatar']      		  = $r['avatar'];
	  
  
  $_SESSION['timeout']		= $waktu+$expired;
  $waktulog= time();												
										
  header('location:frame.php?load=dashboard');
}
else{
    echo "<script type='text/javascript'>
	window.alert('Username Atau Password Anda Salah'); 
	window.location =('index.php')</script>";
}
