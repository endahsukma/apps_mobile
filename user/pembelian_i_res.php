<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 // echo("<pre>");
 // print_r($_POST);

 $id_pembelian			= $_POST['id_pembelian'];
 $tgl_pembelian			= $_POST['tgl_pembelian'];
 $id_pemasok			= $_POST['id_pemasok'];
 $jenis_pembelian		= $_POST['jenis_pembelian'];
 $qty					= $_POST['qty'];
 $harga					= $_POST['harga'];
 $total					= $_POST['total'];
 

$sql = "insert into pembelian values('$id_pembelian','$tgl_pembelian', '$id_pemasok','$jenis_pembelian','$qty','$harga','$total')";   
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