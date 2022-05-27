<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../../index.php");
}
include'../../config.php';
$id = $_GET['id'];
$id2 = $_GET['id2'];

$conn -> query("DELETE FROM barang WHERE kodebarang = '$id2'");
$conn -> query("DELETE FROM pemakaianbarang WHERE kodebarang = '$id2'");
$conn -> query("DELETE FROM pembelian WHERE nopembelian = '$id'");
$conn -> query("DELETE FROM rincianbeli WHERE nopembelian = '$id'");
header('location: pembelian.php');