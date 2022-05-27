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
    <legend>Tambah Karyawan</legend>
<form action="tambahkp.php" method="post" class="form-horizontal">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NIK:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="a" size="5">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="b">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Kelamin:</label>
    <div class="col-sm-5">
        <input type="radio" value="Laki-laki" name="c"> Laki-laki &nbsp;
        <input type="radio" value="Perempuan" name="c"> Perempuan
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Alamat:</label>
    <div class="col-sm-5">
        <textarea class="form-control" name="d"></textarea>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NO HP:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="e">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Username:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="f">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Password:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="g">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Level:</label>
    <div class="col-sm-5">
        <select class="form-control" name="h">
            <option value="1">Manager</option>
            <option value="2">Karyawan</option>
        </select>
    </div>
</div>
<div class="modal-footer">
          <center><input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-md"></center>
 </div>
</form>
</fieldset>