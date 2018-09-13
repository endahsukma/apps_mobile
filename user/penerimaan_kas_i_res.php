<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_penerimaan_kas	= $_POST['id_penerimaan_kas'];
 $tgl	= $_POST['tgl'];
 $keterangan			= $_POST['keterangan'];
 $debet		= $_POST['debet'];
 $kredit 			=  $_POST['kredit'];
 $saldo 			=  $_POST['salldo'];
$sql = "insert into penerimaankas values('$id_penerimaan_kas','$tgl', '$keterangan','$debet','$kredit','$saldo')";  

$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:penerimaan_kas_t.php");
} 
?>