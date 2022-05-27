<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../../index.php");
}
include'../../config.php';
$sql = $conn -> query("SELECT * FROM jenislondri");
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<fieldset>
    <legend>Tambah Data</legend>
<form action="tambahtp.php" method="post" class="form-horizontal"> 
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="c">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Laundry:</label>
    <div class="col-sm-5">
        <select class="form-control" name="d"><?php while($a = $sql -> fetch_array() ){ ?>
            <option value="<?php echo $a[0]; ?>"><?php echo $a[1]; ?></option><?php } ?>
        </select>
    </div>
</div>
 
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Tarif:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="e">
    </div>
</div>

<div class="modal-footer">
          <center><input type="submit" value="Simpan" class="btn btn-info btn-md"></center>
 </div>
</form>
</fieldset>