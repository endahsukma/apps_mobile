<!doctype html>
<html lang="en">
<?php
session_start();
include_once "session.php";

include "menu.php";
include "koneksi.php";
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
                        <a class="navbar-brand" href="produksi_t.php"><i class="material-icons">library_books</i> Catatan Produksi </a>
                        <a class="navbar-brand" href="produksi_i.php"> <i class="material-icons">content_paste</i>Input Catatan Produksi</a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                   <h4 class="title">Catatan Produksi </h4>
                                </div>
                                <?php  
                                        $sql_cek="select * from produksi";
                                        $query_cek = $koneksidb->query($sql_cek);
                                        $result_cek = $query_cek->num_rows;
                                        if($result_cek=='0'){
                                        echo "<center>Maaf Data Yang anda cari tidak ada <br> Silahkan Masukkan Data Terlebih Dahulu</center>";
                                         }

                                         else{
                                ?>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover" border="1">
                                        <thead class="text-primary">
                                            <th><center>Tanggal</center></th>
                                            <th colspan="2"><center>INPUT</center></th>
                                            <th colspan="3"><center>OUTPUT</center></th>
                                        </thead>
                                        <thead class="text-primary">
                                            <th></th>
                                            <th><center>PDP</center></th>
                                            <th><center>Bahan Baku</center></th>
                                            <th><center>Gelas</center></th>
                                            <th><center>PDP</center></th>
                                            <th><center>Bahan Baku</center></th>
                                            
                                        </thead>
                                        <tbody>
                                    <?php 
                                        $no=0;
                                        $jumlah_desimal = "0";
                                        $pemisah_desimal = ",";
                                        $pemisah_ribuan = ".";
                                         while ($data = $query_cek->fetch_array()) {
                                            $no ++;
                                    ?>
                                            <tr>
                                                <td><?php echo $data['tgl_produksi']; ?></td>
                                                <td align="right"><?php echo number_format($data['pdp_i'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                                <td align="right"><?php echo number_format($data['bb_i'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                                <td align="right"><?php echo number_format($data['gelas_o'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                                <td align="right"><?php echo number_format($data['pdp_o'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                                <td align="right"><?php echo number_format($data['bb_o'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                            </tr>
                                    <?php 
                                         }
                                        }
                                    ?>
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

</html>