<?php
$id = $_POST["id"];
$name=$_POST["name"];
$cat=$_POST["material"];
$price=$_POST["price"];
include "connect.php";
$q = mysqli_query($con, "UPDATE prices SET typename='$name', material='$cat', price='$price' WHERE id=$id");
echo "<p>Success $q</p>";
echo '<a href="index.html">Home</a><br>';