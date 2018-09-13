<!doctype html>
<html lang="en">
<?php
session_start();
include_once "session.php";

include "menu.php";
include "koneksi.php";

$no_form = $_GET['no_form']; 

$sql_data="select * from permintaanpembelian where no_form='$no_form'";
$hasil_data = $koneksidb->query($sql_data);
$data = $hasil_data->fetch_array();

?>


<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CV Akakom 1</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="permin_beli_t.php"><i class="material-icons">library_books</i> Daftar Permintaan Pembelian </a>
                        <a class="navbar-brand" href="permin_beli_i.php"> <i class="material-icons">content_paste</i>Input Permintaan Pembelian </a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                   <h4 class="title">Bukti Permintaan Pembelian </h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <th colspan="3"><CENTER><H5>Bukti Permintaan Pembelian </br>No : <?php echo $no_form; ?></H5></CENTER></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td><?php echo $data['tgl_permintaan_pembelian']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal</td>
                                                <td>:</td>
                                                <td>Rp <?php 
                                                    $jumlah_desimal = "0";
                                                    $pemisah_desimal = ",";
                                                    $pemisah_ribuan = ".";
                                                    echo number_format($data['nominal_permintaan_pembelian'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?>
                                      			</td>
                                            </tr>
											<tr>
                                                <td>Jenis Pembelian</td>
                                                <td>:</td>
                                                <td>
													<table>
														<?php 
														$sql_data1="select * from permintaanpembelian where no_form='$no_form'";
														$hasil_data1 = $koneksidb->query($sql_data1);
														//$data1 = $hasil_data1->fetch_array();
														 while ($data1 = $hasil_data1->fetch_array()) {
														 
														?>
														<tr>
                                                			<td><?php echo $data1['jenis_pembelian']; ?></td>
														</tr>
														<?php }?>
														
													</table>
												</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bagian Keuangan
                                                    <br>
                             
							                        <br>
                                                    <br>
                                                    .................
                                                </td>
                                                <td></td>
                                                <td align="right">
                                                    Bagian Pembelian
                                                    <br>
                                                    <br>
                                                    <br>
                                                    ...................
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../assets/img/faces/marc.png" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray"> <?php echo $_SESSION['username']; ?> </h6>
                                    <h4 class="card-title">CV AKAKOM 1</h4>
                                    <a href="logout.php" class="btn btn-primary btn-round">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                             Sistem Informasi Akuntansi 
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                      CV Akakom 1
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
