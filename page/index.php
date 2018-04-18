<?php
session_start();
error_reporting(0);
include "config/fungsi_rupiah.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>.:: Aplikasi Sistem Informasi Futsal ::.</title>
<link href="page/stylee.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
<script src="./assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="page/js/dropdown.js"></script>
<script type="text/javascript" src="page/js/highslide-with-html.js"></script>
<script type="text/javascript" src="page/js/slideshow.js"></script>
<script type="text/javascript" src="page/js/utilities.js"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/jquery-slim.min.js"></script>
</head>
<body>
<!-- design lama -->
<!-- <div id="container_wrapper">
<div id="container">	
  <div id="header">
      <div id="inner_header">
			<a href='admin.php'><img src='page/images/header.jpg'></a>
      </div>
  </div>
<div id="top"> 
	<span class="cpojer-links"> 
		<a href="http://localhost/myfutsal/">Home</a> 
		<a href="lihat-detail-1.html">Lapangan</a> 
		<a href="pemesanan.html">Cara Pemesanan</a>
		<a href="jadwal.html">Jadwal</a>
		<a href="hubungi-kami.html">Hubungi Kami</a> 
		
	</span>
</div>
<table style='width:100%; padding-bottom:20px;'><tr></tr></table>

		<div id="left_column">
			<div class="text_area" align="justify">	
			<?php include "data.php"; ?>
			</div>
		</div>

    	<div id="right_column">
			<?php include "sidebar_kiri.php"; ?>
		</div>
        
</div>
<div class="spacer"></div>
</div> -->
<div class="container">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        	<a class="nav-link" href="http://localhost/myfutsal/">Home</a> 
      </li>
      <li class="nav-item">
        	<a class="nav-link" href="lihat-detail-1.html">Lapangan</a>
      </li>
      <li class="nav-item">
        	<a class="nav-link" href="pemesanan.html">Cara Pemesanan</a>
      </li>		
      <li class="nav-item">
        	<a class="nav-link" href="jadwal.html">Jadwal</a> 
      </li>
      <li class="nav-item">
        	<a class="nav-link" href="hubungi-kami.html">Hubungi Kami</a>
      </li> 
    </ul>
  </div>
</nav>
</div>
<!-- design baru --> 
<div class="container" style="padding-top: 2%;">
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center">
			<a href='admin.php'><!-- <img src='page/images/header.jpg' style="width: 100%; height: 150px;"> --><div style="background-image: url('page/images/header.jpg');height: 220px;width: 100%;background-size: cover;background-position: center;">
				
			</div></a>
		</div>

		<!-- <div class="col-md-12 col-xs-8">
			 <nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        	<a class="nav-link" href="http://localhost/myfutsal/">Home</a> 
			      </li>
			      <li class="nav-item">
			        	<a class="nav-link" href="lihat-detail-1.html">Lapangan</a>
			      </li>
			      <li class="nav-item">
			        	<a class="nav-link" href="pemesanan.html">Cara Pemesanan</a>
			      </li>		
			      <li class="nav-item">
			        	<a class="nav-link" href="jadwal.html">Jadwal</a> 
			      </li>
			      <li class="nav-item">
			        	<a class="nav-link" href="hubungi-kami.html">Hubungi Kami</a>
			      </li>      	
			    </ul>
			  </div>
			</nav>  
		</div> -->
		<div class="col-md-8 col-xs-8">
			<?php include "data.php"; ?>
		</div>
		<div class="col-md-4 col-xs-4">
			<?php include "sidebar_kiri.php"; ?>
		</div>
	</div>
</div>
</body>
</html>