<?php

//get data
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$discription = $_GET['discription'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookdepo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO book (id, title, author, price, discription, publisher, isbn)
  VALUES ('$id', '$title', '$author', '$price', '$discription', '$publisher', '$isbn')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

try {

    $sql = "SELECT * FROM book WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $count = $stmt->rowCount();
     $book = $stmt->fetchAll(); 

    if ($count > 0) {

        foreach($book as $book){
            echo $id = $book ['id'];
        }
        echo "<script> window.location.replace('view.php? id=".$id."&title=" .$title."') </script>;";
    } else {
        echo "<script> window.locatio.replace('insert.html')</script>;";
    }
     

} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}

$conn = null;


?>