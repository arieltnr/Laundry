<?php
include'../../config.php';
	$c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];

          $conn -> query("INSERT INTO tarif VALUES('', '$d', '$c', '$e')");   
	header("location: laundry.php");
  
?>