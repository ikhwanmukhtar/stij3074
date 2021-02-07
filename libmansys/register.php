<?php

//connect to db
include_once("dbconnect.php");


//get data
$staffname = $_POST['staffname'];
$staffemail = $_POST['staffemail']; 
$staffID = $_POST['staffID'];
$password = sha1($_POST['password']);

try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO staff (staffname, staffemail, staffID, password)
    VALUES ('$staffname', '$staffemail', '$staffID', '$password')";

    $conn->exec($sql);
    echo "<script> alert('Registration Success')</script>";
    echo "<script> window.location.replace('index.html') </script>;";
} catch(PDOException $e) {
  //echo $sql . "<br>" . $e->getMessage();
  echo "<script> alert('Registration Error')</script>";
  echo "<script> window.location.replace('register.html') </script>;";
  
}

$conn = null;


 ?>