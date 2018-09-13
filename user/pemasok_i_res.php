<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_pemasok			= $_POST['id_pemasok'];
 $email					= $_POST['email'];
 $nm_pemasok			= $_POST['nm_pemasok'];
 $no_telp				= $_POST['no_telp'];
 $alamat				= $_POST['alamat'];

$sql = "insert into pemasok values('$id_pemasok','$email', '$nm_pemasok','$no_telp','$alamat')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:pemasok_t.php");
} 
?>