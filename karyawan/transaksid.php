<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../index.php");
}
$nama = $_SESSION['user'];
include'../config.php';
$id = $_GET['id'];
$sql = $conn -> query("SELECT * FROM transaksi JOIN konsumen USING(kodekonsumen) JOIN rinciantransaksi USING(notransaksi) JOIN tarif USING(namapakaian) JOIN jenislondri USING(idjenislondri) WHERE kodekonsumen ='$id'");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
	</script>
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
        <a class="btn" href="transaksi.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
        <button style="float: right;" class="btn btn-info" onclick="printContent('div1')"><span class="glyphicon glyphicon-print"></span> Print</button>

<?php
        while($data = $sql -> fetch_array()){   ?>
   <div id="div1">     
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
            <td> Harga Satuan</td>
            <td> <?php echo $data['tarif']; ?></td>
        </tr>
        <tr>
            <td> Jumlah</td>
            <td> <?php echo $data['jumlahrincian']; ?></td>
        </tr>
        <tr>
            <td> Tanggal Antar</td>
            <td> <?php echo $data['tgltransaksi']; ?></td>
        </tr>
        <tr>
            <td> Tanggal Ambil</td>
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
</body>
</html>