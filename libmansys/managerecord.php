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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">

    

</head>
<body>

                
<div class="container">
    <div class="col-lg-4">
  <h2 style='font-size:30px; color: black;'>Insert New Record</h2>
  <form action="" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="id" style='font-size:16px; color: black;'>ID:</label>
        <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id">
      </div>

      <div class="form-group">
        <label for="name" style='font-size:16px; color: black;'>Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>

      <div class="form-group">
        <label for="title" style='font-size:16px; color: black;'>Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
      </div>

      <div class="form-group">
        <label for="author" style='font-size:16px; color: black;'>Author:</label>
        <input type="text" class="form-control" id="author" placeholder="Enter author" name="author">
      </div>

      <div class="form-group">
        <label for="price" style='font-size:16px; color: black;'>Price:</label>
        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
      </div>

      <div class="form-group">
        <label for="isbn" style='font-size:16px; color: black;'>ISBN:</label>
        <input type="text" class="form-control" id="isbn" placeholder="Enter isbn" name="isbn">
      </div>

    

      <div class="form-group">
        <label for="type" style='font-size:16px; color: black;'>Status:</label>
        <select style='font-size:16px; color: black;' name="type">
          <option style='font-size:16px; color: black;' for="type" value="-1" >Select status</option>
          <option style='font-size:16px; color: black;' value="Returned">Returned</option>
          <option style='font-size:16px; color: black;' value="Pending">Pending</option>
        </select>
      </div>

      <div class="form-group">
        <label for="pwd" style='font-size:16px; color: black;'>Image:</label>
        <input type="file" class="form-control" name="f1">
      </div>

    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <p><br><a href="index.html">Logout</a><br></p>
  </form>
</div>
</div>


<div class="col-lg-12">

<table class="table table-bordered">
    <thead>
      <tr>
        <th style='font-size:16px; color: black;'>ID</th>
        <th style='font-size:16px; color: black;'>Book Picture</th>
        <th style='font-size:16px; color: black;'>Name</th>
        <th style='font-size:16px; color: black;'>Title</th>
        <th style='font-size:16px; color: black;'>Author</th>
        <th style='font-size:16px; color: black;'>Price</th>
        <th style='font-size:16px; color: black;'>ISBN</th>
        <th style='font-size:16px; color: black;'>Status</th>
        <th style='font-size:16px; color: black;'>Edit</th>
        <th style='font-size:16px; color: black;'>Delete</th>
      </tr>
    </thead>
    <tbody>

    <?php
      $res=mysqli_query($link, "SELECT * FROM record");
      while ($row=mysqli_fetch_array($res)){

          echo "<tr>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["id"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; ?> <img src="<?php echo $row["image1"]; ?>" height="100" width="100"> <?php echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["name"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["title"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["author"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["price"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["isbn"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; echo $row["type"]; echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; ?> <a href="updaterecord.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
          echo "<td style='font-size:16px; color: black;'>"; ?> <a href="deleterecord.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";


          echo "</tr>";

      }
    ?>
    



    </tbody>
  </table>

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
  <script type="text/javascript">window.location.href=window.location.href;</script>

  


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
