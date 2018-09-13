
<?php
error_reporting(0);
session_start();
if (isset($_SESSION['jabatan']))
{
 
   if ($_SESSION['jabatan'] == "keuangan")
   {
     include 'menu_keuangan.php'; 
   }
   else if ($_SESSION['jabatan'] == "akuntansi")
   {
     include 'menu_akuntansi.php';
   }
   else if ($_SESSION['jabatan'] == "admin")
   {
     include 'menu_admin.php';
   }
    else if ($_SESSION['jabatan'] == "direktur")
   {
     include 'menu_direktur.php';
   }
    else if ($_SESSION['jabatan'] == "gudang")
   {
     include 'menu_gudang.php';
   }
    else if ($_SESSION['jabatan'] == "pembelian")
   {
     include 'menu_pembelian.php';
   }
    else if ($_SESSION['jabatan'] == "penjualan")
   {
     include 'menu_penjualan.php';
   }
    else if ($_SESSION['jabatan'] == "personalia")
   {
     include 'menu_personalia.php';
   }
    else if ($_SESSION['jabatan'] == "produksi")
   {
     include 'menu_produksi.php';
   }


}
?>