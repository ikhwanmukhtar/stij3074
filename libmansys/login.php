<?php
//connect to db
include_once("dbconnect.php");
$staffemail = $_POST['staffemail'];
$password = sha1($_POST['password']);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM staff WHERE staffemail=$staffemail AND password=$password");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    /*foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
      echo $v;
    }*/
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if ($count > 0){
        echo "<script> alert Login success</script>";
        echo "<script> window.location.replace('managerecord.php') </script>;";
        
    } else{
        echo "<script> alert Login failed</script>";
        echo "<script> window.location.replace('index.html') </script>;";
    }

  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;



?>