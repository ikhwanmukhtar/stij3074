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
  <link rel="stylesheet" href="table.css">

</head>

<body>

<div>

<table class="content-table" align="center">
    <thead>
      <tr>
        <th style='font-size:16px; color: white;'>ID</th>
        <th style='font-size:16px; color: white;'>Book Picture</th>
        <th style='font-size:16px; color: white;'>Name</th>
        <th style='font-size:16px; color: white;'>Title</th>
        <th style='font-size:16px; color: white;'>Author</th>
        <th style='font-size:16px; color: white;'>Price</th>
        <th style='font-size:16px; color: white;'>ISBN</th>
        <th style='font-size:16px; color: white;'>Status</th>
        <th style='font-size:16px; color: white;'>Edit</th>
        <th style='font-size:16px; color: white;'>Delete</th>
      </tr>
</thead>
    <tbody>

    <?php
      $res=mysqli_query($link, "SELECT * FROM record");
      while ($row=mysqli_fetch_array($res)){

          echo "<tr>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["id"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; ?> <img src="<?php echo $row["image1"]; ?>" height="100" width="100"> <?php echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["name"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["title"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["author"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["price"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["isbn"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; echo $row["type"]; echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; ?> <a href="updaterecord.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
          echo "<td style='font-size:16px; color: white;'>"; ?> <a href="deleterecord.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";


          echo "</tr>";

      }
    ?>
    

    </tbody>
  </table>
  <p align="center"><a href="managerecord.php">Insert New Record</a></p>
  <p align="center"><a href="index.html">Logout</a></p>

</div>

</body>


    </div>

</html>
