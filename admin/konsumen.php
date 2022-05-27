<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
$nama = $_SESSION['user'];
include'../config.php';
$no = 1;
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class=".navbar-custom"></div>
    <div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Laundri Unchh</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['user']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=mysql_query("select * from barang where jumlah <=3");
					while($q=mysql_fetch_array($periksa)){	
						if($q['jumlah']<=3){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="akses/karyawan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Karyawan</a></li>
			<li class="active"><a href="konsumen.php"><span class="glyphicon glyphicon-user"></span>  Data Konsumen</a></li>	
			<li><a href="transaksi.php"><span class="glyphicon glyphicon-transfer"></span>  Transaksi</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
        <h3><span class="glyphicon glyphicon-user"></span>  Data Konsumen</h3>
        <table class="table table-striped" style="overflow: scroll; margin-top: 10px;">
  <tr>
    <th> No </th>
    <th> Kode Konsumen </th>
    <th> Nama Konsumen </th>
    <th> Alamat </th>
    <th> No HP </th>
    <th> Opsi </th>
  </tr>

<?php
$tampil = $conn -> query("SELECT * FROM konsumen");
$aa = mysqli_num_rows($tampil);
while($data = $tampil -> fetch_array()){
?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['0']; ?> </td>
      <td> <?php echo $data['1']; ?> </td>
      <td> <?php echo $data['2']; ?> </td>
      <td> <?php echo $data['3']; ?> </td>
      <td>
           <a class="btn btn-success" href="editadmin.php?id=<?php echo $data['0']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
           <a class="btn btn-danger" href="hapusadmin.php?id=<?php echo $data['0']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
       </td>
<?php } ?>
</table>
    <?php  
        if ($aa == 0){
            echo"Tidak Ada Data";
        } ?>
    </div>
</body>
</html>