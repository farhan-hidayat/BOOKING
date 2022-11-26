<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_vigor";
($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password)) or die("Koneksi gagal");
mysqli_select_db($GLOBALS["___mysqli_ston"], $database) or die("Database tidak bisa dibuka");
?>
