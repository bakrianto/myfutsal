<?php
session_start();
error_reporting(0);
include "../config/session_admin.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Administrator - Aplikasi Sistem Informasi Penyewaan Lapangan Futsal ::.</title>
<link href="./page/admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<script src="../page/js/calendar/datetimepicker.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_gugun.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<div id="container_wrapper">
	<div id="container">
  <div id="header">
      <div id="inner_header">
			<div style="background-image: url('../page/images/header.jpg');height: 220px;width: 100%;background-size: cover;background-position: center;">
      </div>
  </div>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        	<a class="nav-link" href=?module=home>Manage Home</a> 
      </li>
      <li class="nav-item">
        	<a class="nav-link" href=?module=hubungi>Manajemen Hubungi</a>
      </li>
      <li class="nav-item">
        	<a class="nav-link" href=?module=pesanan>Kelola Cara Pemesanan</a>
      </li>		
      <li class="nav-item">
        	<a class="nav-link" href=?module=user>Manage Members</a> 
      </li>
      <li class="nav-item">
        	<a class="nav-link" href=../logout.php>Logout</a>
      </li> 
    </ul>
  </div>
</nav>
  
		<div id="left_column">
			<div class="text_area" align="justify">	
	<?php echo "<br/>"; include "content.php"; ?>
			</div>
		</div>
    
    	<div id="right_column">
		  <ul class="menu">
                <?php echo "<br/><br/><div style='width:239px;' class='subtitle'></b> MENU ADMINISTRATOR</div>"; ?><br/>
				<a class='shiny-button' href=?module=lapangan>Kelola Lapangan</a>
				<a class='shiny-button' href=?module=jam>Kelola Jam</a>
				<a class='shiny-button' href=?module=rekening>Kelola Rekening</a> 	
				<a class='shiny-button' href=?module=konfirmasi>Konfirmasi Pembayaran</a>
				<a class='shiny-button' href=?module=order>Order Lapangan</a><br><br>
          </ul>
		</div>

	<div id="footer">

    </div>
        
</div>
<div class="spacer"></div>
</div>
</div>
</body>
</html>