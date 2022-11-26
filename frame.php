<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vigor Futsal Pontianak</title>
   <?php include"style.php";?>
   <?php include"appConfig/conn.php";
         include"appConfig/libb.php";
         include"appConfig/region.php";   ?>
</head>
<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
     <?php include"navbar.php";?>
    </div>
    <?php include"content.php";?>
   
    <!-- Footer -->
   
    <footer class="footer">
        <strong>Vigor Futsal - </strong> Pontianak <STRONG>|Design By : </STRONG>Fhani Kurniawan</STRONG>  &copy; Copyright 2017
    </footer>
    <!-- // Footer -->
    <!-- Inline Script for colors and config objects; used by various external scripts; -->
   <?php include"jav.php" ?>
</body>
</html>