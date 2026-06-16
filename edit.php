<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="edit_a.php" method="post">
        <?php
        $id = $_GET["id"];
        include "connect.php";
        $q = mysqli_query($con, "SELECT * FROM prices WHERE id=$id");
        $row = mysqli_fetch_row($q);
        echo '<input type="number" name="id" style="visibility:hidden" value="' . $row[0] . '">';
        echo '<p>Наименование</p>';
        echo '<input type="text" name="name" value="' . $row[1] . '">';
        echo '<p>Материал</p>';
        echo '<input type="text" name="material" value="' . $row[2] . '">';
        echo '<p>Price</p>';
        echo '<input type="number" min="0" name="price" value="' . $row[3] . '"><br>';
        mysqli_close($con);
        ?>
        <br>
        <input type="submit">
    </form>
</body>

</html>