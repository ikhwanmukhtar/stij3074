<?php

//get data
$foodID = $_GET['foodID'];
$foodname = $_GET['foodname'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$calorie = $_GET['calorie'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodmenu";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO menu (foodID, foodname, price, quantity, calorie)
  VALUES ('$foodID', '$foodname', '$price', '$quantity', '$calorie')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>