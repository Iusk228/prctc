<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="index.html">Home</a><br>
    <a href="add.html">Add new</a><br>
    <table border=1>
        <tr>
            <td>ID</td>
            <td>Тип</td>
            <td>Материал</td>
            <td>Цена</td>
        </tr>
        <?php
        include "connect.php";
        $query = mysqli_query($con, "SELECT * FROM prices");
        while ($row = mysqli_fetch_row($query)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td><a href=\"delete.php?t=prices&id=" . $row[0] . "\">Delete</a></td>";
            echo "<td><a href=\"edit.php?id=" . $row[0] . "\">Edit</a></td>";
            echo "</tr>";
        }
        mysqli_close($con);
        ?>
    </table>
</body>

</html>