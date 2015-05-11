<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql = "CREATE TABLE user 
(
username CHAR(50), 
PRIMARY KEY(username),
nama CHAR(50),
nohp CHAR(50),
alamat CHAR(50),
provinsi CHAR(50),
kota CHAR(50),
kodepos CHAR(50),
email CHAR(50),
password CHAR(50),
cardno CHAR(50),
nameoncard CHAR(50),
expdate CHAR(50),
transaksi INT
)";
if (mysqli_query($con,$sql))
  {
  echo "Sukses!";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
?>