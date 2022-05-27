<?php
ob_start();
session_start();
$now = date('d-m-Y');
include'../config.php';
$carikode = $conn -> query("SELECT max(kodekonsumen) from konsumen");
  $datakode = mysqli_fetch_array($carikode);
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);

   $kode = (int) $nilaikode;

   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P0001";
  }

$carikod = mysqli_query($conn, "SELECT notransaksi from transaksi") or die (mysqli_error());
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
   $kode_otomati = "NT".str_pad($kode, 2, "0", STR_PAD_LEFT);
  } else {
   $kode_otomati = "NT01";
  }
?>
<html>
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
       <script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
       <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
       <title> Transaksi </title>
       <style type="text/css">
           body{
               background-color: #eeeeee;
         }
           
           .aa {
                background-color: aliceblue;
                float: right;
                width: 45%;
                height: 495;
                margin-top: 10px;
                
           }
           .ac {
                background-color: aliceblue;
                float: left;
                width: 45%;
                height: 850;
                margin-top: 20px;
            
           }
           .ad {
                background-color: aliceblue;
                float: right;
                width: 45%;
                height: 20%;
                margin-top: 10px;
                
           }
           .b{
               background-color: deepskyblue;
           }
           .bb{
               background-color: cornflowerblue;
           }
       </style>
       
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
       <a class="btn" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<div class="container">
    <img class="img-rounded" style="margin-top: 20px; float: right;" src="../images/Slide-Presentasi-PKM-Laundry-Syariah-AthHura.jpg" width="45%" height="30%">
    
<form action="" method="post">
<div class="ac">
    <br>
 <div style="width: 80%; margin-left: 30px;">
    <a class="btn btn-info btn-lg btn-block">Transaksi</a>
    <br>
  <div class="form-group">
  <label><font size="5">Transaksi</font></label><hr bgcolor="white">
    <label>No Transaksi</label>
        <input type="txt" name="nt" class="form-control" value="<?php echo $kode_otomati; ?>" readonly><br>
  </div>
     
  <div class="form-group">
    <label>Rincian Laundry</label><hr bgcolor="white">
  </div>

     <?php
     $sql = $conn -> query("SELECT * FROM tarif"); ?>
  <div class="form-group">
     <label style="margin-left: 40px;"><font face="aharoni" size="2">Nama</font></label>
      <select name="nl" id="tstd_paket" class="form-control">
                            <option value="">PILIH PAKET:</option>
    <?php while($data = $sql -> fetch_array()){ ?>                           
                            <option value="<?php echo $data['2'];?>" data-harga="<?php echo $data['3'];?>"><?php echo $data['2'];?></option>
    <?php } ?>
                        </select><br>
  </div>
     
  <div class="form-group">
     <label style="margin-left: 40px;"><font face="aharoni" size="2">Tarif</font></label>
      <input type="text" name="hl" id="tstd_total_harga"/ class="form-control" readonly>
  </div>
     
  <div class="form-group">
     <label style="margin-left: 40px;"><font face="aharoni" size="2">Jumlah (Kg or Paket)</font></label>
      <input type="text" name="jl" class="form-control">
  </div>
     
  <div class="form-group">
    <label>Jadwal Pengantaran dan Pengambilan </label><hr bgcolor="white">
      <label style="margin-left: 40px;"><font face="aharoni" size="2">Tanggal Pengambilan</font></label>
      <input type="date" class="form-control" name="tglat">
  </div>
     
  <br>
     <div class="form-group">
     <label style="margin-left: 40px;"><font face="aharoni" size="2">Tanggal Pengembalian</font></label>
      <input type="date" class="form-control" name="tglab">
  </div>
     
    </div>
</div>
<div class="aa">
    <br>
 <div style="width: 80%; margin-left: 30px;">
    <a class="btn btn-info btn-lg btn-block">Kontak</a>
    <br>
  <div class="form-group">
      <label><font size="5">Kontak</font></label><hr bgcolor="white">
      <label style="margin-left: 40px;">Kode Konsumen</label>
        <input type="txt" name="kk" class="form-control" value="<?php echo $kode_otomatis; ?>" readonly>
     </div>
     
      <div class="form-group">
       <label style="margin-left: 40px;">Nama</label>
        <input type="txt" name="nk" class="form-control">
      </div>
     
      <div class="form-group">
       <label style="margin-left: 40px;">Alamat</label>
        <textarea class="form-control" name="ak"></textarea>
      </div>
     
      <div class="form-group">
       <label style="margin-left: 40px;">Telp</label>
        <input type="txt" name="tk" class="form-control">
      </div>
    </div>
</div>
    
<div class="ad">
    <br>
    <div style="width: 80%; margin-left: 30px;">
      <font size="1"><label>Bila Ingin lebih per kg tinggal masukan jumlah sesuai kebutuhan</label>
      </font>
    </div>
</div>
<div style="margin-top:10px;">
<input type="submit" name="daftar" class="btn btn-warning btn-block">
</div>
 </form>
</div>
<br>
    
      
</body>
    <script type="text/javascript">
       $('#tstd_paket').change(function(){
    var
    value = $(this).val(),
    $obj = $('#tstd_paket option[value="'+value+'"]'),
    harga = $obj.attr('data-harga'),
    ket = $obj.attr('data-ket');
    
    $('#tstd_total_harga').val(harga);
    
});
    </script>
</html>

<?php
if(isset($_POST['daftar'])){
    $kk = $_POST['kk'];
    $nk = $_POST['nk'];
    $ak = $_POST['ak'];
    $tk = $_POST['tk'];
    $nt = $_POST['nt'];
    $nl = $_POST['nl'];
    $hl = $_POST['hl'];
    $jl = $_POST['jl'];
    $tat = $_POST['tglat'];
    $tab = $_POST['tglab'];
    $_SESSION['konsumen'] = $kk;

$conn -> query("INSERT INTO konsumen VALUES('$kk', '$nk', '$ak', '$tk')");
$conn -> query("INSERT INTO transaksi VALUES('$nt', '$kk', '$nl', '$tat', '$tab', '1')");
$conn -> query("INSERT INTO rinciantransaksi VALUES('', '$nt', '$jl')");
$conn -> query("INSERT INTO tarif VALUES('', '$nl', '$hl')");

header('location: data.php');
    ob_flush();
}