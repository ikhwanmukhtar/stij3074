<?php
session_start();
include("dbconnect.php");
include("dbconn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Library Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>

<body>
                
  <h2 style='font-size:30px; color: white;'>Insert New Record</h2>
  <div class="login-box">
  <form action="" method="post" enctype="multipart/form-data">

<div class="textbox">
  <input type="text" placeholder="ID" id="id" name="id" value="" required>
</div>

<div class="textbox">
  <input type="text" placeholder="Name" id="name" name="name" value="" required>
</div>

<div class="textbox">
  <input type="text" placeholder="Title" id="title" name="title" value="" required>
</div>

<div class="textbox">
  <input type="text" placeholder="Author" id="author" name="author" value="" required>
</div>

<div class="textbox">
  <input type="text" placeholder="Price" id="price" name="price" value="" required>
</div>

<div class="textbox">
  <input type="text" placeholder="ISBN" id="isbn" name="isbn" value="" required>
</div>

    <div class="textbox">
      <label for="type" style='font-size:16px; color: white;'>Status:</label>
      <select style='font-size:16px; color: black;' name="type">
        <option style='font-size:16px; color: black;' for="type" value="-1" >Select status</option>
        <option style='font-size:16px; color: black;' value="Returned">Returned</option>
        <option style='font-size:16px; color: black;' value="Pending">Pending</option>
      </select>
    </div>

    <div class="textbox">
      <label for="pwd" style='font-size:16px; color: white;'>Image:</label>
      <input type="file" class="form-control" name="f1">
    </div>

  <button type="submit" name="insert" class="btn btn-default">Insert</button>
  <p><br><a href="index.html">Logout</a><br></p>
  <p><br><a href="mainpage.php">See Records</a><br></p>
</form>
  </div>


</body>


    </div>
  

<?php
if(isset($_POST['insert'])){

  $id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$isbn = $_POST['isbn'];
$type = $_POST['type'];

  $tm=md5(time());
  $fnm=$_FILES["f1"]["name"];
  $dst="./images/".$tm.$fnm;
  $dst1="images/".$tm.$fnm;
  move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);

  mysqli_query($link, "INSERT INTO record(id, name, title, author, price, isbn, type, image1)
  VALUES ('$id', '$name', '$title', '$author','$price','$isbn' ,'$type', '$dst1')");
  
$conn = null;



  ?> 
  <script type="text/javascript">window.location.href=mainpage.php;</script>

  


  <?php
}


if(isset($_POST['delete'])){
  mysqli_query($link, "DELETE FROM record WHERE name = '$_POST[name]'") or die(mysqli_error($link));
  ?> 
  <script type="text/javascript">window.location.href=window.location.href;</script>

  <?php
}

if(isset($_POST['update'])){


  mysqli_query($link, "UPDATE FROM record SET name = '$_POST[name]' WHERE name = '$_POST[name]'") or die(mysqli_error($link));
  ?> 
  <script type="text/javascript">window.location.href=window.location.href;</script>

  <?php
}

?>



</html>
