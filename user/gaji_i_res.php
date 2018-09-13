<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_gaji					= $_POST['id_gaji'];
 $tgl_gaji					= $_POST['tgl_gaji'];
 $nm_karyawan				= $_POST['nm_karyawan'];
 $jml_gaji					= $_POST['jml_gaji'];

$sql = "insert into gaji values('$id_gaji','$tgl_gaji', '$nm_karyawan','$jml_gaji')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:gaji_t.php");
} 
?>