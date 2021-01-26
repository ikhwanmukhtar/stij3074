<?php
include "dbconn.php";
$id=$_GET["id"];
mysqli_query($link, "DELETE FROM record where id=$id");

?>

<script type="text/javascript">window.location="managerecord.php";</script>