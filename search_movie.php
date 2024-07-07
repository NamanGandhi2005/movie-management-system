<!-- search.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Search Movies by Title</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Search Movies by Title</h1>
    <form method="get" action="search.php">
        <label>Title:</label>
        <input type="text" name="title" required>
        <button type="submit">Search Movies</button>
    </form>
    <a href="index.php">Back to Home</a>

    <?php
    include('db_connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['title'])) {
        $title = $_GET['title'];

        $sql = "SELECT * FROM Movie WHERE Title LIKE :title";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':title', '%' . $title . '%');

        $stmt->execute();
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($movies) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>MovieID</th><th>Title</th><th>Release Date</th><th>Genre</th><th>Rating</th></tr>";
            
            foreach ($movies as $movie) {
                echo "<tr>";
                echo "<td>{$movie['MovieID']}</td>";
                echo "<td>{$movie['Title']}</td>";
                echo "<td>{$movie['ReleaseDate']}</td>";
                echo "<td>{$movie['Genre']}</td>";
                echo "<td>{$movie['Rating']}</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "No matching records found.";
        }
    }
    ?>
</body>
</html>
