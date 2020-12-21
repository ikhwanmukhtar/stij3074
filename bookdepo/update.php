<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$discription = $_GET['discription'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];


if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE book SET title = '$title', author = '$author', price = '$price', discription = '$discription', publisher = '$publisher', isbn = '$isbn' WHERE id = '$id'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('view.php?id=".$id."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Book</title> 
<style>
    /* Style the submit button */
    input[type=submit] {
    background-color: #4169E1;
    color: white;
    }
    </style>
</head>
<h3>Update <?php echo $title;?> Information</h3> 

<body>
<form action="update.php" method="get" onsubmit="return confirm('Update?');">
    <input type="hidden" name="id" id="id" value=<?php echo $id;?> required><br>
    <input type="hidden" id="operation" name="operation" value="update"><br>
    
    <label for="title">Enter Title:</label><br>
    <input type="text" name="title" id="title"value=<?php echo $title;?> required><br>

    <label for="author">Enter Author:</label><br>
    <input type="text" id="author" name="author" value=<?php echo $author;?> required><br>

    <label for="price">Enter Price:</label><br>
    <input type="text" id="price" name="price" value=<?php echo $price;?> required><br>

    <label for="discription">Enter Discription:</label><br>
    <input type="text" id="discription" name="discription" value=<?php echo $discription;?> required><br>

    <label for="publisher">Enter Publisher:</label><br>
    <input type="text" id="publisher" name="publisher" value=<?php echo $publisher;?> required><br>

    <label for="isbn">Enter ISBN:</label><br>
    <input type="text" id="isbn" name="isbn" value=<?php echo $isbn;?> required><br>

    <br><input type="submit" value="Update">
</form>
<p><a href="view.php">Cancel</a></p>
</a></p>
</body>
</html>