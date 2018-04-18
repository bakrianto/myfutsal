<?php
$aksi="modul/mod_konfirmasi/aksi_konfirmasi.php";
switch($_GET[act]){
  // Tampil Konfirmasi
  default:
    echo "<div class='post_title'><b>Manajemen Konfirmasi Pembayaran.</b></div><br/>
		  <table width=100% cellpadding='8'>
          <tr style='color:#fff; height:35px;' bgcolor=#339900>
		  <th>No</th>
		  <th>Id Orders</th>
		  <th>Ke Rekening</th>
		  <th>No. Rekening</th>
		  <th>Atas Nama</th>
		  <th>Dari Bank</th>
		  <th>Aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM konfirmasi left join rekening on konfirmasi.id_rekening=rekening.id_rekening ORDER BY id_konfirmasi DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
	  if(($no % 2)==0){
			$warna="#ffffff";
		  }
		  // Apabila sisa baginya ganjil, maka warnanya kuning (#FFFF00). 
		  else{
			$warna="#fff";
		  }
      echo "<tr bgcolor=$warna><td>$no</td>
			<td><a title='$r[pesan]' style='color:red;' href='media.php?module=order&act=detailorder&id=$r[id_orders]'>$r[id_orders]</a></td>
                <td>$r[nama_bankk]</td>
				<td>$r[rek_anda]</td>
                <td>$r[atas_nama]</a></td>
				<td>$r[nama_bank]</a></td>
                <td><input type=button value='Edit' class='button' onclick=\"window.location.href='?module=konfirmasi&act=editkonfirmasi&id=$r[id_konfirmasi]';\">
				<input type=button value='Hapus' class='button' onclick=\"window.location.href='$aksi?module=konfirmasi&act=hapus&id=$r[id_konfirmasi]';\">
                </td></tr>";
    $no++;
    }
	$jmldata=mysql_num_rows(mysql_query("SELECT * FROM konfirmasi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "</table></span><br/>Halaman : $linkHalaman";
   
    break;
	
case "editkonfirmasi":
 $edit = mysql_query("SELECT * FROM konfirmasi 
                      left join laporan on konfirmasi.id_orders=laporan.id_orders
					  left join rekening on konfirmasi.id_rekening=rekening.id_rekening
					  WHERE id_konfirmasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='post_title'><b>Edit Konfirmasi Pembayaran Lapangan Futsal.</b></div><br/>
          <form method=POST action=''>
          <input type=hidden name=id value='$r[id_konfirmasi]'>
          <table>
          <tr><td>Nama Pemesan</td><td> <input type=text name='nama_pemesan' value='$r[nama_pemesan]'></td></tr>
		  <tr><td>Total Bayar</td><td> <input type=text name='total_bayar' value='$r[total_bayar]'></td></tr>
		  <tr><td>Rekening</td><td> <input type=text name='rek_anda' value='$r[rek_anda]'></td></tr>
		  <tr><td>Atas Nama</td><td> <input type=text name='atas_nama' value='$r[atas_nama]'></td></tr>
		  <tr><td>Nama Bank</td><td> <input type=text name='nama_bank' value='$r[nama_bank]'></td></tr>
          <tr>
		  <tr>
		  <td></td>
		  <td><br/>
          <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
