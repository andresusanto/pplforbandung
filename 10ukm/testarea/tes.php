<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Create database
$sql = "SELECT * FROM user WHERE username='".$_GET['q']."'";
if ($result=mysqli_query($con,$sql))
  {
  while($row = mysqli_fetch_array($result)) {
	  echo $row['username'] . " " . $row['password'];
	  echo "<br>";
	}
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
?>