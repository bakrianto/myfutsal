<?php 
  session_start();
  error_reporting(0);
  ?><head>
<title>.:: PRINT BUKTI PEMBAYARAN ::.</title>
</head>

<style>
.input1 {
	height: 20px;
	font-size: 12px;
	padding-left: 5px;
	margin: 5px 0px 0px 5px;
	width: 97%;
	border: none;
	color: red;
}

</style>
<body onLoad="window.print()">
<?php 
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/class_paging.php";
  include "config/library.php";
  include "config/fungsi_rupiah.php";
$query = mysql_query("SELECT * FROM laporan left join lapangan on laporan.id_lapangan=lapangan.id_lapangan
						where laporan.id_orders=$_GET[id]");
$r=mysql_fetch_array($query);

$tanggal = tgl_indo($r[tanggal]);
$jam_mulai   = $r[jam_mulai];
$jam_selesai = $r[jam_selesai];
$durasi      = $jam_selesai - $jam_mulai;

echo "<center><h2>BUKTI PEMBAYARAN SEWA LAPANGAN FUTSAL <br></h2></center><hr/>";			
echo "<table width='100%'><br/>
          <tr><td width='120px'>Nama Pemesan</td>     	<td> : &nbsp;$_SESSION[namalengkap]</td></tr>
		  <tr><td>No Telp</td>     	<td> : &nbsp;$_SESSION[telp]</td></tr>
		  <tr><td>Nama Lapangan</td>     	<td> : &nbsp;$r[judul]</td></tr>
		  <tr><td>Jam</td>     	<td> : &nbsp;$r[jam_mulai] s/d $r[jam_selesai] WIB</td></tr>
		  <tr><td>Harga </td>   	<td> : &nbsp;Rp $r[total_harga] / $durasi jam</td></tr>
		  <tr><td>Tanggal</td>   <td> : &nbsp;$tanggal</td></tr>
	  </table><hr>";	

?>