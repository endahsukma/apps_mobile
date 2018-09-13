<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 // echo("<pre>");
 // print_r($_POST);

 $id_tb					= $_POST['id_tb'];
 $tgl					= $_POST['tgl'];
 $jumlah				= $_POST['jumlah'];
 $keterangan			= $_POST['keterangan'];
 $nama_bank				= $_POST['nama_bank'];
 $nama_penyetor			= $_POST['nama_penyetor'];
 $nama_teller			= $_POST['nama_teller'];

$sql = "insert into transaksi_bank values('$id_tb','$tgl', '$jumlah','$keterangan','$nama_bank','$nama_penyetor','$nama_teller')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:transaksi_bank_t.php");
} 
?>