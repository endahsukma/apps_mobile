<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_pengeluaran_kas	= $_POST['id_pengeluaran_kas'];
 $tgl_pengeluarankas	= $_POST['tgl_pengeluarankas'];
 $penerima_kas			= $_POST['penerima_kas'];
 $jenis_keperluan		= $_POST['jenis_keperluan'];
 $nominal_kas 			=  $_POST['nominal_kas'];
 
$sql = "insert into pengeluarankas values('$id_pengeluaran_kas','$tgl_pengeluarankas', '$penerima_kas','$jenis_keperluan','$nominal_kas')";  

$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:pengeluaran_kas_t.php");
} 
?>