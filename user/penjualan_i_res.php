<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_penjualan					= $_POST['id_penjualan'];
 $tgl_jual						= $_POST['tgl_penjualan'];
 $nama_pelanggan				= $_POST['nm_pelanggan'];
 $qty_jual						= $_POST['qty_jual'];
 $harga_satuan					= $_POST['harga_satuan'];
 $total_penjualan				= $_POST['total'];

$sql = "insert into penjualan values('$id_penjualan','$tgl_jual', '$nama_pelanggan','$qty_jual','$harga_satuan','$total_penjualan')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:penjualan_t.php");
} 
?>