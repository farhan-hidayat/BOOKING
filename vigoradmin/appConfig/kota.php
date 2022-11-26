<?php
require_once "conn.php";
$tampil=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tkota WHERE kdProvinsi='$_GET[ambilProv]' ORDER BY kota");
$jml=mysqli_num_rows($tampil);
if($jml > 0){
    echo"<select name='cboKota'>
     <option value='0' selected>- Pilih Kota -</option>";
     while($r=mysqli_fetch_array($tampil)){
         echo "<option value=$r[kdKota]>$r[kota]</option>";
     }
     echo "</select>";
}else{
    echo "<select name='cboKota'>
     <option value=0 selected>- Data Wilayah Tidak Ada-</option
     </select>";
}

?>