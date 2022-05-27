<?php
session_start();
ob_start();
if(empty($_SESSION['user'])){
header("location: ../../index.php");
}
$nama = $_SESSION['user'];
include'../../config.php';
$no = 1;
$s = $conn -> query("SELECT * FROM supplier");
$carikod = mysqli_query($conn, "SELECT kodebarang from barang") or die (mysqli_error());
  // menjadikannya array
  $datakod = mysqli_fetch_array($carikod);
  $jumlah_data = mysqli_num_rows($carikod);
  // jika $datakode
  if ($datakod) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikod = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kod = (int) $nilaikod;
   // setiap $kode di tambah 1
   $kod = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomati = "KB".str_pad($kod, 2, "0", STR_PAD_LEFT);
  } else {
   $kode_otomati = "KB01";
  }
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../../bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
         $(".bt").click(function() {
           $("#crud").load("tambahj.php").slideToggle(600);
         });
        });
     </script>
     <script type="text/javascript">
       $(document).ready(function(){
         $(".bt2").click(function() {
           $("#crud2").load("tambaht.php").slideToggle(600);
         });
        });
     </script>
     <style type="text/css">
         .a{
             background-color: aliceblue;
         }
    </style>
</head>
<body>
<div class=".navbar-custom"></div>
    <div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand">Laundri Unchh</a>
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
    
    	<div id="modalpesan2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Data</h4>
				</div>
              <form action="" method="post" class="form-horizontal">
				<div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">NO Pembelian :</label>
                       <div class="col-sm-5">
                       <input type="text" class="form-control" name="a">
                       </div>
                     </div>
    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Nama Barang:</label>
                      <div class="col-sm-5">
                      <input type="txt" class="form-control" name="b">
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Jumlah:</label>
                       <div class="col-sm-5">
                       <input type="text" class="form-control" name="c">
                       </div>
                     </div>
                     
                     <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Total Biaya:</label>
                       <div class="col-sm-5">
                       <input type="text" class="form-control" name="d">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Tgl Beli:</label>
                       <div class="col-sm-5">
                       <input type="date" class="form-control" name="e">
                       </div>
                     </div>
                     
                     <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Dari:</label>
                       <div class="col-sm-5">
                           <select class="form-control" name="f"><?php while($r = $s -> fetch_array()){ ?>
                             <option value="<?php echo $r['0'];?>"><?php echo $r['1'];?></option><?php } ?>
                           </select>
                       </div>
                     </div>
				</div>
				<div class="modal-footer">
                    <center><input type="submit" name="kirim" value="Simpan" class="btn btn-info btn-md"></center>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
                </form>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="../karyawan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Karyawan</a></li>
			<li><a href="../konsumen.php"><span class="glyphicon glyphicon-user"></span>  Data Konsumen</a></li>	
            <li><a href="../laundry/laundry.php"><span class="glyphicon glyphicon-remove"></span>  Jenis & Tarif Laundry</a></li>	
			<li><a href="../transaksi.php"><span class="glyphicon glyphicon-transfer"></span>  Transaksi</a></li>
            <li class="active"><a href="pemakaian.php"><span class="glyphicon glyphicon-stats">&nbsp;</span>Keperluan</a></li>
			<li><a href="../ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
    
<div class="col-md-10">
   <nav class="a navbar navbar-default">
      <div class="container-fluid">
	<div class="navbar-header">
	<ul class="nav navbar-nav navbar-right">
		<li><a href="pemakaian.php">Pemakaian Barang</a></li>
		<li><a href="barang.php">Stok</a></li>
		<li class="active"><a href="pembelian.php">Pembelian</a></li> 
		<li><a href="supplier.php">Supplier</a></li>
	</ul>
   </div>
       </div>
</nav>
    <a id="pesan_sedia" class="btn btn-info" href="#" data-toggle="modal" data-target="#modalpesan2">+ Barang</a>
<table class="table table-striped" style="overflow: scroll; margin-top: 10px;">
  <tr>
    <th> No </th>
    <th> No Pembelian </th>
    <th> Nama Barang </th>
    <th> Jumlah </th>
    <th> Biaya </th>
    <th> Tgl Beli </th>
    <th> Dari </th>
    <th> Opsi </th>
  </tr>

<?php
$tampil= $conn -> query("SELECT * FROM pembelian JOIN rincianbeli USING(nopembelian) JOIN supplier USING(idsupplier) JOIN barang USING(namabarang)");
            
$aa = mysqli_num_rows($tampil);
while($data = $tampil -> fetch_array()){   ?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['nopembelian']; ?> </td>
      <td> <?php echo $data['namabarang']; ?> </td>
      <td> <?php echo $data['jumlah']; ?> </td>
      <td>Rp. <?php echo number_format ($data['totalpembelian']); ?>,- </td>
      <td> <?php echo $data['tglpembelian']; ?> </td>
      <td> <?php echo $data['namasupplier']; ?> </td>
      <td>
           <a class="btn btn-success" href="pembelianed.php?id=<?php echo $data['nopembelian']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
           <a class="btn btn-danger" href="pembelianha.php?id=<?php echo $data['nopembelian']; ?>&id2=<?php echo $data['kodebarang']; ?>" onclick="return confirm('Hapus')"><span class="glyphicon glyphicon-trash"></span></a>
       </td>
<?php } ?>
</table>
    <?php  
        if ($aa == 0){
            echo"Tidak Ada Data";
        } ?>
        <div id="crud"></div>
    </div>

<script type="text/javascript">
    function hitung(){
      var jumlah = document.getElementsByName("c")[0].value;
        var harga = document.getElementsByName("c")[0].value;
          var total = parseInt(jumlah) * parseInt(harga);
            document.getElementsByName
        </script>
</body>
</html>

<?php
if(isset($_POST['kirim'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    
$conn -> query("INSERT INTO pembelian VALUES('$a', '$f', '$b', '$e', '$d')");
$conn -> query("INSERT INTO rincianbeli VALUES('', '$a', '$c')");
$conn -> query("INSERT INTO barang VALUES('$kode_otomati', '$b', '$c', '$e')");
header('location: pembelian.php');
}
ob_flush();