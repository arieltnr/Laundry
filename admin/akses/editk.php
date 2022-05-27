<?php
session_start();
if(empty($_SESSION['user'])){
header("location: ../../index.php");
}
$nama = $_SESSION['user'];
include'../../config.php';
$no = 1;
$id = $_GET['id'];
$haha = $conn -> query("SELECT * FROM login JOIN karyawan ON login.namauser=karyawan.namak WHERE namak='$id'");
$row = $haha -> fetch_array();
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
    $("#crud").load("tambahk.php").slideToggle(600);
});
  });
</script>
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

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li class="active"><a href="karyawan.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Karyawan</a></li>
			<li><a href="../konsumen.php"><span class="glyphicon glyphicon-user"></span>  Data Konsumen</a></li>        												
			<li><a href="../transaksi.php"><span class="glyphicon glyphicon-transfer"></span>  Transaksi</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
        <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Karyawan</h3>
        <button class="bt btn-info btn-sm"> + Karyawan</button>
        <table class="table table-striped" style="overflow: scroll; margin-top: 10px;">
  <tr>
    <th> No </th>
    <th> NIK </th>
    <th> Nama Karyawan </th>
    <th> Jenis Kelamin </th>
    <th> Alamat </th>
    <th> No HP </th>
    <th> Opsi </th>
  </tr>

<?php
$tampil = $conn -> query("SELECT * FROM karyawan");
$aa = mysqli_num_rows($tampil);
while($data = $tampil -> fetch_array()){
?>

    <tr>
      <td> <?php echo $no++ ; ?> </td>
      <td> <?php echo $data['nik']; ?> </td>
      <td> <?php echo $data['namak']; ?> </td>
      <td> <?php echo $data['jk']; ?> </td>
      <td> <?php echo $data['alamatk']; ?> </td>
      <td> <?php echo $data['hpk']; ?> </td>
      <td>
           <a class="btn btn-success" href="editk.php?id=<?php echo $data['namak']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
           <a class="btn btn-danger" href="hapusadmin.php?id=<?php echo $data['0']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
       </td>
<?php } ?>
</table>
    <?php  
        if ($aa == 0){
            echo"Tidak Ada Data";
        } ?>
<fieldset>
    <legend>Edit Karyawan</legend>
<form action="" method="post" class="form-horizontal">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NIK:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="a" size="5" value="<?php echo $row['nik']; ?>">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="b" value="<?php echo $row['namak']; ?>">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Kelamin:</label>
    <div class="col-sm-5">
        <input type="radio" value="Laki-laki" name="c" <?php if($row['jk'] == 'Laki-laki'){echo 'checked'; } ?>> Laki-laki &nbsp;
        <input type="radio" value="Perempuan" name="c" <?php if($row['jk'] == 'Perempuan'){echo 'checked'; } ?>> Perempuan
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Alamat:</label>
    <div class="col-sm-5">
        <textarea class="form-control" name="d"><?php echo $row['alamatk']; ?></textarea>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">NO HP:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="e" value="<?php echo $row['hpk']; ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Username:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="f" value="<?php echo $row['username']; ?>">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Password:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="g" value="<?php echo $row['password']; ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Level:</label>
    <div class="col-sm-5">
        <select class="form-control" name="h">
            <option <?php if($row['level'] == '1'){echo 'selected'; } ?> value='1'>Manager</option>
            <option <?php if($row['level'] == '2'){echo 'selected'; } ?> value='2'>Karyawan</option>
        </select>
    </div>
</div>
<div class="modal-footer">
          <center><input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-md"></center>
 </div>
</form>
</fieldset>
        <div id="crud"></div>
    </div>
</body>
</html>

<?php
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn -> query("UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id='$id'");
	header("location:viewadmin.php");
  }