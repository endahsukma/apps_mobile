<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_permintaan_bb					= $_POST['id_permintaan_bb'];
 $tgl_permintaan					= $_POST['tgl_permintaan'];
 $nm_brg							= $_POST['nm_brg'];
 $satuan_brg						= $_POST['satuan_brg'];
 $jumlah							= $_POST['jumlah'];
 $id_rencana						= $_POST['id_rencana'];


$sql = "insert into permintaanbb values('$id_permintaan_bb','$id_rencana','$tgl_permintaan', '$nm_brg','$satuan_brg','$jumlah')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:permin_bb_t.php");
} 
?>