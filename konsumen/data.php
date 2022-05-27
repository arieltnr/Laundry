<?php
session_start();
if(empty($_SESSION['konsumen'])){
header("location: ../index.php");
}
include'../config.php';
$nama = $_SESSION['konsumen'];
$sql = $conn -> query("SELECT * FROM transaksi JOIN konsumen USING(kodekonsumen) JOIN rinciantransaksi USING(notransaksi) JOIN tarif USING(namapakaian) JOIN jenislondri USING(idjenislondri) WHERE kodekonsumen='$nama'");
?>

<html>
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
       <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <style type="text/css">
       .b{
               background-color: deepskyblue;
           }
           .bb{
               background-color: cornflowerblue;
           }
       </style>
       <title> Data </title>    
   </head>
   <body>
<div class="b">
    <img src="../images/10006053_1072930482721262_3640497129697045415_o.png" width="250" height="60">
</div>

<div class="bb">
    <img src="../images/laundryicon.png">
    <font face="aharoni" size="6" color="white">Laundry Unchh</font>
    <a class="btn btn-default btn-lg" style="margin-left: 60%; border-radius: 55px;">About</a>
</div>
<div class="container">
    <div class="col-lg-10">
        <h3><span class="glyphicon glyphicon-user"></span>  Data-Muh</h3>
        <form action="" method="post">
          <input type="submit" class="btn btn-primary" name="hapus" value="Home">
        </form>
        
    <?php
        while($data = $sql -> fetch_array()){   ?>
        
    <table class="table table-striped">
        <tr>
            <td class="warning"> Kode Konsumen</td> 
            <td> <?php echo $data['kodekonsumen']; ?></td>
        </tr>
        <tr>
            <td> Nama Konsumen</td>
            <td> <?php echo $data['namakonsumen']; ?></td>
        </tr>
        <tr>
            <td> Alamat</td>
            <td> <?php echo $data['almtkonsumen']; ?></td>
        </tr>
        <tr>
            <td> Telp Konsumen</td>
            <td> <?php echo $data['hpkonsumen']; ?></td>
        </tr>
        <tr>
            <td> No Transaksi</td>
            <td> <?php echo $data['notransaksi']; ?></td>
        </tr>
        <tr>
            <td> Jenis Laundry</td>
            <td> <?php echo $data['namajenislondri']; ?></td>
        </tr>
        <tr>
            <td> Nama</td>
            <td> <?php echo $data['namapakaian']; ?></td>
        </tr>
        <tr>
            <td> Tarif</td>
            <td> <?php echo $data['tarif']; ?></td>
        </tr>
        <tr>
            <td> Jumlah</td>
            <td> <?php echo $data['jumlahrincian']; ?></td>
        </tr>
        <tr>
            <td> Tanggal Ambil</td>
            <td> <?php echo $data['tgltransaksi']; ?></td>
        </tr>
        <tr>
            <td> Tanggal Kembali</td>
            <td> <?php echo $data['tglambil']; ?></td>
        </tr>
        <?php $a = $data['jumlahrincian'] * $data['tarif'];  } ?>
        <tr>
            <td> Total Bayar</td>
            <td><b><font size="5" color="blue">Rp. <?php echo number_format ($a); ?></font>,-</b></td>
        </tr>
    </table>
        </div>
</div>
<br>   
</body>
</html>

<?php
if(isset($_POST['hapus'])){
session_destroy();
header("location: ../index.php");
}