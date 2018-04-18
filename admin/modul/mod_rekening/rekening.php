<?php
$aksi="modul/mod_rekening/aksi_rekening.php";
switch($_GET[act]){

  default:
    echo "<div class='post_title'><b>Manajemen rekening Perusahaan.</b></div><br/>
          <input type=button value='Tambah Rekening' class='button'
          onclick=\"window.location.href='?module=rekening&act=tambahrekening';\">
          <table width=100% cellpadding=6>
          <tr style='color:#fff; height:35px;' bgcolor=#339900><th>No</th><th>No Rekening</th><th>Atas Nama</th><th>nama Bank</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM rekening ORDER BY id_rekening DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	   if(($no % 2)==0){
			$warna="#ffffff";
		  }
		  else{
			$warna="#fff";
		  }
       echo "<tr bgcolor=$warna><td>$no</td>
             <td>$r[no_rekening]</td>
             <td>$r[atas_namaa]</td>
			 <td>$r[nama_bankk]</td>
             <td>
			 <input type=button value='Edit' class='button' onclick=\"window.location.href='?module=rekening&act=editrekening&id=$r[id_rekening]';\">
			 <input type=button value='Hapus' class='button' onclick=\"window.location.href='$aksi?module=rekening&act=hapus&id=$r[id_rekening]';\">
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahrekening":
    echo "<div class='post_title'><b>Tambah Rekening Perusahaan.</b></div><br/>
          <form method=POST action='$aksi?module=rekening&act=input'>
          <table width='100%'>
          <tr><td>No. Rekening</td><td> <input type=text name='a' style='width:50%'></td></tr>
          <tr><td>Atas Nama</td><td> <input type=text name='b' style='width:70%'></td></tr>
		  <tr><td>Nama Bank</td><td> <input type=text name='c' style='width:70%'></td></tr>
          <tr><td></td>
		  <td><br/><input type=submit name=submit class='button' value=Simpan>
                            <input type=button value=Batal class='button' onclick=self.history.back()></td></tr>
          </table></form>";
     break;
	 
  case "editrekening":
    $edit=mysql_query("SELECT * FROM rekening WHERE id_rekening='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='post_title'><b>Edit Rekening.</b></div><br/>
          <form method=POST action=$aksi?module=rekening&act=update>
          <input type=hidden name=id value='$r[id_rekening]'>
          <table>
          <tr><td width='100px;'>No. Rekening</td><td> : <input type=text name='no_rekening' value='$r[no_rekening]' width='100px;'></td></tr>
		  <tr><td width='100px;'>Atas Nama</td><td> : <input type=text name='atas_namaa' value='$r[atas_namaa]' width='100px;'></td></tr>
		  <tr><td width='100px;'>Nama Bank</td><td> : <input type=text name='nama_bankk' value='$r[nama_bankk]' width='100px;'></td></tr>
          <tr>
		  <td></td>
		  <td><br/><input type=submit  class='button' value=Update>
                            <input type=button value=Batal  class='button' onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
