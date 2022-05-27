<?php
include'../../config.php';
	$a = $_POST['a'];
	$b = $_POST['b'];

    $conn -> query("INSERT INTO jenislondri VALUES('$a', '$b')"); 
	header("location: laundry.php");
  
?>