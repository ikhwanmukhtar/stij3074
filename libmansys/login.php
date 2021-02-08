<?php
session_start();
include_once("dbconnect.php");

$staffemail = $_POST['staffemail']; 
$password = sha1($_POST['password']);

try {
    $sql = "SELECT * FROM staff WHERE staffemail = '$staffemail' AND password = '$password'";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $users = $stmt->fetchAll();  

    if ($count > 0){
        foreach($users as $staff) {
            $matric = $staff['staffid'];
            $name = $staff['staffname'];
        } 
        setcookie("timer", "10s", time()+10000000,"/");

        $_SESSION["staffname"] = $name;
        $_SESSION["staffemail"] = $email;
        $_SESSION["password"] = $password;

        
        echo "<script> alert('Login Success')</script>";
        echo "<script> window.location.replace('mainpage.php?') </script>;";
    }else{
        echo "<script> alert('Login Failed')</script>";
        echo "<script> window.location.replace('index.html') </script>;";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  $conn = null;
?>