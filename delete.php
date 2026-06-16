<?php
$table = $_GET["t"];
$id = $_GET["id"];
include "connect.php";
$q = mysqli_query($con, "DELETE FROM $table WHERE id=$id");
echo "Success $q<br>";
mysqli_close($con);
echo '<a href="index.html">Home</a><br>';