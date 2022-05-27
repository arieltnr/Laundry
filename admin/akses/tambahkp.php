<?php
include'../../config.php';
	$a = $_POST['a'];
	$b = $_POST['b'];
	$c = $_POST['c'];
    $d = $_POST['d'];
	$e = $_POST['e'];
    $g = $_POST['g'];
    $f = $_POST['f'];
    $h = $_POST['h'];

	$conn -> query("INSERT INTO karyawan VALUES('','$a','$b','$d','$e','$c')");
    $conn -> query("INSERT INTO login VALUES('','$f','$g','$b','$h')");
	header("location: karyawan.php");
  
?>