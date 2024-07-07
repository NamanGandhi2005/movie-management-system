<!DOCTYPE html>
<html>
<head>
    <title>Search Actor</title>
</head>
<body>
    <h1>Search Actor</h1>
    <form action="search_actor.php" method="post">
        <label>Name:</label>
        <input type="text" name="search_name" required><br>

        <input type="submit" value="Search Actor">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'dbms';

        try {
            $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $search_name = $_POST['search_name'];

        $sql = "SELECT * FROM Actor WHERE Name LIKE :search_name";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search_name', '%' . $search_name . '%');
        $stmt->execute();
        $actors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($actors) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>Actor ID</th><th>Name</th><th>Birth Date</th><th>Nationality</th></tr>";

            foreach ($actors as $actor) {
                echo "<tr>";
                echo "<td>{$actor['ActorID']}</td>";
                echo "<td>{$actor['Name']}</td>";
                echo "<td>{$actor['BirthDate']}</td>";
                echo "<td>{$actor['Nationality']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No matching actors found.";
        }

        $conn = null; // Close the database connection
    }
    ?>
</body>
</html>
