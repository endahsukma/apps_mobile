<!doctype html>
<html lang="en">
<?php
session_start();
include_once "session.php";

include "menu.php";
include "koneksi.php";

$id_penjualan = $_GET['id_penjualan']; 

$sql_data="select * from penjualan where id_penjualan='$id_penjualan'";
$hasil_data = $koneksidb->query($sql_data);
$data = $hasil_data->fetch_array();

?>


<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CV Akakom 1</title>
    <meta content='widtd=device-widtd, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="widtd=device-widtd" />
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
                        <a class="navbar-brand" href="penjualan_t.php"><i class="material-icons">library_books</i> Catatan Penjualan </a>
                        <a class="navbar-brand" href="penjualan_i.php"> <i class="material-icons">content_paste</i>Input Penjualan </a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                   <h4 class="title">Faktur Penjualan</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Pembelian : <?php echo $data['nm_pelanggan']; ?></td>
                                                <td colspan="2">No Faktur : <?php echo $data['id_penjualan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2">Tanggal Penjualan : <?php echo $data['tgl_jual']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kuantitas</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Gelas</td>
                                                <td><?php echo $data['qty_jual']; ?></td>
                                                <td><?php echo $data['harga_satuan']; ?></td>
                                                <td><?php echo $data['total_penjualan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4"><center>Total Bayar</center></th>
                                                <th>Rp <?php echo $data['total_penjualan']; ?></th>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>Bagian Penjualan <br> <br> <br> <br> ...............................</td>
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
<!-- Material Dashboard javascript metdods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO metdods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>