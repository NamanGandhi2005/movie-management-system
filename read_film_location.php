<!DOCTYPE html>
<html>
<head>
    <title>Film Location Table</title>
</head>
<body>
    <h1>Film Location Table</h1>
    
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

    $sql = "SELECT * FROM FilmLocation";
    $stmt = $conn->query($sql);
    $filmLocations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($filmLocations) > 0) {
        echo "<table>";
        echo "<tr><th>Location ID</th><th>City</th><th>Country</th><th>Specific Location</th></tr>";

        foreach ($filmLocations as $filmLocation) {
            echo "<tr>";
            echo "<td>{$filmLocation['LocationID']}</td>";
            echo "<td>{$filmLocation['City']}</td>";
            echo "<td>{$filmLocation['Country']}</td>";
            echo "<td>{$filmLocation['SpecificLocation']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Film Locations found in the database.";
    }

    $conn = null; // Close the database connection
    ?>
</body>
</html>
