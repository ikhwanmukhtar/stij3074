<?php

$servername = "sql105.byetcluster.com";
$username = "epiz_27510968";
$password = "jTVoHaPT0NJ2s9QnaFyZi91f";
$database = "epiz_27510968_libmansys";

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>