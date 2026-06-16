<?php
$name=$_POST["name"];
$cat=$_POST["material"];
$price=$_POST["price"];
include "connect.php";
$q = mysqli_query($con, "INSERT INTO prices(typename, material, price) VALUES ('$name', '$cat', '$price')");
echo "<p>Success $q</p>";
echo '<a href="index.html">Home</a><br>';