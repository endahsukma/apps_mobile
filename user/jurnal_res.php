<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 // echo("<pre>");
 // print_r($_POST);

 $no			= $_POST['no'];
 $tgl			= $_POST['tgl'];
 $rekening		= $_POST['rekening'];
 $ref			= $_POST['ref'];
 $debit			= $_POST['debit'];
 $kredit		= $_POST['kredit'];

 

$sql = "insert into jurnal_umum values($no,'$tgl', '$rekening','$ref',$debit,$kredit)";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:pembelian_gelas_t.php");
} 
?>