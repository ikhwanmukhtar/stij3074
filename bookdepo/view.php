<?php
include_once("dbconnect.php");
$id = $_GET['id']; 

//delete operation
if (isset($_GET['operation'])){
  $id = $_GET['id'];

  try{
    $sql = "DELETE FROM book WHERE id='$id'";
    $conn->exec($sql);
    echo "<script> alert('Delete Success');</script>";

  } catch (PDOException $e) {
    echo "<script> alert('Delete Error');</script>";
  }
}


//to view table
try {

    $sql = "SELECT * FROM book ";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $book = $stmt->fetchAll(); 

     echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Discription</th>
            <th>Publisher</th>
            <th>ISBN</th>
            <th>operation</th>

        </tr>";

     foreach($book as $book){
         echo "<tr>";
         echo "<td>".$book['id']."</td>";
         echo "<td>".$book['title']."</td>";
         echo "<td>".$book['author']."</td>";
         echo "<td>".$book['price']."</td>";
         echo "<td>".$book['discription']."</td>";
         echo "<td>".$book['publisher']."</td>";
         echo "<td>".$book['isbn']."</td>";
         echo "<td><a href='view.php?id=".$id."&operation=del'>Delete</a><br>
         <a href='update.php?id=".$id."&title=".$book['title']."&author=".$book['author']."&price=".$book['price']."&discription=".$book['discription']."&publisher=".$book['publisher']."&isbn=".$book['isbn']."&operation=upd'>Update</a>
         </td>";
         echo "</tr>";
     }
     echo "</table>";
     echo "<a href='insert.html'>Add New Book</a>";

} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}

$conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View</title>
</head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
tr:nth-child(even) {
  background-color: #eee;
}
tr:nth-child(odd) {
 background-color: #fff;
}
th {
  background-color: Lightblue;
  color: black;
}
</style>
<body>
</body>
</html>