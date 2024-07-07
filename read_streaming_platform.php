<!DOCTYPE html>
<html>
<head>
    <title>Streaming Platform Table</title>
</head>
<body>
    <h1>Streaming Platform Table</h1>
    
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

    $sql = "SELECT * FROM StreamingPlatform";
    $stmt = $conn->query($sql);
    $platforms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($platforms) > 0) {
        echo "<table>";
        echo "<tr><th>Platform ID</th><th>Movie ID</th><th>Platform Name</th><th>Availibility Start Date</th><th>Languages</th></tr>";

        foreach ($platforms as $platform) {
            echo "<tr>";
            echo "<td>{$platform['PlatformID']}</td>";
            echo "<td>{$platform['MovieID']}</td>";
            echo "<td>{$platform['PlatformName']}</td>";
            echo "<td>{$platform['AvailibilityStartDate']}</td>";
            echo "<td>{$platform['Languages']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Streaming Platforms found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
