<!doctype html>
<html lang="en">
<?php
session_start();
include_once "session.php";

include "menu.php";
include "koneksi.php";


    $sql="select MAX(id_permintaan_bb) from permintaanbb";
    $hasil = $koneksidb->query($sql);
    $data = $hasil->fetch_array();
    $MaxID = $data[0];  //data kode perusahaan terakhir disimpan di variabel baru $MaxID
    $no_urut = (int) substr($MaxID,2,6);  //Memisahkan karakter dengan angka menggunakan fungsi substr
                        //string di $MaxID akan dipisahkan menjadi"PM" dan "000001"
                        //angka 0 pertama dimulai dari index ke-2 dengan panjang 6(sampaiangka 1).000001  dimasukkan ke variabel $no_urut
    $no_urut++;               //lalu variabel no_urut ditambah 1
    $new_ID = "PB".sprintf("%06s","$no_urut");  //angka yang telah ditambah dengan dengan 1 kemudian  digabung kembali dengan "PM"
                          //sprintf digunakan untuk memanggil variabel dalam format yang sudah ditentukan
                          //%s merupakan format pemanggilan variabel yang bernilai string
?>
<script>
    function showdetail(id_rencana) {
                 $.ajax({
                  url:'permin_bb2.php',
                  data:{'id_rencana':id_rencana},
                  type:'post',
                  dataType:'html', //menangkap data bertipe html
                  success:function(d){
                    console.log(d);
                    $("#detail").html(d);
                  }
                })
    }
</script>

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
                        <a class="navbar-brand" href="permin_bb_t.php"><i class="material-icons">library_books</i> Daftar Permintaan Bahan Baku </a>
                        <a class="navbar-brand" href="permin_bb_i.php"> <i class="material-icons">content_paste</i>Input Permintaan Bahan Baku </a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Input Permintaan Bahan Baku</h4>
                                </div>
                                <div class="card-content">
                                    <form  action="permin_bb_i_res.php" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Permintaan Bahan Baku</label>
                                                    <input type="text" class="form-control" value ="<?php echo $new_ID?>" name="id_permintaan_bb" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="date" class="form-control" name="tgl_permintaan" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">ID Rencana</label>
                                                    <select  class="form-control" name="id_rencana" id="id_rencana" onchange="showdetail(this.value)">  
                                                     <?php
                                                       $rencana=("SELECT id_rencana from perencanaanusaha");
                                                       $rencana_query = mysqli_query($koneksidb,$rencana);

                                                       while ($rencana_tampil=mysqli_fetch_assoc($rencana_query)){
                                                       echo "<option value='".$rencana_tampil['id_rencana']."'>".$rencana_tampil['id_rencana']."</option>";
                                                        }
                                                    ?>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        <div id="detail"> </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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