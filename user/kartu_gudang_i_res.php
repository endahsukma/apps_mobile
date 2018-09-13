<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_kartu_gudang					= $_POST['id_kartu_gudang'];
 $tanggal							= $_POST['tanggal'];
 $jenis_persediaan					= $_POST['jenis_persediaan'];
 $unit_masuk						= $_POST['unit_masuk'];
 $unit_keluar						= $_POST['unit_keluar'];
 
$sql = "insert into kartugudang values('$id_kartu_gudang','$tanggal', '$jenis_persediaan','$unit_masuk', '$unit_keluar')";  
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:kartu_gudang_gelas_t.php");
} 
?>