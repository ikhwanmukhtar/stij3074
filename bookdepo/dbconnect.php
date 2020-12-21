<?php

$servername = "sql303.epizy.com";
$username = "epiz_27068173";
$password = "jTVoHai91f";
$database = "epiz_27068173_ikhwanbookdepo";

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>