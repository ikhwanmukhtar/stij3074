<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$discription = $_GET['discription'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

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
<h3>Update Book Information</h3> 

<body>
<form action="insert.php" method="get" onsubmit="return confirm('Update?');">
  
    <label for="title">Enter Title:</label><br>
    <input type="text" name="title" id="title" required><br>

    <label for="author">Enter Author:</label><br>
    <input type="text" id="author" name="author" required><br>

    <label for="price">Enter Price:</label><br>
    <input type="text" id="price" name="price" required><br>

    <label for="discription">Enter Discription:</label><br>
    <input type="text" id="discription" name="discription" required><br>

    <label for="publisher">Enter Publisher:</label><br>
    <input type="text" id="publisher" name="publisher" required><br>

    <label for="isbn">Enter ISBN:</label><br>
    <input type="text" id="isbn" name="isbn" required><br>

    <br><input type="submit" value="Submit">
</form>
<p><a href="insert.html">Clear</a></p>
<p><a href="view.php">View Books
</a></p>
</body>
</html>