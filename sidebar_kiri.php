<?php
if ($_SESSION[leveluser]=='members'){
  echo "<div class='text-center' style='padding-top: 13%;'></b><h6> Menu Members </h6></div>
  		<div class=text-center>
  		Selamat Datang! <br> 
  		<b style='font-size:14px' >$_SESSION[namalengkap]</b><br><br>
  		</div>
  		<div class='text-center'>
	  		<a href='laporan-pemesanan.html'><p class='btn btn-success' style='width: 80%;'>Laporan Pemesanan</p></a><br>
	  		<a href='kelola-profile.html'><p class='btn btn-success' style='width: 80%;'>Kelola Profile</p></a><br>
	  		<a href='ganti-password.html'><p class='btn btn-success' style='width: 80%;'>Ganti Password</p></a><br>
	  		<a href='logout.php'><p class='btn btn-success' style='width: 80%;'>Logout</p></a>
	  	<h5>ALAMAT</H5>
		<address>Jl.Sonosini, Bantul<br/>
		No. Telp. 085728880184<br/>
		Email. info@futsalku.com</address>
  		</div>";

	  
}else{
  echo "<div class='col-md-12 col-xs-12 text-center' style='padding-top: 13%;'></b><h5>Login Pemesanan Lapang Futsal</h5></div>
  		<div class='col-md-12 col-xs-12'>
		<form method=POST name='formku' onSubmit='return valid()' action=cek_login.php>
			<div class='form-inline' style='padding: 5% 0 5% 0;'>
				<input type='text' name='id_user' class='form-control' placeholder='Username. . .' style='width: 100%;'>
				<input type='hidden' name='level' value='members' class='input'>
			</div>
			<div class='form-inline'>
				<input type='password' name='password' placeholder='Password. . .' class='form-control' style='width: 100%;'>
			</div>
			<div class='form-inline' style='padding-top: 5%;'>
				<input type='submit' value='Login' class='btn btn-primary'> 
				<input type='reset' value='Ulangi' class='btn btn-warning'> &nbsp;&nbsp;
				<a href='daftar.html'>Daftar?</a>
			</div>
		</form>
		<h5 style='padding-top: 10%;'>ALAMAT</H5>
		<address>Jl.Sonosini, Bantul<br/>
		No. Telp. 085728880184<br/>
		Email. info@futsalku.com</address>
		</div>
		";

	 }
?>

