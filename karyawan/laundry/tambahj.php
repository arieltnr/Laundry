<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../../index.php");
}
include'../../config.php';
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
<form action="tambahjp.php" method="post" class="form-horizontal">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">ID Jenis Laundry:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="a" size="5">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Laundry:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="b">
    </div>
</div>

<div class="modal-footer">
          <center><input type="submit" value="Simpan" class="btn btn-info btn-md"></center>
 </div>
</form>
</fieldset>