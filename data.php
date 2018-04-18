<?php
if ($_GET[module]=='home'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='home'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'><b>$r[judul]</b></div><br>
		  <img src='lapangan/77lapangan-matras.jpg' style='width: 100%;'>
          <div style='width: 100%; padding-top: 5%;' align='justify' >$r[detail]</div>";      
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='gantipassword'){
	if (isset($_POST[pass])){
		$e=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));

		$lama = md5($_POST[a]);
		if ($lama != $e[password]){
			echo "<script>window.alert('Maaf, Inputan Password Lama anda Salah.');
        			window.location=('ganti-password.html')</script>";
		}elseif ($_POST[b] != $_POST[c]){
			echo "<script>window.alert('Maaf, Password Baru dan Konf Password Tidak Sama.');
        			window.location=('ganti-password.html')</script>";
		}else{
			$passwords = md5($_POST[b]);
			mysql_query("UPDATE users SET password='$passwords' where username = '$_SESSION[namauser]'");
			echo "<script>window.alert('Sukses, Ganti Password...');
        			window.location=('ganti-password.html')</script>";
		}

	}
	    echo "<div class='post_title'><b>Edit User.</b></div><br/>
			 <div class='h_line'></div>
	          <form style='margin-bottom:30%' method=POST action=''>
	          <label>Password Lama</label>
	          <input type=text name='a' class='form-control'>
	          Password Baru
	          <input type=text name='b' class='form-control'>
	          Konf. Password
	          <input type=text name='c' class='form-control'>
	          <input type=submit value='Ganti Password' name='pass' class='btn'>
	          <input type=button value=Batal onclick=self.history.back() class='btn'>
	          </form>";  
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Modul daftar Customer
elseif ($_GET[module]=='daftar'){
echo "<div class='post_title'><b>Form Registrasi Members.</b></div>
			 <div class='h_line'></div>

		  <p>Silahkan Mengisi Formulir pendaftaran Berikut dengan data yang sebenarnya karena data-data yang anda isikan akan berguna unutk melakukan proses pemesanan Lapangan Futsal. Terima kasih,..</p>
          <form method=POST name='formku' onSubmit='return valid()' action='aksi_daftar.php'>
          <table style='border:none;' width='100%'><br/>
          <tr><td>Username</td>     	<td>&nbsp;<input type=text name='username' size=25 class='input'></td></tr>
          <tr><td>Password</td>     	<td>&nbsp;<input type='password' name='password' size=25 class='input'></td></tr>
          <tr><td>Nama Lengkap</td> 	<td>&nbsp;<input type=text name='nama_lengkap' size=55 class='input'></td></tr>  
		  <tr><td>E-mail</td>       	<td>&nbsp;<input type=text name='email' size=55 class='input'></td></tr>
          <tr><td>No.Telp/HP</td>   	<td>&nbsp;<input type=text name='no_telp' size=35 class='input'></td></tr>
          <tr><td>Alamat Lengkap</td> 	<td>&nbsp;<textarea name='alamat_lengkap' style='width: 93%; height: 70px;' class='input'></textarea></td></tr> 

          <tr><td></td><td><input type=submit value='Mendaftar' class='button'>
          <input type=button value=Batal onclick=self.history.back() class='button'><br/><br/><br/></td>
          </table></pad></form><br/>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='kelolaprofile'){
	if (isset($_POST[update])){
		    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
		                                  email          = '$_POST[email]',
		                                  no_telp        = '$_POST[no_telp]',  
		                                  alamat_lengkap = '$_POST[alamat_lengkap]'
		                           WHERE  username       = '$_POST[id]'");

		  echo "<script>window.alert('Sukses Update Data Profile.');
        			window.location=('kelola-profile.html')</script>";
	}

    $edit=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
    $r=mysql_fetch_array($edit);
    echo "<div class='post_title'><b>Edit Data Anda</b></div><br/>
		 <div class='h_line'></div>
          <form style='margin-bottom:20%' method=POST action=''>
          <input type=hidden name=id value='$r[username]'>
          <label>Username</label>    
		  <input type=text name='username' class='form-control' value='$r[username]' disabled>
          <label>Nama Lengkap</label> 
		  <input type=text name='nama_lengkap' class='form-control' size=30  value='$r[nama_lengkap]'>
          <label>E-mail</label>      
		  <input type=text name='email' class='form-control' size=30 value='$r[email]'>
          <label>No.Telp/HP</label>   
		  <input type=text name='no_telp' class='form-control' size=30 value='$r[no_telp]'>
          <label>Alamat Lengkap</label>
		  <textarea name='alamat_lengkap' class='form-control'>$r[alamat_lengkap]</textarea>
		  <input type=submit value=Update class='btn btn-success' name='update'>
          <input type=button value=Batal class='btn btn-success' onclick=self.history.back()>
          </form>";  
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='home'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='home'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'>$r[judul]</div>
          <div class='text_area'>".nl2br($r[detail])."</div>";      
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='pesanan'){
  $sql=mysql_query("SELECT * FROM statis WHERE halaman='pesanan'");
  $r=mysql_fetch_array($sql);
    echo "<div class='post_title'><b>$r[judul]</b></div><br>
          <div align='justify' class='text_area'>".nl2br($r[detail])."</div>";      
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='jadwal'){
    echo "<div class='post_title'><b>Jadwal Penyewaan Lapangan Futsal</b> </div><br/>
    	  <div class='table-responsive'>
          <table class='table table-bordered'>
          <thead>
          <tr>
		  <th>No</th>
		  <th>Waktu</th>
		  <th>Durasi</th>
		  <th>Status</th>";


    $tampil = mysql_query("SELECT * FROM laporan,lapangan WHERE lapangan.id_lapangan=laporan.id_lapangan 
						   ORDER BY id_orders DESC LIMIT 15");
  $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	
		$tgl = tgl_indo($r[tanggal]);
	    $jam_mulai = $r[jam_mulai];
        $jam_selesai = $r[jam_selesai];
        $durasi = $jam_selesai - $jam_mulai;
		
	
	  if(($no % 1)==0){
		$warna="#267000";
	  }else{
		$warna="#E1E1E1";
	  }
      echo "<tbody>
      			<tr>
                <td>$no</td>
                <td><b>$tgl</b> $r[jam_mulai] s/d $r[jam_selesai] WIB</td>
				<td>$durasi/jam</td>
                <td class='button'>$r[status_pesanan]</td>
				</tr>
			</tbody>
				";
      $no++;
    }

    echo "</table>
    	  </div>
    ";
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='sewa'){
echo "<div class='post_title'><b>Daftar Lapangan Futsal</b></div><br/>";
  $col = 2;
  $p      = new Paging;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
$query = mysql_query("SELECT * FROM lapangan ORDER BY id_lapangan DESC LIMIT $posisi,$batas");
$ada = mysql_num_rows($query);
if ($ada > 0) {
	  echo "<table><tr>";
	  $cnt = 0;
  while ($r=mysql_fetch_array($query)){
  		if ($cnt >= $col) {
		  echo "</tr><tr>";
		  $cnt = 0;
		}
		$cnt++;
	echo "<center><td align=center valign=top><span style='color:white'>$r[judul]</span><br/>
					<img src='lapangan/$r[gambar]' width='294' height='140'>";
							echo "<input style='width:100px;' type=button value='Lihat Detail' onclick=\"window.location.href='lihat-detail-$r[id_lapangan].html';\"><hr>
			</td></center>";
}
	  echo "</tr></table>";
	  
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM lapangan"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<br/>Halaman : $linkHalaman<br />";	  
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


elseif ($_GET[module]=='detaillapangan'){

$query = mysql_query("SELECT * FROM lapangan where id_lapangan=$_GET[id]");
$r=mysql_fetch_array($query);
$harga = format_rupiah($r[harga_lapangan]);

echo "<div class='post_title'><b>$r[judul]</b></div><br/>
	 <img src='lapangan/$r[gambar]' style='width: 100%;'><br/>";

echo "	Nama Lapangan : $r[judul]<br>
		Sewa Lapangan</b></td> : Rp $harga/Jam<br>  
	  	<div align='justify'>
	  	Keterangan : <br>$r[detail]
	  	</div>
	  	";
	  
	  if ($_SESSION[leveluser]=='members'){ 
echo "<div class='text-center' style='padding: 2% 0 2% 0;'><input type='button' value='Pesan' class='text-center btn btn-success float-left' onclick=\"window.location.href='sewa-lapangan-$r[id_lapangan].html';\"></div>";
	}	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='sewalapangan'){
		 $edit=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
        $k=mysql_fetch_array($edit);
		
		
		$query = mysql_query("SELECT * FROM lapangan where id_lapangan='$_GET[id]'");
		$r=mysql_fetch_array($query);
		$harga = format_rupiah($r[harga_lapangan]);
		

echo "<div class='post_title'><b>Pemesanan $r[judul].</b></div><br/>";
echo "<form method=POST action='aksi-pesan.html' enctype='multipart/form-data'>
	  <input type=hidden name='id_lapangan' value='$r[id_lapangan]'>
	  <label>Nama Lengkap</label>    	
	  <input type=text name='nama_lengkap' value='$k[nama_lengkap]' class='form-control' readonly='on'>
	  <label>Email</label>
	  <input type=text name='email' value='$k[email]' size=49 class='form-control' readonly='on'>
	  <label>No. Telpon</label>
	  <input type=text name='no_telp' value='$k[no_telp]' size=49 class='form-control' readonly='on'>
	  <label>Alamat</label> 
	  <textarea name='alamat_lengkap' class='form-control' readonly='on'>$k[alamat_lengkap]</textarea>
	  <label>Nama Lapangan</label>     	
	  <input type=text name='judul' value='$r[judul]' class='form-control' readonly='on'>
	  <label>Harga Sewa Lapangan</label>   	
	  <input type=text name='harga' value='Rp $harga' class='form-control' readonly='on'>
	  <label>Jam</label><br>";
	  ?>
	  <?php
							
echo "<select class='form-control' name='jam_mulai'>
      <option value='0' selected>- Pilih Jam Mulai -</option>";
	  $tampil=mysql_query("SELECT * FROM jam GROUP BY jam_mulai");
      while($r=mysql_fetch_array($tampil)){
echo "<option>$r[jam_mulai]</option>";
      }
echo "</select>

      <select class='form-control' name='jam_selesai'>";
	  
echo "<option value='0' selected>- Pilih Jam Selesai -</option>";
	  $tampil=mysql_query("SELECT * FROM jam GROUP BY jam_selesai");
      while($k=mysql_fetch_array($tampil)){
echo "<option>$k[jam_selesai]</option>";
      }
echo "</select>";
?>

<?php
echo "<input type='submit' name='submit' class='btn btn-success' value='Pesan Sekarang'>
	  </form>";
      }



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='aksipesan'){
$query = mysql_query("SELECT * FROM lapangan where id_lapangan='$_POST[id_lapangan]'");
$r=mysql_fetch_array($query);

$jumlahh = mysql_query("SELECT * FROM laporan 
                        where jam_mulai='$_POST[jam_mulai]' 
                        and jam_selesai='$_POST[jam_selesai]' 
						AND id_lapangan='$_POST[id_lapangan]'");
$j=mysql_fetch_array($jumlahh);
$jml = mysql_num_rows($jumlahh);
					
if ($jml >= 1){
echo "<script>window.alert('Maaf, Jadwal Sewa Lapangan Futsal pada Jam $_POST[jam_mulai] s/d $_POST[jam_selesai] Sudah Ke isi, silahkan pilih jam Lainnya.');
			  window.location=('javascript:history.go(-1)')</script>";


}else{
        $jam_mulai   = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $durasi      = $jam_selesai - $jam_mulai;
		
	    $total       = ($r[harga_lapangan]) * $durasi;
	    $harga       =  number_format(($total),0,",",".");
		
		
		$sql = mysql_query("INSERT INTO laporan (id_lapangan,
												 jam_mulai,
												 jam_selesai,
												 username,
												 tanggal,
												 total_harga) 
										   VALUES('$_POST[id_lapangan]',
												'$_POST[jam_mulai]',
												'$_POST[jam_selesai]',
												'$_SESSION[namauser]',
												'$tgl_sekarang',
												'$harga')");
echo "<script>window.alert('Sukses Mendaftarkan jadwal Sewa Lapangan Futsal.');
			window.location=('http://localhost/futsal/')</script>";
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='laporanpemesanan'){
    echo "<div class='text-center'><h6><strong>Daftar Penyewaan Lapangan Futsal Oleh : $_SESSION[namalengkap]</strong></h6></div>
    	  <div class='table-responsive'>
          <table class='table table-bordered'>
          <thead>
          <tr>
		  <th>No</th>
		  <th>Waktu</th>
		  <th>Durasi</th>
		  <th>Harga</th>
		  <th>Status</th>
		  <th>Aksi</th></thead></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM laporan,lapangan WHERE lapangan.id_lapangan=laporan.id_lapangan 
						   ORDER BY id_orders DESC LIMIT $posisi,$batas");
  $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
	
		$tgl = tgl_indo($r[tanggal]);
	    $jam_mulai = $r[jam_mulai];
        $jam_selesai = $r[jam_selesai];
        $durasi = $jam_selesai - $jam_mulai;
		
	
	  if(($no % 1)==0){
		$warna="#267000";
	  }else{
		$warna="#E1E1E1";
	  }
      echo "<tbody><tr>
                <td>$no</td>
                <td><b>$tgl</b><br>$r[jam_mulai] s/d $r[jam_selesai]</td>
				<td>$durasi/jam</td>
				<td>$r[total_harga]</td>
                <td>$r[status_pesanan]</td>
				<td>
				<input type=button value='Detail' class='btn btn-success' onclick=\"window.location.href='detail-pemesanan-$r[id_orders].html';\">";
	      echo "<a target='_BLANK' href='print.php?id=$r[id_orders]'><input type='button' value='Cetak' class='btn btn-info'></a>";
				
				echo "</center></td></tbody></tr>";
      $no++;
    }
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM laporan where username='$_SESSION[namauser]'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "</table>
    </div>";
    echo "<br/>Halaman: $linkHalaman<br>";
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
elseif ($_GET[module]=='detailpemesanan'){
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);
$tanggal = tgl_indo($r[tanggal]);
$jam_mulai   = $r[jam_mulai];
$jam_selesai = $r[jam_selesai];
$durasi      = $jam_selesai - $jam_mulai;

echo "<div class='post_title'><b>Detail Pemesanan $r[judul] - $r[id_orders]</b></div><br/>";
echo "	  <label>Nama Pemesan</label>     	
		  <input type=text name='judul' value='$_SESSION[namalengkap]' size=29 class='form-control' readonly='on'>
		  <label>Email</label>     	
		  <input type=text name='judul' value='$_SESSION[email]' size=29 class='form-control' readonly='on'>
		  <label>No Telp</label>    	
		  <input type=text name='judul' value='$_SESSION[telp]' size=29 class='form-control' readonly='on'>
		  <label>Alamat</label>     	
		  <textarea style='width:93%; height:50px;' class='form-control' readonly='on'>$_SESSION[alamat]</textarea>
		  <label>Judul</label>     	
		  <input type=text name='judul' value='$r[judul]' size=49 class='form-control' readonly='on'>
		  <label>Tanggal</label>   
		  <input type=text name='tanggal' value='$tanggal' size=29 class='form-control' readonly='on'>
		  <label>Jam Mulai</label>   
		  <input type=text name='jam_mulai' value='$r[jam_mulai] s/d $r[jam_selesai] WIB' size=29 class='form-control' readonly='on'>
		  <label>Harga Lapangan</label>   	
		  <input type=text name='harga' value='Rp $r[total_harga]' size=20 class='form-control' readonly='on'> 
		  <label>Durasi</label>
		  $durasi Jam<br>
		  <label>Status Pesanan</label>   	
		  <input type=text name='jumlah_tiket' size=20 value='$r[status_pesanan]' class='form-control' readonly='on'>
		  <input style='padding:8px; margin-left:5px;margin-top:5px;' type=button value='Konfirmasi Pembayaran' class='btn' onclick=\"window.location.href='konfirmasi-pembayaran-$r[id_orders].html';\">
		</table>";	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='konfirmasipembayaran'){
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						left join users on laporan.username=users.username
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);
		

 echo "<div class='post_title'><b>Konfirmasi Pembayaran Untuk No Orders : $r[id_orders]</b></div><br/>";
 echo " <form action=aksi-konfirmasi.html method=POST name='formku' onSubmit='return valid()'>
        <label>Id Order</label>
        <input type=text name=a value='$r[id_orders]' size=5 class='form-control' readonly='on'>
		<label>Total Biaya</label>
		<input type=text name=nama value='Rp $r[total_harga]' size=20 class='form-control' readonly='on'>
        <label>Nama Pemesan</label>
        <input type=text name=b value='$_SESSION[namalengkap]' size=49 class='form-control' readonly='on'>
        <label>Bayar Ke</label>
        <select class='form-control' name='c'>
					<option value=0 selected>- Pilih (Bank anda Transfer pembayaran) -</option>";
            $tampil=mysql_query("SELECT * FROM rekening ORDER BY id_rekening");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_rekening]>$r[nama_bankk] - A/N : $r[atas_namaa]</option>";
            }
    echo "</select>
		<label>Total Bayar</label>
		<input type=text name=d size=20 class='form-control'>
		<label>No Rek. Anda</label>
		<input type=text name=e size=49 class='form-control'>
		<label>Atas Nama</label>
		<input type=text name=f size=49 class='form-control'>
		<label>Nama Bank</label>
		<input type=text name=g size=49 class='form-control'>
        <label>Pesan</label>
        <textarea name=h style='width: 105%; height: 60px;' class='form-control'></textarea>
        <input type=submit name=submit value='Kirim Konfirmasi' class='btn'>
		</form>";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='aksikonfirmasi'){
if (empty($_POST[c])){
	echo "<script>window.alert('Anda belum memilih No rekening');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[d])){
	echo "<script>window.alert('Anda belum mengisikan Total Bayar');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[e])){
	echo "<script>window.alert('Anda belum mengisikan No Rek Anda');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[f])){
	echo "<script>window.alert('Anda belum mengisikan Atas Nama');
				window.location='javascript:history.go(-1)'</script>";	
}
elseif (empty($_POST[g])){
	echo "<script>window.alert('Anda belum mengisikan Nama Bank');
				window.location='javascript:history.go(-1)'</script>";	
}else{
  mysql_query("INSERT INTO konfirmasi(id_orders,
									   id_rekening,
									   nama_pemesan,
									   total_bayar,
									   rek_anda,
									   atas_nama,
									   nama_bank,
									   pesan) 
							VALUES('$_POST[a]',
								   '$_POST[c]',
								   '$_POST[b]',
								   '$_POST[d]',
								   '$_POST[e]',
								   '$_POST[f]',
								   '$_POST[g]',
								   '$_POST[h]')");

	if ($_POST[a]=='All'){
			mysql_query("UPDATE laporan SET status_pesanan = 'Booking' where status_pesanan = 'Baru'");						   
		echo "<script>window.alert('Terima Kasih Telah Konfirmasi Pembayaran untuk $_POST[a]');
					window.location='laporan-pemesanan.html'</script>";	
	}else{								   
			mysql_query("UPDATE laporan SET status_pesanan = 'Booking' where id_orders='$_POST[a]'");						   
		echo "<script>window.alert('Terima Kasih Telah Konfirmasi Pembayaran..');
					window.location='laporan-pemesanan.html'</script>";	
	}
}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='hubungikami'){
  echo "<div class='post_title'><b>Hubungi kami secara online dengan mengisi form dibawah ini :</b></div><br/>
		<form action=hubungi-aksi.html name='formku' onSubmit='return valid()' method=POST >
		<div class='form-group'>
        <label>Nama</label>
        <input class='form-control' type=text name=nama_lengkap value='$_SESSION[namalengkap]' size=68 class='input' readonly='on'>
        </div>
        <div class='form-group'>
        <label>Email</label>
        <input class='form-control' type=text name=alamat_email value='$_SESSION[email]' size=68 class='input' readonly='on'>
        </div>
        <div class='form-group'>
        <label>Subjek</label>
        <input class='form-control' type=text name=subjek size=68 class='input'>
        </div>
        <label>Pesan</label>
        <textarea class='form-control' rows='6' name=pesan style='width: 100%;' class='input'></textarea>
        <input type=submit name=submit value=Kirim class='btn btn-success submit'>
		</form>";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

elseif ($_GET[module]=='hubungiaksi'){
if (empty($_POST[nama_lengkap])){
	echo "Nama Lengkap Masih Kosong";
} else if (empty($_POST[alamat_email])){
	echo "Alamat Email Masih kosong";
} else if (empty($_POST[subjek])){
	echo "Subjek Masih kosong";
} else if (empty($_POST[pesan])){
	echo "Input Kan pesan Anda Sebelum Mengirim";
} else {
$tanggal = date("Ymd");
mysql_query("INSERT INTO hubungi(nama_lengkap, 
									alamat_email,
									subjek,
									pesan,
									tanggal) 								
							VALUES ('$_POST[nama_lengkap]',
									'$_POST[alamat_email]',
									'$_POST[subjek]',
									'$_POST[pesan]',
									'$tanggal')");
	echo "Sukses Mengirimkan Pesan <a href='http://localhost/futsal'>Back to Menu</a>";	
}
}
?>