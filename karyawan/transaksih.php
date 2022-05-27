<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
include'../config.php';
$id = $_GET['id'];
$id2 = $_GET['id2'];

$conn -> query("DELETE FROM konsumen WHERE kodekonsumen = '$id'");
$conn -> query("DELETE FROM transaksi WHERE kodekonsumen = '$id'");
$conn -> query("DELETE FROM rinciantransaksi WHERE idrincian = '$id2'");
header('location: transaksi.php');