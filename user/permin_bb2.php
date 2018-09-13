<?php
session_start();
include_once "session.php";
include_once "koneksi.php";
$id_rencana = $_POST['id_rencana'];
    $sql_jumlah="select beli_target from perencanaanusaha where id_rencana = '$id_rencana'";
    $hasil_jumlah = $koneksidb->query($sql_jumlah);
    $data_jumlah = $hasil_jumlah->fetch_array();

?>
<div class="row">
	<div class="col-md-4">
	    <div class="form-group label-floating">
	        <label class="control-label">Nama Barang</label>
	        <input type="text" class="form-control" name="nm_brg" required>
	    </div>
	</div>
	<div class="col-md-4">
	    <div class="form-group label-floating">
	        <label class="control-label">Satuan</label>
	        <input type="text" class="form-control" name="satuan_brg" required>
	    </div>
	</div>
	<div class="col-md-4">
	    <div class="form-group label-floating">
	        <label class="control-label">Jumlah</label>
	        <input type="number" class="form-control" name="jumlah" value="<?php echo $data_jumlah['beli_target']; ?>" readonly> 
	    </div>
	</div>
</div>
	<button type="submit" class="btn btn-primary pull-right">SIMPAN</button>
	<div class="clearfix"></div>