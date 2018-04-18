<?php
$aksi="modul/mod_lapangan/aksi_lapangan.php";
switch($_GET[act]){
  default:
 echo "<div class='post_title'><b>Manajemen Lapangan Futsal.</b></div><br/>
          <table width=100% cellpadding=6>
          <tr style='color:#fff; height:35px;' bgcolor=#339900>
		  <th>No</th>
		  <th>Nama Lapangan</th>
		  <th>Action</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM lapangan ORDER BY id_lapangan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	if(($no % 2)==0){
			$warna="#ffffff";
		  }
		  else{
			$warna="#fff";
		  }
       echo "<tr bgcolor=$warna><td>$no</td>
             <td>$r[judul]</td>
             <td>
			 <input type=button value='Edit' class='button' onclick=\"window.location.href='?module=lapangan&act=editlapangan&id=$r[id_lapangan]';\">
			 <input type=button value='Hapus' class='button' onclick=\"window.location.href='$aksi?module=lapangan&act=hapus&id=$r[id_lapangan]';\">
			 
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  

////////////////////////////////////////////////////////////////////////////////////////////////////////
    
  case "editlapangan":
    $edit = mysql_query("SELECT * FROM lapangan WHERE id_lapangan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='post_title'><b>Detail Lapangan Futsal.</b></div><br/>
	<form method=POST enctype='multipart/form-data' action=$aksi?module=lapangan&act=update>
          <input type=hidden name=id value=$r[id_lapangan]>
          <table>
          <tr><td>Lapangan</td>     <td> <input type=text name='judul' value='$r[judul]'></td></tr>
          <tr><td>Harga Sewa</td>     <td> <input type=text name='harga_lapangan' value='$r[harga_lapangan]' size=20></td></tr>
          <tr><td>Keterangan</td>  <td> <textarea name='detail' style='width: 490px; height: 150px;'>$r[detail]</textarea>
		  <tr><td>Gambar</td>     <td>   <img style='margin-left:1px; margin-right:4px; float:left; width:120px; height:155px;' src='../lapangan/$r[gambar]'>
		  </td></tr>
		  <tr><td></td>
		  <td><input type=submit class='button' value=Update>
                            <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table>";
    break;  
}
?>
