<?php
$aksi="modul/mod_jam/aksi_jam.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<div class='post_title'><b>Manajemen jam Penyewaan Lapangan Futsal.</b></div><br/>
          <input type=button value='Tambah Jam' class='button' 
          onclick=\"window.location.href='?module=jam&act=tambahjam';\">
          <table width=100% cellpadding=6>
          <tr style='color:#fff; height:35px;' bgcolor=#339900>
		  <th>No</th>
		  <th>Jam Mulai</th>
		  <th>Jam Selesai</th>
		  <th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM jam ORDER BY id_jam DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	if(($no % 2)==0){
			$warna="#ffffff";
		  }
		  else{
			$warna="#fff";
		  }
       echo "<tr bgcolor=$warna><td>$no</td>
             <td>$r[jam_mulai]</td>
             <td>$r[jam_selesai]</td>
             <td>
			 <input type=button value='Edit' class='button' onclick=\"window.location.href='?module=jam&act=editjam&id=$r[id_jam]';\">
			 <input type=button value='Hapus' class='button' onclick=\"window.location.href='$aksi?module=jam&act=hapus&id=$r[id_jam]';\">
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  

  case "tambahjam":
    echo "<div class='post_title'><b>Tambah Jam Penyewaan Lapangan Futsal.</b></div><br/>
          <form method=POST action='$aksi?module=jam&act=input'>
          <table width='100%'>
          <tr><td width='100px;'>Jam Mulai</td><td> <input type=text name='jam_mulai' style='width:300px;'></td></tr>
          <tr><td width='100px;'>Jam Selesai</td><td> <input type=text name='jam_selesai' style='width:300px;'></td></tr>
          <tr>
		  <td></td>
		  <td><br/><input type=submit name=submit class='button' value=Simpan>
                            <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
   
  case "editjam":
    $edit=mysql_query("SELECT * FROM jam WHERE id_jam='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='post_title'><b>Edit Jam Penyewaan Lapangan Futsal.</b></div><br/>
          <form method=POST action=$aksi?module=jam&act=update>
          <input type=hidden name=id value='$r[id_jam]'>
          <table>
          <tr><td width='100px;'>Jam Mulai</td><td> <input type=text name='jam_mulai' value='$r[jam_mulai]' width='100px;'></td></tr>
		  <tr><td width='100px;'>Jam Selesai</td><td> <input type=text name='jam_selesai' value='$r[jam_selesai]' width='100px;'></td></tr>
          <tr>
		  <td></td>
		  <td><br/><input type=submit class='button' value=Update>
                            <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
