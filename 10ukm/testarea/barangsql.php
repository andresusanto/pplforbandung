<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql = "create table barang(nama char(30),harga int,stok int,kategori char(20),terjual int)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Beras Jepang',10000,1000,'beras',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Beras Pandan Wangi',11000,1000,'beras',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Beras Sentra Ramos',12000,1000,'beras',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Beras Rojolele',12500,1000,'beras',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Beras C4',13000,1000,'beras',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values('Tenderloin Beef',110000,1000,'daging',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Sirloin Beef',98000,1000,'daging',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Eyron Beef',95000,1000,'daging',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Rump Beef',95000,1000,'daging',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Lamosir',65000,1000,'daging',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Bandeng',26000,1000,'ikan',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Kembung',20000,1000,'ikan',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Banyar',22000,1000,'ikan',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Tongkol',20000,1000,'ikan',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Tengiri',40000,1000,'ikan',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Tomat',10000,1000,'sayur',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Wortel Lokal',8000,1000,'sayur',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Kentang Dieng', 14000,1000,'sayur',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Brokoli',12000,1000,'sayur',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Kembang Kol',12000,1000,'sayur',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Sunkiest',24000,1000,'buah',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Apel Fuji',18000,1000,'buah',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Semangka',4000,1000,'buah',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Melon',8000,1000,'buah',0)";
mysqli_query($con,$sql);
$sql = "insert into barang values ('Pir',25000,1000,'buah',0)";
mysqli_query($con,$sql);
?>