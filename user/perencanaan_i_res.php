<?php
session_start();
include_once "session.php";

 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $id_rencana					= $_POST['id_rencana'];
 $bulan							= $_POST['bulan'];
 $tahun							= $_POST['tahun'];
 $minggu_ke						= $_POST['minggu_ke'];
 $kas_tersedia					= $_POST['kas_tersedia'];
 $gelas_tersedia				= $_POST['gelas_tersedia'];
 $pdp_tersedia					= $_POST['pdp_tersedia'];
 $bb_tersedia					= $_POST['bb_tersedia'];
 $jml_target					= $_POST['jml_target'];
 $jml_realisasi					= $_POST['jml_realisasi'];
 $beli_target					= $_POST['beli_target'];
 $beli_realisasi				= $_POST['beli_realisasi'];

$sql = "insert into perencanaanusaha values('$id_rencana','$bulan', '$tahun','$minggu_ke','$kas_tersedia','$gelas_tersedia','$pdp_tersedia','$bb_tersedia','$jml_target','$jml_realisasi','$beli_target','$beli_realisasi')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:perencanaan_t.php");
} 
?>