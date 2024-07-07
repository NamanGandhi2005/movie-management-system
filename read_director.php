<!DOCTYPE html>
<html>
<head>
    <title>Director Table</title>
</head>
<body>
    <h1>Director Table</h1>
    
    <?php
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

    $sql = "SELECT * FROM Director";
    $stmt = $conn->query($sql);
    $directors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($directors) > 0) {
        echo "<table>";
        echo "<tr><th>Director ID</th><th>Name</th><th>Birth Date</th><th>Nationality</th></tr>";

        foreach ($directors as $director) {
            echo "<tr>";
            echo "<td>{$director['DirectorID']}</td>";
            echo "<td>{$director['Name']}</td>";
            echo "<td>{$director['BirthDate']}</td>";
            echo "<td>{$director['Nationality']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No directors found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
