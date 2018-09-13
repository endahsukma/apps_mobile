<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_produksi					= $_POST['id_produksi'];
 $tgl_produksi					= $_POST['tgl_produksi'];
 $pdp_i							= $_POST['pdp_i'];
 $bb_i						    = $_POST['bb_i'];
 $gelas_o						= $_POST['gelas_o'];
 $pdp_o						    = $_POST['pdp_o'];
 $bb_o						    = $_POST['bb_o'];

$sql = "insert into produksi values('$id_produksi','$tgl_produksi', '$pdp_i','$bb_i','$gelas_o','$pdp_o','$bb_o')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:produksi_t.php");
} 
?>