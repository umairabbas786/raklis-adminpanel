<?php
$conn = new mysqli("localhost","root","","rakljtxz_raklis_db");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>