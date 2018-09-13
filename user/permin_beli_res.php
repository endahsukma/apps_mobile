<?php 
session_start();
include_once "session.php";

include 'koneksi.php';
 echo("<pre>");
 print_r($_POST);
 
 $id							=$_POST['id'];
 $no_form						= $_POST['no_form'];
 $tgl_permintaan_pembelian		= $_POST['tgl_permintaan_pembelian'];
 $nominal_permintaan_pembelian	= $_POST['nominal_permintaan_pembelian'];
 $jenis_pembelian				= $_POST['jenis_pembelian'];
 $jumlah_dipilih					= count($jenis_pembelian);
 
for($x=0;$x<$jumlah_dipilih;$x++){
	$sql=("INSERT INTO permintaanpembelian values
	('','$no_form','$tgl_permintaan_pembelian','$nominal_permintaan_pembelian','$jenis_pembelian[$x]')");
		$hasil = mysqli_query($koneksidb,$sql); 

}
 
header("location:permin_beli_t.php");

?>

