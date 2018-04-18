<?php
$aksi="modul/mod_order/aksi_order.php";
switch($_GET[act]){
  // Tampil Order
  default:
    echo "<div class='post_title'><b>Daftar semua penyewaan lapangan futsal oleh members.</b></div><br/>
		 <div class='h_line'></div>
          <table cellpadding=6 width=100%>
          <tr style='color:#fff; height:38px;' bgcolor=#339900>
		  <th>Nama Lapangan</th>
		  <th>Jam </th>
		  <th>Status</th><th align='center'>Action</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan 
								left join users on laporan.username=users.username ORDER BY id_orders DESC LIMIT $posisi,$batas");
  
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tanggal_tayang]);
	  if(($no % 2)==0){
		$warna="#ffffff";
	  }else{
		$warna="#ffffff";
	  }
      echo "<tr bgcolor=$warna>
                <td>$r[judul]</td>
                <td>$r[jam_mulai] s/d $r[jam_selesai] WIB</td>
                <td><a title='$r[nama_lengkap], href='#'>$r[status_pesanan]</a></td>
				<td><center><input type=button value='Detail'  class='button' onclick=\"window.location.href='?module=order&act=detailorder&id=$r[id_orders]';\">";
				/*echo "<input style='width:80px;' type=button value='Cetak'  class='button' onclick=\"window.location.href='print.php?id=$r[id_orders]';\">";*/
				echo "</center></td></tr>";
      $no++;
    }
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM laporan"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "</table>";
    echo "<br/>Halaman: $linkHalaman<br>";

    break;
  
    
  case "detailorder":
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						left join users on laporan.username=users.username
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);

$tanggal = tgl_indo($r[tanggal]);
$jam_mulai   = $r[jam_mulai];
$jam_selesai = $r[jam_selesai];
$durasi      = $jam_selesai - $jam_mulai;

echo "<div class='post_title'><b>Detail Penyewaan $r[judul].</b></div><br/>";
echo "<table style='margin-bottom:7%;' width='100%'><br/>
          <tr><td width='15%'>Nama Pemesan</td>     	<td> : &nbsp;<input type=text name='judul' value='$r[nama_lengkap]' size=49 class='input3' readonly='on'></td></tr>
		  <tr><td>Email</td>     	<td> : &nbsp;<input type=text name='judul' value='$r[email]' size=49 class='input3' readonly='on'></td></tr>
		  <tr><td>No Telp</td>     	<td> : &nbsp;<input type=text name='judul' value='$r[no_telp]' size=49 class='input3' readonly='on'></td></tr>
		  <tr><td>Alamat<br/><br/><br/></td>     	<td> : &nbsp;<textarea style='width:93%; height:50px;' class='input3' readonly='on'>$r[alamat_lengkap]</textarea><br/><br/><br/></td></tr>
													 
			
		  <tr><td>Lapangan</td>     	<td> : &nbsp;<input type=text name='judul' value='$r[judul]' size=59 class='input2' readonly='on'></td></tr>
		  <tr><td>Tanggal</td>   <td> : &nbsp;<input type=text name='tanggal' value='$tanggal' size=59 class='input2' readonly='on'></td></tr>
		  <tr><td>Jam</td>   <td> : &nbsp;<input type=text name='jam_mulai' value='$r[jam_mulai] s/d $r[jam_selesai] WIB' size=59 class='input2' readonly='on'></td></tr>
		  <tr><td>Harga</td>   	<td> : &nbsp;<input type=text name='harga' value='Rp $r[total_harga]' size=20 class='input2' readonly='on'> $durasi Jam</td></tr>
		  <tr><td>Status Pesanan</td>   	<td> : &nbsp;<input type=text name='status_pesanan' size=20 value='$r[status_pesanan]' class='input2' readonly='on'></td></tr>
		  
	  </table>";
    break;  
}
?>
