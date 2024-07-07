<!DOCTYPE html>
<html>
<head>
    <title>View Movies</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Movies</h1>
    <table>
        <tr>
            <th>MovieID</th>
            <th>Title</th>
            <th>Release Date</th>
            <th>Genre</th>
            <th>Rating</th>
        </tr>

        <?php
        include('db_connection.php');
        $sql = "SELECT * FROM Movie";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['MovieID']}</td>";
            echo "<td>{$row['Title']}</td>";
            echo "<td>{$row['ReleaseDate']}</td>";
            echo "<td>{$row['Genre']}</td>";
            echo "<td>{$row['Rating']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="index.php">Back to Home</a>
</body>
</html>
