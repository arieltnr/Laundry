<?php
include'config.php';
$sql = $conn -> query("SELECT * FROM Tarif");
$no = 1;
?>
<html>
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
       <script type="text/javascript" src="bootstrap/jquery.min.js"></script>
       <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
       <style type="text/css">
           .b{
               background-color: deepskyblue;
           }
           .bb{
               background-color: cornflowerblue;
           }
       </style>
       <title> Home </title>
   </head>
   <body>
<div class="b">
       <img src="images/10006053_1072930482721262_3640497129697045415_o.png" width="250" height="60">
       <button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span>  Admin</button>
</div>


<div class="bb">
    <img src="images/laundryicon.png">
    <font face="aharoni" size="6" color="white">Laundry Unchh</font>
    <a class="btn btn-default btn-lg" style="margin-left: 60%; border-radius: 55px;">About</a>
</div>
<div class="container">
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
<form action="" method="post" class="form-horizontal">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Username:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="user">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Password:</label>
    <div class="col-sm-5">
        <input type="password" class="form-control" name="pass">
    </div>
</div>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <center><input type="submit" name="kirim" value="Daftar" class="btn btn-info btn-md"></center>
        </div>
      </div>
</form>
    </div>
  </div>
       </div>
       <br>
       <img src="images/wasmachine.png" width="220">
       <a class="btn" href="konsumen/index.php"><img style="margin-left: 50%;" src="images/laundry-service-logo.gif" class="img-rounded"><br><font face="aharoni" size="8">Mulai Laundry</font>
       </a>
       <img src="images/186996836.jpg" width="200" style="margin-left: 240px;"><br>
       <b><font size="7" face="aharoni"> List Paket Laundry </font></b>
<table class="table table-striped" style="overflow: scroll; margin-top: 10px;">
  <tr>
    <th> No </th>
    <th> Nama </th>
    <th> Tarif </th>

<?php
$tampil= $conn -> query("SELECT * FROM tarif");
while($data = $tampil -> fetch_array()){   ?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['namapakaian']; ?> </td>
      <td>Rp. <?php echo number_format($data['tarif']); ?>,- </td>
<?php } ?>
</table>
       </body>
</html>

<?php
include'config.php';
if(isset($_POST['kirim'])){
session_start();
    $a = $_POST['user'];
    $b = $_POST['pass'];
    $_SESSION['user'] = $a;

$sql = $conn -> query("SELECT * FROM login WHERE username = '$a' AND password = '$b'");
$data = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);
if ($data['level'] == 1){
header('location: admin/');
}
else if ($data['level'] == 2){
header('location: karyawan/');
}
else {
    header('location: index.php');
    echo "GAGAl";
}
}