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
			<li><a href="karyawan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Karyawan</a></li>
			<li><a href="konsumen.php"><span class="glyphicon glyphicon-user"></span>  Data Konsumen</a></li>	
            <li><a href="laundry/laundry.php"><span class="glyphicon glyphicon-remove"></span>  Jenis & Tarif Laundry</a></li>	
			<li class="active"><a href="transaksi.php"><span class="glyphicon glyphicon-transfer"></span>  Transaksi</a></li>
            <li><a href="keperluan/pemakaian.php"><span class="glyphicon glyphicon-stats">&nbsp;</span>Keperluan</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
        <h3><span class="glyphicon glyphicon-transfer"></span>  Data Transaksi</h3>
        <table class="table table-striped" style="overflow: scroll; margin-top: 10px;">
  <tr>
    <th> No </th>
    <th> Nama Konsumen </th>
    <th> No Transaksi </th>
    <th> Jenis Laundry </th>
    <th> Nama </th>
    <th> Tarif </th>
    <th> Jumlah </th>
    <th> Tgl Antar </th>
    <th> Tgl Ambil </th>
    <th> Total Bayar </th>
    
    <th> Opsi </th>
  </tr>

<?php
$tampil= $conn -> query("SELECT * FROM transaksi JOIN konsumen USING(kodekonsumen) JOIN rinciantransaksi USING(notransaksi) JOIN tarif USING(namapakaian) JOIN jenislondri USING(idjenislondri)");
            
$aa = mysqli_num_rows($tampil);
while($data = $tampil -> fetch_array()){
$a = $data['jumlahrincian'] * $data['tarif'];   ?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['namakonsumen']; ?> </td>
      <td> <?php echo $data['notransaksi']; ?> </td>
      <td> <?php echo $data['namajenislondri']; ?> </td>
      <td> <?php echo $data['namapakaian']; ?> </td>
      <td> <?php echo $data['tarif']; ?> </td>
      <td> <?php echo $data['jumlahrincian']; ?> </td>
      <td> <?php echo $data['tgltransaksi']; ?> </td>
      <td> <?php echo $data['tglambil']; ?> </td>
      <td>Rp. <?php echo number_format ($a); ?>,-</td>
      <td>
           <a class="btn btn-success" href="transaksid.php?id=<?php echo $data['kodekonsumen']; ?>">Detail</a> 
           <a class="btn btn-danger" href="transaksih.php?id=<?php echo $data['kodekonsumen']; ?>&id2=<?php echo $data['idrincian']; ?>" onclick="return confirm('Hapus')"><span class="glyphicon glyphicon-trash"></span></a>
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