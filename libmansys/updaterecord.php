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
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

    

</head>
<body>

  <h2 style='font-size:30px; color: white;'>Update Record</h2>
  <div class="login-box">
  <form action="" method="post" enctype="multipart/form-data">

  <img src="<?php echo $image1; ?>" height="100" width="100">

  <div class="textbox">
        <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" value="<?php echo $id; ?>">
      </div>

      <div class="textbox">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name; ?>">
      </div>

      <div class="textbox">
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo $title; ?>">
      </div>

      <div class="textbox">
        <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="<?php echo $author; ?>">
      </div>

      <div class="textbox">
        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo $price; ?>">
      </div>

      <div class="textbox">
        <input type="text" class="form-control" id="isbn" placeholder="Enter isbn" name="isbn" value="<?php echo $isbn; ?>">
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

    <br><button type="submit" name="update" class="btn">Update</button></br>
    <p><br><a href="mainpage.php">Cancel</a><br></p>
    
   
  </form>

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


    
  ?> <script type="text/javascript">window.location="mainpage.php";</script>

  <?php
}

?>

<?php
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
