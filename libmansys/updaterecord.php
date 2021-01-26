<?php
include("dbconn.php");
include("dbconnect.php");
$id=$_GET["id"];

$name="";
$title="";
$author="";
$price="";
$isbn="";
$type="";
$image1="";

$res=mysqli_query($link, "SELECT * FROM record WHERE id=$id");
while ($row=mysqli_fetch_array($res)){
    $name=$row["name"];
    $title=$row["title"];
    $author=$row["author"];
    $price=$row["price"];
    $isbn=$row["isbn"];
    $type=$row["type"];
    $image1=$row["image1"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Duty Management System</title>
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
  <h2 style='font-size:30px; color: black;'>Update Record</h2>
  <form action="" method="post" enctype="multipart/form-data">

  <img src="<?php echo $image1; ?>" height="100" width="100">

  <div class="form-group">
        <label for="id" style='font-size:16px; color: black;'>ID:</label>
        <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" value="<?php echo $id; ?>">
      </div>

      <div class="form-group">
        <label for="name" style='font-size:16px; color: black;'>Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name; ?>">
      </div>

      <div class="form-group">
        <label for="title" style='font-size:16px; color: black;'>Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo $title; ?>">
      </div>

      <div class="form-group">
        <label for="author" style='font-size:16px; color: black;'>Author:</label>
        <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="<?php echo $author; ?>">
      </div>

      <div class="form-group">
        <label for="price" style='font-size:16px; color: black;'>Price:</label>
        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo $price; ?>">
      </div>

      <div class="form-group">
        <label for="isbn" style='font-size:16px; color: black;'>ISBN:</label>
        <input type="text" class="form-control" id="isbn" placeholder="Enter isbn" name="isbn" value="<?php echo $isbn; ?>">
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

    <br><button type="submit" name="update" class="btn btn-default">Update</button>
    <p><br><a href="managerecord.php">Cancel</a><br></p>
    
   
  </form>
</div>
</div>

</div>
            
                



</body>
<?php
if(isset($_POST['update'])){

    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];

    if($fnm=="")
    {
        mysqli_query($link, "UPDATE record SET id='$_POST[id]', name='$_POST[name]', title='$_POST[title]', author='$_POST[author]', price='$_POST[price]', isbn='$_POST[isbn]', type='$_POST[type]' WHERE id=$id");
    }else{
        
      $dst="./images/".$tm.$fnm;
      $dst1="images/".$tm.$fnm;
      move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
      
      mysqli_query($link, "UPDATE record SET id='$_POST[id]', name='$_POST[name]', title='$_POST[title]', author='$_POST[author]', price='$_POST[price]', isbn='$_POST[isbn]', type='$_POST[type]', image1='$dst1' WHERE id=$id");
   
    }


    
  ?> <script type="text/javascript">window.location="managerecord.php";</script>

  <?php
}

?>





</html>
